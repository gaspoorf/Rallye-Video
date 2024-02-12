<?php
//____________ ADMIN SIGN IN MODEL ____________
$email = $pwd = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = sanitizeFormData($_POST["email"]);
    $pwd = sanitizeFormData($_POST["password"]);
    
    // Check if email and password are not empty
    if (!empty($email) && !empty($pwd)) {
        if (preg_match($pattern_email, $email)) {
            $adminData = $database->prepare("SELECT * FROM admin WHERE Email = ?");
            $adminData->execute([$email]);

            // Check if the email exists
            if ($adminData->rowCount() > 0) {
                // Fetch the data
                $adminData = $adminData->fetch(PDO::FETCH_ASSOC);
                
                // Check if password is correct
                if (password_verify($pwd, $adminData['Password'])) {
                    // Define the session variables
                    $_SESSION['adminConnected'] = true;
                    $_SESSION["adminId"] = $adminData['AdminID'];
                    $_SESSION["adminName"] = $adminData['AdminName'];
                    $_SESSION["adminEmail"] = $adminData['Email'];

                    // Reset the variables
                    $email = $pwd = "";

                    // Redirect to page admin
                    new AlertModel('success', 'Connecté au compte admin de ' . $adminData['AdminName'] . '.');

                    header('Location: ' . ROOT.'admin');
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