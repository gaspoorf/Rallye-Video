<?php
//____________ HOME CONTROLLER ____________
class HomeController {
    //____________ HOME VIEW ____________
    public function homeView() {
        // Models
        require('app/models/SignOut.php');
        // Views
        require('resources/views/pages/home_view.php');
    }
}

?>