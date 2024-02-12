<?php
$teamName = $email = $pwd = "";
for ($i = 1; $i <= 8; $i++) {
    ${'teamPlayer'.$i} = "";
}

// If form submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $teamName = sanitizeFormData($_POST["teamName"]);
    $email = sanitizeFormData($_POST["email"]);
    $pwd = sanitizeFormData($_POST["password"]);
    for ($i = 1; $i <= 8; $i++) {
        ${'teamPlayer'.$i} = sanitizeFormData($_POST["teamPlayer".$i]);
    }
    /*_____________________________________________*/
    /*_______________FULL TREATMENT________________*/

    // Check if all fields are filled
    if (!empty($teamName) && !empty($email) && !empty($pwd) && !empty($teamPlayer1) && !empty($teamPlayer2) && !empty($teamPlayer3)) {

        // Check if email is valid
        if (preg_match($pattern_email, $email)) {
            $getAllNames = $database->prepare("SELECT TeamName FROM team");
            $getAllNames->execute();
            $allNames = $getAllNames->fetch(PDO::FETCH_ASSOC);

            // Check if team name is not already used
            if (!in_array($teamName, $allNames)) {
                // Get all emails
                $getAllEmails = $database->prepare("SELECT Email FROM team");
                $getAllEmails->execute();
                $allEmails = $getAllEmails->fetch(PDO::FETCH_ASSOC);
                
                // Check if email is not already used
                if (!in_array($email, $allEmails)) {
                
                    // Check if password is longer than 8 characters
                    if (strlen($pwd) >= 8) {
                        // Hash the password
                        $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);
                        
                        $insertData = $database->prepare("INSERT INTO team (TeamName, Password, Email, Member1, Member2, Member3, Member4, Member5, Member6, Member7, Member8) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                        $insertData->execute([$teamName, $hashed_pwd, $email, $teamPlayer1, $teamPlayer2, $teamPlayer3, $teamPlayer4, $teamPlayer5, $teamPlayer6, $teamPlayer7, $teamPlayer8]);

                        // Check if insertion and download are successful
                        if ($insertData) {
                            // Get TeamID
                            $getTeamId = $database->prepare("SELECT TeamID FROM team WHERE Email = ?");
                            $getTeamId->execute([$email]);
                            $teamId = $getTeamId->fetch(PDO::FETCH_ASSOC);

                            // Assign Session
                            $_SESSION['teamConnected'] = true;
                            $_SESSION['teamId'] = $teamId['TeamID'];
                            
                            // Success message
                            new AlertModel('success', 'L\'équipe ' . $teamName . ' a été créée avec succès !');
                            
                            header('Location: ' . ROOT .'mon-equipe');
                            exit();
                        } else {
                            // ERROR : Insertion failed
                            new AlertModel('error', 'Une erreur est survenue, veuillez réessayer.');
                        }
                    } else {
                        // ERROR : Password too short
                        new AlertModel('error', 'Le mot de passe doit contenir au moins 8 caractères.');
                    }
                } else {
                    // ERROR : Email already used
                    new AlertModel('error', 'Cette adresse e-mail est déjà utilisée.');
                }
            } else {
                // ERROR : Team name already used
                new AlertModel('error', 'Ce nom d\'équipe est déjà utilisée.');
            }
        } else {
            // ERROR : Email not valid
            new AlertModel('error', 'Veuillez remplir une adresse e-mail valide.');
        }
    } else {
        // ERROR : Email or password is empty
        new AlertModel('error', 'Veuillez renseigner tous les champs : minimum 3 joueurs par équipe.');
    }
}

?>