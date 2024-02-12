<?php
	$title = "Erreur Inconnue";
	$links = '
	<link rel="stylesheet" href="public/css/pages/error.css">
	';
	$scripts = '';
	$meta = '';
?>

<?php ob_start(); ?>

<main id="error">
	<h1>Erreur Inconnue</h1>

	<div>
		<p>Une erreur inconnue est survenue.</p>
		<p>
		<?php
			if (isset($e)) {echo $e->getMessage();}
		?>
		</p>
		<p>Veuillez contacter le propriétaire du site si le problème persiste.</p>
	</div>
</main>

<?php $content_page = ob_get_clean(); ?>

<?php require('resources/views/templates/template_all.php'); ?>

