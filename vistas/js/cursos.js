
$(".tablas").on("click", ".btnEditarCursos", function(){

	var idCategoria = $(this).attr("idCursos");
	//console.log("idCategoria", idCategoria);

	var datos = new FormData();
	datos.append("idCursos", idCategoria);

	$.ajax({
		url: "ajax/cursos.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){
     		console.log("respuesta es", respuesta);

     		$("#editarNombreCurso").val(respuesta["level_grade"]);
     		$("#editarClasificacion").val(respuesta["clasification"]);
     		$("#idCursos").val(respuesta["id_grade"]);

     	}

	})


})

/*=============================================
ELIMINAR Area
=============================================*/
$(".tablas").on("click", ".btnEliminarCursos", function(){

	 var idCategoria = $(this).attr("idCursos");

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

	 		window.location = "index.php?ruta=cursos&idCursos="+idCategoria;

	 	}

	 })

})

/*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
=============================================*/

$("#nuevoCursoNombre").change(function(){

	$(".alert").remove();

	var nombreCurso = $(this).val();

	var datos = new FormData();
	datos.append("validarnombreCurso", nombreCurso);

	 $.ajax({
	    url:"ajax/cursos.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	if(respuesta){

	    		$("#nuevoCursoNombre").parent().after('<div class="alert alert-warning">Esta sede ya existe en la base de datos</div>');

	    		$("#nuevoCursoNombre").val("");

	    	}

	    }

	})
})