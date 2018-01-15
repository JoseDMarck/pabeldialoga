<?php

 /*------------------------------------*\
     SINGLE FUNCTIONS TO VIDEOCOLUMNISTAS
  \*------------------------------------*/

  /*Guardar URL del video en post videocolumnistas */


  add_action( 'add_meta_boxes', 'single_pst_propuestas' );
  function single_pst_propuestas( $post ) {
  add_meta_box( 
  'em-img-meta', // atributo ID
  '<h2>Datos del Usuario</h2>', // Título
  'datos_single_Propuesta', // Función que muestra el HTML que aparecerá en la pantalla
  'propuestas', // Tipo de entrada. Puede ser 'post', 'page', 'link', o 'custom_post_type'
  'normal', // Parte de la pantalla donde aparecerá. Puede ser 'normal', 'advanced', o 'side'
  'default' // Prioridad u orden en el que aparecerá. Puede ser 'high', 'core', 'default' o 'low'
  );
  }



  function datos_single_Propuesta( $post ) {
  //   <!-- --------------Crear la caja de texto para URL del video-------------------------------  -->

  $value_nombre = (get_post_meta($post->ID, 'id_nombre', true));
  $value_correo = (get_post_meta($post->ID, 'id_correo', true));
  $value_ciudad = (get_post_meta($post->ID, 'id_ciudad', true));
  $value_nombre_respuesta = (get_post_meta($post->ID, 'id_nombre_respuesta', true));
  $value_descripcion_respuesta = (get_post_meta($post->ID, 'id_descripcion_respuesta', true));
  
  



  $value_tema = (get_post_meta($post->ID, 'id_tema', true));
  
  $value_descripcion = (get_post_meta($post->ID, 'id_descripcion', true));

  ?>


<b><span style="color:#EC3839">Nombre:</span></b> <br><br>

<input type="text" name="id_nombre" id="id_nombre" value="<?php echo  $value_nombre; ?>" style="width: 600px;" />

<br><br>
<b><span style="color:#EC3839">Correo:</span></b> <br><br>
<input type="text" name="id_correo" id="id_correo" value="<?php echo $value_correo; ?>" style="width: 600px;" />

<br><br>
<b><span style="color:#EC3839">Parroquía:</span></b> <br><br>
<input type="text" name="id_ciudad" id="id_ciudad" value="<?php echo $value_ciudad; ?>" style="width: 600px;" />

<br><br>
<b><span style="color:#EC3839">Tema:</span></b> <br><br>
<input type="text" name="id_tema" id="id_tema" value="<?php echo $value_tema; ?>" style="width: 600px;" />

 


 

<br><br>
<b><span style="color:#EC3839">Descripción de la propuesta:</span></b><br><br>
<textarea  name="id_descripcion" id="id_descripcion"  rows="4" cols="50">
<?php echo $value_descripcion; ?>
</textarea>


<hr>
<h1>Dar una Respuesta:</h1>

<br><br>
<b><span style="color:#EC3839">Nombre:</span></b> <br><br>
<input type="text" name="id_nombre_respuesta" id="id_nombre_respuesta" value="<?php echo  $value_nombre_respuesta; ?>" style="width: 600px;" />

<br><br>
<b><span style="color:#EC3839">Respuesta:</span></b><br><br>
<textarea  name="id_descripcion_respuesta" id="id_descripcion_respuesta"  rows="4" cols="50">
<?php echo $value_descripcion_respuesta; ?>
</textarea>




<?php }


  add_action('save_post', 'post_propuestas_nombre');
  function post_propuestas_nombre() {
  global $wpdb, $post;
  if (!$post_id) $post_id = $_POST['post_ID'];
  $var_1= $_POST['id_nombre'];
  update_post_meta($post_id, 'id_nombre', $var_1);
  }


  add_action('save_post', 'post_propuestas_correo');
  function post_propuestas_correo() {
  global $wpdb, $post;
  if (!$post_id) $post_id = $_POST['post_ID'];
  $var_1= $_POST['id_correo'];
  update_post_meta($post_id, 'id_correo', $var_1);
  }


  add_action('save_post', 'post_propuestas_ciudad');
  function post_propuestas_ciudad() {
  global $wpdb, $post;
  if (!$post_id) $post_id = $_POST['post_ID'];
  $var_1= $_POST['id_ciudad'];
  update_post_meta($post_id, 'id_ciudad', $var_1);
  }


  add_action('save_post', 'post_propuestas_tema');
  function post_propuestas_tema() {
  global $wpdb, $post;
  if (!$post_id) $post_id = $_POST['post_ID'];
  $var_1= $_POST['id_tema'];
  update_post_meta($post_id, 'id_tema', $var_1);
  }



  add_action('save_post', 'post_propuestas_descripcion');
  function post_propuestas_descripcion() {
  global $wpdb, $post;
  if (!$post_id) $post_id = $_POST['post_ID'];
  $var_1= $_POST['id_descripcion'];
  update_post_meta($post_id, 'id_descripcion', $var_1);
  }


  add_action('save_post', 'nombre_respuesta');
  function nombre_respuesta() {
  global $wpdb, $post;
  if (!$post_id) $post_id = $_POST['post_ID'];
  $var_1= $_POST['id_nombre_respuesta'];
  update_post_meta($post_id, 'id_nombre_respuesta', $var_1);
  }


  add_action('save_post', 'descripcion_respuesta');
  function descripcion_respuesta() {
  global $wpdb, $post;
  if (!$post_id) $post_id = $_POST['post_ID'];
  $var_1= $_POST['id_descripcion_respuesta'];
  update_post_meta($post_id, 'id_descripcion_respuesta', $var_1);
  }

