  $(document).on("click","#btnInformacionAdicional",function(){
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
          console.log(respuesta);
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

            localStorage.setItem("idFacturaSeleccionado", respuesta.id_factura);

          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.error("Error en la solicitud AJAX:", textStatus, errorThrown);
        },
    });
  });