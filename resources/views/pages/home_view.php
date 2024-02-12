<?php
	$title = 'Accueil';
	$links = '<link rel="stylesheet" href="public/css/pages/home.css">';
	$scripts = '<script src="public/js/countdown.js" defer></script>';
	$meta = '';
?>

<?php ob_start(); ?>

<main id="home" class="flex-start-col">
	<h1 id="home-title" data-text="Rallye video">Rallye video</h1>
	<div class="cards-container flex-center-start-row">
		<div id="videos-card" class="card flex-start-col">
			<h2>Videos</h2>
			<a href="<?= ROOT ?>videos" aria-label="page-videos" name="page-videos">
				<img src="public/images/cards/videos.svg" alt="Image-videos" width="175px">
			</a>
			<div id="videos-card-reflection" class="card-reflection"></div>
		</div>
		<div id="event-card" class="card flex-start-col">
			<div id="countdown" class="flex-center-col">24 Janvier 2024</div>
			<div class="inside-card flex-start-col">
				<h2>Evenement</h2>
				<a href="<?= ROOT ?>evenement" aria-label="page-evenement" name="page-evenement">
					<img src="public/images/cards/event.svg" alt="Image-evenement" width="175px">
				</a>
				<div id="event-card-reflection" class="card-reflection"></div>
			</div>
		</div>
		<div class="card flex-start-col">
			<h2>Equipes</h2>
			<a href="<?= ROOT ?>equipes" aria-label="page-equipe" name="page-equipe">
				<img src="public/images/cards/teams.svg" alt="Image-equipe" width="175px">
			</a>
			<div id="teams-card-reflection" class="card-reflection"></div>
		</div>
	</div>
</main>

<?php $content_page = ob_get_clean(); ?>

<?php require('resources/views/templates/template_all.php'); ?>
