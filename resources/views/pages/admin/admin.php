<?php
	$title = "Admin";
	$links = '
	<link rel="stylesheet" type="text/css" href="public/css/pages/admin.css">
	';
	$scripts = '<script src="public/js/admin.js"></script>';
	$meta = '';
?>

<?php ob_start();?>

<?php

session_start();


// If the user is not logged in, redirect them to the login page
if (!isset($_SESSION["adminId"])) {
    header("Location: /connexion&admin");
    exit();
}


// Inclure le fichier TeamData.php
require_once('app/models/admin/TeamData.php');

// Récupérer toutes les données des équipes


?>

<body>
    <main id="admin">
        <div class="admin-infos">
            <h1><?= $_SESSION["adminName"]?></h1>
            <h3>Your information</h3>
            <p>Email: <?= $_SESSION["adminEmail"]?></p>
            <p>Admin ID: <?= $_SESSION["adminId"]?></p>
        
        </div>
            
        

        <!-- Display teams -->
        <div class="team-container">
            <h3>Les équipes</h3>
            <ul>
                <?php foreach ($teamsData as $team): ?>
                    <li class="team-item">
                        <div class="team-header">
                            <span class="team-name"><?= $team['TeamName']; ?></span>
                            <span class="team-email"><?= $team['Email']; ?></span>
                            <span class="team-toggle">+</span>
                        </div>
                        <div class="team-details">
                            <span class="team-id">ID de l'équipe : <?= $team['TeamID']; ?></span>
                            <p class="member-list">Membres : 
                                <?php
                                $members = [];
                                for ($i = 1; $i <= 8; $i++) {
                                    $memberKey = "Member$i";
                                    if (!empty($team[$memberKey])) {
                                        $members[] = $team[$memberKey];
                                    }
                                }
                                echo implode(', ', $members);
                                ?>
                            </p>
                            <?php if (!empty($team['VideoTitle'])): ?>
                                <p class="video-title">Video : <?= $team['VideoTitle']; ?></p>
                                <p class="video-description">Description : <?= $team['Description']; ?></p>
                                <p class="video-filename">Nom du fichier : <?= $team['VideoFileName']; ?></p>
                                <p class="upload-date">Date d'ajout : <?= $team['UploadDate']; ?></p>
                                

                            <?php else : ?>
                                <p class="no-video">L'équipe n'a pas encore déposé de vidéo</p>
                            <?php endif; ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <form action="app/models/LogOut.php" method="post">
            <input type="submit" value="Log Out">
        </form>
    </main>

</body>
<?php $content_page = ob_get_clean(); ?>

<?php require('resources/views/templates/template_all.php'); ?>
