$(document).on('click', '#guardarNota', function(e) {
    e.preventDefault(); // Evitar la recarga de la página

    var idCliente = window.idClienteSeleccionado;
    if (!idCliente) {
        alert("Primero debe seleccionar un cliente.");
        return;
    }

    var nuevoTituloNota = $('#nuevoTituloNota').val();
    var contenidoNota = $('#contenidoNota').val();

    var formData = new FormData();
    formData.append('idCliente', idCliente);
    formData.append('nuevoTituloNota', nuevoTituloNota);
    formData.append('contenidoNota', contenidoNota);
    formData.append("action", "crearNota");

    console.log("Datos enviados (nota):", {
        idCliente: idCliente,
        nuevoTituloNota: nuevoTituloNota,
        contenidoNota: contenidoNota,
    });

    $.ajax({
        url: 'ajax/notas.ajax.php',
        method: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta) {
            console.log(respuesta);
            
            if (respuesta.success) {
                swal({
                    type: "success",
                    title: "La nota ha sido guardada correctamente.",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function() {
                    $('#nuevoTituloNota').val('');
                    $('#contenidoNota').val('');
                });
            } else if (respuesta.error) {
                swal({
                    type: "error",
                    title: "Error",
                    text: respuesta.error,
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("Error en la solicitud AJAX:", textStatus, errorThrown);
            console.log("Respuesta completa del servidor:", jqXHR.responseText);
        }
    });
});
