<?
	include_once $_SERVER[ "DOCUMENT_ROOT" ] . "/admin/classes/utils.php";
	require $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/inc.config.php";
	
	$debug = false;
?>

<!doctype html>
<html class="no-js" lang="fr" dir="ltr">
	<head>
		<title>Présentation de la société AKISTEEL</title>
		<? include( $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/meta.php" ); ?>
	</head>
	<body class="presentation">
		
		<? include( $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/header.php" ); ?>
		
		<div class="row fullwidth content">
			<div class="large-6 medium-6 small-12 columns">
				<div class="contenu">
					<div class="qui-sommes-nous">
						<h1>Qui sommes-<span>nous</span> ?</h1>
						<p>Consectetur adipiscing elit. Suspendisse quis risus nec elit pharetra ultrices at id dui. Sed lobortis diam in adipiscing volutpat. Etiam volutpat in ipsum ut ultricies. Phasellus id bibendum quam. Sed justo felis, consequat sed magna vitae, rutrum auctor quam.</p>
						<p>Consectetur adipiscing elit. Suspendisse quis risus nec elit pharetra ultrices at id dui. Sed lobortis diam in adipiscing volutpat. Etiam volutpat in ipsum ut ultricies. Phasellus id bibendum quam. Sed justo felis, consequat sed magna vitae, rutrum auctor quam.</p>
						<p>Consectetur adipiscing elit. Suspendisse quis risus nec elit pharetra ultrices at id dui. Sed lobortis diam in adipiscing volutpat. Etiam volutpat in ipsum ut ultricies. Phasellus id bibendum quam. Sed justo felis, consequat sed magna vitae, rutrum auctor quam.</p>
						<p>Consectetur adipiscing elit. Suspendisse quis risus nec elit pharetra ultrices at id dui. Sed lobortis diam in adipiscing volutpat. Etiam volutpat in ipsum ut ultricies. Phasellus id bibendum quam. Sed justo felis, consequat sed magna vitae, rutrum auctor quam.</p>
					</div>
				</div>
			</div>
			<div class="large-6 medium-6 small-12 columns photos">
				<div class="vue-de-chantier flex">
					<p>
						Vue<br/>
						de chantier
					</p>
				</div>
				<div class="bulle flex">
					<p>
						<span>escalier</span>
						création sur mesure
					</p>
				</div>
				<div class="swiper-container flex">
					<div class="swiper-wrapper">
						<div class="swiper-slide" style="background-image:url('img/reference-01.jpg');"></div>
						<div class="swiper-slide" style="background-image:url('img/reference-01.jpg');"></div>
						<div class="swiper-slide" style="background-image:url('img/reference-01.jpg');"></div>
						<div class="swiper-slide" style="background-image:url('img/reference-01.jpg');"></div>
					</div>
					<!-- Add Arrows -->
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
			</div>
		</div>
		
		<? include( $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/footer.php" ); ?>
		<? include( $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/scripts.php" ); ?>
		
		<script>
			var swiper = new Swiper('.swiper-container', {
				nextButton: '.swiper-button-next',
				prevButton: '.swiper-button-prev',
				slidesPerView: 1,
				paginationClickable: true,
				spaceBetween: 0,
				loop: true
			});
			
			$(document).ready(function(){
				$('nav ul li:nth-child(2)').addClass('active');
			});
		</script>
	</body>
</html>
