<?php
	$title = 'Vidéos';
	$links = '<link rel="stylesheet" href="public/css/pages/videos.css">';
	$scripts = '';
	$meta = '';
?>

<?php ob_start(); ?>

<main id="videos" class="flex-start-col">
	<h1 id="video-title" data-text="Les vidéos">Les videos</h1>
	  
	<!-- Display videos -->
	<div class="videos-container">
		<?php foreach ($teamsVideos as $videos): ?>
			<div class="cards-videos flex-center-col">
				<p class="videos-team-name"><?= $videos['TeamName'] ?></p>
				<div class="video">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/sbcehMj7__8?si=k0SLCmXt2FOtewZw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
				</div>
				
				<p class="videos-description"><?= truncateText($videos['Description'], 100) ?></p>
			</div>

		<?php endforeach; ?>
	</div>
</main>

<?php $content_page = ob_get_clean(); ?>

<?php require('resources/views/templates/template_all.php'); ?>
