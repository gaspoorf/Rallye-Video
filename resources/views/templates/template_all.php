<!DOCTYPE html>
<html lang="fr-FR">
	<head>
		<title><?= $title?> - Rallye Vidéo</title>

		<!--Link-->
		<link rel="stylesheet" type="text/css" href="public/css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="public/fonts/Kaviron/stylesheet.css"/>
		<link rel="stylesheet" type="text/css" href="public/css/layout/header.css">
		<link rel="stylesheet" type="text/css" href="public/css/layout/menu.css">
		<link rel="stylesheet" type="text/css" href="public/css/layout/footer.css">
		<link rel="stylesheet" type="text/css" href="public/css/components/var.css">
		<link rel="stylesheet" type="text/css" href="public/css/components/main.css">
		<link rel="stylesheet" type="text/css" href="public/css/components/alert.css">
		<link rel="stylesheet" type="text/css" href="public/css/components/classes.css">
		<link rel="stylesheet" type="text/css" href="public/css/components/buttons.css">
		<link rel="stylesheet" type="text/css" href="public/css/components/animations.css">
		<?= $links; ?>

		<!--Meta-->
		<meta charset="utf-8"/>
		<?= $meta; ?>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

		<!--Favicon-->
		<link rel="icon" type="image/x-icon" href="public/favicon.ico" />
		<link rel="shortcut icon" type="image/x-icon" href="public/favicon.ico" />

		<!-- JS -->
		<script src="public/js/mainMargin.js" defer></script>
		<script src="public/js/menu.js" defer></script>
		<script src="public/js/alert.js" defer></script>
		<?= $scripts; ?>
	</head>

	<body>
		<!-- HEADER -->
		<header class="flex-center-row">
			<nav class="flex-between-row" role="navigation">
				<a class="header-logo" href="<?= ROOT ?>" aria-label="page-acceuil" name="page-acceuil">
					<img src="public/images/logo.svg" alt="rallye-video-logo" width="125" height="56" loading="lazy">
				</a>
				<ul class="flex-center-row">
					<!-- If connected -->
					<?php if (isset($_SESSION['teamConnected']) OR isset($_SESSION['adminConnected'])) :
						if (isset($_SESSION['adminConnected'])) :
					?>
						<!-- If connected as admin -->
						<li><a class="model-btn blue-empty-btn flex-center-row" href="<?= ROOT ?>admin" aria-label="page-admin" name="page-admin">Admin Panel</a></li>

						<?php elseif (isset($_SESSION['teamConnected'])) :?>

						<!-- If connected as team -->
						<li><a class="model-btn blue-empty-btn flex-center-row" href="<?= ROOT ?>mon-equipe" aria-label="page-equipe" name="page-equipe">Mon équipe</a></li>
			
						<?php endif; ?>

					<?php else : ?>

					<li><a class="model-btn blue-empty-btn flex-center-row" accesskey="C" href="<?= ROOT ?>connexion" aria-label="page-connexion" name="page-connexion">Connexion</a></li>

					<?php endif; ?>

					<li>
						<a class="model-btn red-empty-btn flex-center-row" id="live-button" href="<?= ROOT ?>live" accesskey="L" aria-label="page-live" name="page-live">
							Live<span></span>
						</a>
					</li>
					<li>
						<button id="burger" class="model-btn" type="button" accesskey="M" onclick="toggleMenu()" aria-expanded="false" aria-haspopup="true" aria-label="Toggle Menu">
							<img src="public/images/icons/burger.svg" alt="open-burger-icon" width="20" height="20" loading="lazy">
						</button>
					</li>
				</ul>
			</nav>
		</header>
					
	
		<!-- MENU -->
		<div id="menu-blur-bg" onclick="toggleMenu()"></div>
		<div id="menu" role="menu">
			<div>
				<div id="close-btn" onclick="toggleMenu()">
					<img src="public/images/icons/close.svg" alt="fermer-icon" width="20" height="20" loading="lazy">
				</div>

				<div>
					<a href="<?= ROOT ?>">Accueil</a>
					<!-- If connected -->
					<?php if (isset($_SESSION['teamConnected']) OR isset($_SESSION['adminConnected'])) :
						if (isset($_SESSION['adminConnected'])) :
					?>
						<!-- If connected as admin -->
						<a href="<?= ROOT ?>admin">Admin Panel</a>

					<?php elseif (isset($_SESSION['teamConnected'])) :?>
						<!-- If connected as team -->
						<a href="<?= ROOT ?>mon-equipe">Mon équipe</a>
						
					<?php endif; ?>

					<form method="POST" action="">
						<button type="submit" name="signOut">Se déconnecter</button>
					</form>

					<!-- If not connected -->
					<?php else : ?>
					<a href="<?= ROOT ?>inscription">Créer une équipe</a>
					<a href="<?= ROOT ?>connexion">Se connecter</a>
					<?php endif; ?>
				</div>
				<div>
					<a href="<?= ROOT ?>evenement">L'évenement</a>
					<a href="<?= ROOT ?>equipes">Les équipes</a>
					<a href="<?= ROOT ?>videos">Les vidéos</a>
				</div>
				<div>
					<a href="<?= ROOT ?>a-propos">À propos</a>
					<a href="<?= ROOT ?>mentions-legales">Mentions légales</a>
				</div>
			</div>
		</div>

		
		<?php if (isset($_SESSION['alert'])) : ?>
			<?php if ($_SESSION['alert']['status']) : ?>
		<!-- ALERT POP UP -->
		<button id="alert-popup" class="flex-between-row alert-<?= $_SESSION['alert']['type']?>">
			<?= $_SESSION['alert']['message'] ?>
			<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
				<path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/>
			</svg>
		</button>
    
			<?php unset($_SESSION['alert']); ?>
			<?php endif; ?>
		<?php endif; ?>

	<!-- CONTENT -->
    <?= $content_page?>

	<!-- FOOTER -->
    <footer></footer>
	</body>
</html>