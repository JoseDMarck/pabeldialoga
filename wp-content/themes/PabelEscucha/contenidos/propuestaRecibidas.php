	 



 <div class="propuestasRecibidas">
     


<?php
  $temp = $wp_query; 
  $wp_query = null; 
  $wp_query = new WP_Query(); 
  $wp_query->query('showposts=5&post_type=propuestas'.'&paged='.$paged); 

  while ($wp_query->have_posts()) : $wp_query->the_post(); 
?>

  <!-- LOOP: Usual Post Template Stuff Here-->

<div class=titulo>
				<span class="color"><?php echo $value_nombre = (get_post_meta($post->ID, 'id_nombre', true)); ?> </span> 
			</div>

			 

			<div class="descripcion">
				<a href="<?php the_permalink();?>">
				   <?php echo $propuestasExtracto = propuestasExtracto ($post_id);  ?>
				</a>
			</div>



<?php endwhile; ?>

  <?php
      if (function_exists(custom_pagination)) {
        custom_pagination($custom_query->max_num_pages,"",$paged);
      }
    ?>
 



 </div><!-- Propuestas -->