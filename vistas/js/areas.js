/*=============================================
EDITAR Area
=============================================*/
$(".tablas").on("click", ".btnEditarAreas", function(){

	var idCategoria = $(this).attr("idAreas");

	var datos = new FormData();
	datos.append("idAreas", idCategoria);

	$.ajax({
		url: "ajax/areas.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarAreas").val(respuesta["area"]);
     		$("#idAreas").val(respuesta["id"]);

     	}

	})


})

/*=============================================
ELIMINAR Area
=============================================*/
$(".tablas").on("click", ".btnEliminarAreas", function(){

	 var idCategoria = $(this).attr("idAreas");

	 swal({
	 	title: '¿Está seguro de borrar el area?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar Area!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=areas&idAreas="+idCategoria;

	 	}

	 })

})