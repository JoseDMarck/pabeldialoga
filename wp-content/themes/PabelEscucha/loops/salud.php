
<?php 

 

 

$loop = new WP_Query( array( 'post_type' => 'propuestas', 'category_name' => 'salud',  'paged' => $paged ) );
while ( $loop->have_posts() ) : $loop->the_post(); ?>

 

	 

	
  <!-- LOOP: Usual Post Template Stuff Here-->

<div class=tituloRespuestas>
				<h1><?php echo $value_nombre = (get_post_meta($post->ID, 'id_nombre', true)); ?> </h1> 
			</div>

			 

			<div class="descripcion">

			<div class="likefacebook">

					<!--<img src="<?php //echo get_template_directory_uri();?>/img/facebookLike.png"> -->
					<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="box_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
			</div>

				<a href="<?php the_permalink();?>">
				   <?php echo $propuestasExtracto = propuestasExtracto ($post_id);  ?>
				</a>
			</div>


			<?php 
			$respuesta = get_post_meta($post->ID, 'id_descripcion_respuesta', true);
			if($respuesta  != '') {?>  
				

			<div class="RespuestaTema">


					<div class="contenedor">
					<div class="triangulo_sup"></div>
							<div class="nombre"><?php echo $value_nombre_respuesta = (get_post_meta($post->ID, 'id_nombre_respuesta', true)); ?></div>
							<div class="respuesta">
							<?php echo $value_Desc_respuesta = (get_post_meta($post->ID, 'id_descripcion_respuesta', true)); ?>
							</div>
					</div>

			<div style="clear:both"></div>			
			</div>

			<?php }?>





<?php endwhile; ?>
 


	<div class="footer">
		<?php get_footer(); ?>
	</div>
	