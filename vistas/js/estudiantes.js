/*=============================================
EDITAR Area
=============================================*/
$(".tablas").on("click", ".btnEditarEstudiante", function(){

	var idEstudiante = $(this).attr("idEstudiante");
	console.log("idEstudiante", idEstudiante);

	var datos = new FormData();
	datos.append("idEstudiante", idEstudiante);

	$.ajax({
    url: "ajax/estudiantes.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta) {
        console.log("respuesta", respuesta);

        // Mapear la respuesta y asignar valores a los elementos del DOM
        var valores = respuesta.map(function(estudiante) {
            
            return {
                cc: estudiante.cc,
                id_student: estudiante.id_student,
                first_name: estudiante.first_name,
                last_name: estudiante.last_name,
                gender: estudiante.gender,
                birth_date: estudiante.birth_date,
                schedule: estudiante.schedule,
                id_campus: estudiante.id_campus,




            };
        });

        // Asignar valores a los elementos del DOM
        $("#editarIdentificacion").val(valores[0].cc);
        $("#editarNombre").val(valores[0].first_name);
        $("#editarApellido").val(valores[0].last_name);
        $("#editarGenero").val(valores[0].gender);
        $("#editarBirth").val(valores[0].birth_date);
        $("#editarJornada").val(valores[0].schedule);
        $("#editarSede").val(valores[0].id_campus);
        $("#idEstudiante").val(valores[0].id_student);
    }
});


})

/*=============================================
ELIMINAR Area
=============================================*/
$(".tablas").on("click", ".btnEliminarEstudiante", function(){

	 var idCategoria = $(this).attr("idEstudiante");
     console.log('idCategoria: ', idCategoria);

	 swal({
	 	title: '¿Está seguro de borrar el estudiante?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar estudiante!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=estudiantes&idEstudiante="+idCategoria;

	 	}

	 })

})
// $(".btnActivar").click(function(){
//     var idEstudiante = $(this).attr("idEstudiante");    

//     var estadoUsuario = $(this).attr("estadoUsuario");

//     var datos = new FormData();
//     datos.append("activarId",idEstudiante);
//     datos.append("activarUsuario",estadoUsuario);

//     $.ajax({
//       url:"ajax/inhabilitarEstudiante.ajax.php",
//       method: "POST",
//       data: datos,
//       cache:false,
//       contentType:false,
//       processData:false,
//       success:function(respuesta){
//         console.log('id_student: ', idEstudiante);
//         console.log('st_status: ', estadoUsuario);
//       }
//     })
//     if(estadoUsuario==0){
//         $(this).removeClass('btn-sucess');
//         $(this).addClass('btn-danger');
//         $(this).html('Inactivo');
//         $(this).attr('estadoUsuario',1);
//     }else{
//         $(this).removeClass('btn-danger');
//         $(this).addClass('btn-sucess');
//         $(this).html('Activo');
//         $(this).attr('estadoUsuario',0);
//     }
//   })


$(document).ready(function() {
    $(".btnActivar").click(function() {
        var boton = $(this); // Guardar una referencia al botón

        var idEstudiante = boton.attr("idEstudiante");
        var estadoUsuario = boton.attr("estadoUsuario");

        // Mostrar la modal de confirmación
        $("#confirmacionModal").modal('show');

        // Limpiar cualquier controlador de eventos click previamente adjuntado al botón #confirmarAccion
        $("#confirmarAccion").off('click');

        // Capturar el clic del botón de confirmación dentro de la modal
        $("#confirmarAccion").click(function() {
            var datos = new FormData();
            datos.append("activarId", idEstudiante);
            datos.append("activarUsuario", estadoUsuario);

            $.ajax({
                url: "ajax/inhabilitarEstudiante.ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success: function(respuesta) {
                    console.log('id_student: ', idEstudiante);
                    console.log('st_status: ', estadoUsuario);

                    // Cambiar la apariencia del botón después de que la solicitud AJAX se complete
                    if (estadoUsuario == 0) {
                        boton.removeClass('btn-success');
                        boton.addClass('btn-danger');
                        boton.html('Inactivo');
                        boton.attr('estadoUsuario', 1);
                    } else {
                        boton.removeClass('btn-danger');
                        boton.addClass('btn-success');
                        boton.html('Activo');
                        boton.attr('estadoUsuario', 0);
                    }
                    
                    if("index.php?ruta=estudiantes"){
                        window.location = "index.php?ruta=estudiantes";
                    } else if("index.php?ruta=estudiantesinactivos"){
                        window.location = "index.php?ruta=estudiantesinactivos";
                    }
                }
            });

            // Ocultar la modal de confirmación
            $("#confirmacionModal").modal('hide');
        });
    });
});
  


