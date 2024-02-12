<?php
	$title = "Admin";
	$links = '
	<link rel="stylesheet" type="text/css" href="public/css/pages/admin.css">
    <link rel="stylesheet" type="text/css" href="public/css/components/buttons.css">
	';
	$scripts = '<script src="public/js/admin.js"></script>';
	$meta = '';
?>

<?php ob_start();?>

<body>
    <main id="admin">
        <div class="admin-infos">
            <h1><?= $_SESSION["adminName"]?></h1>
        </div>
            
        <!-- Display teams -->
        <div class="team-container">
            <h2>Liste des equipes</h2>
            <ul>
                <?php foreach ($teamsData as $team): ?>
                    <li class="team-item">
                        <div class="team-header">
                            <p class="team-name"><?= $team['TeamName']; ?></p>
                            <p class="team-email"><?= $team['Email']; ?></p>
                            <p class="team-toggle">+</p>
                        </div>
                        <div class="team-details show-details">
                            <p class="team-id"><span>ID de l'équipe : </span><?= $team['TeamID']; ?></p>
                            <p class="member-list"><span>Membres : </span>
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
                                <div class="video-infos">
                                    <p class="video-title"><span>Video : </span><?= $team['VideoTitle']; ?></p>
                                    <p class="video-description"><span>Description : </span><?= $team['Description']; ?></p>
                                    <p class="video-url"><span>Lien : </span><?= $team['VideoURL']; ?></p>
                                    <p class="upload-date"><span>Date d'ajout : </span><?= $team['UploadDate']; ?></p>
                                </div>
                                

                            <?php else : ?>
                                <p class="no-video">L'équipe n'a pas encore déposé de vidéo</p>
                            <?php endif; ?>
                            <form method="POST">
                                <input type="hidden" name="teamID" value="<?= $team['TeamID']; ?>">
                                <input type="submit" class="model-btn blue-empty-btn flex-center-col" name="deleteTeam" value="Supprimer l'équipe" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette équipe ?');">
                            </form>
                        </div>
                        
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </main>
</body>
<?php $content_page = ob_get_clean(); ?>

<?php require('resources/views/templates/template_all.php'); ?>
