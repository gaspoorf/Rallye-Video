<?php

$email = $pwd = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = sanitizeFormData($_POST["email"]);
    $pwd = sanitizeFormData($_POST["password"]);
    
    // Check if email and password are not empty
    if (!empty($email) && !empty($pwd)) {
        if (preg_match($pattern_email, $email)) {
            $teamData = $database->prepare("SELECT * FROM team WHERE Email = ?");
            $teamData->execute([$email]);

            // Check if the email exists
            if ($teamData->rowCount() > 0) {
                // Fetch the data
                $teamData = $teamData->fetch(PDO::FETCH_ASSOC);
                
                // Check if password is correct
                if (password_verify($pwd, $teamData['Password'])) {
                    // Define the session variables
                    $_SESSION['teamConnected'] = true;
                    $_SESSION["teamId"] = $teamData['TeamID'];


                    // Reset the variables
                    $email = $pwd = "";

                    // Success message
                    
                    new AlertModel('success', 'Connecté au compte de l\'équipe ' . $teamData['TeamName'] . '.');
                    
                    // Redirect to page my team
                    header('Location: ' . ROOT.'mon-equipe');
                    exit();
                } else {
                    // ERROR : Email or password incorrect
                    new AlertModel('error', 'Mot de passe incorrect.');
                }
            } else {
                // ERROR : Email or password incorrect
                new AlertModel('error', 'Cette adresse e-mail n\'existe pas.');
            }
        } else {
            // ERROR : Email not valid
            new AlertModel('error', 'Veuillez remplir une adresse e-mail valide.');
        }
    } else {
        // ERROR : Email or password is empty
        new AlertModel('error', 'Veuillez renseigner tous les champs.');
    }
}
?>