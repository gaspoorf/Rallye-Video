<?php
	$title = "Team";
	$links = '
	<link rel="stylesheet" type="text/css" href="public/css/pages/team.css">
    <link rel="stylesheet" type="text/css" href="public/css/components/buttons.css">
	';
	$scripts = '<script src="public/js/team.js"></script>';
	$meta = '';


    // Get Data
    $allMembers = $myTeam->getMembers($database, $_SESSION['teamId']);
    $teamInfo = $myTeam->getTeamInfo($database, $_SESSION['teamId']);
    $video = $myTeam->getVideo($database, $_SESSION['teamId']);
    if (isset($_SESSION['video'])) {
        $video['VideoTitle'] = $_SESSION['video']['title'];
        $video['VideoID'] = $_SESSION['video']['id'];
        $video['Description'] = $_SESSION['video']['description'];
        $video['VideoURL'] = $_SESSION['video']['url'];
        $video['TeamID'] = $_SESSION['video']['teamId'];
    }
?>

<?php ob_start();?>

<main id="team" class="wrap">
    <h1><?= $teamInfo['TeamName']?></h1>
    <div id="team-infos">
        <div class="team-members">
            <h2>Membres de l'equipe</h2>
           
            <!-- Form Update Member -->
            <div id="editFormContainer">
                <form action="" method="post" >
                    <div id="editForm" >
                        <?php $i = 1; ?>
                        <?php if ($allMembers) : ?>
                            <?php foreach ($allMembers as $value) : ?>
                            <div class="member-show flex-center-row">
                                <img src="public/images/clock-logo.svg" alt="clock-logo">
                                <div class="input-member">
                                    <input type="text" id="teamPlayer<?= $i ?>" name="teamPlayer<?= $i ?>" value="<?= $value ?>">
                                    <span></span>
                                </div>
                                
                            </div>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p>Aucun membre trouvé.</p>
                        <?php endif; ?>
                    </div>
                    
                    <div class="flex-center-row">
                        <input type="submit" class="model-btn blue-empty-btn flex-center-col" name="updateMembers" value="Enregistrer" onclick="return confirm('Êtes-vous sûr de vouloir modifier les membres ?');">
                    </div>
                 
                </form>
            </div>
            
        </div>



        <h2 id="video-h2">Votre vidéo</h2>
        <form class="video-container flex-center-row" action="" method="POST">
            <div class="video-infos-container flex-center-col">
                <div class="flex-center-col">
                    <label for="videoTitle">Titre</label>
                    <input type="text" name="videoTitle" <?php if ($video) : ?>value="<?= $video['VideoTitle']; ?>" <?php else : ?> placeholder="Titre"<?php endif; ?>>
                </div>
                <div class="flex-center-col">
                    <label for="videoDescription">Description <span>(Limité à 255 charactères)</span></label>
                    <input type="text" name="videoDescription" <?php if ($video) : ?>value="<?= $video['Description']; ?>" <?php else : ?> placeholder="Description"<?php endif; ?>>
                </div>
                <div class="flex-center-col">
                    <input type="submit" class="model-btn blue-empty-btn flex-center-col" <?php if ($video) : ?>name="updateVideo" value="Enregistrer"<?php else : ?>name="uploadVideo" value="Envoyer"<?php endif; ?>>
                    <?php if ($video) : ?>
                    <input type="submit" class="model-btn blue-empty-btn flex-center-col" name="deleteVideo" value="Supprimer la vidéo" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette vidéo ?');">
                    <input type="hidden" name="videoId" value="<?= $video['VideoID']; ?>">
                    <input type="hidden" name="videoURL" value="<?= $video['VideoURL']; ?>">
                    <input type="hidden" name="teamId" value="<?= $video['TeamID']; ?>">
                    <?php endif; ?> 
                </div>
            </div>
            <div class="preview-video flex-center-col">
                <?php if ($video) : ?>
                    <iframe width="360" height="280" src="<?= $video['VideoURL']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <?php else : ?>
                <h3>Aucune vidéo</h3>
                <label for="videoUpload">Veuillez renter l'URL de la vidéo Youtube comme indiqué</label>
                <input type="text" id="videoURL" name="videoURL" placeholder="https://www.youtube.com/watch?v=Video">
                <?php endif; ?>
            </div>
        </form>
    </div>
</main>

<?php $content_page = ob_get_clean(); ?>

<?php require('resources/views/templates/template_all.php'); ?>
