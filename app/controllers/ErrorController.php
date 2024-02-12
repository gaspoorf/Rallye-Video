<?php

//____________ ERROR CONTROLLER ____________
class ErrorController {
    //____________ GENERAL VIEW ____________
    public function GeneralView() {
        // Models
        require('app/models/SignOut.php');
        
        // Views
        require('resources/views/errors/error_view.php');
    }
    //____________ NOT FOUND VIEW ____________
    public function NotFoundView() {
        // Models
        require('app/models/SignOut.php');

        // Views
        require('resources/views/errors/404_view.php');
    }
    //____________ UNAUTHORIZED VIEW ____________
    public function UnAuthorizedView() {
        // Models
        require('app/models/SignOut.php');

        // Views
        require('resources/views/errors/403_view.php');
    }
}

?>