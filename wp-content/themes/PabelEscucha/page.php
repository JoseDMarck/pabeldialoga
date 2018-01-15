 
	 
	 <div class="main">
	 	
	 	<div class="header">
	 		<?php get_header(); ?>
	 	</div>


 

	 	


	 <div class = "single-seccion">


	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	 
				
				 <div class="titulo"><?php the_title(); ?></div>

	 
	 			<div class="descripcion"><?php the_content(); ?></div>

 

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
	



