
<!doctype html>
<html class="no-js" lang="fr" dir="ltr">
	<head>
		<title>Quelques réalisations AKISTEEL</title>
		<? include( $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/meta.php" ); ?>
	</head>
	<body class="realisations">
		
		<? include( $_SERVER[ "DOCUMENT_ROOT" ] . "/inc/header.php" ); ?>
		
		<div class="row fullwidth content2">
		
			<div class="row contenu-realisations">
			
				<div class="large-12 columns">
					<h1>Quelques unes de nos réalisations</h1>
				</div>
				<ul class="tabs" data-tab>
              <li class="tab-title active"><a href="#panel1">Tab 1</a></li>
              <li class="tab-title"><a href="#panel2">Tab 2</a></li>
              <li class="tab-title"><a href="#panel3">Tab 3</a></li>
              <li class="tab-title"><a href="#panel4">Tab 4</a></li>
            </ul>
            <div class="tabs-content">
              <div class="content active" id="panel1">
                <p>This is the first panel of the basic tab example. You can place all sorts of content here including a grid.</p>
              </div>
              <div class="content" id="panel2">
                <p>This is the second panel of the basic tab example. This is the second panel of the basic tab example.</p>
              </div>
              <div class="content" id="panel3">
                <p>This is the third panel of the basic tab example. This is the third panel of the basic tab example.</p>
              </div>
              <div class="content" id="panel4">
                <p>This is the fourth panel of the basic tab example. This is the fourth panel of the basic tab example.</p>
              </div>
            </div>
				
				
				
				
			</div>
				
		</div>
			
			
			
			
		
		<?php include('inc/footer.php'); ?>
		
		<?php include('inc/scripts.php'); ?>
		<script>
			$(document).ready(function(){
				$('nav ul li:nth-child(3)').addClass('active');		
			});
		</script>
	</body>
</html>
