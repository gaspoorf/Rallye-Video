<?php
	$title = 'Inscription';
	$links = '
    <link rel="stylesheet" href="public/css/pages/sign_up.css">
	<link rel="stylesheet" href="public/css/components/form.css">
    ';
	$scripts = '
	<script src="public/js/signUp.js" defer></script>
    <script src="public/js/password.js" defer></script>
    ';
	$meta = '';
?>

<?php ob_start(); ?>

<main id="sign-up" class="wrap">
	<div>
		<div>
			<h1>Creer une equipe</h1>

			<form method="POST" action="">
				<div>
					<input type="text" id="team-name" name="teamName" placeholder="Nom de l'équipe" value="<?= $teamName?>" autofocus>
					<input type="text" id="email" name="email" placeholder="Adresse e-mail" value="<?= $email?>">
					<input type="password" id="password" name="password" placeholder="*************" value="<?= $pwd?>">
					<span id="show-hide">Afficher le mot de passe</span>

					<button id="next-for-submit" class="submit-btn" type="button">Suivant</button>
					
					<div>
						<a id="form-links" href="<?= ROOT?>connexion">J'ai déjà un compte</a>
					</div>
				</div>
				
				<div>
					<div id="team-players-container">
						<?php for ($i = 1; $i <= 8; $i++) { ?>
							<input type="text" id="player-<?= $i ?>" name="teamPlayer<?= $i ?>" placeholder="Prénom NOM <?= $i ?>" value="<?= ${'teamPlayer'.$i} ?>">
						<?php } ?>
					</div>
					<div>
						<button id="prev-for-submit" class="submit-btn" type="button">Retour</button>
						<input type="submit" value="Créer l'équipe">
					</div>
				</div>
			</form>
		</div>
	</div>
</main>





<?php $content_page = ob_get_clean(); ?>

<?php require('resources/views/templates/template_all.php'); ?>
