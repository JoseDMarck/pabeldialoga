<?php
/*
 *  Author: Somos Nuu, Deuteros D. Marck | @thorbmx
 *  URL: http://somosnuu.com/ | @html5blank
 *  
 */

/*------------------------------------*\
  External Modules/Files
\*------------------------------------*/


/*------------------------------------*\
   TAMAÑOS
\*------------------------------------*/
/* Definir nuevos tamaños de imágenes */  
if ( function_exists( 'add_image_size' ) ) {  
    add_image_size('thumbImagesAudios', 200, 200, true);
}


/*------------------------------------*\
  PAGINACION PERSONALIZADA
\*------------------------------------*/
function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => true,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('<div class="btn_anterior"></div>'),
    'next_text'       => __('<div class="btn_siguiente"></div>'),
    'type'            => 'plain',
    'add_args'        => false,
    'before_page_number' => '<div class="circulo_pagination">',
    'after_page_number'  => '</div>',
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {

      echo "<div class='custom-pagination-contenedor'>"; 
      echo "<nav class='custom-pagination'>"; 
      echo "<div class='Linea_paginacion'></div>";
      echo $paginate_links;
      echo "</nav>";
      echo "</div>";

  }

}


/*------------------------------------*\
  PAGINACION PERSONALIZADA LOOP
\*------------------------------------*/
function custom_pagination_loop($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */

  $big = 999999999;
  $pagination_args = array(
    'base' => str_replace($big, '%#%', get_pagenum_link($big)),
    'format' => '?paged=%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => True,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('<div class="btn_anterior"></div>'),
    'next_text'       => __('<div class="btn_siguiente"></div>'),
    'type'            => 'plain',
    'add_args'        => false,
    'before_page_number' => '<div class="circulo_pagination">',
    'after_page_number'  => '</div>',
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {

      echo "<div class='custom-pagination-contenedor'>"; 
      echo "<nav class='custom-pagination'>"; 
      echo "<div class='Linea_paginacion'></div>";
      echo $paginate_links;
      echo "</nav>";
      echo "</div>";

  }

}


/*------------------------------------*\
  PAGINACION PERSONALIZADA
\*------------------------------------*/
function custom_pagination_lopp2($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo; Anterior'),
    'next_text'       => __('Siguiente &raquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      
      echo $paginate_links;
    echo "</nav>";
  }

}





/*------------------------------------*\
   ADMIN MENU
\*------------------------------------*/


 if ( is_user_logged_in() ) {
//add_filter( 'show_admin_bar', '__return_true' , 1000 );
}



// custom jquery
wp_register_script( 'custom_js', get_template_directory_uri() . '/js/jquery.custom.js', array( 'jquery' ), '1.0', TRUE );
wp_enqueue_script( 'custom_js' );

// validation
wp_register_script( 'validation', get_template_directory_uri() . '/js/jquery.validate.min.js', array( 'jquery' ) );
wp_enqueue_script( 'validation' );



 
 

/*---------------------------------------------------------------------------------------------*\
    7.- GRID VER MAS - MUNDO
\*---------------------------------------------------------------------------------------------*/

function more_post_ajax_grid_mundo(){
$page_grid_mundo = esc_attr( $_POST['page_grid_mundo'] );


header("Content-Type: text/html");


$my_query = new WP_Query();
$my_query = new WP_Query( array('post_type' => 'imagenes', 'paged' => $page_grid_mundo, 'posts_per_page'  => 10,  'category_name' =>'img_mundo','order' => 'ASC' )); 
$count = 0;
while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate = $post->ID;
$count++; 
$value_Numero_post = (get_post_meta(get_the_ID(), 'id_numero_post_Img', true));
?>
    
     <div class="BloqueX  grid-item">
            <img src="<?php the_post_thumbnail_url(); ?>" class="-Mundo mostrar-Slider-Mundo <?php echo $value_Numero_post;?>"/>
    </div>


<?php 
endwhile;
exit;
wp_reset_query();
}
add_action('wp_ajax_more_post_ajax_grid_mundo', 'more_post_ajax_grid_mundo');
add_action( 'wp_ajax_nopriv_more_post_ajax_grid_mundo', 'more_post_ajax_grid_mundo' );



/*---------------------------------------------------------------------------------------------*\
   7.-  SLIDER VER MAS - MUNDO
\*---------------------------------------------------------------------------------------------*/

function more_post_ajax_slider_mundo(){
$page_slider_mundo= esc_attr( $_POST['page_slider_mundo'] );
$offset_slider = esc_attr ($_POST['offset_slider']);
$valor_lenguaje_mundo = esc_attr ($_POST['valor_lenguaje_mundo']);


header("Content-Type: text/html");


 $my_query = new WP_Query();
 $my_query = new WP_Query( array('post_type' => 'imagenes', 'offset'=> $offset_slider, 'paged' => $page_slider_mundo, 'posts_per_page' => 10, 'category_name' =>'img_mundo','order' => 'ASC', 'paged'=> $paged )); 
 $count = 0;
 while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate = $post->ID;
 $count++;  
 $value_Numero_post_slider = (get_post_meta(get_the_ID(), 'id_numero_post_Img', true));
 
 $Descripcion_Es = (get_post_meta(get_the_ID(), 'id_Descripcion_Img_Es', true));
 $Descripcion_En = (get_post_meta(get_the_ID(), 'id_Descripcion_Img_En', true));
 $Descripcion_Fr = (get_post_meta(get_the_ID(), 'id_Descripcion_Img_Fr', true));


 $titulo_mundo_Es = (get_post_meta(get_the_ID(), 'id_Lectura_Img_Es', true));
 $titulo_mundo_En = (get_post_meta(get_the_ID(), 'id_Lectura_Img_En', true));
 $titulo_mundo_Fr = (get_post_meta(get_the_ID(), 'id_Lectura_Img_Fr', true));


?>
 


    <div id="<?php echo $value_Numero_post_slider; ?>-Mundo" class="spanS contador-Mundo <?php echo $value_Numero_post_slider; ?>">

      
  
        <div id="imagenMundo">
          <img src="<?php the_post_thumbnail_url(); ?>" class="<?php echo $value_Extra_Clase = (get_post_meta(get_the_ID(), 'id_Extra_clase_Img', true)); ?>">
        </div> 

          <div id="texto">

        <?php   

        if ($valor_lenguaje_mundo  == 'Esp'){ 
              echo $Descripcion_Es; 
        } 

        if ($valor_lenguaje_mundo == 'Eng'){  
              echo $Descripcion_En; 
        } 

        if ($valor_lenguaje_mundo == 'Fran'){  
              echo $Descripcion_Fr; 
        } 
      
        ?>
          
        </div>
      
      <div style="clear:both"></div>
    </div>

 


<?php 
endwhile;
exit;
wp_reset_query();
}
add_action('wp_ajax_more_post_ajax_slider_mundo', 'more_post_ajax_slider_mundo');
add_action( 'wp_ajax_nopriv_more_post_ajax_slider_mundo', 'more_post_ajax_slider_mundo' );

 



/*---------------------------------------------------------------------------------------------*\
   1.- GRID VER MAS - FAMILIARES
\*---------------------------------------------------------------------------------------------*/

function more_post_ajax_grid_familiares(){
$page_grid_familiares = esc_attr( $_POST['page_grid_familiares'] );


header("Content-Type: text/html");


$my_query = new WP_Query();
$my_query = new WP_Query( array('post_type' => 'imagenes', 'paged' => $page_grid_familiares, 'posts_per_page'  => 10,  'category_name' =>'img_familiares','order' => 'ASC' )); 
$count = 0;
while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate = $post->ID;
$count++; 
$value_Numero_post = (get_post_meta(get_the_ID(), 'id_numero_post_Img', true));
?>
    
     <div class="BloqueX  grid-item video-<?php the_ID();?>">
            <img src="<?php the_post_thumbnail_url(); ?>" class="-Familiares mostrar-Slider-Familiares <?php echo $value_Numero_post;?>"/>
    </div>


<?php 
endwhile;
exit;
wp_reset_query();
}
add_action('wp_ajax_more_post_ajax_grid_familiares', 'more_post_ajax_grid_familiares');
add_action( 'wp_ajax_nopriv_more_post_ajax_grid_familiares', 'more_post_ajax_grid_familiares' );





/*---------------------------------------------------------------------------------------------*\
   1.-  SLIDER VER MAS - FAMILIARES
\*---------------------------------------------------------------------------------------------*/

function more_post_ajax_slider_familiares(){
$page_slider_familiares= esc_attr( $_POST['page_slider_familiares'] );
$offset_slider_familiares = esc_attr ($_POST['offset_slider_familiares']);
header("Content-Type: text/html");


 $my_query = new WP_Query();
 $my_query = new WP_Query( array('post_type' => 'imagenes', 'offset'=> $offset_slider_familiares, 'paged' => $page_slider_familiares, 'posts_per_page' => 10, 'category_name' =>'img_familiares','order' => 'ASC', 'paged'=> $paged )); 
 $count = 0;
 while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate = $post->ID;
 $count++;  
 $value_Numero_post_slider = (get_post_meta(get_the_ID(), 'id_numero_post_Img', true));
 $Descripcion_Es = (get_post_meta(get_the_ID(), 'id_Descripcion_Img_Es', true));
 $Video_1 = (get_post_meta(get_the_ID(), 'id_video_1', true));
 $value_Geolocalizacion = (get_post_meta(get_the_ID(), 'id_geolocalizacion', true));
?>
 




  <div id="<?php echo $value_Numero_post_slider; ?>-Familiares" class="spanS contador-familiares <?php echo $value_Numero_post_slider; ?>">

     <!-- Mostramos el video -->
  <?php  if ($Video_1  != '') { 
    $video_1_url = get_template_directory_uri() . '/videos';
    ?>

    <div class="video_post">

      <div class="iconoPlay video-<?php the_ID();?>">
        <img src="<?php echo get_template_directory_uri();?>/img/Generales/LG_playGrande_2.png">
      </div>

    <video id="video-<?php the_ID();?>-play" >
        <source src="<?php echo get_template_directory_uri();?>/Videos/<?php echo $Video_1; ?>" type="video/mp4">
    </video>

    <div id="Controles" class="controlesX">
          <div class="boton_play_video video-<?php the_ID();?>" style="display: block;">
               <img src="<?php echo get_template_directory_uri();?>/img/Generales/play_voces.png">
          </div> 

           <div class="boton_pause_video" style="display: none;">
                <img src="<?php echo get_template_directory_uri();?>/img/Generales/pause_voces.png">
           </div> 

            <div class="progress_Bar_video">
                <div class="Barra">
                  <div class="hp_slide_videos">
                    <div class="hp_range_videos" style="overflow: hidden;"></div>
                  </div>
                </div>
            </div>

    <div style="clear:both"></div>        
    </div>


     
    </div>


  <?php } else { ?>

        <div id="texto" style="display:none">
          <?php //echo $Descripcion_Es; ?>  

        
         <!-- Boton de Geolocalización -->
          <?php  if ($value_Geolocalizacion  != '') { ?>
     
         <?php } 
        else { ?>    
         <!-- No contiene Geolocalización -->
        <?php } ?>


        </div>
  
        <div id="imagen">
          <img src="<?php the_post_thumbnail_url(); ?>" class="<?php echo $value_Extra_Clase = (get_post_meta(get_the_ID(), 'id_Extra_clase_Img', true)); ?>">
        </div> 
      
      <div style="clear:both"></div>
    
        <?php } ?>

    </div>





<?php 
endwhile;
exit;
wp_reset_query();
}
add_action('wp_ajax_more_post_ajax_slider_familiares', 'more_post_ajax_slider_familiares');
add_action( 'wp_ajax_nopriv_more_post_ajax_slider_familiares', 'more_post_ajax_slider_familiares' );
 


/*---------------------------------------------------------------------------------------------*\
   2.- GRID VER MAS - COMPAÑERO
\*---------------------------------------------------------------------------------------------*/

function more_post_ajax_grid_companero(){
$page_grid_companero  = esc_attr( $_POST['page_grid_companero'] );
header("Content-Type: text/html");


$my_query = new WP_Query();
$my_query = new WP_Query( array('post_type' => 'imagenes', 'paged' => $page_grid_companero , 'posts_per_page'  => 10,  'category_name' =>'img_companero','order' => 'ASC' )); 
$count = 0;
while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate = $post->ID;
$count++; 
$value_Numero_post = (get_post_meta(get_the_ID(), 'id_numero_post_Img', true));
?>
    
     <div class="BloqueX  grid-item">
            <img src="<?php the_post_thumbnail_url(); ?>" class="-Companero mostrar-Slider-Companero <?php echo $value_Numero_post;?>"/>
    </div>


<?php 
endwhile;
exit;
wp_reset_query();
}
add_action('wp_ajax_more_post_ajax_grid_companero', 'more_post_ajax_grid_companero');
add_action( 'wp_ajax_nopriv_more_post_ajax_grid_companero', 'more_post_ajax_grid_companero' );





/*---------------------------------------------------------------------------------------------*\
   2.-  SLIDER VER MAS - COMPAÑERO
\*---------------------------------------------------------------------------------------------*/

function more_post_ajax_slider_companero(){
$page_slider_companero= esc_attr( $_POST['page_slider_companero'] );
$offset_slider_companero = esc_attr ($_POST['offset_slider_companero']);
header("Content-Type: text/html");


 $my_query = new WP_Query();
 $my_query = new WP_Query( array('post_type' => 'imagenes', 'offset'=> $offset_slider_companero, 'paged' => $page_slider_companero, 'posts_per_page' => 10, 'category_name' =>'img_companero','order' => 'ASC', 'paged'=> $paged )); 
 $count = 0;
 while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate = $post->ID;
 $count++;  
 $Video_1 = (get_post_meta(get_the_ID(), 'id_video_1', true));
 $value_Numero_post_slider = (get_post_meta(get_the_ID(), 'id_numero_post_Img', true));
 $Descripcion_Es = (get_post_meta(get_the_ID(), 'id_Descripcion_Img_Es', true));
?>
 


    <div id="<?php echo $value_Numero_post_slider; ?>-Companero" class="spanS contador-familiares <?php echo $value_Numero_post_slider; ?>">

      <!-- Mostramos el video -->
  <?php  if ($Video_1  != '') { 
    $video_1_url = get_template_directory_uri() . '/videos';
    ?>

    <div class="video_post">

      <div class="iconoPlay video-<?php the_ID();?>">
        <img src="<?php echo get_template_directory_uri();?>/img/Generales/LG_playGrande_2.png">
      </div>

    <video id="video-<?php the_ID();?>-play" >
        <source src="<?php echo get_template_directory_uri();?>/Videos/<?php echo $Video_1; ?>" type="video/mp4">
    </video>

    <div id="Controles" class="controlesX">
          <div class="boton_play_video video-<?php the_ID();?>" style="display: block;">
               <img src="<?php echo get_template_directory_uri();?>/img/Generales/play_voces.png">
          </div> 

           <div class="boton_pause_video" style="display: none;">
                <img src="<?php echo get_template_directory_uri();?>/img/Generales/pause_voces.png">
           </div> 

            <div class="progress_Bar_video">
                <div class="Barra">
                  <div class="hp_slide_videos">
                    <div class="hp_range_videos" style="overflow: hidden;"></div>
                  </div>
                </div>
            </div>

    <div style="clear:both"></div>        
    </div>


     
    </div>


  <?php } else { ?>


        <div id="texto" style="display:none">
          <?php //echo $Descripcion_Es; ?>  
        </div>
  
        <div id="imagen">
          <img src="<?php the_post_thumbnail_url(); ?>" class="<?php echo $value_Extra_Clase = (get_post_meta(get_the_ID(), 'id_Extra_clase_Img', true)); ?>">
        </div> 
      
      <div style="clear:both"></div>
    

        <?php } ?>



    </div>


<?php 
endwhile;
exit;
wp_reset_query();
}
add_action('wp_ajax_more_post_ajax_slider_companero', 'more_post_ajax_slider_companero');
add_action( 'wp_ajax_nopriv_more_post_ajax_slider_companero', 'more_post_ajax_slider_companero' );




/*---------------------------------------------------------------------------------------------*\
   3.- MOSTRAR DISCURSOS 
\*---------------------------------------------------------------------------------------------*/

function more_post_ajax_slider_discurso(){
header("Content-Type: text/html");

$page_slider_discurso = esc_attr( $_POST['page_slider_discurso'] );
$offset_slider_discurso = esc_attr ($_POST['offset_slider_discurso']);
$valor_lenguaje = esc_attr ($_POST['valor_lenguaje']);

$my_query = new WP_Query();
$my_query = new WP_Query( array('post_type' => 'imagenes', 'offset'=> $offset_slider_discurso, 'paged' => $page_slider_discurso,  'posts_per_page'  => 6,  'category_name' =>'Discursos','order' => 'ASC' )); 
$count = 0;
while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate = $post->ID;
$count++; 
$value_Numero_post = (get_post_meta(get_the_ID(), 'id_numero_post_Img', true));
$Descripcion_Es = (get_post_meta(get_the_ID(), 'id_Descripcion_Img_Es', true));
$Descripcion_En = (get_post_meta(get_the_ID(), 'id_Descripcion_Img_En', true));
$Descripcion_Fr = (get_post_meta(get_the_ID(), 'id_Descripcion_Img_Fr', true));


$Lectura_Es = (get_post_meta(get_the_ID(), 'id_Lectura_Img_Es', true));
$Lectura_En = (get_post_meta(get_the_ID(), 'id_Lectura_Img_En', true));
$Lectura_Fr = (get_post_meta(get_the_ID(), 'id_Lectura_Img_Fr', true));


$value_video_1     = (get_post_meta(get_the_ID(), 'id_video_1', true));
$value_audio  = (get_post_meta(get_the_ID(), 'id_audio', true));
$value_extra_clase_disc  = (get_post_meta(get_the_ID(), 'id_extra_clase_disc', true));
?>
    
    

      <div class="BloqueMultimedia">
      <div class="Titulo">
         <?php  
        if ($valor_lenguaje == 'Esp'){  
              echo $Descripcion_Es; 
        } 

        if ($valor_lenguaje == 'Eng'){  
              echo $Descripcion_En; 
        } 

        if ($valor_lenguaje == 'Fran'){  
              echo $Descripcion_Fr; 
        } 
      
        ?>
        

      </div>

    
       <!-- SECCIÓN ICONO LEER -->
      <div class="iconoLeer <?php the_ID(); ?> iconoleer_Discursos DiscursosIcono-<?php the_ID(); ?>" style="display: block;">
       </div> 
    
       <div class="wrapperLeer mostrarLeerDiscursos-<?php the_ID(); ?>">

         <div class="Contenedor_lectura">
            <div id="nav-close" class="close-Lectura">
                 <div id="btn-cerrar" class="close-leer-btn">
                    <img src="<?php echo get_template_directory_uri();?>/img/Generales/close_off.png" style="cursor:pointer">
                 </div>
             </div>
             <!-- Nav-Close -->


            <div  class="texto_leer TextoGrabarLectura">

               <?php  
                 if ($valor_lenguaje == 'Esp'){  
                       echo $Lectura_Es;
                 } 

                 if ($valor_lenguaje == 'Eng'){  
                        echo $Lectura_En; 
                 } 

                 if ($valor_lenguaje == 'Fran'){  
                       echo $Lectura_Fr; 
                 } 
      
               ?>


             </div>



           </div>
             <!-- Contenedor_lectura -->

        </div>
        <!-- wrapperLeer -->



          <!-- SI EXISTE AUDIO -->       
          <?php  if ($value_audio  != '') { ?>
            <div class="BloqueReproduccion">
               
                <div id="Controles">


                   


          
                  <div class="boton_play_audio_Discursos_reset  img_audio_playX <?php the_ID();?>  <?php  echo $value_extra_clase_disc; ?>" style="display: block;">
                          <img src="<?php echo get_template_directory_uri();?>/img/Generales/play_voces.png" style="cursor:pointer">
                  </div> 



                  <div class="Cont_AudioDiscursos show_audio-<?php the_ID(); ?>" style="display:none;" >
                         
                         <div class="boton_pause_audio_Discursos pause-<?php the_ID(); ?>" style="display: block;">
                              <img src="<?php echo get_template_directory_uri();?>/img/Generales/pause_voces.png" style="cursor:pointer">
                         </div> 

                          <div class="progress_Bar_Discursos">
                              <div class="Barra">
                                <div class="hp_slide_Discursos">
                                  <div class="hp_range_Discursos" style="overflow: hidden;"></div>
                                </div>
                              </div>
                          </div>

                       <div style="clear:both"></div>        
                  </div> <!-- Cont_AudioDiscursos -->

                </div>  <!-- Controles -->

                <audio controls id="audio-<?php the_ID(); ?>" style="display:none">
                   <source src="<?php echo get_template_directory_uri();?>/Discuros_multimedia/Audios/<?php echo $value_audio ?>" type="audio/mpeg">
                </audio>



             </div> <!-- BloqueReproduccion -->
            <?php  }  else { ?>

            <?php } ?>

             <!-- SI EXISTE AUDIO -->       
          <?php  if ($value_video_1  != '') { ?>
            <div class="BloqueReproduccion">
                <div id="Controles">
                  <div class="iconoVideo <?php the_ID(); ?>" style="display: block;">
                       <img src="<?php echo get_template_directory_uri();?>/img/Generales/video_galeria_audio.png" style="cursor:pointer">
                  </div> 




                 <div style="clear:both"></div>        
                </div>
             </div> <!-- BloqueReproduccion -->

      <div class="wrapperVideo mostrarWrapper-<?php the_ID(); ?>">
          


        <div class="video_post_Discursos">
            <div id="nav-close">
                 <div id="btn-cerrar" class="close-btn">
                    <img src="<?php echo get_template_directory_uri();?>/img/Generales/close_off.png" style="cursor:pointer">
                 </div>
             </div>


             <div class="iconoPlay video-<?php the_ID();?>">
               <img src="<?php echo get_template_directory_uri();?>/img/Generales/LG_playGrande_2.png" style="cursor:pointer">
             </div>

             <video id="video-<?php the_ID();?>-play" >
                 <source src="<?php echo get_template_directory_uri();?>/Discuros_multimedia/Videos/<?php echo $value_video_1 ; ?>" type="video/mp4">
             </video>

               <div id="Controles" class="controlesX">
                     <div class="boton_play_video video-<?php the_ID();?>" style="display: block;">
                          <img src="<?php echo get_template_directory_uri();?>/img/Generales/play_voces.png" style="cursor:pointer">
                     </div> 
      
                        <div class="boton_pause_video" style="display: none;">
                           <img src="<?php echo get_template_directory_uri();?>/img/Generales/pause_voces.png" style="cursor:pointer">
                      </div> 
      
                         <div class="progress_Bar_video">
                           <div class="Barra">
                             <div class="hp_slide_videos">
                               <div class="hp_range_videos" style="overflow: hidden;"></div>
                             </div>
                           </div>
                       </div>
      
                 <div style="clear:both"></div>        
               </div>
            </div>






             </div>


            <?php  }  else { ?>

            <?php } ?>
      



  </div>


<?php 
endwhile;
exit;
wp_reset_query();
}
add_action('wp_ajax_more_post_ajax_slider_discurso', 'more_post_ajax_slider_discurso');
add_action( 'wp_ajax_nopriv_more_post_ajax_slider_discurso', 'more_post_ajax_slider_discurso' );







/*---------------------------------------------------------------------------------------------*\
   4.- GRID VER MAS - GOLPE
\*---------------------------------------------------------------------------------------------*/

function more_post_ajax_grid_golpe(){
$page_grid_golpe = esc_attr( $_POST['page_grid_golpe'] );
header("Content-Type: text/html");


$my_query = new WP_Query();
$my_query = new WP_Query( array('post_type' => 'imagenes', 'paged' => $page_grid_golpe, 'posts_per_page'  => 10,  'category_name' =>'img_golpe','order' => 'ASC' )); 
$count = 0;
while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate = $post->ID;
$count++; 
$value_Numero_post = (get_post_meta(get_the_ID(), 'id_numero_post_Img', true));
?>
    
     <div class="BloqueX  grid-item">
            <img src="<?php the_post_thumbnail_url(); ?>" class="-Golpe mostrar-Slider-Golpe <?php echo $value_Numero_post;?>"/>
    </div>


<?php 
endwhile;
exit;
wp_reset_query();
}
add_action('wp_ajax_more_post_ajax_grid_golpe', 'more_post_ajax_grid_golpe');
add_action( 'wp_ajax_nopriv_more_post_ajax_grid_golpe', 'more_post_ajax_grid_golpe' );




/*---------------------------------------------------------------------------------------------*\
   4.-  SLIDER VER MAS - GOLPE
\*---------------------------------------------------------------------------------------------*/

function more_post_ajax_slider_golpe(){
$page_slider_golpe= esc_attr( $_POST['page_slider_golpe'] );
$offset_slider_golpe = esc_attr ($_POST['offset_slider_golpe']);
header("Content-Type: text/html");


 $my_query = new WP_Query();
 $my_query = new WP_Query( array('post_type' => 'imagenes', 'offset'=> $offset_slider_golpe, 'paged' => $page_slider_golpe, 'posts_per_page' => 10, 'category_name' =>'img_golpe','order' => 'ASC', 'paged'=> $paged )); 
 $count = 0;
 while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate = $post->ID;
 $count++;  
 $value_Numero_post_slider = (get_post_meta(get_the_ID(), 'id_numero_post_Img', true));
 $Descripcion_Es = (get_post_meta(get_the_ID(), 'id_Descripcion_Img_Es', true));
?>
 


    <div id="<?php echo $value_Numero_post_slider; ?>-Golpe" class="spanS contador-golpe <?php echo $value_Numero_post_slider; ?>">

        <div id="texto" style="display:none">
          <?php //echo $Descripcion_Es; ?>  
        </div>
  
        <div id="imagen">
          <img src="<?php the_post_thumbnail_url(); ?>" class="<?php echo $value_Extra_Clase = (get_post_meta(get_the_ID(), 'id_Extra_clase_Img', true)); ?>">
        </div> 
      
      <div style="clear:both"></div>
    </div>


<?php 
endwhile;
exit;
wp_reset_query();
}
add_action('wp_ajax_more_post_ajax_slider_golpe', 'more_post_ajax_slider_golpe');
add_action( 'wp_ajax_nopriv_more_post_ajax_slider_golpe', 'more_post_ajax_slider_golpe' );







/*---------------------------------------------------------------------------------------------*\
   5.- GRID VER MAS - ARPILLERAS
\*---------------------------------------------------------------------------------------------*/

function more_post_ajax_grid_arpilleras(){
$page_grid_arpilleras = esc_attr( $_POST['page_grid_arpilleras'] );
header("Content-Type: text/html");


$my_query = new WP_Query();
$my_query = new WP_Query( array('post_type' => 'imagenes', 'paged' => $page_grid_arpilleras, 'posts_per_page'  => 10,  'category_name' =>'img_arpilleras','order' => 'ASC' )); 
$count = 0;
while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate = $post->ID;
$count++; 
$value_Numero_post = (get_post_meta(get_the_ID(), 'id_numero_post_Img', true));
?>
    
     <div class="BloqueX  grid-item">
            <img src="<?php the_post_thumbnail_url(); ?>" class="-Arpilleras mostrar-Slider-Arpilleras <?php echo $value_Numero_post;?>"/>
    </div>


<?php 
endwhile;
exit;
wp_reset_query();
}
add_action('wp_ajax_more_post_ajax_grid_arpilleras', 'more_post_ajax_grid_arpilleras');
add_action( 'wp_ajax_nopriv_more_post_ajax_grid_arpilleras', 'more_post_ajax_grid_arpilleras' );



/*---------------------------------------------------------------------------------------------*\
   5.-  SLIDER VER MAS - ARPILLERAS
\*---------------------------------------------------------------------------------------------*/

function more_post_ajax_slider_arpilleras(){
$page_slider_arpilleras= esc_attr( $_POST['page_slider_arpilleras'] );
$offset_slider_arpilleras = esc_attr ($_POST['offset_slider_arpilleras']);
header("Content-Type: text/html");


 $my_query = new WP_Query();
 $my_query = new WP_Query( array('post_type' => 'imagenes', 'offset'=> $offset_slider_arpilleras, 'paged' => $page_slider_arpilleras, 'posts_per_page' => 10, 'category_name' =>'img_arpilleras','order' => 'ASC', 'paged'=> $paged )); 
 $count = 0;
 while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate = $post->ID;
 $count++;  
 $value_Numero_post_slider = (get_post_meta(get_the_ID(), 'id_numero_post_Img', true));
 $Descripcion_Es = (get_post_meta(get_the_ID(), 'id_Descripcion_Img_Es', true));
?>
 


    <div id="<?php echo $value_Numero_post_slider; ?>-Arpilleras" class="spanS contador-arpilleras <?php echo $value_Numero_post_slider; ?>">

        <div id="texto" style="display:none">
          <?php //echo $Descripcion_Es; ?>  
        </div>
  
        <div id="imagen" >
          <img src="<?php the_post_thumbnail_url(); ?>" class="<?php echo $value_Extra_Clase = (get_post_meta(get_the_ID(), 'id_Extra_clase_Img', true)); ?>">
        </div> 
      
      <div style="clear:both"></div>
    </div>


<?php 
endwhile;
exit;
wp_reset_query();
}
add_action('wp_ajax_more_post_ajax_slider_arpilleras', 'more_post_ajax_slider_arpilleras');
add_action( 'wp_ajax_nopriv_more_post_ajax_slider_arpilleras', 'more_post_ajax_slider_arpilleras' );






/*---------------------------------------------------------------------------------------------*\
   6.- GRID VER MAS - CARTELES
\*---------------------------------------------------------------------------------------------*/

function more_post_ajax_grid_carteles(){
$page_grid_carteles = esc_attr( $_POST['page_grid_carteles'] );
header("Content-Type: text/html");


$my_query = new WP_Query();
$my_query = new WP_Query( array('post_type' => 'imagenes', 'paged' => $page_grid_carteles, 'posts_per_page'  => 10,  'category_name' =>'img_carteles','order' => 'ASC' )); 
$count = 0;
while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate = $post->ID;
$count++; 
$value_Numero_post = (get_post_meta(get_the_ID(), 'id_numero_post_Img', true));
?>
    
     <div class="BloqueX  grid-item">
            <img src="<?php the_post_thumbnail_url(); ?>" class="-Carteles mostrar-Slider-Carteles <?php echo $value_Numero_post;?>"/>
    </div>


<?php 
endwhile;
exit;
wp_reset_query();
}
add_action('wp_ajax_more_post_ajax_grid_carteles', 'more_post_ajax_grid_carteles');
add_action( 'wp_ajax_nopriv_more_post_ajax_grid_carteles', 'more_post_ajax_grid_carteles' );



/*---------------------------------------------------------------------------------------------*\
   6.-  SLIDER VER MAS - CARTELES
\*---------------------------------------------------------------------------------------------*/

function more_post_ajax_slider_carteles(){
$page_slider_carteles= esc_attr( $_POST['page_slider_carteles'] );
$offset_slider_carteles = esc_attr ($_POST['offset_slider_carteles']);
header("Content-Type: text/html");


 $my_query = new WP_Query();
 $my_query = new WP_Query( array('post_type' => 'imagenes', 'offset'=> $offset_slider_carteles, 'paged' => $page_slider_carteles, 'posts_per_page' => 10, 'category_name' =>'img_carteles','order' => 'ASC', 'paged'=> $paged )); 
 $count = 0;
 while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate = $post->ID;
 $count++;  
 $value_Numero_post_slider = (get_post_meta(get_the_ID(), 'id_numero_post_Img', true));
 $Descripcion_Es = (get_post_meta(get_the_ID(), 'id_Descripcion_Img_Es', true));
?>
 


    <div id="<?php echo $value_Numero_post_slider; ?>-Carteles" class="spanS contador-carteles <?php echo $value_Numero_post_slider; ?>">

        <div id="texto" style="display:none">
          <?php //echo $Descripcion_Es; ?>  
        </div>
  
        <div id="imagen">
          <img src="<?php the_post_thumbnail_url(); ?>" class="<?php echo $value_Extra_Clase = (get_post_meta(get_the_ID(), 'id_Extra_clase_Img', true)); ?>">
        </div> 
      
      <div style="clear:both"></div>
    </div>


<?php 
endwhile;
exit;
wp_reset_query();
}
add_action('wp_ajax_more_post_ajax_slider_carteles', 'more_post_ajax_slider_carteles');
add_action( 'wp_ajax_nopriv_more_post_ajax_slider_carteles', 'more_post_ajax_slider_carteles' );




/*---------------------------------------------------------------------------------------------*\
   8.- GRID VER MAS - MAUSOLEO
\*---------------------------------------------------------------------------------------------*/

function more_post_ajax_grid_mauseoleo(){

$page_grid_mausoleo = esc_attr( $_POST['page_grid_mausoleo'] );

header("Content-Type: text/html");


$my_query = new WP_Query();
$my_query = new WP_Query( array('post_type' => 'imagenes',  'paged' => $page_grid_mausoleo, 'posts_per_page'  => 10,  'category_name' =>'img_mausoleo','order' => 'ASC' )); 
$count = 0;
while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate = $post->ID;
$count++; 
$value_Numero_post = (get_post_meta(get_the_ID(), 'id_numero_post_Img', true));
?>
    
     <div class="BloqueX  grid-item">
            <img src="<?php the_post_thumbnail_url(); ?>" class="-Mausoleo mostrar-Slider-Mausoleo <?php echo $value_Numero_post;?>"/>
    </div>


<?php 
endwhile;
exit;
wp_reset_query();
}
add_action('wp_ajax_more_post_ajax_grid_mauseoleo', 'more_post_ajax_grid_mauseoleo');
add_action( 'wp_ajax_nopriv_more_post_ajax_grid_mauseoleo', 'more_post_ajax_grid_mauseoleo' );




/*---------------------------------------------------------------------------------------------*\
   8.-  SLIDER VER MAS - MAUSOLEO
\*---------------------------------------------------------------------------------------------*/

function more_post_ajax_slider_mausoleo(){
$page_slider_mausoleo= esc_attr( $_POST['page_slider_mausoleo'] );
$offset_slider_mausoleo = esc_attr ($_POST['offset_slider_mausoleo']);
header("Content-Type: text/html");


 $my_query = new WP_Query();
 $my_query = new WP_Query( array('post_type' => 'imagenes', 'offset'=> $offset_slider_mausoleo, 'posts_per_page' => 10, 'paged' => $page_slider_mausoleo, 'category_name' =>'img_mausoleo','order' => 'ASC', 'paged'=> $paged )); 
 $count = 0;
 while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate = $post->ID;
 $count++;  
 $value_Numero_post_slider = (get_post_meta(get_the_ID(), 'id_numero_post_Img', true));
 $Descripcion_Es = (get_post_meta(get_the_ID(), 'id_Descripcion_Img_Es', true));
?>
 


    <div id="<?php echo $value_Numero_post_slider; ?>-Mausoleo" class="spanS contador-mausoleo <?php echo $value_Numero_post_slider; ?>">

        <div id="texto" style="display:none">
          <?php //echo $Descripcion_Es; ?>  
        </div>
  
        <div id="imagen">
          <img src="<?php the_post_thumbnail_url(); ?>" class="<?php echo $value_Extra_Clase = (get_post_meta(get_the_ID(), 'id_Extra_clase_Img', true)); ?>">
        </div> 
      
      <div style="clear:both"></div>
    </div>


<?php 
endwhile;
exit;
wp_reset_query();
}
add_action('wp_ajax_more_post_ajax_slider_mausoleo', 'more_post_ajax_slider_mausoleo');
add_action( 'wp_ajax_nopriv_more_post_ajax_slider_mausoleo', 'more_post_ajax_slider_mausoleo' );






/*---------------------------------------------------------------------------------------------*\
   9.- MOSTRAR CONMMEMORACIONES
\*---------------------------------------------------------------------------------------------*/

function more_post_ajax_slider_conmmemoraciones(){
header("Content-Type: text/html");
$page_slider_commemoraciones= esc_attr( $_POST['page_slider_commemoraciones'] );
$offset_slider_commemoraciones = esc_attr ($_POST['offset_slider_commemoraciones']);
$valor_lenguaje_com = esc_attr ($_POST['valor_lenguaje_com']);

$my_query = new WP_Query();
$my_query = new WP_Query( array('post_type' => 'imagenes',  'offset'=> $offset_slider_commemoraciones, 'paged' => $page_slider_commemoraciones, 'posts_per_page'  => 3,  'category_name' =>'img_commemoraciones','order' => 'ASC' )); 
$count = 0;
while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate = $post->ID;
$count++; 
$value_Numero_post = (get_post_meta(get_the_ID(), 'id_numero_post_Img', true));
$Descripcion_Es = (get_post_meta(get_the_ID(), 'id_Descripcion_Img_Es', true));
$Descripcion_En = (get_post_meta(get_the_ID(), 'id_Descripcion_Img_En', true));
$Descripcion_Fr = (get_post_meta(get_the_ID(), 'id_Descripcion_Img_Fr', true));


$Lectura_Es = (get_post_meta(get_the_ID(), 'id_Lectura_Img_Es', true));
$Lectura_En = (get_post_meta(get_the_ID(), 'id_Lectura_Img_En', true));
$Lectura_Fr = (get_post_meta(get_the_ID(), 'id_Lectura_Img_Fr', true));


$value_video_1     = (get_post_meta(get_the_ID(), 'id_video_1', true));
$value_audio  = (get_post_meta(get_the_ID(), 'id_audio', true));
?>
    
    

      <div class="BloqueMultimedia">



        



      <div class="Titulo">
         <?php  
        if ($valor_lenguaje_com == 'Esp'){  
              echo $Descripcion_Es; 
        } 

        if ($valor_lenguaje_com == 'Eng'){  
              echo $Descripcion_En; 
        } 

        if ($valor_lenguaje_com == 'Fran'){  
              echo $Descripcion_Fr; 
        } 
      
        ?>
      </div>

      <!-- SECCIÓN ICONO LEER -->
      <div class="iconoLeer <?php the_ID(); ?> iconoLeer" style="display: block;">
       </div> 
    
       <div class="wrapperLeer mostrarLeer-<?php the_ID(); ?>">

         <div class="Contenedor_lectura">
            <div id="nav-close" class="close-Lectura">
                 <div id="btn-cerrar" class="close-leer-btn">
                    <img src="<?php echo get_template_directory_uri();?>/img/Generales/close_off.png" style="cursor:pointer">
                 </div>
             </div>
             <!-- Nav-Close -->


            <div  class="texto_leer TextoGrabarLectura">
               <?php  
                if ($valor_lenguaje_com == 'Esp'){  
                    echo $Lectura_Es;
                } 

                if ($valor_lenguaje_com == 'Eng'){  
                      echo $Lectura_En; 
                } 

                if ($valor_lenguaje_com == 'Fran'){  
                      echo $Lectura_Fr; 
                } 
      
                ?>
             </div>



           </div>
             <!-- Contenedor_lectura -->

        </div>
        <!-- wrapperLeer -->



      
             <!-- SI EXISTE AUDIO -->       
          <?php  if ($value_video_1  != '') { ?>
            <div class="BloqueReproduccion">
                <div id="Controles">
                  <div class="iconoVideo <?php the_ID(); ?>" style="display: block;">
                       <img src="<?php echo get_template_directory_uri();?>/img/Generales/video_galeria_audio.png" style="cursor:pointer">
                  </div> 

                 <div style="clear:both"></div>        
                </div>
             </div> <!-- BloqueReproduccion -->

      <div class="wrapperVideo mostrarWrapper-<?php the_ID(); ?>">
          


        <div class="video_post_Discursos">
            <div id="nav-close">
                 <div id="btn-cerrar" class="close-btn">
                    <img src="<?php echo get_template_directory_uri();?>/img/Generales/close_off.png" style="cursor:pointer">
                 </div>
             </div>


             <div class="iconoPlay video-<?php the_ID();?>">
               <img src="<?php echo get_template_directory_uri();?>/img/Generales/LG_playGrande_2.png" style="cursor:pointer">
             </div>

             <video id="video-<?php the_ID();?>-play" class="videoPlayerX">
                 <source src="<?php echo get_template_directory_uri();?>/Videos/Conmemoraciones/<?php echo $value_video_1 ; ?>" type="video/mp4">
             </video>

               <div id="Controles" class="controlesX">
                     <div class="boton_play_video video-<?php the_ID();?>" style="display: block;">
                          <img src="<?php echo get_template_directory_uri();?>/img/Generales/play_voces.png" style="cursor:pointer"> 
                     </div> 
      
                        <div class="boton_pause_video" style="display: none;">
                           <img src="<?php echo get_template_directory_uri();?>/img/Generales/pause_voces.png" style="cursor:pointer">
                      </div> 
      
                         <div class="progress_Bar_video">
                           <div class="Barra">
                             <div class="hp_slide_videos">
                               <div class="hp_range_videos" style="overflow: hidden;"></div>
                             </div>
                           </div>
                       </div>
      
                 <div style="clear:both"></div>        
               </div>
            </div>






             </div>


            <?php  }  else { ?>

            <?php } ?>
      



  </div>


<?php 
endwhile;
exit;
wp_reset_query();
}
add_action('wp_ajax_more_post_ajax_slider_conmmemoraciones', 'more_post_ajax_slider_conmmemoraciones');
add_action( 'wp_ajax_nopriv_more_post_ajax_slider_conmmemoraciones', 'more_post_ajax_slider_conmmemoraciones' );



 



/*------------------------------------*\
  Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
  'default-color' => 'FFF',
  'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
  'default-image'     => get_template_directory_uri() . '/img/headers/default.jpg',
  'header-text'     => false,
  'default-text-color'    => '000',
  'width'       => 1000,
  'height'      => 198,
  'random-default'    => false,
  'wp-head-callback'    => $wphead_cb,
  'admin-head-callback'   => $adminhead_cb,
  'admin-preview-callback'  => $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
  Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
  wp_nav_menu(
  array(
    'theme_location'  => 'header-menu',
    'menu'            => '',
    'container'       => 'div',
    'container_class' => 'menu-{menu slug}-container',
    'container_id'    => '',
    'menu_class'      => 'menu',
    'menu_id'         => '',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'items_wrap'      => '<ul>%3$s</ul>',
    'depth'           => 0,
    'walker'          => ''
    )
  );
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

      wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

        wp_register_script('html5blankscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('html5blankscripts'); // Enqueue it!
    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
    if (is_page('pagenamehere')) {
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
        wp_enqueue_script('scriptname'); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function html5blank_styles()
{
    wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!

    wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
  $GLOBALS['comment'] = $comment;
  extract($args, EXTR_SKIP);

  if ( 'div' == $args['style'] ) {
    $tag = 'div';
    $add_below = 'comment';
  } else {
    $tag = 'li';
    $add_below = 'div-comment';
  }
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
  <?php if ( 'div' != $args['style'] ) : ?>
  <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
  <?php endif; ?>
  <div class="comment-author vcard">
  <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
  <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
  </div>
<?php if ($comment->comment_approved == '0') : ?>
  <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
  <br />
<?php endif; ?>

  <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
    <?php
      printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
    ?>
  </div>

  <?php comment_text() ?>

  <div class="reply">
  <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
  </div>
  <?php if ( 'div' != $args['style'] ) : ?>
  </div>
  <?php endif; ?>
<?php }

/*------------------------------------*\
  Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
  Custom Post Types
\*------------------------------------*/

 

// Create 1 Custom Post type for a Demo, called HTML5-Blank
function create_post_type_html5()
{
    
}

/*------------------------------------*\
   CUSTOM POST TYPE SECCIONES
\*------------------------------------*/
function custom_post_type_Secciones() {
$labels = array(
  'name'               => _x( 'Secciones', 'Post Type General Name', 'text_domain' ),
  'singular_name'      => _x( 'Sección', 'Post Type Singular Name', 'text_domain' ),
  'menu_name'          => __( 'Secciones', 'text_domain' ),
  'parent_item_colon'  => __( 'Secciones padre', 'text_domain' ),
  'all_items'          => __( 'Secciones', 'text_domain' ),
  'view_item'          => __( 'Ver Sección', 'text_domain' ),
  'add_new_item'       => __( 'Añadir Seccion Nueva', 'text_domain' ),
  'add_new'            => __( 'Añadir', 'text_domain' ),
  'edit_item'          => __( 'Editar Sección', 'text_domain' ),
  'update_item'        => __( 'Actualizar', 'text_domain' ),
  'search_items'       => __( 'Buscar Secciones', 'text_domain' ),
  'not_found'          => __( 'Sección no encontrados', 'text_domain' ),
  'not_found_in_trash' => __( 'Sección no encontrados en Papelera', 'text_domain' ),
  );

$rewrite = array(
  'slug'                => 'Secciones',
  'with_front'          => true,
  'pages'               => true,
  'feeds'               => true,
  );

$args = array(
  'label'               => __( 'Secciones', 'text_domain' ),
  'description'         => __( 'Información de Sección', 'text_domain' ),
  'labels'              => $labels,
  'supports'            => array( 'title', 'editor', 'thumbnail'),
  'taxonomies'          => array( 'category', 'post_tag' ),
  'hierarchical'        => false,
  'public'              => true,
  'show_ui'             => true,
  'show_in_menu'        => true,
  'show_in_nav_menus'   => true,
  'show_in_admin_bar'   => true,
  'menu_position'       => 4,
  'menu_icon'           => 'dashicons-list-view',/*site_url().'/wp-content/plugins/my_plugin/images/logo.png',*/
  'can_export'          => true,
  'has_archive'         => 'Secciones',
  'exclude_from_search' => false,
  'query_var'           => 'Secciones',
  'rewrite'             => $rewrite,
  'capability_type'     => 'post',
  );

register_post_type('Secciones', $args);
}

add_action('init', 'custom_post_type_Secciones', 0);



/*------------------------------------*\
   METABOX 
\*------------------------------------*/
include 'options/secciones/idiomas.php';





/*------------------------------------*\
   CUSTOM POST TYPE NUESTROS Galerias 
\*------------------------------------*/
function custom_post_type_Gallerias() {
$labels = array(
  'name'               => _x( 'Gallerias', 'Post Type General Name', 'text_domain' ),
  'singular_name'      => _x( 'Galleria', 'Post Type Singular Name', 'text_domain' ),
  'menu_name'          => __( 'Gallerías', 'text_domain' ),
  'parent_item_colon'  => __( 'Gallerias padre', 'text_domain' ),
  'all_items'          => __( 'Gallerias', 'text_domain' ),
  'view_item'          => __( 'Ver Galleria', 'text_domain' ),
  'add_new_item'       => __( 'Añadir Galleria Nueva', 'text_domain' ),
  'add_new'            => __( 'Añadir', 'text_domain' ),
  'edit_item'          => __( 'Editar Galleria', 'text_domain' ),
  'update_item'        => __( 'Actualizar', 'text_domain' ),
  'search_items'       => __( 'Buscar Gallerias', 'text_domain' ),
  'not_found'          => __( 'Gallerias no encontrados', 'text_domain' ),
  'not_found_in_trash' => __( 'Gallerias no encontrados en Papelera', 'text_domain' ),
  );

$rewrite = array(
  'slug'                => 'Gallerias',
  'with_front'          => true,
  'pages'               => true,
  'feeds'               => true,
  );

$args = array(
  'label'               => __( 'Gallerias', 'text_domain' ),
  'description'         => __( 'Información de Sección', 'text_domain' ),
  'labels'              => $labels,
  'supports'            => array( 'title', 'editor', 'thumbnail'),
  'taxonomies'          => array( 'category', 'post_tag' ),
  'hierarchical'        => false,
  'public'              => true,
  'show_ui'             => true,
  'show_in_menu'        => true,
  'show_in_nav_menus'   => true,
  'show_in_admin_bar'   => true,
  'menu_position'       => 4,
  'menu_icon'           => 'dashicons-format-gallery',/*site_url().'/wp-content/plugins/my_plugin/images/logo.png',*/
  'can_export'          => true,
  'has_archive'         => 'Gallerias',
  'exclude_from_search' => false,
  'query_var'           => 'Gallerias',
  'rewrite'             => $rewrite,
  'capability_type'     => 'post',
  );

register_post_type('Gallerias', $args);
}

add_action('init', 'custom_post_type_Gallerias', 0);


/*------------------------------------*\
   METABOX 
\*------------------------------------*/
include 'options/Galerias/idiomas.php';




/*------------------------------------*\
   CUSTOM POST TYPE NUESTROS Imagenes  
\*------------------------------------*/
function custom_post_type_Imagenes() {
$labels = array(
  'name'               => _x( 'Imagenes', 'Post Type General Name', 'text_domain' ),
  'singular_name'      => _x( 'Imagen', 'Post Type Singular Name', 'text_domain' ),
  'menu_name'          => __( 'Imagenes', 'text_domain' ),
  'parent_item_colon'  => __( 'Imagenes padre', 'text_domain' ),
  'all_items'          => __( 'Imagenes', 'text_domain' ),
  'view_item'          => __( 'Ver Imagenen', 'text_domain' ),
  'add_new_item'       => __( 'Añadir Imagenen Nueva', 'text_domain' ),
  'add_new'            => __( 'Añadir', 'text_domain' ),
  'edit_item'          => __( 'Editar Imagenen', 'text_domain' ),
  'update_item'        => __( 'Actualizar', 'text_domain' ),
  'search_items'       => __( 'Buscar Imagenes', 'text_domain' ),
  'not_found'          => __( 'Imagenes no encontrados', 'text_domain' ),
  'not_found_in_trash' => __( 'Imagenes no encontrados en Papelera', 'text_domain' ),
  );

$rewrite = array(
  'slug'                => 'Imagenes',
  'with_front'          => true,
  'pages'               => true,
  'feeds'               => true,
  );

$args = array(
  'label'               => __( 'Imagenes', 'text_domain' ),
  'description'         => __( 'Información de Sección', 'text_domain' ),
  'labels'              => $labels,
  'supports'            => array( 'title', 'editor', 'thumbnail'),
  'taxonomies'          => array( 'category', 'post_tag' ),
  'hierarchical'        => false,
  'public'              => true,
  'show_ui'             => true,
  'show_in_menu'        => true,
  'show_in_nav_menus'   => true,
  'show_in_admin_bar'   => true,
  'menu_position'       => 4,
  'menu_icon'           => 'dashicons-images-alt',/*site_url().'/wp-content/plugins/my_plugin/images/logo.png',*/
  'can_export'          => true,
  'has_archive'         => 'Imagenes',
  'exclude_from_search' => false,
  'query_var'           => 'Imagenes',
  'rewrite'             => $rewrite,
  'capability_type'     => 'post',
  );

register_post_type('Imagenes', $args);
}

add_action('init', 'custom_post_type_Imagenes', 0);

/*------------------------------------*\
   METABOX 
\*------------------------------------*/
include 'options/Imagenes/idiomas.php';




/*------------------------------------*\
   CUSTOM POST TYPE AUDIO-GALERIAS
\*------------------------------------*/
function custom_post_type_Audios() {
$labels = array(
  'name'               => _x( 'Audios', 'Post Type General Name', 'text_domain' ),
  'singular_name'      => _x( 'Audio', 'Post Type Singular Name', 'text_domain' ),
  'menu_name'          => __( 'Audios', 'text_domain' ),
  'parent_item_colon'  => __( 'Audios padre', 'text_domain' ),
  'all_items'          => __( 'Audios', 'text_domain' ),
  'view_item'          => __( 'Ver Audios', 'text_domain' ),
  'add_new_item'       => __( 'Añadir Audio Nuevo', 'text_domain' ),
  'add_new'            => __( 'Añadir', 'text_domain' ),
  'edit_item'          => __( 'Editar Audio', 'text_domain' ),
  'update_item'        => __( 'Actualizar', 'text_domain' ),
  'search_items'       => __( 'Buscar Audio', 'text_domain' ),
  'not_found'          => __( 'Audio no encontrado', 'text_domain' ),
  'not_found_in_trash' => __( 'Audio no encontrado en Papelera', 'text_domain' ),
  );

$rewrite = array(
  'slug'                => 'Audios',
  'with_front'          => true,
  'pages'               => true,
  'feeds'               => true,
  );

$args = array(
  'label'               => __( 'Audios', 'text_domain' ),
  'description'         => __( 'Información de Audio', 'text_domain' ),
  'labels'              => $labels,
  'supports'            => array( 'title', 'editor', 'thumbnail'),
  'taxonomies'          => array( 'category', 'post_tag' ),
  'hierarchical'        => false,
  'public'              => true,
  'show_ui'             => true,
  'show_in_menu'        => true,
  'show_in_nav_menus'   => true,
  'show_in_admin_bar'   => true,
  'menu_position'       => 4,
  'menu_icon'           => 'dashicons-format-audio',/*site_url().'/wp-content/plugins/my_plugin/images/logo.png',*/
  'can_export'          => true,
  'has_archive'         => 'Audios',
  'exclude_from_search' => false,
  'query_var'           => 'Audios',
  'rewrite'             => $rewrite,
  'capability_type'     => 'post',
  );

register_post_type('Audios', $args);
}

add_action('init', 'custom_post_type_Audios', 0);



/*------------------------------------*\
   METABOX 
\*------------------------------------*/
include 'options/AudioGalerias/metaboxes.php';




/*------------------------------------*\
  ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}

?>
