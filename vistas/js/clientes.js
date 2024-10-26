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

// Al hacer clic en el botón para obtener la información del cliente
$(document).on("click", "#btnInformacionAdicional", function () {
  var idCliente = $(this).attr("idCliente"); // Recoger el ID del cliente
  if (!idCliente) {
    console.error("No se encontró idCliente en el botón.");
    return;
  }

  // Crear un FormData para pasar los datos por AJAX
  var datos = new FormData();
  datos.append("idCliente", idCliente);

  // Hacer la solicitud AJAX
  $.ajax({
    url: "ajax/clientes.ajax.php", // URL del archivo AJAX para obtener los datos del cliente
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
      } else {
        var nombreCompleto = respuesta.first_name + " " + respuesta.last_name;

        // Asignar la información del cliente a los campos correspondientes
        $("#infoIdCCliente").val(respuesta.cc);
        $("#infoNombreApellido").text(nombreCompleto);
        $("#infoEmail").text(respuesta.email);
        $("#infoTelefono").text(respuesta.phone);
        var paisCiudad =
          (respuesta.country || "Desconocido") +
          "/" +
          (respuesta.city || "Desconocida");
        $("#infoCity").text(paisCiudad);
        $("#infoIdLeads").text(respuesta.id_customer); // Este será el id_customer
        $("#infoTipoCliente").text(respuesta.customer_type);
        $("#infofecha").text(respuesta.creation_date);

        // Guardar el ID del cliente en una variable global para su uso posterior
        window.idClienteSeleccionado = respuesta.id_customer;
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.error("Error en la solicitud AJAX:", textStatus, errorThrown);
    },
  });
});

// Manejar la creación de la suscripción (Guardar Producto)
$(document).on('click', '#guardarProductoYCrearFactura', function(e) {
  e.preventDefault(); // Evitar la recarga de la página

  // Obtener el ID del cliente seleccionado
  var idCliente = window.idClienteSeleccionado;
  if (!idCliente) {
      alert("Primero debe seleccionar un cliente.");
      return;
  }

  // Obtener el servicio seleccionado
  var servicioSeleccionado = $("input[name='servicios[]']:checked").val();
  if (!servicioSeleccionado) {
      alert("Debe seleccionar un servicio.");
      return;
  }

  // Crear un FormData para pasar los datos por AJAX
  var datos = new FormData();
  datos.append("nuevoServicio", servicioSeleccionado);
  datos.append("nuevaSuscripcion", idCliente); // id_cliente como nueva suscripción
  datos.append("action", "crearSuscripcion"); // Agregar la acción para crear suscripción

  // Mostrar los datos que se van a enviar al servidor
  // console.log("Datos enviados (suscripción):", {
  //     nuevoServicio: servicioSeleccionado,
  //     nuevaSuscripcion: idCliente,
  //     action: "crearSuscripcion"
  // });

  // Hacer la solicitud AJAX para crear la suscripción
  $.ajax({
      url: "ajax/facturas.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json", // Esperamos una respuesta en formato JSON
      success: function(respuesta) {
          if (respuesta.success && respuesta.idSuscripcion) {
              var idSuscripcion = parseInt(respuesta.idSuscripcion, 10);
              window.idSuscripcionSeleccionada = idSuscripcion;

              // Ahora que la suscripción se ha creado, procedemos a crear la factura
              var facturaDatos = new FormData();
              facturaDatos.append("idCliente", idCliente);
              facturaDatos.append("idSuscripcion", idSuscripcion);
              facturaDatos.append("banco", $("#banco").val());
              facturaDatos.append("titular", $("#titular").val());
              facturaDatos.append("numeroCuenta", $("#numeroCuenta").val());
              facturaDatos.append("tipoCuenta", $("#tipoCuenta").val());
              facturaDatos.append("monto", $("#valorTotal").val());
              facturaDatos.append("fecha_limite", $("#fecha_limite").val());

              // Mostrar los datos de la factura que se van a enviar
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

              // Hacer una nueva solicitud AJAX para crear la factura
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
                    //console.log("Factura creada correctamente, ID de la factura:", idFactura);
                
                    var numCuotas = $('#numCuotas').val(); // Obtener número de cuotas
                    var montoTotal = $("#valorTotal").val(); // Obtener monto total
                
                    // Preparar los datos de las cuotas
                    var cuotasDatos = new FormData();
                    cuotasDatos.append("idFactura", idFactura); // Aquí pasamos el ID de la factura generada
                    cuotasDatos.append("numCuotas", numCuotas); // Pasar número de cuotas
                    cuotasDatos.append("montoTotal", montoTotal); // Pasar monto total
                
                    // Iterar sobre el número de cuotas
                    for (var i = 1; i <= numCuotas; i++) {
                        var estadoPago = $("#estado_pago_" + i).val();
                        var fechaVencimiento = $("#fecha_vencimiento_" + i).val();
                        var montoCuota = $("#monto_" + i).val();
                
                        // Añadir los datos de cada cuota a FormData
                        cuotasDatos.append("estado_pago_" + i, estadoPago);
                        cuotasDatos.append("fecha_vencimiento_" + i, fechaVencimiento);
                        cuotasDatos.append("monto_" + i, montoCuota);
                
                        // Mostrar los datos de cada cuota
                        console.log(`Datos enviados para la cuota ${i}:`, {
                            estado_pago: estadoPago,
                            fecha_vencimiento: fechaVencimiento,
                            monto: montoCuota,
                            idFactura: idFactura
                        });
                    }
                
                    // Hacer la solicitud AJAX para registrar las cuotas
                    $.ajax({
                        url: "ajax/facturas.ajax.php",  // Asegúrate de que esta URL esté correcta
                        method: "POST",
                        data: cuotasDatos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        success: function(respuestaCuotas) {
                            //console.log("Respuesta del servidor (cuotas):", respuestaCuotas);
                            if (respuestaCuotas.success) {
                                swal({
                                    type: "success",
                                    title: "Un nuevo producto ha sido creado",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar",
                                });
                            } else {
                                console.error("Error al registrar las cuotas.");
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error("Error en la solicitud AJAX para crear las cuotas:", textStatus, errorThrown);
                            console.log("Respuesta completa del servidor:", jqXHR.responseText);
                        }
                    });
                
                } else {
                    swal({
                        type: "error",
                        title: "¡Error al crear la factura!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                    });
                }
                
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("Error en la solicitud AJAX para crear la factura:", textStatus, errorThrown);
                    console.log("Respuesta completa del servidor:", jqXHR.responseText); // Verifica la respuesta completa
                },
            });
            
            
    
          } else {
              swal({
                  type: "error",
                  title: "¡Error al registrar la suscripción!",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar",
              });
          }
      },
      error: function(jqXHR, textStatus, errorThrown) {
          console.error("Error en la solicitud AJAX para crear la suscripción:", textStatus, errorThrown);
      },
  });
});