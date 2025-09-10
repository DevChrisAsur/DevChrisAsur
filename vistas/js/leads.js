$(".tablas").on("click", ".btnEliminarLead", function () {
  var idCategoria = $(this).attr("idLeads");

  swal({
    title: "¿Está seguro de eliminar este cliente lead?",
    text: "¡Si no lo está puede cancelar la acción!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, eliminar Lead!",
  }).then(function (result) {
    if (result.value) {
      window.location = "index.php?ruta=leads&idLeads=" + idCategoria;
    }
  });
});

$(".tablas").on("click", ".btnEditarLead", function () {
  var idLeads = $(this).attr("idLeads");
  console.log("idLeads:", idLeads);
  if (!idLeads) {
    console.error("No se encontró idLeads en el botón.");
    return;
  }

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
      console.log("respuesta",respuesta);

      if (respuesta.error) {
        console.error("Error:", respuesta.error);
        alert("Error: " + respuesta.error);
      } else {
        $("#idLeads").val(respuesta["id_lead"]);
        $("#editarNombre").val(respuesta["first_name"]);
        $("#editarApellido").val(respuesta["last_name"]);
        $("#editarCorreo").val(respuesta["email"]);
        $("#editarTelefono").val(respuesta["phone"]);
        $("#reasignarAsesor").val(respuesta["id_usuario"]);
      }
    },
    error: function (xhr, status, error) {
      //console.error("Error en la solicitud AJAX: ", status, error);
    },
  });
});

$(document).ready(function () {
  // Evento para botones de cambio de estado de leads
  $(document).on("click", ".btnCambiarEstadoLead", function () {
    var boton = $(this);
    var idLead = boton.attr("idLead");
    var estadoActualLead = boton.attr("estadoActualLead");

    // Guardar el id en el tab2 para poder usarlo luego
    $("#tab2 a").attr("idLeads", idLead);

    // Mostrar modal de confirmación (si lo usas)
    $("#confirmacionModal").modal("show");

    $("#confirmarAccion").off("click").on("click", function () {
      // Paso 1: Mostrar alerta y dirigir al tab2 al confirmar
      Swal.fire({
        icon: "info",
        title: "Completar información",
        text: "Por favor completa el registro del cliente en la siguiente pestaña",
        confirmButtonText: "Continuar",
        showCancelButton: true,
        cancelButtonText: "Cancelar"
      }).then((result) => {
        if (result.isConfirmed) {
          // Paso 2: Cambiar a tab2 visualmente
          document.querySelectorAll(".tab-content").forEach((content) => {
            content.style.display = "none";
          });
          document.querySelector("#tab2 .tab-content").style.display = "block";

          // Paso 3: Disparar manualmente el evento click de #tab2 a para que haga el AJAX
          $("#tab2 a").trigger("click");

          // Paso 4: Hacer el cambio de estado de lead a cliente vía AJAX
          var datos = new FormData();
          datos.append("activarIdLead", idLead);
          datos.append("activarEstadoLead", estadoActualLead);

          $.ajax({
            url: "ajax/leads.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
              if (estadoActualLead == 0) {
                boton.removeClass('btn-success')
                     .addClass('btn-info')
                     .html('Lead')
                     .attr('estadoActualLead', 1);
              } else {
                boton.removeClass('btn-info')
                     .addClass('btn-success')
                     .html('Cliente')
                     .attr('estadoActualLead', 0);
              }

              if (window.location.href.indexOf("ruta=leads") !== -1) {
                window.location.reload();
              }
            },
            error: function (xhr, status, error) {
              console.error("Error en la solicitud AJAX: ", status, error);
            }
          });
        }
      });
    });
  });

  // Evento para cargar datos del lead cuando se abra tab2
  $(document).on('click', '#tab2 a', function() {
    var idLeads = $(this).attr("idLeads");
    if (!idLeads) return;

    var datos = new FormData();
    datos.append("idLeads", idLeads);

    $.ajax({
      url: "ajax/leads.ajax.php",
      method: 'POST',
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function(respuesta) {
        if (respuesta.error) {
          alert("Error: " + respuesta.error);
        } else {
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
  $(".card-button").on("click", function () {
    const accion = $(this).data("accion");
    const tipo = $(this).data("tipo");

    $("#modalDetalle .modal-title").text("Clientes en " + tipo);
    $("#modalDetalle .modal-body").html("<p>Cargando detalles...</p>");
    $("#modalDetalle").modal("show");

    $.ajax({
      url: "ajax/leads.ajax.php",
      method: "POST",
      data: { accion: accion },
      dataType: "json",
      success: function (respuesta) {
        console.log(respuesta);
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

          $("#modalDetalle .modal-body").html(tabla);

          // Inicializar DataTables si está disponible
          if ($.fn.DataTable) {
            $("#tabla-detalles").DataTable({
              language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-CO.json",
              },
            });
          }
        } else {
          $("#modalDetalle .modal-body").html(
            "<p>No se encontraron datos para mostrar.</p>"
          );
        }
      },
      error: function () {
        $("#modalDetalle .modal-body").html(
          "<p>Error al cargar los datos del servidor.</p>"
        );
      },
    });
  });
});
