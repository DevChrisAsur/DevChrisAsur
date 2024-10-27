// facturas.js
$(document).on("click", "#btnInformacionAdicional", function () {
  var idCliente = $(this).attr("idCliente"); // Recoger el ID del cliente
  if (!idCliente) {
      console.error("No se encontró idCliente en el botón.");
      return;
  }

  // Crear un FormData para pasar los datos por AJAX
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

              // Guardar el ID de la factura en localStorage
              localStorage.setItem("idFacturaSeleccionado", respuesta.id_factura);

              // Llamar a la función para obtener las cuotas
              verCuotas();
          }
      },
      error: function (jqXHR, textStatus, errorThrown) {
          console.error("Error en la solicitud AJAX:", textStatus, errorThrown);
      },
  });
});

function verCuotas() {
  var idFactura = localStorage.getItem("idFacturaSeleccionado");
  if (!idFactura) {
      console.error("No se encontró idFactura en localStorage.");
      return;
  }

  // Crear un FormData para pasar los datos por AJAX
  var datos = new FormData();
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
          </tr>
      `;
      tbody.append(row); // Añadir la fila a la tabla
  });
}


