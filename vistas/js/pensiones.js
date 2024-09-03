$(function () {
    var isDefaultValueSet = false; // Bandera para controlar si el valor predeterminado se estableció
	//$(".alert").remove();
    // Inicializar el campo de selección de estudiantes
    $("#editarEstPen").selectize({
        persist: false, 
        onChange: function(value) {
            console.log("Seleccionado:", value);
           

            // Verificar si se ha seleccionado un estudiante y si ha cambiado desde la última selección
            if (!isDefaultValueSet && value !== null && value !== "") {
                var Id_student_pension = value; 
                var datos = new FormData();
                datos.append("Id_student_pension", Id_student_pension);

                // Ejecutar la validación AJAX
                $.ajax({
                    url: "ajax/pensiones.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(respuesta) {
                        console.log("respuesta val pen", respuesta);
                        
                        if (respuesta != false) {
                            Swal.fire({
                                icon: 'warning',
                                title: '¡Alerta!',
                                text: 'El estudiante seleccionado ya está asociado con una mensualidad. Seleccione otro estudiante',
                                confirmButtonText: 'Aceptar',
                                allowOutsideClick: false,

                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $("#editarEstPen")[0].selectize.clear();
                                    $('#modalEditarPension').modal('toggle'); 

                                }
                            });
                        }else{

$("#editarEstPen").parent().after('<div class="alert alert-success">Estudiante sin asociar</div>');

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

//si de desea implementar el selectize tomar lo del comentario de editar pension y pegarlo justo aca.


});


/*=============================================
 Editar pension
=============================================*/

    // Al hacer clic en el botón de editar matrícula, obtener los datos del estudiante asociado
$(".tablas").on("click", ".btnEditarPension", function() {
    var idPension = $(this).attr("idPension");
    console.log("idPension", idPension);

    var datos = new FormData();
    datos.append("idPension", idPension);

    $.ajax({
        url: "ajax/pensiones.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            console.log("respuesta pension", respuesta);

            $("#editarCosto").val(respuesta["pension_cost"]);
            $("#editarFechaPago").val(respuesta["pay_date"]);
            $("#editarConfirmRuta").val(respuesta["route_state"]);
            $("#editarMatriRuta").val(respuesta["route_type"]);
            $("#editarConfirmAlmuerzo").val(respuesta["lunch_state"]);
            $("#editarMatriAlmuerzo").val(respuesta["lunch_type"]);
            $("#editarConfirmExtraCur").val(respuesta["extracurricular_course_status"]);
            $("#editarComeMatri").val(respuesta["pension_observation"]);
            $("#idPension").val(respuesta["id_pension"]);



            // Inicializar selectize antes de asignar valores
            var selectizeElement = $("#editarnuevoCursoExtra").selectize({
                delimiter: ',', // Establece la coma como delimitador
                plugins: ['remove_button'], // Agrega el botón para eliminar elementos seleccionados
                maxItems: null, // Permite seleccionar cualquier cantidad de elementos
                persist: false, // No persiste los elementos seleccionados al recargar la página
                onChange: function(value) {
                    console.log("Seleccionado:", value);
                }
            });

            // Obtener la instancia de selectize y establecer los valores
            var selectizeInstance = selectizeElement[0].selectize;
            var extracurricularCourseTypes = respuesta["extracurricular_course_type"].split(',');
            selectizeInstance.setValue(extracurricularCourseTypes);

            // Establecer el valor del campo de selección de estudiantes con el ID del estudiante asociado
            var valorPredeterminado = respuesta["id_student"];
            var estadoRuta = respuesta["route_state"];
            var estadoAlmuerzo = respuesta["lunch_state"];
            var estadoExtraCurso = respuesta["extracurricular_course_status"];
            // console.log("ruta ajax", ruta);
            //console.log("valorPredeterminado", valorPredeterminado);
            
            // Establecer el valor predeterminado sin desencadenar la validación AJAX
            //isDefaultValueSet = true;
            // var selectize = $("#editarEstPen")[0].selectize;
            // selectize.setValue(valorPredeterminado);

            actualizarVisibilidadRuta(estadoRuta);
            actualizarVisibilidadAlmuerzo(estadoAlmuerzo);
            actualizarVisibilidadExtracurso(estadoExtraCurso);
        }
    });
});

/*=============================================
 Validaciones insert 
=============================================*/


const textarea = document.getElementById('nuevoComeMatri');

    textarea.addEventListener('input', function() {
        const maxLength = parseInt(textarea.getAttribute('maxlength'));
        const currentLength = textarea.value.length;

        if (currentLength >= maxLength) {
            textarea.value = textarea.value.substring(0, maxLength); // Limita la longitud del texto
            alert('Ha alcanzado el límite máximo de caracteres.');
        }
    });





  document.getElementById("ConfirmRuta").addEventListener("change", function() {
         var selectMatriRutaGroup = document.getElementById("selectMatriRutaGroup");
         var confirmRutaValue = this.value;
         if (confirmRutaValue === "1") {
             selectMatriRutaGroup.style.display = "block";
         } else {
             selectMatriRutaGroup.style.display = "none";
         }
     });
document.getElementById("ConfirmAlmuerzo").addEventListener("change", function() {
        var selectMatriAlmuerzoGroup = document.getElementById("selectMatriAlmuerzoGroup");
        var confirmAlmuerzoValue = this.value;
        if (confirmAlmuerzoValue === "1") { 
            selectMatriAlmuerzoGroup.style.display = "block";
        } else {
            selectMatriAlmuerzoGroup.style.display = "none";
        }
    });
 document.getElementById("ConfirmExtraCur").addEventListener("change", function() {
        var selectMatriExtraCurGroup = document.getElementById("selectMatriExtraCurGroup");
        var confirmExtraCurValue = this.value;
        if (confirmExtraCurValue === "1") {
            selectMatriExtraCurGroup.style.display = "block";
        } else {
            selectMatriExtraCurGroup.style.display = "none";
        }
    });


$(function () {
     $("#nuevoCursoExtra").selectize({
         delimiter: ',', // Establece la coma como delimitador
         plugins: ['remove_button'], // Agrega el botón para eliminar elementos seleccionados
         maxItems: null, // Permite seleccionar cualquier cantidad de elementos
         persist: false, // No persiste los elementos seleccionados al recargar la página


         onChange: function(value) {
             console.log("Seleccionado:", value);
         }
     });
 });
  // document.getElementById("editarConfirmRuta").addEventListener("change", function() {
  //        var selectMatriRutaGroup = document.getElementById("editarselectMatriRutaGroup");
  //        var confirmRutaValue = this.value;
  //        if (confirmRutaValue === "1") {
  //            selectMatriRutaGroup.style.display = "block";
  //        } else {
  //            selectMatriRutaGroup.style.display = "none";
  //        }
  //    });



/*=============================================
 Funciónes para editar las selecciones por grupos
=============================================*/


  // Función para actualizar la visibilidad del grupo de selección de rutas
function actualizarVisibilidadRuta(estadoRuta) {
    var selectMatriRutaGroup = document.getElementById("editarselectMatriRutaGroup");
    var confirmRutaValue = document.getElementById("editarConfirmRuta").value;
    var editarMatriRuta = document.getElementById("editarMatriRuta");

    if (confirmRutaValue === "1") {
        selectMatriRutaGroup.style.display = "block";
        // Establecer valor de editarMatriRuta a estadoRuta si está presente
        if (estadoRuta) {
            editarMatriRuta.value = estadoRuta;
        }
    } else {
        selectMatriRutaGroup.style.display = "none";
        estadoRuta = 0;
        editarMatriRuta.value = ""; // Establecer a valor vacío
        console.log("estadoRuta", estadoRuta);
    }

    // Añadir event listener para actualizar visibilidad en cambio
    document.getElementById("editarConfirmRuta").addEventListener("change", function() {
        if (this.value === "1") {
            selectMatriRutaGroup.style.display = "block";
            editarMatriRuta.value = estadoRuta || ""; // Restaurar el valor original de ruta
            console.log("ruta de", editarMatriRuta.value);
        } else {
            selectMatriRutaGroup.style.display = "none";
            estadoRuta = 0;
            editarMatriRuta.value = ""; // Establecer a valor vacío
            console.log("ruta af", estadoRuta);
        }
    });

    return estadoRuta;
}

function actualizarVisibilidadAlmuerzo(estadoAlmuerzo) {
    var selectMatriAlmuerzoGroup = document.getElementById("editarselectMatriAlmuerzoGroup");
    var confirmAlmuerzoValue = document.getElementById("editarConfirmAlmuerzo").value;
    var editarMatriAlmuerzo = document.getElementById("editarMatriAlmuerzo");
    var editarMatriAlmuerzoValue = document.getElementById("editarMatriAlmuerzo").value;
    console.log("editarMatriAlmuerzo", editarMatriAlmuerzoValue);

    if (confirmAlmuerzoValue === "1") {
        selectMatriAlmuerzoGroup.style.display = "block";
        if (estadoAlmuerzo) {
            editarMatriAlmuerzo.value;
        }
    } else {
        selectMatriAlmuerzoGroup.style.display = "none";
        estadoAlmuerzo = 0;
        editarMatriAlmuerzo.value = ""; // Establecer a valor vacío
    }

    document.getElementById("editarConfirmAlmuerzo").addEventListener("change", function() {
        if (this.value === "1") {
            selectMatriAlmuerzoGroup.style.display = "block";
              editarMatriAlmuerzo.value = estadoAlmuerzo || ""; 
        } else {
            selectMatriAlmuerzoGroup.style.display = "none";
            estadoAlmuerzo = 0;
             editarMatriAlmuerzo.value = ""; 
        }
    });
 editarMatriAlmuerzo.addEventListener("change", function() {
        if (this.value === "1") {
           swal({
         title: '¿Está seguro de cambiar el almuerzo diario. Si lo cambia la cantidad de almuerzos se perdera',
         text: "¡Si no lo está puede cancelar la acción!",
         type: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         cancelButtonText: 'Cancelar',
         confirmButtonText: 'Si, cambiar almuerzo!'
     }).then(function(result){

         if(result.value){

            swal({

                                type: "success",
                                title: "¡Almuerzo cambiado a completo!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"

                            })

         }

     })
        } else if (this.value === "2") {
             swal({
         title: '¿Está seguro de cambiar el almuerzo completo. Si lo cambia la cantidad de almuerzos se perdera',
         text: "¡Si no lo está puede cancelar la acción!",
         type: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         cancelButtonText: 'Cancelar',
         confirmButtonText: 'Si, cambiar almuerzo!'
     }).then(function(result){

         if(result.value){

            swal({

                                type: "success",
                                title: "¡Almuerzo cambiado a diario!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"

                            })

         }

     })
        }
    });
     return estadoAlmuerzo;

}

function actualizarVisibilidadExtracurso(estadoExtraCurso) {
    var selectMatriExtracursoGroup = document.getElementById("editarselectMatriExtraCurGroup");
    var confirmExtraCurValue = document.getElementById("editarConfirmExtraCur").value;
    console.log("confirmExtraCurValue", confirmExtraCurValue);
    if (confirmExtraCurValue === "1") {
        selectMatriExtracursoGroup.style.display = "block";
    } else {
        selectMatriExtracursoGroup.style.display = "none";
        estadoExtraCurso = "N/A";
    }

    document.getElementById("editarConfirmExtraCur").addEventListener("change", function() {
        if (this.value === "1") {
            estadoExtraCurso = document.getElementById("editarnuevoCursoExtra").value;
            console.log("estadoExtraCurso ad", estadoExtraCurso);
            selectMatriExtracursoGroup.style.display = "block";
        } else {
            selectMatriExtracursoGroup.style.display = "none";
            estadoExtraCurso = "N/A";
            console.log("estadoExtraCurso af", estadoExtraCurso);
        }
    });

    return estadoExtraCurso;
}

/*=============================================
Validar Eventos insert cuando la matricula es igual a 1
=============================================*/

function validateSelections() {
    var confirmRutaValue = document.getElementById("editarConfirmRuta").value;
    var confirmAlmuerzoValue = document.getElementById("editarConfirmAlmuerzo").value;
    var confirmExtraCurValue = document.getElementById("editarConfirmExtraCur").value;

    if (confirmRutaValue === "1") {
        var rutaValue = document.getElementById("editarMatriRuta").value;
        if (rutaValue === "") {
            Swal.fire({
                title: "ERROR!",
                text: "Seleccione una opción válida para la ruta.",
                icon: "error",
            });
            return false;
        }
    }

    if (confirmAlmuerzoValue === "1") {
        var almuerzoValue = document.getElementById("editarMatriAlmuerzo").value;
        if (almuerzoValue === "") {
            Swal.fire({
                title: "ERROR!",
                text: "Seleccione una opción válida para el almuerzo.",
                icon: "error",
            });
            return false;
        }
    }

    if (confirmExtraCurValue === "1") {
        var extraCurValue = document.getElementById("editarnuevoCursoExtra").value;
        if (extraCurValue === "") {
            Swal.fire({
                title: "ERROR!",
                text: "Seleccione una opción válida para el curso extra.",
                icon: "error",
            });
            return false;
        }
    }

    return true;
}

document.forms["myForm"].addEventListener("submit", function(event) {
    if (!validateSelections()) {
        event.preventDefault(); // Prevenir el envío del formulario si no es válido
    }
});
 // $(function () {
 //     $("#editarnuevoCursoExtra").selectize({
 //         delimiter: ',', // Establece la coma como delimitador
 //         plugins: ['remove_button'], // Agrega el botón para eliminar elementos seleccionados
 //         maxItems: null, // Permite seleccionar cualquier cantidad de elementos
 //         persist: false, // No persiste los elementos seleccionados al recargar la página


 //         onChange: function(value) {
 //             console.log("Seleccionado:", value);
 //         }
 //     });
 // });



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
ELIMINAR pension 
=============================================*/
$(".tablas").on("click", ".btnEliminarPension", function(){

	 var idCategoria = $(this).attr("idPension");

	 swal({
	 	title: '¿Está seguro de borrar la mensualidad?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar pension!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=pension&idPension="+idCategoria;

	 	}

	 })

})



/*=============================================
Validar Estudiante asociado insert
=============================================*/

$(function () {
    $("#nuevoEstPen").selectize({
        persist: false, 
        onChange: function(value) {
            console.log("Seleccionado:", value);
            $(".alert").remove();

            var Id_student_pension = value; 
            var numCurrentMonth = new Date().getMonth() + 1; // Obtener el mes actual (de 0-11 a 1-12)
            var currentMonth;
switch (numCurrentMonth) {
  case 1:
    currentMonth = "Enero";
    break;
  case 2:
    currentMonth = "Febrero";
    break;
  case 3:
    currentMonth = "Marzo";
    break;
  case 4:
    currentMonth = "Abril";
    break;
  case 5:
    currentMonth = "Mayo";
    break;
  case 6:
    currentMonth = "Junio";
    break;
  case 7:
    currentMonth = "Julio";
    break;
  case 8:
    currentMonth = "Agosto";
    break;
  case 9:
    currentMonth = "Septiembre";
    break;
  case 10:
    currentMonth = "Octubre";
    break;
  case 11:
    currentMonth = "Noviembre";
    break;
  case 12:
    currentMonth = "Diciembre";
    


}


            console.log("currentMonth", currentMonth);



            var datos = new FormData();
            datos.append("Id_student_pension", Id_student_pension);
            datos.append("currentMonth", currentMonth);


            $.ajax({
                url: "ajax/pensiones.ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(respuesta) {
                    console.log("respuesta val matr", respuesta);
                    
                    // Verifica si la respuesta tiene algún elemento
                        // $("#nuevoEst").parent().after('<div class="alert alert-warning">Este estudiante ya está asociado con un acudiente</div>');
                        // $("#nuevoEst").val(""); // Limpia el valor del selectize
                        // $("#nuevoEst")[0].selectize.clear(); // Limpia el selectize

                        if (respuesta!=false) {

                        	Swal.fire({
                                icon: 'warning',
                                title: '¡Alerta!',
                                text: 'El estudiante seleccionado ya está asociado con una pension en el mes en curso',
                                confirmButtonText: 'Aceptar',
                                allowOutsideClick: false,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $("#nuevoEstPen")[0].selectize.clear()
                                   
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


// $(".tablas").on("click", ".btnAsignarAlmuerzo", function(){

//      var PensionId = $(this).attr("PensionId");
//      var cont = $(this).attr("cont_lunch");
//      var monthly = $(this).attr("monthly");

//      swal({
//          title: '¿Está seguro de asignar el almuerzo?',
//          text: "¡Si no lo está puede cancelar la acción!",
//          type: 'warning',
//          showCancelButton: true,
//          confirmButtonColor: '#3085d6',
//          cancelButtonColor: '#d33',
//          cancelButtonText: 'Cancelar',
//          confirmButtonText: 'Si, Asignar almuerzo!'
//      }).then(function(result){

//          if(result.value){
//              localStorage.setItem('estado_reloj', 1);


// //              $("#btnAsignarAlmuerzo").click(function() {
// //   setCounter(getCounter() + 1);

// //   startCountDown();
// // });

// // function startCountDown() {
// //   var minutes = 0,
// //     seconds = 5;
// //   $("#countdown").html(minutes + ":" + seconds);
// //   var count = setInterval(function() {
// //     if (parseInt(minutes) < 0 || parseInt(seconds) <= 0) {
// //       $("#countdown").html(minutes + ":" + seconds);
// //       clearInterval(count);
// //       $('#btn').prop('disabled', false);
// //     } else {
// //       $("#countdown").html(minutes + ":" + seconds);
// //       seconds--;
// //       if (seconds < 10) seconds = "0" + seconds;
// //     }
// //   }, 1000);
// // }
//              window.location = "index.php?ruta=pension&PensionId="+PensionId+"&contLunch="+cont+"&monthly="+monthly;

//          }

//      })

// })
// $(document).ready(function() {
//     var estado_reloj = localStorage.getItem('estado_reloj');
//     console.log("estado_reloj", estado_reloj);
//     if (estado_reloj == 1) {
//         $('.btnAsignarAlmuerzo').prop('disabled', true);
//         startCountDown();

//       function startCountDown() {
//           var remainingTime = localStorage.getItem('remaining_time');
//     var hours = 0;
//     var minutes = 0;
//     var seconds = 0;

//     if (remainingTime) {
//         var timeArray = remainingTime.split(":");
//         hours = parseInt(timeArray[0]);
//         minutes = parseInt(timeArray[1]);
//         seconds = parseInt(timeArray[2]);
//     } else {
//         var hours = 0;
//     var minutes = 1;
//     var seconds = 30; // Establecer los minutos iniciales
//     }

//     $(".btnAsignarAlmuerzo").html(hours + ":" + minutes + ":" + seconds);

//     var count = setInterval(function() {
//         if (hours === 0 && minutes === 0 && seconds === 0) {
//             clearInterval(count);
//             $('.btnAsignarAlmuerzo').prop('disabled', false);
//             localStorage.setItem('estado_reloj', 0);
//             localStorage.removeItem('remaining_time');
//             location.reload();
//         } else {
//             $(".btnAsignarAlmuerzo").html(hours + ":" + minutes + ":" + seconds);
//             seconds--;

//             if (seconds < 0) {
//                 seconds = 59;
//                 minutes--;

//                 if (minutes < 0) {
//                     minutes = 59;
//                     hours--;

//                     if (hours < 0) {
//                         hours = 0; // Puedes decidir qué hacer cuando las horas llegan a cero
//                     }
//                 }
//             }

//             localStorage.setItem('remaining_time', hours + ":" + minutes + ":" + seconds);
//         }
//     }, 1000);
// }

// // var toHour = 4;
// // var toMinute = 0;
// // var toSecond = 0;

// // // Cuenta atrás
// // function countDown() {
// //     toSecond = toSecond - 1;
// //     if (toSecond < 0) {
// //         toSecond = 59;
// //         toMinute = toMinute - 1;
// //     }
  
// //     if (toMinute < 0) {
// //         toMinute = 59;
// //         toHour = toHour - 1;
// //     }
  
// //     if (toHour < 0) {
// //         var result = "00:00:00";
// //     } else {
// //         setTimeout(countDown, 1000);
// //         var result = toHour + ":" + toMinute + ":" + toSecond;
// //         // Guardar en el localStorage
// //         localStorage.setItem('countdown_time', result);
// //     }
// // }

// // Llamar a la función para iniciar la cuenta atrás
// // countDown();

//     } else {

//         $(".tablas").on("click", ".btnAsignarAlmuerzo", function() {

//             var PensionId = $(this).attr("PensionId");
//             var cont = $(this).attr("cont_lunch");
//             var monthly = $(this).attr("monthly");

//             swal({
//                 title: '¿Está seguro de asignar el almuerzo?',
//                 text: "¡Si no lo está puede cancelar la acción!",
//                 type: 'warning',
//                 showCancelButton: true,
//                 confirmButtonColor: '#3085d6',
//                 cancelButtonColor: '#d33',
//                 cancelButtonText: 'Cancelar',
//                 confirmButtonText: 'Si, Asignar almuerzo!'
//             }).then(function(result) {

//                 if (result.value) {
//                     localStorage.setItem('estado_reloj', 1);
//                     window.location = "index.php?ruta=pension&PensionId=" + PensionId + "&contLunch=" + cont + "&monthly=" + monthly;

//                 }

//             })

//         })

//     }
// });
// $(document).ready(function() {
//     var estado_reloj = localStorage.getItem('estado_reloj');
//     console.log("estado_reloj", estado_reloj);

//     if ($('.btnAsignarAlmuerzo').prop('disabled')==true) {
//         // Si el estado del reloj es 1, deshabilitar el botón y comenzar el contador
        
//         startCountDown();
//     } else {
//         // Si el estado del reloj no es 1, habilitar el botón y asignar el evento de clic
//         $(".tablas").on("click", ".btnAsignarAlmuerzo", function() {
//             var PensionId = $(this).attr("PensionId");
//             var cont = $(this).attr("cont_lunch");
//             var monthly = $(this).attr("monthly");

//             swal({
//                 title: '¿Está seguro de asignar el almuerzo?',
//                 text: "¡Si no lo está puede cancelar la acción!",
//                 type: 'warning',
//                 showCancelButton: true,
//                 confirmButtonColor: '#3085d6',
//                 cancelButtonColor: '#d33',
//                 cancelButtonText: 'Cancelar',
//                 confirmButtonText: 'Si, Asignar almuerzo!'
//             }).then(function(result) {
//                 if (result.value) {
//                     // Al confirmar, establecer el estado del reloj en 1
//                     localStorage.setItem('estado_reloj', 1);
//                     var timer = setCountdownTime(0, 1, 30);
//                     window.location = "index.php?ruta=pension&PensionId=" + PensionId + "&contLunch=" + cont + "&monthly=" + monthly + "&timer=" + timer;
//                 }
//             });
//         });
//     }
// });

// function setCountdownTime(hours, minutes, seconds) {
//     var currentTime = new Date().getTime();
//     var endTime = currentTime + (hours * 60 * 60 * 1000) + (minutes * 60 * 1000) + (seconds * 1000);
//     return endTime; // Devolver el valor de endTime para usarlo en la URL
// }

// function startCountDown() {
//     // Obtener el valor de countdown_end_time del botón
//     var endTime = parseInt($(".btnAsignarAlmuerzo").attr('countdown_end_time'));
//     var count = setInterval(function() {
//         var currentTime = new Date().getTime();
//         var remainingTime = endTime - currentTime;

//         if (remainingTime <= 0) {
//             clearInterval(count);
//             // Cuando el tiempo restante llegue a cero, habilitar el botón y restablecer el estado del reloj
//             $('.btnAsignarAlmuerzo').prop('disabled', false);
//             localStorage.setItem('estado_reloj', 0);
//             location.reload(); // Recargar la página si es necesario
//         } else {
//             var hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//             var minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
//             var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

//             updateTimer(hours, minutes, seconds);
//         }
//     }, 1000);
// }

// function updateTimer(hours, minutes, seconds) {
//     var timerString = pad(hours) + ":" + pad(minutes) + ":" + pad(seconds);
//     $(".btnAsignarAlmuerzo").html(timerString);
// }

// function pad(value) {
//     return value < 10 ? "0" + value : value;
// }


$(document).ready(function() {
    // Verificar el estado de los botones al cargar la página
    $('.btnAsignarAlmuerzo').each(function() {
        var button = $(this);
        if (button.prop('disabled')) {
            startCountDown(button); // Comenzar el contador si el botón está deshabilitado
        }
    });

    // Asignar evento de clic a los botones
    $(".tablas").on("click", ".btnAsignarAlmuerzo", function() {
        var button = $(this);
        var PensionId = button.attr("PensionId");
        var cont = button.attr("cont_lunch");
        var monthly = button.attr("monthly");

        swal({
            title: '¿Está seguro de asignar el almuerzo?',
            text: "¡Si no lo está puede cancelar la acción!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Sí, Asignar almuerzo!'
        }).then(function(result) {
            if (result.value) {
                // Al confirmar, establecer el estado del reloj en 1
                localStorage.setItem('estado_reloj_' + PensionId, 1);
                var timer = setCountdownTime(0, 0, 15);
                window.location = "index.php?ruta=pension&PensionId=" + btoa(PensionId) + "&contLunch=" + cont + "&monthly=" + monthly + "&timer=" + timer;
            }
        });
    });
});

function setCountdownTime(hours, minutes, seconds) {
    var currentTime = new Date().getTime();
    var endTime = currentTime + (hours * 60 * 60 * 1000) + (minutes * 60 * 1000) + (seconds * 1000);
    return endTime; // Devolver el valor de endTime para usarlo en la URL
}

function startCountDown(button) {
    var PensionId = button.attr("PensionId");
    var estado_reloj = button.attr("data-estado-reloj");
    var name = button.attr("name");
    var endTime = parseInt(button.attr('countdown_end_time'));

    var count = setInterval(function() {
        var currentTime = new Date().getTime();
        var remainingTime = endTime - currentTime;
        console.log("remainingTime", remainingTime);

        if (remainingTime <= 0 && estado_reloj == 1) {
            clearInterval(count);
            // Cuando el tiempo restante llegue a cero, habilitar el botón y restablecer el estado del reloj
            button.prop('disabled', false);

            // Enviar estado en cero al servidor
            var datos = new FormData();
            datos.append("activarId", PensionId);
            datos.append("activarReloj", 0);

            $.ajax({
                url: "ajax/pensiones.ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success: function(respuesta) {


                    setTimeout(function() {
             swal({
                 type: "success",
                 title: "Se habilitó el almuerzo para el estudiante " + name,
             });
             setTimeout(function() {
             window.location.reload(); // Recargar la página
             }, 1500); 
         }, 1500);
                },
                error: function(xhr, status, error) {
                    console.error("Error en la solicitud AJAX", status, error);
                }
            });

        } else {
            var hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);
            updateTimer(button, hours, minutes, seconds); // Actualizar el temporizador en el botón
        }
    }, 1000);
}

function updateTimer(button, hours, minutes, seconds) {
    console.log("button", button);
    var timerString = pad(hours) + ":" + pad(minutes) + ":" + pad(seconds);
    console.log("timerString", timerString);
    button.html(timerString); // Mostrar el temporizador en el botón deshabilitado
}

function pad(value) {
    return value < 10 ? "0" + value : value;
}

$(document).ready(function() {
    $(".btnAprobarPagoPension").click(function() {
        var boton = $(this); // Guardar una referencia al botón

        var idPension = boton.attr("idPension");
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
                url: "ajax/pensiones.ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success: function(respuesta) {
                    // console.log('respuesta: ', respuesta);
                    // console.log('id_tuition: ', idMatricula);
                    // console.log('status_payment: ', estadoPago);

                    // Cambiar la apariencia del botón después de que la solicitud AJAX se complete
                    if (estadoPago == 0) {
                        boton.removeClass('btn-success');
                        boton.addClass('btn-danger');
                        boton.html('No Aprobado');
                        boton.attr('estadoPagoPension', 1);
                    } else {
                        boton.removeClass('btn-danger');
                        boton.addClass('btn-success');
                        boton.html('Aprobado');
                        boton.attr('estadoPagoPension', 0);
                    }
                    
                    if("index.php?ruta=pension"){
                        window.location = "index.php?ruta=pension";
                    } 
                }
            });

            // Ocultar la modal de confirmación
            $("#confirmacionModal").modal('hide');
        });
    });


});


$(".tablas").on("click", ".btnEnviarNotificacionPension", function(){

    var idPension = $(this).attr("idPension");
    var Telefono = $(this).attr("Telefono");
    //var Padre = $(this).attr("Padre");

    swal({
        title: '¿Desea enviar un recordatorio de pago de pension al acudiente?',
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

          window.location = "index.php?ruta=recordatoriopension&idPension="+idPension;

        }

    })

})


// $(document).ready(function() {
//     // Iterar sobre cada botón
//     $(".btnAsignarAlmuerzo").each(function() {
//         var button = $(this);
//         console.log("button", button);
//         var PensionId = button.attr("PensionId");
//         var estado_reloj = localStorage.getItem('estado_reloj_' + PensionId); // Usar el ID de la pensión como clave

//         if (estado_reloj == 1) {
//             // Si el estado del reloj es 1, deshabilitar el botón y comenzar el contador
//             button.prop('disabled', true);
//             startCountDown(button, PensionId); // Pasar el PensionId como argumento
//         }
//     });

//     // Asignar el evento de clic fuera del bucle
//     $(".tablas").on("click", ".btnAsignarAlmuerzo", function() {
//         var button = $(this);
//         var PensionId = button.attr("PensionId");
//         var cont = button.attr("cont_lunch");
//         var monthly = button.attr("monthly");

//         swal({
//             title: '¿Está seguro de asignar el almuerzo?',
//             text: "¡Si no lo está puede cancelar la acción!",
//             type: 'warning',
//             showCancelButton: true,
//             confirmButtonColor: '#3085d6',
//             cancelButtonColor: '#d33',
//             cancelButtonText: 'Cancelar',
//             confirmButtonText: 'Si, Asignar almuerzo!'
//         }).then(function(result) {
//             if (result.value) {
//                 // Al confirmar, establecer el estado del reloj en 1
//                 localStorage.setItem('estado_reloj_' + PensionId, 1);
//                 var timer = setCountdownTime(0, 1, 30);
//                 window.location = "index.php?ruta=pension&PensionId=" + PensionId + "&contLunch=" + cont + "&monthly=" + monthly + "&timer=" + timer;
//             }
//         });
//     });
// });

// function setCountdownTime(hours, minutes, seconds) {
//     var currentTime = new Date().getTime();
//     return currentTime + (hours * 60 * 60 * 1000) + (minutes * 60 * 1000) + (seconds * 1000);
// }

// function startCountDown(button, PensionId) {
//     var endTime = parseInt(button.attr('countdown_end_time'));
//     var count = setInterval(function() {
//         var currentTime = new Date().getTime();
//         var remainingTime = endTime - currentTime;

//         if (remainingTime <= 0) {
//             clearInterval(count);
//             // Cuando el tiempo restante llegue a cero, habilitar el botón y restablecer el estado del reloj
//             button.prop('disabled', false);
//             localStorage.setItem('estado_reloj_' + PensionId, 0);
//             location.reload(); // Recargar la página si es necesario
//         } else {
//             var hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//             var minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
//             var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

//             updateTimer(button, hours, minutes, seconds);
//         }
//     }, 1000);
// }

// function updateTimer(button, hours, minutes, seconds) {
//     var timerString = pad(hours) + ":" + pad(minutes) + ":" + pad(seconds);
//     button.html(timerString);
// }

// function pad(value) {
//     return value < 10 ? "0" + value : value;
// }