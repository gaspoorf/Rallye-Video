<?php
	$title = "Accueil";
	$links = '
	<link rel="stylesheet" href="public/css/pages/home.css">
	';
	$scripts = '';
	$meta = '';
?>

<?php ob_start(); ?>

<main id="home" class="flex-center-col">
	<div class="cards-container flex-center-row">
		<div class="card flex-center-col">
			<!-- <img class="card-image" src="public/images/cards/videos.jpg" width="250" height="300" alt="card-1"> -->
			<div class="card-reflection"></div>
		</div>
		<a href="/inscription" class="card flex-center-col"></a>
		<a href="/" class="card flex-center-col"></a>
		<a href="/" class="card flex-center-col"></a>
	</div>
</main>

<?php $content_page = ob_get_clean(); ?>

<?php require('resources/views/templates/template_all.php'); ?>
