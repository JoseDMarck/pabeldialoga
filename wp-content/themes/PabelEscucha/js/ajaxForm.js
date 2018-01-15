 // wait for the DOM to be loaded 
        
			function redireccionarPagina() {
 				window.location = "http://pabeldialoga.com";
				}

            // bind 'myForm' and provide a simple callback function 
            $('#new_post').ajaxForm(function() { 

            		$('.mensajeAlertaContenedor').fadeIn();

            	

				setTimeout("redireccionarPagina()", 3000);


            }); 
 