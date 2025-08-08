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

    // console.log("Datos enviados (nota):", {
    //     idCliente: idCliente,
    //     nuevoTituloNota: nuevoTituloNota,
    //     contenidoNota: contenidoNota,
    //     archivoNota: archivoNota ? archivoNota.name : "No se seleccionó archivo"
    // });

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
            //console.log("Respuesta del servidor:", respuesta);
            
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
                    cargarNotasCliente(idCliente);
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

function cargarNotasCliente(idCliente) {
    $.ajax({
        url: 'ajax/notas.ajax.php',
        method: 'POST',
        data: { accion: 'mostrarNotas', idCliente: idCliente },
        dataType: 'json',
        success: function(respuesta) {
            console.log(respuesta);
            renderizarNotasEnCards(respuesta); // ✅ Aquí se usan los estilos bonitos
        },
        error: function(xhr, status, error) {
            console.error("Error al cargar notas:", error);
        }
    });
}


function renderizarNotasEnCards(notas) {
    const contenedor = $('#contenedorNotas');
    contenedor.empty(); // Limpiar contenido anterior SIEMPRE

    if (!notas || notas.length === 0) {
        // Mostrar mensaje y salir
        contenedor.html('<p class="text-muted">No hay notas registradas para este cliente.</p>');
        return;
    }

    // Renderizar nuevas notas
    notas.forEach(nota => {
        const card = `
            <div class="nota-card">
                <div class="nota-header">
                    <h3 class="nota-titulo">${nota.titulo}</h3>
                    <span class="nota-usuario">Usuario #${nota.id_usuario}</span>
                </div>
                <div class="nota-body">
                    ${nota.contenido}
                </div>
                <div class="nota-footer">
                    <span class="nota-fecha">${formatearFecha(nota.fecha_creacion)}</span>
                    ${
                        nota.nombre_archivo 
                            ? `<a class="nota-archivo" href="uploads/notas/${nota.nombre_archivo}" target="_blank">Ver archivo</a>`
                            : `<span class="text-muted">Sin archivo</span>`
                    }
                </div>
            </div>
        `;

        contenedor.append(card);
    });
}



function formatearFecha(fecha) {
    const f = new Date(fecha);
    const dia = String(f.getDate()).padStart(2, '0');
    const mes = String(f.getMonth() + 1).padStart(2, '0');
    const año = f.getFullYear();
    return `${dia}/${mes}/${año}`;
}


