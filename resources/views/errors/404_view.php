<?php
	$title = "Erreur 404";
	$links = '
	<link rel="stylesheet" href="public/css/pages/error.css">
	';
	$scripts = '';
	$meta = '';
?>

<?php ob_start(); ?>

<main id="error">
	<h1>Erreur 404</h1>
	<p>La page que vous demandez est introuvable.</p>
</main>

<?php $content_page = ob_get_clean(); ?>

<?php require('resources/views/templates/template_all.php'); ?>

