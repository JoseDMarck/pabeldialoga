     



<div class="comentarios">

		 
 

    <div class="contenedor">


	<form id="new_post" name="new_post" method="post" action="<?php echo get_template_directory_uri(); ?>/formulario_insertar.php"> 
    


    <div class="formulario_a">

         <span class="tituloComentarios">Tu Nombre:</span><br>
        <input type="text" name="nombre" id="nombre" size="45" id="input-title"/><br>
        
        <span class="tituloComentarios">E-Mail:</span><br>
        <input type="text" name="correo" id="correo" size="45" id="input-title"/><br>
	
	     <span class="tituloComentarios">PARROQUÍA:</span><br>
       <!--  <input type="text" name="ciudad" id="ciudad" size="45" id="input-title"/><br> -->

        
        <select name="ciudad" id="ciudad" >
          <option value="Belisario Quevedo">Belisario Quevedo</option>
          <option value="Carcelen">Carcelen</option>
          <option value="Cochapamba">Cochapamba</option>
          <option value="Comité del Pueblo">Comité del Pueblo</option>
          <option value="Cotocollao">Cotocollao</option>
          <option value="El Condado">El Condado</option>
          <option value="Itchibia">Itchibia</option>
          <option value="Iñaquito">Iñaquito</option>
          <option value="Jipijapa">Jipijapa</option>
          <option value="Kennedy">Kennedy</option>
          <option value="La Concepción">La Concepción</option>
          <option value="Mariscal Sucre">Mariscal Sucre</option>
          <option value="Ponceano">Ponceano</option>
          <option value="Rumipamba">Rumipamba</option>
          <option value="San Isidro del Inca">San Isidro del Inca</option>
          <option value="San Juan">San Juan</option>
           <option value="Otro">Otro</option>
        </select>
<br><br>

        <span class="tituloComentarios">Tema:</span><br>
    <select name="tema"  id="tema" >
          <option value="Economía">Economía</option>
          <option value="Transparencia y participación Ciudadana">Transparencia y Participación Ciudadana</option>
          <option value="Educación">Educación</option>
          <option value="Juventud">Juventud</option>
          <option value="Salud">Salud</option>
          <option value="Cultura y Deporte">Cultura y Deporte</option> 
          <option value="Seguridad">Seguridad</option> 
          <option value="Mujeres">Mujeres</option> 
          <option value="Diversidades">Diversidades</option> 
          <option value="Otro">Otro</option>
        </select>
<br><br>


 
   
    </div> <!--  formulario_a -->


 

    <div class="formulario_b">

 	     <span class="tituloComentarios">Descripción:</span><br>
       
	      <textarea  name="descripcion" id="descripcion" class="Desc" maxlength="250"  rows="4" cols="50" > </textarea>
        <div class="countdown"></div>
        <br>
        <br>
    
        <input type="hidden" name="action" value="new_post">
        <center>
            <input class="subput round enviarComentario" type="submit" name="submit" value="Enviar"/>
        </center>
   
    </div><!--  formulario_b -->


   <div style="clear: both; height: 50px;"></div>
</form>

</div><!--  Contenedor -->
  
 
 <div class="avisoPrivacidad">
   Aviso de privacidad: Los datos personales recabados en este sitio serán protegidos bajo los preceptos constitucionales que garantizan el derecho a la intimidad y a la autodeterminación informática.
 </div>
</div>

