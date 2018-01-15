<?php /* Template Name: Sobre mi */  ?>

 
	 
	 <div class="main">
	 	
	 	<div class="header">
	 		<?php get_header(); ?>
	 	</div>


 

	 	


	 <div class = "single-seccion">


	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	 
				
				
		<div class="ContenedorSobremi">
			
 		
		<div class="imagenSobremi">
 			<img src="<?php echo get_template_directory_uri();?>/img/sobremi_grafico.jpg">
 		</div>

			
			<div class="bloqueB" style="display: none;">

				 <img src="<?php echo get_template_directory_uri();?>/img/fotoPabel.png">
			
			</div> <!-- bloqueA -->



			<div class="bloqueA" style="display: none;">

				<p style="font-size: 25px; font-family:Bebas">Pabel Muñoz</p>

				<p>Nací hace 41 años en San Blas, un hermoso barrio  del Centro Norte de Quito, distrito por el cual me presento ahora como candidato a la Asamblea Nacional. </p>

				<p>Me licencié en Sociología y Ciencias Políticas por la Pontificia Universidad Católica del Ecuador. Completé mi licenciatura con estudios en Japón, España y Costa Rica e impartí clases en diferentes universidades ecuatorianas, entre ellas en la Pontificia Universidad Católica del Ecuador donde años antes realicé mis estudios de Licenciatura. La preocupación por seguir formándome nunca me abandonó y actualmente curso el Doctorado de Ciencias Sociales de la Universidad de Buenos Aires.</p>

				<p>Ya desde muy joven sentí la inquietud de involucrarme en el desarrollo económico y social del Ecuador, compaginando mi formación académica con la militancia activa en temas políticos y sociales. Contribuí como enlace de discusión a los trabajos de la Asamblea Constituyente de Montecristi, de la que emanó la actual Constitución del Ecuador, uno de los pilares de la mayor época de prosperidad, desarrollo y equidad que ha tenido el país.</p>

				<p>Me cabe la enorme satisfacción de haber contribuido con mi trabajo y dedicación, aunque sea en una pequeña medida, a los logros de esta Década Ganada. En los últimos años asumí diversas responsabilidades de Gobierno, entre ellas la de Secretario Nacional de Planificación y Desarrollo. Desde todas las instancias en las que he tenido el privilegio de trabajar, siempre he mostrado mi preocupación por avanzar hacia la justicia social, profundizando en la igualdad y en las políticas redistributivas que se pueden desarrollar desde el desempeño de la labor pública. Igualmente, me he involucrado en la construcción de un nuevo Estado eficiente en el Ecuador, devolviéndole aquellas facultades que le fueron arrebatadas, y dotándole de los instrumentos para seguir construyendo junto al resto de la ciudadanía el Buen Vivir para todas y todos los ecuatorianos.</p>

				<p>Ahora, me planteo un nuevo reto para seguir impulsando el proceso de cambio que hemos vivido en el Ecuador durante los últimos 10 años. Desde la Asamblea quiero ser tu voz y como asambleísta por el Distrito Centro Norte de Quito defenderé Tu Futuro, como la base de Mi Propuesta.</p>

				<p><b>#TuFuturoEsMiPropuesta</b></p>
			
			</div> <!-- bloqueA -->

		

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


	<div style="clear: both; height: 200px;"></div>

	<?php get_template_part("contenidos/footer_redes"); ?>
	

	<div class="footer">
		<?php get_footer(); ?>
	</div>
	



