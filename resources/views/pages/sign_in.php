<?php
	$title = "Connexion";
	$links = '
	<link rel="stylesheet" href="public/css/pages/sign_in.css">
	<link rel="stylesheet" href="public/css/components/form.css">
	';
	$scripts = '<script src="public/js/pwd.js" defer></script>';
	$meta = '';
?>

<?php ob_start(); ?>


<main id="sign-in">
	<div>
		<div>
			<h1>Connexion</h1>

			<form method="POST" action="">
				<input type="text" id="email" name="email" placeholder="Adresse e-mail" value="<?= $email?>" autofocus>
				<input type="password" id="password" name="password" placeholder="*************" value="<?= $pwd?>">
				<span id="show-hide">Afficher le mot de passe</span>
				<input type="submit" value="Se connecter">
				<div>
					<a href="/inscription">Créer une équipe</a>
					<a href="">Mot de passe oublié ?</a>
				</div>
			</form>
		</div>
	</div>
</main>

<?php $content_page = ob_get_clean(); ?>

<?php require('resources/views/templates/template_all.php'); ?>
