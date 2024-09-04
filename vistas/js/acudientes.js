/*=============================================
EDITAR Area
=============================================*/
$(".tablas").on("click", ".btnEditarAcudiente", function(){

	var idAcudiente = $(this).attr("idAcudiente");
	console.log("idAcudiente", idAcudiente);

	var datos = new FormData();
	datos.append("idAcudiente", idAcudiente);

	$.ajax({
    url: "ajax/acudientes.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta) {
        console.log("respuesta acudiente", respuesta);

        // Mapear la respuesta y asignar valores a los elementos del DOM
      
        // Asignar valores a los elementos del DOM
        $("#editarIdentificacion").val(respuesta["cc"]);
        $("#editarNombre").val(respuesta["first_name_parent"]);
        $("#editarApellido").val(respuesta["last_name_parent"]);
        $("#editarCorreo").val(respuesta["email"]);
        $("#idAcudiente").val(respuesta["id_parent"]);

   
    }
});


})

/*=============================================
ELIMINAR Area
=============================================*/
$(".tablas").on("click", ".btnEliminarAcudiente", function(){

	 var idCategoria = $(this).attr("idAcudiente");

	 swal({
	 	title: '¿Está seguro de eliminar el acudiente? Al borrarlo se eliminaran los estudiantes asociados',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar acudiente!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=acudientes&idAcudiente="+idCategoria;

	 	}

	 })

})

$(function () {
    $("#nuevoAcuEst").selectize({
        delimiter: ',', 
        plugins: ['remove_button'], 
        maxItems: null, 
        persist: false, 
        onChange: function(values) {
            console.log("Seleccionado:", values);

            values.forEach(function(id_student) {
                var datos = new FormData();
                datos.append("Id_student_ajax", id_student);

                $.ajax({
                    url: "ajax/acudientes.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(respuesta) {
                        console.log("respuesta val acu para el estudiante", id_student, ":", respuesta);
                        
                        if(respuesta.length > 0) { 
                            Swal.fire({
                                icon: 'warning',
                                title: '¡Alerta!',
                                text: 'El estudiante seleccionado ya está asociado con un acudiente',
                                confirmButtonText: 'Aceptar'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    var selectize = $("#nuevoAcuEst")[0].selectize;
                                    selectize.removeItem(id_student);
                                }
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error en la solicitud AJAX:", error);
                    }
                });
            });
        }
    });
});