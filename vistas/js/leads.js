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

        $("#editarNombre").val(respuesta["first_name"]);
        $("#editarApellido").val(respuesta["last_name"]);
        $("#editarCorreo").val(respuesta["email"]);
        $("#editarTelefono").val(respuesta["phone"]);
        $("#idLeads").val(respuesta["id_lead"]);
      }
    });
  });

  $(document).ready(function () {
    // Al hacer clic en el botón de aprobar cliente
    $(document).on("click", ".btnAprobarCliente", function () {
      var boton = $(this);
      var idLeads = $(this).attr("idLeads"); // Obteniendo idLeads
      var idPension = boton.attr("idPension");
      var estadoPago = boton.attr("estadoActualLead"); // Estado actual del lead
  
      console.log("idLeads:", idLeads); // Revisar en consola si se muestra el idLeads
  
      // Hacer una solicitud para obtener la información del lead
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
        success: function (respuesta) {
          console.log("Resultado", respuesta); // Añade esta línea si no está ya
          // Llenar los campos del formulario
          $("#nuevoIdCliente").val(respuesta["cc"]);
          $("#nuevoNombre").val(respuesta["first_name"]);
          $("#nuevoApellido").val(respuesta["last_name"]);
          $("#nuevoEmail").val(respuesta["email"]);
          $("#nuevoTelefono").val(respuesta["phone"]);
          $("#idLeads").val(respuesta["id_lead"]);
      
          // Mostrar la modal de confirmación con los datos cargados
          $("#confirmacionModal").modal("show");
      }
      
      });
  
      // Limpiar cualquier evento previo adjunto al botón #confirmarAccion
      $("#confirmarAccion")
        .off("click")
        .on("click", function () {
          // Parte donde se aprueba o cambia el estado del cliente
          var datos = new FormData();
          datos.append("activarIdPension", idPension);
          datos.append("activarPagoPension", estadoPago);
  
          $.ajax({
            url: "ajax/leads.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {  
              // Cambiar el estado visual del botón de acuerdo con el nuevo estado
              if (estadoPago == 0) {
                boton
                  .removeClass("btn-success")
                  .addClass("btn-danger")
                  .html("Inhabilitado")
                  .attr("estadoActualLead", 1);
              } else {
                boton
                  .removeClass("btn-danger")
                  .addClass("btn-success")
                  .html("Habilitado")
                  .attr("estadoActualLead", 0);
              }
  
              // Si la página está en la ruta de usuarios, refrescarla después de la actualización
              if (window.location.href.indexOf("ruta=usuarios") !== -1) {
                window.location.reload();
              }
            },
          });
  
          // Ocultar la modal de confirmación
          $("#confirmacionModal").modal("hide");
        });
    });
  });