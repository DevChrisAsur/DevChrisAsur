// facturas.js
function cargarInformacionFactura(idCliente) {
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
            if (respuesta.error) {
                console.error("Error:", respuesta.error);
                alert("Error: " + respuesta.error);
            } else {
                $("#InfoFactura").text(respuesta.id_factura);
                $("#InfoFechaEmision").text(respuesta.fecha_emision);
                $("#InfoBanco").text(respuesta.bank);
                $("#InfoTitular").text(respuesta.titular);
                $("#InfoNumeroCuenta").text(respuesta.account_number);
                $("#InfoTipoCuenta").text(respuesta.account_type);
                $("#InfoMonto").text(respuesta.monto);
                $("#InfoStatusFactura").text(respuesta.status_factura);
                $("#InfoFechaLimite").text(respuesta.fecha_limite);

                // Guardar el ID en localStorage
                localStorage.setItem("idFacturaSeleccionado", respuesta.id_factura);

                // Llamar a verCuotas para actualizar la tabla
                verCuotas();
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error("Error en la solicitud AJAX:", textStatus, errorThrown);
        },
    });
}

$(document).on("click", "#btnInformacionAdicional", function () {
    var idCliente = $(this).attr("idCliente");
    if (!idCliente) {
        console.error("No se encontró idCliente en el botón.");
        return;
    }

    cargarInformacionFactura(idCliente); // Reutiliza la lógica
});


function verCuotas() {
    var idFactura = localStorage.getItem("idFacturaSeleccionado");
    if (!idFactura) {
        console.error("No se encontró idFactura en localStorage.");
        return;
    }
  
    var datos = new FormData();
    datos.append("accion", "verCuotasPorFactura");
    datos.append("idFactura", idFactura);
  
    $.ajax({
        url: "ajax/cuotas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response.error) {
                console.error("Error:", response.error);
                alert("Error: " + response.error);
            } else {
                llenarTablaCuotas(response);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error("Error en la solicitud AJAX:", textStatus, errorThrown);
        }
    });

  }
  

  function llenarTablaCuotas(cuotas) {
    const tbody = $(".table-cuotas"); // Selecciona el tbody de la tabla específica
    tbody.empty(); // Limpia el contenido anterior de la tabla

    cuotas.forEach((cuota, index) => {
        const row = `
            <tr>
                <td>${index + 1}</td>
                <td><input type="text" class="form-control text-center" value="${cuota.fecha_vencimiento}" readonly></td>
                <td><input type="text" class="form-control text-center" value="${cuota.monto}" readonly></td>
                <td><input type="text" class="form-control text-center" value="${cuota.estado_pago}" readonly></td>
                <td>
                    <button class="btn btn-warning btn-accion" data-id="${cuota.id_cuota}" data-toggle="modal" data-target="#editarCuota">
                        <i class="fa fa-pencil"></i> Acción
                    </button>
                </td>
            </tr>
        `;
        tbody.append(row); // Añadir la fila a la tabla
    });

    // Evento para abrir el modal con datos específicos
    $(".btn-accion").on("click", function() {
        const idCuota = $(this).data("id"); // Obtener el id de la cuota desde data-id
        cargarDatosModal(idCuota); // Cargar datos en el modal
    });
}


  
// Función para cargar datos en el modal
function cargarDatosModal(idCuota) {
    var datos = new FormData();
    datos.append("idCuota", idCuota);

    console.log(idCuota);
    datos.append("accion", "editar");

    $.ajax({
        url: "ajax/cuotas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            console.log("Respuesta AJAX:", respuesta);
            if (respuesta.error) {
                alert("Error: " + respuesta.error);
            } else {
                // Asignar los valores recibidos a los campos del modal
                $("#editarfechaVencimiento").val(respuesta.fecha_vencimiento);
                $("#editarEstadoPago").val(respuesta.estado_pago);
                $("#editarFechaPago").val(respuesta.fecha_pago); 
                $("#idCuota").val(idCuota); 
            }
        },
        error: function(xhr, status, error) {
            console.error("Error en la solicitud AJAX: ", status, error);
            console.log("Respuesta completa del servidor:", xhr.responseText); // Agrega esta línea
        }
        
    });
}


// Función para guardar los cambios en el modal
$("#guardarCambios").on("click", function() {
    var idCuota = $("#idCuota").val();
    var fechaVencimiento = $("#fechaVencimiento").val();
    var estadoPago = $("#estadoPago").val();
    var fechaPago = $("#fechaPago").val();

    var datos = new FormData();
    datos.append("idCuota", idCuota);
    datos.append("fecha_vencimiento", fechaVencimiento);
    datos.append("estado_pago", estadoPago);
    datos.append("fecha_pago", fechaPago);
    datos.append("accion", "editar");

    $.ajax({
        url: "ajax/cuotas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            if (respuesta.success) {
                alert(respuesta.success); // Mensaje de éxito
                $('#editarCuota').modal('hide'); // Cerrar el modal
                verCuotas(); // Refrescar la tabla de cuotas
            } else {
                alert("Error: " + respuesta.error);
            }
        },
        error: function(xhr, status, error) {
            console.error("Error en la solicitud AJAX: ", status, error);
        }
    });
});

  