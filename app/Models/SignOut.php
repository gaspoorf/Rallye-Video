<?php 
//____________ SIGN OUT ____________
// Check if the request method is POST and if the 'logOut' button was pressed
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['signOut'])) {
    // Unset all session variables
    session_unset();
    
    // Destroy the session
    session_destroy();

    session_start();
    new AlertModel('success', 'Déconnexion réussie.  À bientôt !');

    header('Location: ' . ROOT);
    exit();
}


?>