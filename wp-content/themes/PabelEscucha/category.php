
<?php /* Template Name: cat_economia */  ?>


	 <div class="main">

	 	<div class="header">
	 		<?php get_header(); ?>
	 	</div>



		<!-- section -->
		 <div class="propuestasRecibidas">


			<h1><?php _e( 'Propuestas para: ', 'html5blank' ); single_cat_title(); ?></h1>

			<?php get_template_part('loops/economia'); ?>

			<?php get_template_part('pagination'); ?>

		</div>
		<!-- /section -->
	</div>


	

	<div class="footer">
		<?php get_footer(); ?>
	</div>
	