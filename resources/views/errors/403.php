<?php
	$title = "Erreur 403";
	$links = '
	<link rel="stylesheet" href="public/css/pages/error.css">
	';
	$scripts = '';
	$meta = '';
?>

<?php ob_start(); ?>

<main id="error">
	<h1>Erreur 403</h1>
	<p>Vous n'êtes pas autorisé à naviguer sur cette page.</p>
</main>

<?php $content_page = ob_get_clean(); ?>

<?php require('resources/views/templates/template_all.php'); ?>
