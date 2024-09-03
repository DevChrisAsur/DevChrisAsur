


$(document).ready(function() {
    $(".btnAprobarPago").click(function() {
        var boton = $(this); // Guardar una referencia al botón

        var idMatricula = boton.attr("idMatricula");
        var estadoPago = boton.attr("estadoPago");

        // Mostrar la modal de confirmación
        $("#confirmacionModal").modal('show');

        // Limpiar cualquier controlador de eventos click previamente adjuntado al botón #confirmarAccion
        $("#confirmarAccion").off('click');

        // Capturar el clic del botón de confirmación dentro de la modal
        $("#confirmarAccion").click(function() {
            var datos = new FormData();
            datos.append("activarId", idMatricula);
            datos.append("activarPago", estadoPago);

            $.ajax({
                url: "ajax/aprobarPago.ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success: function(respuesta) {
                    console.log('respuesta: ', respuesta);
                    console.log('id_tuition: ', idMatricula);
                    console.log('status_payment: ', estadoPago);

                    // Cambiar la apariencia del botón después de que la solicitud AJAX se complete
                    if (estadoPago == 0) {
                        boton.removeClass('btn-success');
                        boton.addClass('btn-danger');
                        boton.html('No Aprobado');
                        boton.attr('estadoPago', 1);
                    } else {
                        boton.removeClass('btn-danger');
                        boton.addClass('btn-success');
                        boton.html('Aprobado');
                        boton.attr('estadoPago', 0);
                    }
                    
                    if("index.php?ruta=matriculas"){
                        window.location = "index.php?ruta=matriculas";
                    } 
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

// $(function () {
//     $("#nuevoEst").selectize({

//     });
// });

// $("#nuevoEst").change(function(){

// 	$(".alert").remove();

// 	var Id_student_matricula = $(this).val();

// 	var datos = new FormData();
// 	console.log("datos", datos);

// 	datos.append("Id_student_matricula", Id_student_matricula);

// 	 $.ajax({
// 	    url:"ajax/matriculas.ajax.php",
// 	    method:"POST",
// 	    data: datos,
// 	    cache: false,
// 	    contentType: false,
// 	    processData: false,
// 	    dataType: "json",
// 	    success:function(respuesta){
// 	    	console.log("respuesta matricula", respuesta);
	    	
// 	    	if(respuesta){

// 	    		$("#nuevoEst").parent().after('<div class="alert alert-warning">Esta estudiante ya esta asociado con una matricula</div>');

// 	    		$("#nuevoEst").val("");

// 	    	}

// 	    }

// 	})
// })

// $(".tablas").on("click", ".btnEditarMatricula", function(){

// 	var idMatricula = $(this).attr("idMatricula");
// 	console.log("idMatricula", idMatricula);

// 	var datos = new FormData();
// 	datos.append("idMatricula", idMatricula);

// 	$.ajax({
// 		url: "ajax/matriculas.ajax.php",
// 		method: "POST",
//       	data: datos,
//       	cache: false,
//      	contentType: false,
//      	processData: false,
//      	dataType:"json",
//      	success: function(respuesta){
//      		console.log("respuesta matricula", respuesta);

//      		$("#editarCosto").val(respuesta["tuition_cost"]);
//      		$("#editarFechaPago").val(respuesta["pay_date"]);
//      		$("#editarEst").val(respuesta["id_student"]);
//      		$("#idMatricula").val(respuesta["id_tuition"]);

//      	}

// 	})


// })



// $(function () {
//     $(".tablas").on("click", ".btnEditarMatricula", function(){
//         var idMatricula = $(this).attr("idMatricula");
//         console.log("idMatricula", idMatricula);

//         var datos = new FormData();
//         datos.append("idMatricula", idMatricula);

//         $.ajax({
//             url: "ajax/matriculas.ajax.php",
//             method: "POST",
//             data: datos,
//             cache: false,
//             contentType: false,
//             processData: false,
//             dataType: "json",
//             success: function(respuesta){
//                 console.log("respuesta matricula", respuesta);

//                 $("#editarCosto").val(respuesta["tuition_cost"]);
//                 $("#editarFechaPago").val(respuesta["pay_date"]);
//                 // Aquí actualizamos el campo de selección de estudiantes para mostrar el nombre del estudiante asociado
//                 $("#editarEst")[0].selectize.setValue(respuesta["id_student"]);
//                 $("#idMatricula").val(respuesta["id_tuition"]);
//             }
//         });
//     });

//     $("#editarEst").selectize({
//         persist: false, 
//         onChange: function(value) {
//             console.log("Seleccionado:", value);
//             $(".alert").remove();

//             var Id_student_matricula = value; 
//             var datos = new FormData();
//             datos.append("Id_student_matricula", Id_student_matricula);

//             // Ejecutamos la validación AJAX solo si el valor ha cambiado y no es nulo
//             if (value !== null && value !== "") {
//                 $.ajax({
//                     url: "ajax/matriculas.ajax.php",
//                     method: "POST",
//                     data: datos,
//                     cache: false,
//                     contentType: false,
//                     processData: false,
//                     dataType: "json",
//                     success: function(respuesta) {
//                         console.log("respuesta val matr", respuesta);
                        
//                         if (respuesta != false) {
//                             Swal.fire({
//                                 icon: 'warning',
//                                 title: '¡Alerta!',
//                                 text: 'El estudiante seleccionado ya está asociado con una matrícula',
//                                 confirmButtonText: 'Aceptar'
//                             }).then((result) => {
//                                 if (result.isConfirmed) {
//                                     $("#editarEst")[0].selectize.clear();
//                                 }
//                             });
//                         }
//                     },
//                     error: function(xhr, status, error) {
//                         console.error("Error en la solicitud AJAX:", error);
//                     }
//                 });
//             }
//         }
//     });
// });
// $(function () {
//     // Al hacer clic en el botón de editar matrícula, obtener los datos del estudiante asociado
//     $(".tablas").on("click", ".btnEditarMatricula", function(){
//         var idMatricula = $(this).attr("idMatricula");
//         console.log("idMatricula", idMatricula);

//         var datos = new FormData();
//         datos.append("idMatricula", idMatricula);

//         $.ajax({
//             url: "ajax/matriculas.ajax.php",
//             method: "POST",
//             data: datos,
//             cache: false,
//             contentType: false,
//             processData: false,
//             dataType: "json",
//             success: function(respuesta){
//                 console.log("respuesta matricula", respuesta);

//                 $("#editarCosto").val(respuesta["tuition_cost"]);
//                 $("#editarFechaPago").val(respuesta["pay_date"]);
//                 $("#idMatricula").val(respuesta["id_tuition"]);
//                 // Establecer el valor del campo de selección de estudiantes con el ID del estudiante asociado
//                 var valorPredeterminado = respuesta["id_student"];
//                 console.log("valorPredeterminado", valorPredeterminado);

//                 $("#editarEst").selectize({
//                     onChange: function(values) {
//                         console.log("values", values);
//                         // Aquí podrías realizar alguna acción adicional si lo necesitas
//                     }
//                 });

//                 // Obtiene el objeto selectize
//                 var selectize = $("#editarEst")[0].selectize;
//                 // Establece el valor predeterminado
//                 selectize.setValue(valorPredeterminado);
//             }
//         });
//     });

//     // Inicializar el campo de selección de estudiantes
// 	   //  $("#editarEst").selectize({
// 	   //      persist: false, 
// 	   //      onChange: function(value) {
// 	   //          console.log("Seleccionado:", value);
// 	   //          $(".alert").remove();

// 	   //          // Verificar si se ha seleccionado un estudiante y si ha cambiado desde la última selección
// 	   //          if (value !== null && value !== "") {
// 	   //              var Id_student_matricula = value; 
// 	   //              var datos = new FormData();
// 	   //              datos.append("Id_student_matricula", Id_student_matricula);

// 	   //              // Ejecutar la validación AJAX
// 	   //              $.ajax({
// 	   //                  url: "ajax/matriculas.ajax.php",
// 	   //                  method: "POST",
// 	   //                  data: datos,
// 	   //                  cache: false,
// 	   //                  contentType: false,
// 	   //                  processData: false,
// 	   //                  dataType: "json",
// 	   //                  success: function(respuesta) {
// 	   //                      console.log("respuesta val matr", respuesta);
	                        
// 	   //                      if (respuesta != false) {
// 	   //                          Swal.fire({
// 	   //                              icon: 'warning',
// 	   //                              title: '¡Alerta!',
// 	   //                              text: 'El estudiante seleccionado ya está asociado con una matrícula. Seleccione otro estudiante',
// 	   //                              confirmButtonText: 'Aceptar'
// 	   //                          }).then((result) => {
// 	   //                              if (result.isConfirmed) {
// 	   //                                  $("#editarEst")[0].selectize.clear();
// 	   //                              }
// 	   //                          });
// 	   //                      }
// 	   //                  },
// 	   //                  error: function(xhr, status, error) {
// 	   //                      console.error("Error en la solicitud AJAX:", error);
// 	   //                  }
// 	   //              });
// 	   //          }
// 	   //      }
// 	   //  });
// });

// $(function () {
//     // Al hacer clic en el botón de editar matrícula, obtener los datos del estudiante asociado
//     $(".tablas").on("click", ".btnEditarMatricula", function(){
//         var idMatricula = $(this).attr("idMatricula");
//         console.log("idMatricula", idMatricula);

//         var datos = new FormData();
//         datos.append("idMatricula", idMatricula);

//         $.ajax({
//             url: "ajax/matriculas.ajax.php",
//             method: "POST",
//             data: datos,
//             cache: false,
//             contentType: false,
//             processData: false,
//             dataType: "json",
//             success: function(respuesta){
//                 console.log("respuesta matricula", respuesta);

//                 $("#editarCosto").val(respuesta["tuition_cost"]);
//                 $("#editarFechaPago").val(respuesta["pay_date"]);
//                 $("#idMatricula").val(respuesta["id_tuition"]);
//                 // Establecer el valor del campo de selección de estudiantes con el ID del estudiante asociado
//                 var valorPredeterminado = respuesta["id_student"];
//                 console.log("valorPredeterminado", valorPredeterminado);

//                 // Inicializar el campo de selección de estudiantes
//                 $("#editarEst").selectize({
                    
//                 });

//                 // Obtiene el objeto selectize
//                 var selectize = $("#editarEst")[0].selectize;
//                 // Establece el valor predeterminado
//                 selectize.setValue(valorPredeterminado);

//                 // Realizar la llamada AJAX después de establecer el valor predeterminado
//                 selectize.on('change', function(value) {
//                      $.ajax({
//                                 url: "ajax/matriculas.ajax.php",
//                                 method: "POST",
//                                 data: datos,
//                                 cache: false,
//                                 contentType: false,
//                                 processData: false,
//                                 dataType: "json",
//                                 success: function(respuesta) {
//                                     console.log("respuesta val matr", respuesta);
                                    
//                                     if (respuesta != false) {
//                                         Swal.fire({
//                                             icon: 'warning',
//                                             title: '¡Alerta!',
//                                             text: 'El estudiante seleccionado ya está asociado con una matrícula. Seleccione otro estudiante',
//                                             confirmButtonText: 'Aceptar'
//                                         }).then((result) => {
//                                             if (result.isConfirmed) {
//                                                 $("#editarEst")[0].selectize.clear();
//                                             }
//                                         });
//                                     }
//                                 },
//                                 error: function(xhr, status, error) {
//                                     console.error("Error en la solicitud AJAX:", error);
//                                 }
//                             });
//                 });
//             }
//         });
//     });
// });

// $(function () {
//     var isDefaultValueSet = false; // Bandera para controlar si el valor predeterminado se estableció

//     // Inicializar el campo de selección de estudiantes
//     $("#editarEst").selectize({
//         persist: false, 
//         onChange: function(value) {
//             console.log("Seleccionado:", value);
//             $(".alert").remove();

//             // Verificar si se ha seleccionado un estudiante y si ha cambiado desde la última selección
//             if (!isDefaultValueSet && value !== null && value !== "") {
//                 var Id_student_matricula = value; 
//                 var datos = new FormData();
//                 datos.append("Id_student_matricula", Id_student_matricula);

//                 // Ejecutar la validación AJAX
//                 $.ajax({
//                     url: "ajax/matriculas.ajax.php",
//                     method: "POST",
//                     data: datos,
//                     cache: false,
//                     contentType: false,
//                     processData: false,
//                     dataType: "json",
//                     success: function(respuesta) {
//                         console.log("respuesta val matr", respuesta);
                        
//                         if (respuesta != false) {
//                             Swal.fire({
//                                 icon: 'warning',
//                                 title: '¡Alerta!',
//                                 text: 'El estudiante seleccionado ya está asociado con una matrícula. Seleccione otro estudiante',
//                                 confirmButtonText: 'Aceptar'
//                             }).then((result) => {
//                                 if (result.isConfirmed) {
//                                     $("#editarEst")[0].selectize.clear();
//                                 }
//                             });
//                         }
//                     },
//                     error: function(xhr, status, error) {
//                         console.error("Error en la solicitud AJAX:", error);
//                     }
//                 });
//             }
//             // Restablecer la bandera después de que se haya establecido el valor predeterminado
//             isDefaultValueSet = false;
//         }
//     });

//     // Al hacer clic en el botón de editar matrícula, obtener los datos del estudiante asociado
//     $(".tablas").on("click", ".btnEditarMatricula", function(){
//         var idMatricula = $(this).attr("idMatricula");
//         console.log("idMatricula", idMatricula);

//         var datos = new FormData();
//         datos.append("idMatricula", idMatricula);

//         $.ajax({
//             url: "ajax/matriculas.ajax.php",
//             method: "POST",
//             data: datos,
//             cache: false,
//             contentType: false,
//             processData: false,
//             dataType: "json",
//             success: function(respuesta){
//                 console.log("respuesta matricula", respuesta);

//                 $("#editarCosto").val(respuesta["tuition_cost"]);
//                 $("#editarFechaPago").val(respuesta["pay_date"]);
//                 $("#idMatricula").val(respuesta["id_tuition"]);
//                 // Establecer el valor del campo de selección de estudiantes con el ID del estudiante asociado
//                 var valorPredeterminado = respuesta["id_student"];
//                 console.log("valorPredeterminado", valorPredeterminado);

//                 // Establecer el valor predeterminado sin desencadenar la validación AJAX
//                 isDefaultValueSet = true;
//                 var selectize = $("#editarEst")[0].selectize;
//                 selectize.setValue(valorPredeterminado);
//             }
//         });
//     });
// });

$(function () {
    var isDefaultValueSet = false; // Bandera para controlar si el valor predeterminado se estableció
	$(".alert").remove();
    // Inicializar el campo de selección de estudiantes
    $("#editarEst").selectize({
        persist: false, 
        onChange: function(value) {
            console.log("Seleccionado:", value);
           

            // Verificar si se ha seleccionado un estudiante y si ha cambiado desde la última selección
            if (!isDefaultValueSet && value !== null && value !== "") {
                var Id_student_matricula = value; 
                var datos = new FormData();
                datos.append("Id_student_matricula", Id_student_matricula);

                // Ejecutar la validación AJAX
                $.ajax({
                    url: "ajax/matriculas.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(respuesta) {
                        console.log("respuesta val matr", respuesta);
                        
                        if (respuesta != false) {
                            Swal.fire({
                                icon: 'warning',
                                title: '¡Alerta!',
                                text: 'El estudiante seleccionado ya está asociado con una matrícula. Seleccione otro estudiante',
                                confirmButtonText: 'Aceptar',
                                allowOutsideClick: false,

                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $("#editarEst")[0].selectize.clear();
                                    $('#modalEditarMatricula').modal('toggle'); 

                                }
                            });
                        }else{

$("#editarEst").parent().after('<br><div class="alert alert-success">Estudiante sin asociar</div><br>');

// Eliminar la alerta después de 2 segundos
setTimeout(function() {
    $(".alert").remove();
}, 2000);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error en la solicitud AJAX:", error);
                    }
                });
            }
            // Restablecer la bandera después de que se haya establecido el valor predeterminado
            isDefaultValueSet = false;
        }
    });

    // Al hacer clic en el botón de editar matrícula, obtener los datos del estudiante asociado
    $(".tablas").on("click", ".btnEditarMatricula", function(){
        var idMatricula = $(this).attr("idMatricula");
        console.log("idMatricula", idMatricula);

        var datos = new FormData();
        datos.append("idMatricula", idMatricula);

        $.ajax({
            url: "ajax/matriculas.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta){
                console.log("respuesta matricula", respuesta);

                $("#editarCosto").val(respuesta["tuition_cost"]);
                $("#editarFechaPago").val(respuesta["pay_date"]);
                $("#editarComeMatri").val(respuesta["tuition_observation"]);
                $("#idMatricula").val(respuesta["id_tuition"]);
                // Establecer el valor del campo de selección de estudiantes con el ID del estudiante asociado
                var valorPredeterminado = respuesta["id_student"];
                console.log("valorPredeterminado", valorPredeterminado);

                // Establecer el valor predeterminado sin desencadenar la validación AJAX
                isDefaultValueSet = true;
                var selectize = $("#editarEst")[0].selectize;
                selectize.setValue(valorPredeterminado);
            }
        });
    });
});

$(document).ready(function() {
        $('#editarComeMatri').on('input', function() {
            var maxLength = parseInt($(this).attr('maxlength'));
            var currentLength = $(this).val().length;

            if (currentLength >= maxLength) {
                $(this).val($(this).val().substring(0, maxLength)); // Limita la longitud del texto
                alert('Ha alcanzado el límite máximo de caracteres.');
            }
        });
    });
/*=============================================
ELIMINAR Area
=============================================*/
$(".tablas").on("click", ".btnEliminarMatricula", function(){

	 var idCategoria = $(this).attr("idMatricula");

	 swal({
	 	title: '¿Está seguro de borrar la matricula?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar Matricula!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=matriculas&idMatricula="+idCategoria;

	 	}

	 })

})


$(".tablas").on("click", ".btnEnviarNotificacion", function(){

    var idMatricula = $(this).attr("idMatricula");
    var Telefono = $(this).attr("Telefono");
    var Padre = $(this).attr("Padre");

    swal({
        title: '¿Desea enviar una alerta de pago al acudiente?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, enviar recordatorio!'
    }).then(function(result){

        if(result.value){

            // console.log('idMatricula: ', idMatricula);
            // console.log('Telefono: ', Telefono);
            // console.log('Padre: ', Padre);

          window.location = "index.php?ruta=recordatorio&idMatri="+idMatricula;

        }

    })

})




$(function () {
    $("#nuevoEstMatri").selectize({
        persist: false, 
        onChange: function(value) {
            console.log("Seleccionado:", value);
            $(".alert").remove();

            var Id_student_matricula = value; 
            var datos = new FormData();
            datos.append("Id_student_matricula", Id_student_matricula);

            $.ajax({
                url: "ajax/matriculas.ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(respuesta) {
                    console.log("respuesta val matr", respuesta);
             

                        if (respuesta!=false) {

                        	Swal.fire({
                                icon: 'warning',
                                title: '¡Alerta!',
                                text: 'El estudiante seleccionado ya está asociado con una matricula',
                                confirmButtonText: 'Aceptar'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $("#nuevoEstMatri")[0].selectize.clear()
                                   
                                }
                            });

                        }



                    
                },
                error: function(xhr, status, error) {
                    console.error("Error en la solicitud AJAX:", error);
                }
            });
        }
    });
});


// $(function () {
//     $("#editarEst").selectize({
//         persist: false, 
//         onChange: function(value) {
//             console.log("Seleccionado:", value);
//             $(".alert").remove();

//             var Id_student_matricula = value; 
//             var datos = new FormData();
//             datos.append("Id_student_matricula", Id_student_matricula);

//             $.ajax({
//                 url: "ajax/matriculas.ajax.php",
//                 method: "POST",
//                 data: datos,
//                 cache: false,
//                 contentType: false,
//                 processData: false,
//                 dataType: "json",
//                 success: function(respuesta) {
//                     console.log("respuesta val matr", respuesta);
                    
//                     // Verifica si la respuesta tiene algún elemento
//                         // $("#nuevoEst").parent().after('<div class="alert alert-warning">Este estudiante ya está asociado con un acudiente</div>');
//                         // $("#nuevoEst").val(""); // Limpia el valor del selectize
//                         // $("#nuevoEst")[0].selectize.clear(); // Limpia el selectize

//                         if (respuesta!=false) {

//                         	Swal.fire({
//                                 icon: 'warning',
//                                 title: '¡Alerta!',
//                                 text: 'El estudiante seleccionado ya está asociado con una matricula',
//                                 confirmButtonText: 'Aceptar'
//                             }).then((result) => {
//                                 if (result.isConfirmed) {
//                                     $("#nuevoEst")[0].selectize.clear()
                                   
//                                 }
//                             });

//                         }



                    
//                 },
//                 error: function(xhr, status, error) {
//                     console.error("Error en la solicitud AJAX:", error);
//                 }
//             });
//         }
//     });
// });

