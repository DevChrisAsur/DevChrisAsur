$(document).on('click', '#guardarNota', function(e) {
    e.preventDefault(); // Evitar la recarga de la página

    // Obtener el ID del cliente seleccionado
    var idCliente = window.idClienteSeleccionado;
    if (!idCliente) {
        alert("Primero debe seleccionar un cliente.");
        return;
    }

    // Obtener los valores del formulario
    var nuevoTituloNota = $('#nuevoTituloNota').val();
    var contenidoNota = $('#contenidoNota').val();

    // Crear un FormData para enviar los datos
    var formData = new FormData();
    formData.append('idCliente', idCliente);
    formData.append('nuevoTituloNota', nuevoTituloNota);
    formData.append('contenidoNota', contenidoNota);
    formData.append("action", "crearNota"); // Especificar la acción para el AJAX

    console.log("Datos enviados (nota):", {
        idCliente: idCliente,
        nuevoTituloNota: nuevoTituloNota,
        contenidoNota: contenidoNota,
    });

    // Enviar los datos al archivo de procesamiento mediante AJAX
    $.ajax({
        url: 'ajax/notas.ajax.php', // Ruta del archivo PHP que procesará la solicitud
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
                    $('#tituloNota').val('');
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
