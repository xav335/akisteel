<!doctype html>
<html class="no-js" lang="fr" dir="ltr">
	<head>
		<title>AKISTEEL</title>
		<?php include('inc/meta.php'); ?>
	</head>
	<body>
		
		<div class="popup">
			<div class="row">
				<a class="close">X</a>
				<div class="large-6 medium-6 small-12 columns">
					<div class="text-popup">
						<p>nouveau <strong>steel</strong></p>
						<p>Lancement de notre nouveau produit</p>
						<p>
							Consectetur adipiscing elit. Suspendisse quis risus nec elit pharetra ultrices at id dui. Sed lobortis diam in adipiscing volutpat.<br/>
							Et iam volutpat in ipsum ut ultricies. Phasellus id bibendum quam. Sed justo felis, consequat sed magna vitae, rutrum auctor quam.</p>
					</div>
				</div>
				<div class="large-6 medium-6 small-12 columns">
					<img src="img/photo-popup.jpg" alt="" />
				</div>
			</div>
		</div>
		
		<?php include('inc/header.php'); ?>
		
		<div class="row fullwidth content">
			<div class="large-6 medium-6 small-12 columns">
				<div class="contenu">
					<div class="quoi">
						<h1>C'est <span>quoi</span> ?</h1>
						<p>
							Consectetur adipiscing elit. Suspendisse quis risus nec elit pharetra ultrices at id dui. Sed lobortis diam in adipiscing volutpat. Etiam volutpat in ipsum ut ultricies. Phasellus id bibendum quam. Sed justo felis, consequat sed magna vitae, rutrum auctor quam.
						</p>
					</div>
					<div class="quel-style">
						<h2>Quel <span>style</span> ?</h2>
						<p>
							Consectetur adipiscing elit. Suspendisse quis risus nec elit pharetra ultrices at id dui.
						</p>
						<p>
							Sedlobo rtis diam in adipiscing volutpat. Etiam volutpat in ipsum ut ultricies. Phasellus id bibendum quam. Sed justo felis, consequat sed magna vitae, rutrum auctor quam.
						</p>
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
						<div class="swiper-slide" style="background-image:url('img/reference-02.jpg');"></div>
						<div class="swiper-slide" style="background-image:url('img/reference-03.jpg');"></div>
						<div class="swiper-slide" style="background-image:url('img/reference-04.jpg');"></div>
					</div>
					<!-- Add Arrows -->
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
			</div>
		</div>
		
		<?php include('inc/footer.php'); ?>
		
		<?php include('inc/scripts.php'); ?>
		<script>
			var swiper = new Swiper('.swiper-container', {
				nextButton: '.swiper-button-next',
				prevButton: '.swiper-button-prev',
				autoplay: 2000,
				slidesPerView: 1,
				paginationClickable: true,
				spaceBetween: 0,
				loop: true
			});
			$(document).ready(function(){
				$('nav ul li:nth-child(1)').addClass('active');
			});
		</script>
	</body>
</html>
