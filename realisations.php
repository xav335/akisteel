<!doctype html>
<html class="no-js" lang="fr" dir="ltr">
	<head>
		<title>Quelques réalisations AKISTEEL</title>
		<?php include('inc/meta.php'); ?>
	</head>
	<body class="realisations">
		
		<?php include('inc/header.php'); ?>
		
		<div class="row fullwidth content">
			<div class="row contenu-realisations">
				<div class="large-12 columns">
					<h1>Quelques unes de nos réalisations</h1>
				</div>
				<div class="large-4 medium-4 small-12 columns">
					<figure>
						<a href="img/reference-01.jpg" data-fancybox-group="realisations"><img src="img/reference-01.jpg" alt="" /></a>
						<figcaption>Légende associée</figcaption>
					</figure>
				</div>
				<div class="large-4 medium-4 small-12 columns">
					<figure>
						<a href="img/reference-01.jpg" data-fancybox-group="realisations"><img src="img/reference-01.jpg" alt="" /></a>
						<figcaption>Légende associée</figcaption>
					</figure>
				</div>
				<div class="large-4 medium-4 small-12 columns">
					<figure>
						<a href="img/reference-01.jpg" data-fancybox-group="realisations"><img src="img/reference-01.jpg" alt="" /></a>
						<figcaption>Légende associée</figcaption>
					</figure>
				</div>
			</div>
			<div class="row contenu-realisations">
				<div class="large-4 medium-4 small-12 columns">
					<figure>
						<a href="img/reference-01.jpg" data-fancybox-group="realisations"><img src="img/reference-01.jpg" alt="" /></a>
						<figcaption>Légende associée</figcaption>
					</figure>
				</div>
				<div class="large-4 medium-4 small-12 columns">
					<figure>
						<a href="img/reference-01.jpg" data-fancybox-group="realisations"><img src="img/reference-01.jpg" alt="" /></a>
						<figcaption>Légende associée</figcaption>
					</figure>
				</div>
				<div class="large-4 medium-4 small-12 columns">
					<figure>
						<a href="img/reference-01.jpg" data-fancybox-group="realisations"><img src="img/reference-01.jpg" alt="" /></a>
						<figcaption>Légende associée</figcaption>
					</figure>
				</div>
			</div>
		</div>
		
		<?php include('inc/footer.php'); ?>
		
		<?php include('inc/scripts.php'); ?>
		<script>
			$(document).ready(function(){
				$('.contenu-realisations a').fancybox();
				$('nav ul li:nth-child(3)').addClass('active');		
			});
		</script>
	</body>
</html>
