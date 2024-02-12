<?php
	$title = "Team";
	$links = '
	<link rel="stylesheet" type="text/css" href="public/css/pages/team.css">
	';
	$scripts = '';
	$meta = '';
?>

<?php ob_start();?>

<?php
session_start();

// If the user is not logged in, redirect them to the login page
if (!isset($_SESSION["teamId"])) {
    header("Location: /connexion");
    exit();
}

?>

<body>
    <main id="team">
        <div class="team-infos">
            <h1><?= $_SESSION["teamName"]?></h1>
            <div class="team-members">
                <p>Membres de l'équipe :</p>
                <div class="member-list">
                    <?php
                    for ($i = 1; $i <= 8; $i++) {
                        if (isset($_SESSION['teamMember' . $i])) {         
                    ?>
                    <p class="member"><?= $_SESSION['teamMember' . $i]?></p>
                    <?php }}?>
                </div>
            </div>
        </div>
              
        <div class="video-form-container">
            <h2>Poster sa vidéo</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="videoTitle">Titre de la vidéo:</label>
                <input type="text" name="videoTitle" required>

                <label for="videoDescription">Description de la vidéo:</label>
                <textarea name="videoDescription" required></textarea>

                <label for="videoFile">Fichier vidéo:</label>
                <input type="file" name="videoFile" accept="video/*" required>

                <input type="submit" value="Envoyer la vidéo">
            </form>
        </div>


        <form action="app/models/LogOut.php" method="post">
            <input type="submit" value="Log Out">
        </form>
                  
    </main>
</body>

<?php $content_page = ob_get_clean(); ?>

<?php require('resources/views/templates/template_all.php'); ?>
