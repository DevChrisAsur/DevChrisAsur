
$(".tablas").on("click", ".btnEditarSedes", function(){

	var idCategoria = $(this).attr("idSedes");
	console.log("idCategoria", idCategoria);

	var datos = new FormData();
	datos.append("idSedes", idCategoria);

	$.ajax({
		url: "ajax/sedes.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){
     		console.log("respuesta es", respuesta);

     		$("#editarNombreSede").val(respuesta["campus_name"]);
     		$("#editarDireccionSede").val(respuesta["address"]);
     		$("#editarCorreoSede").val(respuesta["email"]);
     		$("#idSedes").val(respuesta["id_campus"]);

     	}

	})


})

/*=============================================
ELIMINAR Area
=============================================*/
$(".tablas").on("click", ".btnEliminarSedes", function(){

	 var idCategoria = $(this).attr("idSedes");

	 swal({
	 	title: '¿Está seguro de borrar la sede?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar Sede!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=sedes&idSedes="+idCategoria;

	 	}

	 })

})

/*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
=============================================*/

$("#nuevaSedeNombre").change(function(){

	$(".alert").remove();

	var nombreSede = $(this).val();

	var datos = new FormData();
	console.log("datos", datos);

	datos.append("validarNombreSede", nombreSede);

	 $.ajax({
	    url:"ajax/sedes.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	console.log("respuesta sede", respuesta);
	    	
	    	if(respuesta){

	    		$("#nuevaSedeNombre").parent().after('<div class="alert alert-warning">Esta sede ya existe en la base de datos</div>');

	    		$("#nuevaSedeNombre").val("");

	    	}

	    }

	})
})