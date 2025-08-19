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
        confirmButtonText: 'Si, eliminar Lead!'
    }).then(function(result){

        if(result.value){

            window.location = "index.php?ruta=leads&idLeads="+idCategoria;

        }

    })

})

$(".tablas").on("click", ".btnEditarLead", function() {
    // Obtener el valor de idLeads
    var idLeads = $(this).attr("idLeads");
    //console.log("idLeads:", idLeads); // Verificar si se captura correctamente

    if (!idLeads) {
        //console.error("No se encontró idLeads en el botón.");
        return;
    }

    // Crear un FormData para pasar los datos por AJAX
    var datos = new FormData();
    datos.append("idLeads", idLeads);

    // Llamada AJAX
    $.ajax({
        url: "ajax/leads.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            // Verificar si la respuesta tiene un error
            if (respuesta.error) {
                //console.error("Error:", respuesta.error);
                alert("Error: " + respuesta.error); // Muestra un mensaje si ocurre un error
            } else {
                // Si no hay error, proceder con los datos del lead
                $("#editarNombre").val(respuesta["first_name"]);
                $("#editarApellido").val(respuesta["last_name"]);
                $("#editarCorreo").val(respuesta["email"]);
                $("#editarTelefono").val(respuesta["phone"]);
                $("#idLeads").val(respuesta["id_lead"]);
            }
        },
        error: function(xhr, status, error) {
            //console.error("Error en la solicitud AJAX: ", status, error);
        }
    });
});


  $(document).ready(function() {
    // Adjuntamos el evento click usando delegación para los botones de cambio de estado de pago de leads
    $(document).on('click', '.btnCambiarEstadoLead', function() {
        var boton = $(this);
        console.log("Se ha clicado en el botón para cambiar el estado del lead"); // Depuración
        
        var idLead = boton.attr("idLead"); 
        var estadoActualLead = boton.attr("estadoActualLead"); 

        // Mostrar la modal de confirmación
        $("#confirmacionModal").modal('show');

         // Asignar el idLead al atributo idLeads en el tab2
        $('#tab2 a').attr('idLeads', idLead); // Esto asegura que el idLeads sea correcto para el tab "Cliente"
    
        // Limpiar cualquier evento previo adjunto al botón #confirmarAccion
        $("#confirmarAccion").off('click').on('click', function() {
            var datos = new FormData();
            datos.append("activarIdLead", idLead); // Cambié activarIdPension a activarIdLead
            datos.append("activarEstadoLead", estadoActualLead); // Cambié activarPagoPension a activarEstadoLead

            // Realizamos la solicitud AJAX para cambiar el estado del lead
            $.ajax({
                url: "ajax/leads.ajax.php", // Ruta del archivo que procesa la solicitud en el servidor
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(respuesta) {
                    //console.log("respuesta es", respuesta);
                    if (estadoActualLead == 0) {
                        boton.removeClass('btn-success').addClass('btn-info').html('Lead').attr('estadoActualLead', 1);
                    } else {
                        boton.removeClass('btn-info').addClass('btn-success').html('Cliente').attr('estadoActualLead', 0);
                    }

                    // Refrescar la página después de la actualización
                    if (window.location.href.indexOf("ruta=leads") !== -1) {
                        window.location.reload();
                    }
                },
                error: function(xhr, status, error) {
                    //console.error("Error en la solicitud AJAX: ", status, error);
                }
            });

        });
    });
});

$(document).on('click', '#tab2 a', function() {
    //console.log("Se ha clicado en el botón para cambiar el estado del lead"); // Depuración

    var idLeads = $(this).attr("idLeads"); // Aquí recogemos el atributo idLeads
    //console.log("idLeads:", idLeads); // Depuración

    if (!idLeads) {
        //console.error("No se encontró idLeads en el botón.");
        return;
    }

    // Crear un FormData para pasar los datos por AJAX
    var datos = new FormData();
    datos.append("idLeads", idLeads); // Asegúrate de usar idLeads aquí

    // Hacer la solicitud AJAX
    $.ajax({
        url: "ajax/leads.ajax.php",
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta) {
            console.log(respuesta);
            // Si hay un error en la respuesta, mostrarlo
            if (respuesta.error) {
                //console.error("Error:", respuesta.error);
                alert("Error: " + respuesta.error); // Muestra un mensaje si ocurre un error
            } else {
                // Rellenar los campos del formulario con los datos obtenidos del lead
                $('#nuevoIdCliente').val(respuesta.cc);
                $('#nuevoNombre').val(respuesta.first_name);
                $('#nuevoApellido').val(respuesta.last_name);
                $('#nuevoEmail').val(respuesta.email);
                $('#nuevoTelefono').val(respuesta.phone);
                $("#idLeads").val(respuesta.id_lead);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
        }
    });
});

$(document).on('submit', '#formularioCliente', function(e) {
    e.preventDefault(); // Evita que el formulario se envíe de forma predeterminada

    // Obtén los valores de los campos del formulario
    var idLeads = $("#idLeads").val();
    var nuevoIdCliente = $("#nuevoIdCliente").val();
    var nuevoNombre = $("#nuevoNombre").val();
    var nuevoApellido = $("#nuevoApellido").val();
    var nuevoTipoCliente = $("#tipoCliente").val();
    var nuevoEmpleado = $("#numEmpleadosContainer input").val();
    var nuevoAnosExperiencia = $("#AniosContainer input").val();
    var nuevoEmail = $("#nuevoEmail").val();
    var nuevoTelefono = $("#nuevoTelefono").val();
    var nuevoPais = $("#countryValue").val();
    var nuevoEstado = $("#stateValue").val();
    var nuevoCiudad = $("#cityValue").val();

    // Crear un FormData con los datos del formulario
    var datos = new FormData();
    datos.append("idLeads", idLeads);
    datos.append("nuevoIdCliente", nuevoIdCliente);
    datos.append("nuevoNombre", nuevoNombre);
    datos.append("nuevoApellido", nuevoApellido);
    datos.append("nuevoTipoCliente", nuevoTipoCliente);
    datos.append("nuevoEmpleado", nuevoEmpleado);
    datos.append("nuevoAnosExperiencia", nuevoAnosExperiencia);
    datos.append("nuevoEmail", nuevoEmail);
    datos.append("nuevoTelefono", nuevoTelefono);
    datos.append("nuevoPais", nuevoPais);
    datos.append("nuevoEstado", nuevoEstado);
    datos.append("nuevoCiudad", nuevoCiudad);
    datos.append("action", 'crearCliente');

    // Mostrar los datos en el console log
    console.log("Datos enviados:", {
        idLeads: idLeads,
        nuevoIdCliente: nuevoIdCliente,
        nuevoNombre: nuevoNombre,
        nuevoApellido: nuevoApellido,
        nuevoTipoCliente: nuevoTipoCliente,
        nuevoEmpleado: nuevoEmpleado,
        nuevoAnosExperiencia: nuevoAnosExperiencia,
        nuevoEmail: nuevoEmail,
        nuevoTelefono: nuevoTelefono,
        nuevoPais: nuevoPais,
        nuevoEstado: nuevoEstado,
        nuevoCiudad: nuevoCiudad,
        action: 'crearCliente'
    });

    // Realizar la solicitud AJAX para enviar los datos al servidor
    $.ajax({
        url: "ajax/clientes.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            try {
                const jsonResponse = typeof respuesta === 'string' ? JSON.parse(respuesta) : respuesta;
                console.log("Respuesta del servidor:", jsonResponse);
                if (jsonResponse.success) {
                    Swal.fire({
                        icon: "success",
                        title: jsonResponse.mensaje,
                        confirmButtonText: "Cerrar",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "clientes";
                        }
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: jsonResponse.mensaje,
                        confirmButtonText: "Cerrar",
                    });
                }
            } catch (error) {
                console.error("La respuesta no es JSON válido:", error);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Swal.fire({
                icon: "error",
                title: "Error en la solicitud",
                text: "Hubo un problema al comunicar con el servidor: " + textStatus,
                confirmButtonText: "Cerrar"
            });
        }
    });
    
});

$(document).ready(function () {
  $('.card-button').on('click', function () {
    const accion = $(this).data('accion');
    const tipo = $(this).data('tipo');

    $('#modalDetalle .modal-title').text('Clientes en ' + tipo);
    $('#modalDetalle .modal-body').html('<p>Cargando detalles...</p>');
    $('#modalDetalle').modal('show');

    $.ajax({
      url: 'ajax/leads.ajax.php',
      method: 'POST',
      data: { accion: accion },
      dataType: 'json',
      success: function (respuesta) {
        console.log(respuesta)
        if (respuesta.success && Array.isArray(respuesta.data)) {
          let tabla = `
            <table id="tabla-detalles" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>nombre</th>
                  <th>apellido</th>
                  <th>sector</th>                
                  <th>email</th>
                  <th>telefono</th>
                </tr>
              </thead>
              <tbody>
          `;

          respuesta.data.forEach((fila, index) => {
            tabla += `
              <tr>
                <td>${index + 1}</td>
                <td>${fila.first_name}</td> 
                <td>${fila.last_name}</td> 
                <td>${fila.sector}</td>
                <td>${fila.email}</td>                
                <td>${fila.phone}</td>
              </tr>
            `;
          });

          tabla += `
              </tbody>
            </table>
            <p class="text-right text-muted mt-3"><small>Rango: ${respuesta.rango_fecha}</small></p>
          `;

          $('#modalDetalle .modal-body').html(tabla);

          // Inicializar DataTables si está disponible
          if ($.fn.DataTable) {
            $('#tabla-detalles').DataTable({
              language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-CO.json'
              }
            });
          }
        } else {
          $('#modalDetalle .modal-body').html('<p>No se encontraron datos para mostrar.</p>');
        }
      },
      error: function () {
        $('#modalDetalle .modal-body').html('<p>Error al cargar los datos del servidor.</p>');
      }
    });
  });
});