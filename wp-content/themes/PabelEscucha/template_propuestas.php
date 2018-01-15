 
	<?php /* WP Post Template: TemplatePorpuesta */  ?>


	 <div class="main">
	 	
	 	<div class="header">
	 		<?php get_header(); ?>
	 	</div>


 

	 	


	 <div class = "single-seccion-propuestas">

<?php
		
	  if (have_posts()): while (have_posts()) : the_post(); ?>



			<div class="nombrePropuesta">
				<span class="colorPropuesta">Título: </span><?php echo $value_titulo = (get_post_meta($post->ID, 'id_titulo', true)); ?>
			</div>

			<div class="temaPropuesta">
				<span class="colorPropuesta">Tema: </span><?php echo $value_tema = (get_post_meta($post->ID, 'id_tema', true)); ?>
			</div>

			<div class="temaDescripcion">
				<span class="colorPropuesta"> Descripción: </span>
				<br><?php echo $value_descripcion = (get_post_meta($post->ID, 'id_descripcion', true)); ?>
			</div>

			<div class="temaDescripcion">
				<span class="colorPropuesta"> Envíada por: </span> <?php echo $value_nombre = (get_post_meta($post->ID, 'id_nombre', true)); ?>
			</div>
			 
			  
		
 
		
		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>


	</div>
	 	

	





	</div> 

	

	<div class="footer">
		<?php get_footer(); ?>
	</div>
	



