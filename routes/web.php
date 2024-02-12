<?php
//____________ PARAMETERS ____________
// Get the server's IP address or hostname
$serverAddress = $_SERVER['SERVER_ADDR']; // IP address
$serverName = $_SERVER['SERVER_NAME']; // Hostname
// Define a list of common localhost IP addresses and hostnames
$localhostAddresses = ['127.0.0.1', '::1', 'localhost'];
// Check if the server address or hostname is in the list of localhost values
$isLocalhost = in_array($serverAddress, $localhostAddresses) || in_array($serverName, $localhostAddresses);
if ($isLocalhost) {
   //____________ CONSTS ____________
   define('ROOT', '/');
} else {
   //____________ CONSTS ____________
   define('ROOT', '/~heddeg/RallyeVideo2/');
}


//____________ SESSION ____________
session_start();

//____________ MODELS ____________
require_once '/app/models/AlertModel.php';

//____________ CONTROLLERS ____________
require_once 'app/controllers/ErrorController.php';
require_once 'app/controllers/HomeController.php';
require_once 'app/controllers/TeamController.php';
require_once 'app/controllers/VideosController.php';
require_once 'app/controllers/AdminController.php';

$errorController = new ErrorController();
$homeController = new HomeController();
$videosController = new VideosController();
$teamController = new TeamController();
$adminController = new AdminController();


/*______________________________*/
/*____________ROUTES____________*/
try {
   if (isset($_GET['page'])) {
      /*_________________________________________*/
      /*____________SIGN IN & SIGN UP____________*/
      
      //Sign Up View
      if ($_GET['page'] == 'inscription') {
         if (!isset($_SESSION['adminConnected']) && !isset($_SESSION['teamConnected'])) {
            $teamController->signUpView();
         }
      } 

      //Sign In View
      else if ($_GET['page'] == 'connexion') {
         if (isset($_GET['admin'])) {
            if ($_GET['admin'] == 'admin') {
               if (isset($_SESSION['adminConnected'])) {
                  // If already connected
                  header('Location: ' . ROOT);
                  exit();
               } else {
                  $adminController->signInView();
               }
            } else {
               $errorController->NotFoundView();
            }
         } else {
            if (isset($_SESSION['teamConnected']) OR isset($_SESSION['adminConnected'])) {
               // If already connected
               header('Location: ' . ROOT);
               exit();
            } else {
               $teamController->signInView();
            }
         }
      } 
      


      /*____________________________________*/
      /*____________ ADMIN PAGE ____________*/

      else if ($_GET['page'] == 'admin') {
         if (isset($_SESSION['adminConnected'])) {
            $adminController->adminView();
         } else {
            new AlertModel('error', 'Vous n\'avez pas accès à cette page');

            header('Location: ' . ROOT);
            exit();
         }
      }


      /*____________________________________*/
      /*____________ VIDEO PAGE ____________*/

      else if ($_GET['page'] == 'videos') {
         $videosController->videosView();
      }


      /*___________________________________*/
      /*____________ TEAM PAGE ____________*/

      else if ($_GET['page'] == 'mon-equipe') {
         if (isset($_SESSION['teamConnected'])) {
            // If team connected
            $teamController->myTeamView();
         } else {
            new AlertModel('error', 'Veuillez vous connecter pour accéder à cette page');

            header('Location: ' . ROOT.'connexion');
            exit();
         }
      }


      
      /*______________________________*/
      /*____________ERRORS____________*/
   
      else if ($_GET['page'] == 'introuvable') {
         new AlertModel('error', 'La page demandée est introuvable');
         $errorController->NotFoundView();
      }
      else if ($_GET['page'] == 'interdit') {
         new AlertModel('error', 'Vous n\'avez pas accès à cette page');
         $errorController->UnAuthorizedView();
      }
      else if ($_GET['page'] == 'websites') {
         header('Location:' . ROOT.'introuvable');
         exit();
      }
      else {
         header('Location:' . ROOT.'introuvable');
         exit();
      }
   } else {
      $homeController->homeView();
   }
}
catch(Exception $e) {
   new AlertModel('error', 'Une erreur est survenue');
   $errorController->GeneralView();
}

?>