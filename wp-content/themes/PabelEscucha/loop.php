
<?php 

 

 

$loop = new WP_Query( array( 'post_type' => 'propuestas', 'category_name' => 'economia', 'ignore_sticky_posts' => 1, 'paged' => $paged ) );
while ( $loop->have_posts() ) : $loop->the_post(); ?>

 

	 

	
  <!-- LOOP: Usual Post Template Stuff Here-->

<div class=titulo>
				<span class="color"><?php echo $value_titulo = (get_post_meta($post->ID, 'id_titulo', true)); ?> </span> 
			</div>

			 

			<div class="descripcion">
				<a href="<?php the_permalink();?>">
				   <?php echo $propuestasExtracto = propuestasExtracto ($post_id);  ?>
				</a>
			</div>




<?php endwhile; ?>
 


	<div class="footer">
		<?php get_footer(); ?>
	</div>
	