/*=============================================
SUBIENDO LA FOTO DEL USUARIO
=============================================*/
$(".nuevaFoto").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".nuevaFoto").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".nuevaFoto").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{
 
  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizar").attr("src", rutaImagen);

  		})

  	}
})

/*=============================================
EDITAR USUARIO
=============================================*/
$(".tablas").on("click", ".btnEditarUsuario", function(){

	var idUsuario = $(this).attr("idUsuario");
	
	var datos = new FormData();
	datos.append("idUsuario", idUsuario);

	$.ajax({

		url:"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			$("#idUsuario").val(respuesta["id"]);
			$("#editarCorreo").val(respuesta["correo"]);
			$("#editarTelefone").val(respuesta["phone"]);
			$("#editarUsuario").val(respuesta["user_name"]);
			$("#passwordActual").val(respuesta["password"]);
			$("#editarPerfil").val(respuesta["perfil"]);
		    $("#editarArea").val(respuesta["area"]);
		}

	});

})

/*=============================================
ACTIVAR USUARIO
=============================================*/
$(document).ready(function() {
    $(".btnAprobarPagoPension").click(function() {
        var boton = $(this); // Guardar una referencia al botón

        var idPension = boton.attr("idUsuario");
        var estadoPago = boton.attr("estadoPagoPension");

        // Mostrar la modal de confirmación
        $("#confirmacionModal").modal('show');

        // Limpiar cualquier controlador de eventos click previamente adjuntado al botón #confirmarAccion
        $("#confirmarAccion").off('click');

        // Capturar el clic del botón de confirmación dentro de la modal
        $("#confirmarAccion").click(function() {
            var datos = new FormData();
            datos.append("activarIdPension", idPension);
            datos.append("activarPagoPension", estadoPago);

            $.ajax({
                url: "ajax/usuarios.ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success: function(respuesta) {
                    console.log('respuesta: ', respuesta);
                    // console.log('id_tuition: ', idMatricula);
                    // console.log('status_payment: ', estadoPago);

                    // Cambiar la apariencia del botón después de que la solicitud AJAX se complete
                    if (estadoPago == 0) {
                        boton.removeClass('btn-success');
                        boton.addClass('btn-danger');
                        boton.html('No Habilitado');
                        boton.attr('estadoPagoPension', 1);
                    } else {
                        boton.removeClass('btn-danger');
                        boton.addClass('btn-success');
                        boton.html('Habilitado');
                        boton.attr('estadoPagoPension', 0);
                    }
                    
                    // if("index.php?ruta=usuarios"){
                    //     window.location = "index.php?ruta=usuarios";
                    // } 
                }
            });

            // Ocultar la modal de confirmación
            $("#confirmacionModal").modal('hide');
        });
    });


});
 

/*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
=============================================*/

$("#nuevoUsuario").change(function(){

	$(".alert").remove();

	var usuario = $(this).val();

	var datos = new FormData();
	datos.append("validarUsuario", usuario);

	 $.ajax({
	    url:"ajax/usuarios.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	if(respuesta){

	    		$("#nuevoUsuario").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');

	    		$("#nuevoUsuario").val("");

	    	}

	    }

	})
})

/*=============================================
ELIMINAR USUARIO
=============================================*/
$(".tablas").on("click", ".btnEliminarUsuario", function(){

  var idUsuario = $(this).attr("idUsuario");
  var fotoUsuario = $(this).attr("fotoUsuario");
  var usuario = $(this).attr("usuario");

  swal({
    title: '¿Está seguro de borrar el usuario?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar usuario!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;

    }

  })

})



/*=============================================
ELIMINAR USUARIO
=============================================*/
$(".tablas").on("click", ".btnEliminarUsuario1", function(){

  var idUsuario = $(this).attr("idUsuario");
  var fotoUsuario = $(this).attr("fotoUsuario");
  var usuario = $(this).attr("usuario");

  swal({
    title: '¿Está seguro de borrar el registro?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar el registro!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=ventas&idUsuario="+idUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;

    }

  })

})