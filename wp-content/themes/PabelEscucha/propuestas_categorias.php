<?php /* Template Name: Propuestas Categorias  */  ?>

 
	 
	 <div class="main">
	 	
	 	<div class="header">
	 		<?php get_header(); ?>
	 	</div>


 

	 	


	 <div class = "single-seccion">


	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	 
				
				
		<div class="ContenedorPropuestasCategorias">
			

		 


			<div class="BloqueA"> 
				<a href="<?php echo site_url();?>/categoria/economia"> 
					<img src="<?php echo get_template_directory_uri(); ?>/img/propuestas/Categoria-1.png"/>
				</a>

				<div class="titulosPropuestasR">ECONOMÍA</div>
			</div> <!-- bloqueA -->
				
			<div class="BloqueB"> 
				<a href="<?php echo site_url();?>/categoria/transparencia/">
					<img src="<?php echo get_template_directory_uri(); ?>/img/propuestas/Categoria-2.png"/>
				</a>
				<div class="titulosPropuestasR">TRANSPARENCIA Y PARTICIPACIÓN CIUDADANA</div>
			</div> <!-- bloqueB -->

			<div class="BloqueC"> 
				<a href="<?php echo site_url();?>/categoria/educacion/">
					<img src="<?php echo get_template_directory_uri(); ?>/img/propuestas/Categoria-3.png"/>
				</a>
				<div class="titulosPropuestasR">EDUCACIÓN</div>

			</div> <!-- bloqueC -->

			<div style="clear: both"></div>

			<div class="BloqueA"> 
				<a href="<?php echo site_url();?>/categoria/juventud/">
					<img src="<?php echo get_template_directory_uri(); ?>/img/propuestas/Categoria-4.png"/>
				</a>

				<div class="titulosPropuestasR">JUVENTUD</div>

			</div> <!-- bloqueA -->

			<div class="BloqueB">
				<a href="<?php echo site_url();?>/categoria/salud/">
					<img src="<?php echo get_template_directory_uri(); ?>/img/propuestas/Categoria-5.png"/>
				</a>
				<div class="titulosPropuestasR">SALUD</div>
			</div> <!-- bloqueB -->

			<div class="BloqueC"> 
				<a href="<?php echo site_url();?>/categoria/cultura-y-deporte/">
					<img src="<?php echo get_template_directory_uri(); ?>/img/propuestas/Categoria-6.png"/>
				</a>
				<div class="titulosPropuestasR">CULTURA Y DEPORTE</div>

			</div> <!-- bloqueC -->


			<div style="clear: both"></div>


			<div class="BloqueA"> 
				<a href="<?php echo site_url();?>/categoria/seguridad/">
					<img src="<?php echo get_template_directory_uri(); ?>/img/propuestas/Categoria-7.png"/>
				</a>
				<div class="titulosPropuestasR">SEGURIDAD</div>

			</div> <!-- bloqueA -->

			<div class="BloqueB">
				<a href="<?php echo site_url();?>/categoria/mujeres/">
					<img src="<?php echo get_template_directory_uri(); ?>/img/propuestas/Categoria-8.png"/>
				</a>
				<div class="titulosPropuestasR">MUJERES</div>

			</div> <!-- bloqueB -->

			<div class="BloqueC"> 
				<a href="<?php echo site_url();?>/categoria/diversidad/">
					<img src="<?php echo get_template_directory_uri(); ?>/img/propuestas/Categoria-9.png"/>
				</a>
				<div class="titulosPropuestasR">DIVERSIDADES</div>

			</div> <!-- bloqueC -->


			<div style="clear: both"></div>
			
			<div class="BloqueA"> 
				
			</div> <!-- bloqueA -->

			<div class="BloqueB">
				<a href="<?php echo site_url();?>/categoria/otro/">
					<img src="<?php echo get_template_directory_uri(); ?>/img/propuestas/Categoria-10.png"/>
				</a>
			</div> <!-- bloqueB -->

			<div class="BloqueC"> 
				 
			</div> <!-- bloqueC -->
	 
	 


		

			<div style="clear:both; width: 100%;height: 20px;"></div>
		</div> <!-- ContenedorSobremi -->



 

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Aún no no hay contenido', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>




 





	</div>
	 	

	





	</div> 

	

		<div style="clear: both; height: 250px;"></div>

	<?php get_template_part("contenidos/footer_redes"); ?>

	<div class="footer">
		<?php get_footer(); ?>
	</div>
	



