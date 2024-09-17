/*=============================================
EDITAR Area
=============================================*/
$(".tablas2").on("click", ".btnEditarAreaDerecho", function(){

	var idCategoria = $(this).attr("idAreasDerecho");
	//console.log("idCategoria", idCategoria);

	var datos = new FormData();
	datos.append("idAreasDerecho", idCategoria);

	$.ajax({
		url: "ajax/area_derecho.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){
     		//console.log("respuesta es", respuesta);

     		$("#editarNombreAreaDerecho").val(respuesta["law_area"]);
     		$("#idAreasDerecho").val(respuesta["id_area"]);

     	}

	})


})

/*=============================================
ELIMINAR Area
=============================================*/
$(".tablas2").on("click", ".btnEliminarAreaDerecho", function(){

	 var idCategoria = $(this).attr("idAreasDerecho");

	 swal({
	 	title: '¿Está seguro de borrar el curso?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar Curso!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=areas&idAreasDerecho="+idCategoria;

	 	}

	 })

})