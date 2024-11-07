$(document).on('click', '#guardarNota', function(e) {
    e.preventDefault(); 

    // Verificar si se ha seleccionado un cliente
    var idCliente = window.idClienteSeleccionado;
    if (!idCliente) {
        alert("Primero debe seleccionar un cliente.");
        return;
    }

    // Recoger los datos del formulario
    var nuevoTituloNota = $('#nuevoTituloNota').val();
    var contenidoNota = $('#contenidoNota').val();
    var archivoNota = $('#archivoNota')[0].files[0]; // Asegurarse de que este ID coincide con el HTML

    // Crear el FormData para enviar los datos
    var formData = new FormData();
    formData.append('idCliente', idCliente);
    formData.append('nuevoTituloNota', nuevoTituloNota);
    formData.append('contenidoNota', contenidoNota);

    // Agregar el archivo solo si está seleccionado
    if (archivoNota) {
        formData.append('archivoNota', archivoNota);
    }

    console.log("Datos enviados (nota):", {
        idCliente: idCliente,
        nuevoTituloNota: nuevoTituloNota,
        contenidoNota: contenidoNota,
        archivoNota: archivoNota ? archivoNota.name : "No se seleccionó archivo"
    });

    // Hacer la solicitud AJAX
    $.ajax({
        url: 'ajax/notas.ajax.php',
        method: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta) {
            console.log("Respuesta del servidor:", respuesta);
            
            if (respuesta.success) {
                swal({
                    icon: "success",
                    title: "La nota ha sido guardada correctamente.",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function() {
                    $('#nuevoTituloNota').val('');
                    $('#contenidoNota').val('');
                    $('#archivoNota').val(''); // Limpiar el campo de archivo
                    // Puedes agregar cualquier acción adicional aquí después de limpiar el formulario
                });
            } else if (respuesta.error) {
                swal({
                    icon: "error",
                    title: "Error",
                    text: respuesta.error,
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                });
                console.error("Error en la respuesta del servidor:", respuesta.error);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("Error en la solicitud AJAX:", textStatus, errorThrown);
            console.log("Respuesta completa del servidor:", jqXHR.responseText);
        }
    });
});