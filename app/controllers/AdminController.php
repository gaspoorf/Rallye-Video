<?php
//____________ ADMIN CONTROLLER ____________
class AdminController {
    //____________ SIGN IN VIEW ____________
    public function signInView() {
        // Utilities
        require('app/utilities/Patterns.php');
        require('app/utilities/SanitizeFormData.php');

        // Models
        require('app/models/Database.php');
        require('app/models/SignOut.php');
        require('app/models/admin/SignInModel.php');

        // Views
        require('resources/views/pages/sign_in_view.php');
    }

    //____________ ADMIN VIEW ____________
    public function adminView() {
        // Models
        require('app/models/Database.php');
        require('app/models/SignOut.php');

        require('app/models/admin/AdminModel.php');
        $admin = new AdminModel();

        $teamsData = $admin->getData($database);

        // POST DELETE TEAM
        if (isset($_POST['deleteTeam'])) {
            if (isset($_POST['teamID'])) {
                $teamId = $_POST['teamID'];
                $admin->deleteTeam($database, $teamId);
            }
        }
        require('resources/views/pages/admin/admin_view.php');
    }
}

?>