$(".tablas").on("click", ".btnEliminarLead", function(){

    var idCategoria = $(this).attr("idLeads");

    swal({
        title: '¿Está seguro de eliminar este cliente lead?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Curso!'
    }).then(function(result){

        if(result.value){

            window.location = "index.php?ruta=leads&idLeads="+idCategoria;

        }

    })

})

$(".tablas").on("click", ".btnEditarLead", function(){
    var idLeads = $(this).attr("idLeads"); // Verifica que idLeads esté obteniendo el valor correcto
    console.log("idLeads:", idLeads); // Revisa en la consola si se muestra el idLeads
  
    var datos = new FormData();
    datos.append("idLeads", idLeads);
  
    $.ajax({
      url: "ajax/leads.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta){
        console.log("respuesta es", respuesta);
  
        $("#editarNombre").val(respuesta["first_name"]);
        $("#editarApellido").val(respuesta["last_name"]);
        $("#editarCorreo").val(respuesta["email"]);
        $("#editarTelefono").val(respuesta["phone"]);
        $("#idLeads").val(respuesta["id_lead"]);
      }
    });
  });
  
