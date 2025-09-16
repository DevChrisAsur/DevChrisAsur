/*=============================================
ELIMINAR Area
=============================================*/

$(".tablas").on("click", ".btnEliminarCliente", function () {
  var idCategoria = $(this).attr("idCliente");

  swal({
    title: "¿Está seguro de eliminar este cliente?",
    text: "¡Si no lo está puede cancelar la acción!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, eliminar cliente!",
  }).then(function (result) {
    if (result.value) {
      window.location = "index.php?ruta=clientes&idCliente=" + idCategoria;
    }
  });
});


$(document).on("click", "#btnInformacionAdicional", function () {
  var idCliente = $(this).attr("idCliente");
  cargarInformacionCliente(idCliente);
});

// Al hacer clic en el botón para obtener la información del cliente
// $(document).on("click", "#btnInformacionAdicional", function () {
//   var idCliente = $(this).attr("idCliente"); // Recoger el ID del cliente
//   if (!idCliente) {
//     console.error("No se encontró idCliente en el botón.");
//     return;
//   }

//   // Crear un FormData para pasar los datos por AJAX
//   var datos = new FormData();
//   datos.append("idCliente", idCliente);

//   // Hacer la solicitud AJAX
//   $.ajax({
//     url: "ajax/clientes.ajax.php", // URL del archivo AJAX para obtener los datos del cliente
//     method: "POST",
//     data: datos,
//     cache: false,
//     contentType: false,
//     processData: false,
//     dataType: "json",
//     success: function (respuesta) {
//       if (respuesta.error) {
//         console.error("Error:", respuesta.error);
//         alert("Error: " + respuesta.error);
//       } else {
//         var nombreCompleto = respuesta.first_name + " " + respuesta.last_name;

//         // Asignar la información del cliente a los campos correspondientes
//         $("#infoIdCCliente").val(respuesta.cc);
//         $("#infoNombreApellido").text(nombreCompleto);
//         $("#infoEmail").text(respuesta.email);
//         $("#infoTelefono").text(respuesta.phone);
//         var paisCiudad =
//           (respuesta.country || "Desconocido") +
//           "/" +
//           (respuesta.city || "Desconocida");
//         $("#infoCity").text(paisCiudad);
//         $("#infoIdLeads").text(respuesta.id_customer);
//         $("#infoTipoCliente").text(respuesta.customer_type);
//         $("#infofecha").text(respuesta.creation_date);

//         // Guardar el ID del cliente en una variable global para su uso posterior
//         window.idClienteSeleccionado = respuesta.id_customer;
//       }
//     },
//     error: function (jqXHR, textStatus, errorThrown) {
//       console.error("Error en la solicitud AJAX:", textStatus, errorThrown);
//     },
//   });
// });

// Manejar la creación de la suscripción (Guardar Producto)
$(document).on('click', '#guardarProductoYCrearFactura', function(e) {
  e.preventDefault();

  var $btn = $(this); // referencia al botón
  $btn.prop("disabled", true).text("Procesando..."); // Bloquear botón

  var idCliente = window.idClienteSeleccionado;
  if (!idCliente) {
      alert("Primero debe seleccionar un cliente.");
      $btn.prop("disabled", false).text("Guardar producto y crear factura"); // Rehabilitar si falla
      return;
  }

  var servicioSeleccionado = $("input[name='servicios[]']:checked").val();
  if (!servicioSeleccionado) {
      alert("Debe seleccionar un servicio.");
      $btn.prop("disabled", false).text("Guardar producto y crear factura");
      return;
  }

  var datos = new FormData();
  datos.append("nuevoServicio", servicioSeleccionado);
  datos.append("nuevaSuscripcion", idCliente);
  datos.append("action", "crearSuscripcion");
  // console.log("Datos enviados (suscripción):", {
  //     nuevoServicio: servicioSeleccionado,
  //     nuevaSuscripcion: idCliente,
  //     action: "crearSuscripcion"
  // });
  $.ajax({
      url: "ajax/facturas.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta) {
          if (respuesta.success && respuesta.idSuscripcion) {
              var idSuscripcion = parseInt(respuesta.idSuscripcion, 10);
              window.idSuscripcionSeleccionada = idSuscripcion;

              var facturaDatos = new FormData();
              facturaDatos.append("idCliente", idCliente);
              facturaDatos.append("idSuscripcion", idSuscripcion);
              facturaDatos.append("banco", $("#banco").val());
              facturaDatos.append("titular", $("#titular").val());
              facturaDatos.append("numeroCuenta", $("#numeroCuenta").val());
              facturaDatos.append("tipoCuenta", $("#tipoCuenta").val());
              facturaDatos.append("monto", $("#valorTotal").val());
              facturaDatos.append("fecha_limite", $("#fecha_limite").val());
              facturaDatos.append("action", "crearFactura"); 
              // console.log("Datos enviados (factura):", {
              //     idCliente: idCliente,
              //     idSuscripcion: idSuscripcion,
              //     banco: $("#banco").val(),
              //     titular: $("#titular").val(),
              //     numeroCuenta: $("#numeroCuenta").val(),
              //     tipoCuenta: $("#tipoCuenta").val(),
              //     monto: $("#valorTotal").val(),
              //     fecha_limite: $("#fecha_limite").val()
              // });
              $.ajax({
                url: "ajax/facturas.ajax.php",
                method: "POST",
                data: facturaDatos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(respuestaFactura) {
                  if (respuestaFactura.success && respuestaFactura.idFactura) {
                    var idFactura = parseInt(respuestaFactura.idFactura, 10);
                    var numCuotas = $('#numCuotas').val();
                    var montoTotal = $("#valorTotal").val();
                    
                    var cuotasDatos = new FormData();
                    cuotasDatos.append("idFactura", idFactura);
                    cuotasDatos.append("numCuotas", numCuotas);
                    cuotasDatos.append("montoTotal", montoTotal);
                    cuotasDatos.append("action", "crearCuotas");

                    for (var i = 1; i <= numCuotas; i++) {
                        cuotasDatos.append("estado_pago_" + i, $("#estado_pago_" + i).val());
                        cuotasDatos.append("fecha_vencimiento_" + i, $("#fecha_vencimiento_" + i).val());
                        cuotasDatos.append("monto_" + i, $("#monto_" + i).val());              
                        // console.log(`Datos enviados para la cuota ${i}:`, {
                        //     estado_pago: estadoPago,
                        //     fecha_vencimiento: fechaVencimiento,
                        //     monto: montoCuota,
                        //     idFactura: idFactura
                        // });
                    }
              
                    $.ajax({
                        url: "ajax/facturas.ajax.php",
                        method: "POST",
                        data: cuotasDatos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        success: function(respuestaCuotas) {
                            if (respuestaCuotas.success) {
                                swal({
                                    type: "success",
                                    title: "Un nuevo producto ha sido creado",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar",
                                });

                                cargarInformacionFinanciera(idCliente);

                                // <<< NUEVO: cerrar el formulario al terminar
                                $("#formularioContainer").hide();
                                $("#toggleFormulario").text("Agregar nuevo Producto");
                            } else {
                                console.error("Error al registrar las cuotas.");
                                $btn.prop("disabled", false).text("Guardar producto y crear factura");
                            }
                        },
                        error: function() {
                            $btn.prop("disabled", false).text("Guardar producto y crear factura");
                        }
                    });
                
                } else {
                    swal({
                        type: "error",
                        title: "¡Error al crear la factura!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                    });
                    $btn.prop("disabled", false).text("Guardar producto y crear factura");
                }
                },
                error: function() {
                    $btn.prop("disabled", false).text("Guardar producto y crear factura");
                },
            });
          } else {
              swal({
                  type: "error",
                  title: "¡Error al registrar la suscripción!",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar",
              });
              $btn.prop("disabled", false).text("Guardar producto y crear factura");
          }
      },
      error: function() {
          $btn.prop("disabled", false).text("Guardar producto y crear factura");
      },
  });
});

// =============================================
//  Recalcular cuotas
// =============================================
function recalcularCuotas() { // <<< NUEVO
    var numCuotas = parseInt($("#numCuotas").val(), 10) || 0;
    var montoTotal = parseFloat($("#valorTotal").val()) || 0;

    if (numCuotas > 0 && montoTotal > 0) {
        var montoPorCuota = (montoTotal / numCuotas).toFixed(2);

        for (var i = 1; i <= numCuotas; i++) {
            $("#monto_" + i).val(montoPorCuota);
        }
    }
}

// Escuchar cambios en valorTotal y numCuotas
$(document).on("input change", "#valorTotal, #numCuotas", function () { // <<< NUEVO
    recalcularCuotas();
}); 

// =============================================
//  Ajustar cuotas según la primera cuota
// =============================================
$(document).on("input change", "#monto_1", function () {
    var numCuotas = parseInt($("#numCuotas").val(), 10) || 0;
    var montoTotal = parseFloat($("#valorTotal").val()) || 0;
    var montoPrimera = parseFloat($("#monto_1").val()) || 0;

    if (numCuotas > 1 && montoTotal > 0) {
        var restante = montoTotal - montoPrimera;

        // Si la primera cuota es mayor o igual al total, limitamos
        if (montoPrimera >= montoTotal) {
            alert("La primera cuota no puede ser igual o mayor al total de la factura.");
            $("#monto_1").val((montoTotal - 1).toFixed(2)); // un peso menos como límite
            restante = 1; // deja al menos algo para las demás
        }

        var montoPorCuota = (restante / (numCuotas - 1)).toFixed(2);

        // Asignar a las demás cuotas, siempre más bajas que el total
        for (var i = 2; i <= numCuotas; i++) {
            if (montoPorCuota >= montoTotal) {
                montoPorCuota = (montoTotal - 1).toFixed(2);
            }
            $("#monto_" + i).val(montoPorCuota);
        }

        // Ajustar la última cuota para cuadrar con el total exacto
        var sumaParcial = montoPrimera;
        for (var i = 2; i < numCuotas; i++) {
            sumaParcial += parseFloat($("#monto_" + i).val());
        }
        var ultimaCuota = (montoTotal - sumaParcial).toFixed(2);
        $("#monto_" + numCuotas).val(ultimaCuota);
    }
});


function cargarInformacionFinanciera(idCliente) {
    var datos = new FormData();
    datos.append("idCliente", idCliente);

    $.ajax({
        url: "ajax/facturas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            if (respuesta && respuesta.id_factura) {
                $("#InfoFactura").text(respuesta.id_factura);
                $("#InfoFechaEmision").text(respuesta.fecha_emision);
                $("#InfoBanco").text(respuesta.bank);
                $("#InfoTitular").text(respuesta.titular);
                $("#InfoNumeroCuenta").text(respuesta.account_number);
                $("#InfoTipoCuenta").text(respuesta.account_type);
                $("#InfoMonto").text(respuesta.monto);
                $("#InfoStatusFactura").text(respuesta.status_factura);
                $("#InfoFechaLimite").text(respuesta.fecha_limite);

                $("#InfoFactura").text(respuesta.id_factura);
                localStorage.setItem("idFacturaSeleccionado", respuesta.id_factura);

                verCuotas();
            } else {
                limpiarCamposFinancieros(); // <<< Nueva función para limpiar
                console.warn("No hay datos financieros disponibles para este cliente.");
                localStorage.removeItem("idFacturaSeleccionado"); // 👈 IMPORTANTE
                limpiarTablaCuotas();
            }
        },
        error: function (xhr, status, error) {
            limpiarCamposFinancieros(); // <<< También limpiar en caso de error
            console.error("Error en cargarInformacionFinanciera:", error);
        }
    });
}

function limpiarCamposFinancieros() {
    $("#InfoFactura").text("-");
    $("#InfoFechaEmision").text("-");
    $("#InfoBanco").text("-");
    $("#InfoTitular").text("-");
    $("#InfoNumeroCuenta").text("-");
    $("#InfoTipoCuenta").text("-");
    $("#InfoMonto").text("-");
    $("#InfoStatusFactura").text("-");
    $("#InfoFechaLimite").text("-");
}

function limpiarTablaCuotas() {
    const tbody = $(".table-cuotas");
    tbody.empty();
}


$(document).ready(function () {
  $('.card-button').on('click', function () {
    const accion = $(this).data('accion');
    const tipo = $(this).data('tipo');

    $('#modalDetalle .modal-title').text('Clientes en ' + tipo);
    $('#modalDetalle .modal-body').html('<p>Cargando detalles...</p>');
    $('#modalDetalle').modal('show');

    $.ajax({
      url: 'ajax/cuotas.ajax.php',
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
                  <th>cliente</th>
                  <th>cc</th>
                  <th>estado de pago</th>                
                  <th>fecha limite de pago</th>
                  <th>valor de pago</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
          `;

          respuesta.data.forEach((fila, index) => {
            tabla += `
              <tr>
                <td>${index + 1}</td>
                <td>${fila.first_name} ${fila.last_name}</td>
                <td>${fila.cc}</td>
                <td>${fila.estado_pago}</td>                
                <td>${fila.fecha_vencimiento}</td>
                <td>$${parseFloat(fila.valor_cuota_actual).toLocaleString('es-CO')}</td>
                <td>
                  <button class="btn btn-info btn-sm btn-ver-cliente" data-id="${fila.id_customer}">
                    Ver
                  </button>
                </td>
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

          // Evento para redirigir
          $('#tabla-detalles').on('click', '.btn-ver-cliente', function () {
            const idCliente = $(this).data('id');
            window.location.href = 'clientes?id=' + idCliente;
          });

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
$(document).ready(function () {
  // Si la URL tiene ?id=... cargar automáticamente la info
  const params = new URLSearchParams(window.location.search);
  if (params.has('id')) {
    const idCliente = params.get('id');
    cargarInformacionCliente(idCliente);
  }
});


function cargarInformacionCliente(idCliente) {
  if (!idCliente) {
    console.error("No se proporcionó un idCliente válido.");
    return;
  }

  var datos = new FormData();
  datos.append("idCliente", idCliente);

  $.ajax({
    url: "ajax/clientes.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      if (respuesta.error) {
        console.error("Error:", respuesta.error);
        alert("Error: " + respuesta.error);
        return;
      }

      var nombreCompleto = respuesta.first_name + " " + respuesta.last_name;

      $("#infoIdCCliente").val(respuesta.cc);
      $("#infoNombreApellido").text(nombreCompleto);
      $("#infoEmail").text(respuesta.email);
      $("#infoTelefono").text(respuesta.phone);

      var paisCiudad =
        (respuesta.country || "Desconocido") +
        "/" +
        (respuesta.city || "Desconocida");
      $("#infoCity").text(paisCiudad);
      $("#infoIdLeads").text(respuesta.id_customer);
      $("#infoTipoCliente").text(respuesta.customer_type);
      $("#infofecha").text(respuesta.creation_date);

      // Guardar el ID para otros procesos
      window.idClienteSeleccionado = respuesta.id_customer;
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.error("Error en la solicitud AJAX:", textStatus, errorThrown);
    }
  });
}
