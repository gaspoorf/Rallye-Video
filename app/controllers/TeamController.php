<?php
//____________ TEAM CONTROLLER ____________
class TeamController {
    //____________ SIGN UP VIEW ____________
    public function signUpView() {
        // Utilities
        require('app/utilities/Patterns.php');
        require('app/utilities/Slugify.php');
        require('app/utilities/SanitizeFormData.php');

        // Models
        require('app/models/Database.php');
        require('app/models/SignOut.php');
        require('app/models/team/MyTeamModel.php');
        require('app/models/team/SignUpModel.php');

        // Views
        require('resources/views/pages/team/sign_up_view.php');
    }
    //____________ SIGN IN VIEW ____________
    public function signInView() {
        // Utilities
        require('app/utilities/Patterns.php');
        require('app/utilities/SanitizeFormData.php');

        // Models
        require('app/models/Database.php');
        require('app/models/SignOut.php');
        require('app/models/team/SignInModel.php');

        // Views
        require('resources/views/pages/sign_in_view.php');
    }
    //____________ MY TEAM VIEW ____________
    public function myTeamView() {
        // Models
        require('app/utilities/SanitizeFormData.php');
        require('app/models/SignOut.php');
        require('app/models/Database.php');
        require('app/models/team/MyTeamModel.php');
        $myTeam = new MyTeamModel();


        // POST UPDATE MEMBERS
        if (isset($_POST['updateMembers'])) {
            // Get new members
            $newMembers = [];
            for ($i = 1; $i <= 8; $i++) {
                $newMembers[] = $_POST['teamPlayer' . $i];
            }

            // Update
            $myTeam->updateMembers($database, $_SESSION['teamId'], $newMembers);
        }

        // POST UPDATE VIDEO
        if (isset($_POST['updateVideo'])) {
            $data = $_POST;
            $myTeam->updateVideo($database, $_SESSION['teamId'], $data);
        }

        // POST UPLOAD VIDEO
        if (isset($_POST['uploadVideo'])) {
            $data = $_POST;
            $myTeam->uploadVideo($database, $_SESSION['teamId'], $data);
        }

        // POST DELETE VIDEO
        if (isset($_POST['deleteVideo'])) {
            $video = $myTeam->getVideo($database, $_SESSION['teamId']);
            $myTeam->deleteVideo($database, $_SESSION['teamId'], $video['VideoID']);
        }



        // Views
        require('resources/views/pages/team/my_team_view.php');
    }
}

?>