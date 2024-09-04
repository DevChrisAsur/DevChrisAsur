// $(".tablas").on("click", ".btnEditarCursoEstudiante", function(){

//     var idEstudianteCurso = $(this).attr("idEstudianteCurso");
//     // var idCursoCurso = $(this).attr("idCursoCurso");

//     var datos = new FormData();
//     datos.append("idEstudianteCursos", idEstudianteCurso); // Cambiamos el nombre del parámetro para que coincida con el esperado en el backend
//     // datos.append("idCursoCursos", idCursoCurso); // Agregamos el id del curso como un parámetro adicional

//     $.ajax({
//         url: "ajax/curso_estudiantes.ajax.php",
//         method: "POST",
//         data: datos,
//         cache: false,
//         contentType: false,
//         processData: false,
//         dataType: "json",
//         success: function(respuesta) {
//             console.log("respuestaCursoEstudiante", respuesta);

//             // Mapear la respuesta y asignar valores a los elementos del DOM
//             var valores = respuesta.map(function(estudiantecurso) {
//             return {
                
//                 id_student: estudiantecurso.id_student,
//                 id_grade: estudiantecurso.id_grade,

//             };
//         });

//                 // Asignamos los valores del estudiante a los elementos del DOM
//                 $("#EditarCursoEstudiante").val(valores[0].id_student);
//                 $("#cursoEstudiante").val(valores[0].id_grade);
//         }

//     });

// });

$("#EditarCursoEstudiante").change(function(){

    $(".alert").remove();

    var nombreSede = $(this).val();
    console.log("nombreSede", nombreSede);

    var datos = new FormData();
    

    datos.append("idEstudianteCursoAjax", nombreSede);

     $.ajax({
        url:"ajax/cursoEstudiante.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success:function(respuesta){
            console.log("respuesta curso_es", respuesta);
            
            if(respuesta){

                $("#EditarCursoEstudiante").parent().after('<div class="alert alert-warning">Este estudiante ya tiene  un curso asignado</div>');

                $("#EditarCursoEstudiante").val("");

            }

        }

    })
})
