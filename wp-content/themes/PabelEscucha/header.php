<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
        <link href="<?php echo get_template_directory_uri();?>/css/jquery.bxslider.css" rel="stylesheet" />

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?>>

	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.8&appId=490227714445389";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

		<!-- wrapper -->
		 

			 <div class="header">

			 		<div class="logo">
				 		<a href="<?php echo site_url(); ?>/home">
				 			<img src="<?php echo get_template_directory_uri();?>/img/logo1.png">
				 		</a>
			 		</div> 


			 		<!-- MENU NORMAL -->
			 		<div class="menu">
			 			<div class="item">
			 				<a href="<?php echo site_url(); ?>/contacto">CONTACTO
			 					<div class="linemenu_other"></div>
			 				</a>

			 			</div>
			 			


			 		   


			 			


			 			
			 			



			 			<div class="item">
			 				<a href="<?php echo site_url(); ?>/propuestas-categorias/">PROPUESTAS RECIBIDAS
			 					<div class="linemenu_other"></div>
			 				</a>
			 			</div>
			 			

			 			<div class="item">
			 				<a href="<?php echo site_url(); ?>/haz-propuesta/"> ¡HAZ TU PROPUESTA!
			 				<div class="linemenu_other"></div>
			 				</a>
			 			</div>

			 			<div class="item">
			 				<a href="<?php echo site_url(); ?>/mi-compromiso/"> NUESTRO COMPROMISO
			 					<div class="linemenu_other"></div>
			 				</a>
			 				
			 			</div>
			 			

			 			<div class="item">
			 				<a href="<?php echo site_url(); ?>/sobre-mi/"> SOBRE MI
			 					<div class="linemenu_other"></div>
			 				</a>
			 			</div>




			 		</div> 		<!-- MENU NORMAL -->


			 		<div class="menuMovil">
			 		<div id="pronext"></div>
			 		<div id="proprev"></div>

			 		 	<div class="sliderMenuMovil">
							<li><a href="<?php echo site_url(); ?>/sobre-mi/"> SOBRE MI</a></li>
							<li><a href="<?php echo site_url(); ?>/mi-compromiso/"> NUESTRO COMPROMISO</a></li>
							<li><a href="<?php echo site_url(); ?>/haz-propuesta/"> ¡HAZ TU PROPUESTA!</a></li>
							<li><a href="<?php echo site_url(); ?>/propuestas-categorias/"> PROPUESTAS RECIBIDAS</a></li>
							 
							<li><a href="<?php echo site_url(); ?>/contacto"> CONTACTO</a></li>
 							 
 
          					</div>


			 			
			 		</div>



			 	<div style="clear: both"></div>

			 </div><!-- Header -->

			 <div class="sombraHeader">
			 		<img src="<?php echo get_template_directory_uri();?>/img/sombraHeader.png">
			 </div>




