// Cuando se da clic en el botón de agregar nota al lead
$(document).on('click', '.btnAgregarNotaLead', function () {
    var idLead = $(this).attr("idLeads"); // capturamos el valor del atributo
    window.idLeadSeleccionado = idLead;   // lo guardamos en variable global
    console.log("Lead seleccionado:", idLead);

    // además llenamos el hidden en el modal
    $("#idLead").val(idLead);

    // opcional: cargar las notas de este lead inmediatamente al abrir el modal
    cargarNotasLead(idLead);
});


$(document).on('click', '#guardarNota', function(e) {
    e.preventDefault(); 

    // Verificar si hay cliente o lead seleccionado
    var idCliente = window.idClienteSeleccionado || null;
    var idLeads = window.idLeadSeleccionado || null;

    console.log(idLeads);

    if (!idCliente && !idLeads) {
        alert("Primero debe seleccionar un cliente o un lead.");
        return;
    }

    // Recoger los datos del formulario
    var nuevoTituloNota = $('#nuevoTituloNota').val();
    var contenidoNota = $('#contenidoNota').val();
    var archivoNota = $('#archivoNota')[0].files[0];

    // Crear el FormData
    var formData = new FormData();
    
    if (idCliente) {
        formData.append('idCliente', idCliente);
    } else if (idLeads) {
        formData.append('idLeads', idLeads);
    }

    formData.append('nuevoTituloNota', nuevoTituloNota);
    formData.append('contenidoNota', contenidoNota);

    // Agregar archivo solo si se seleccionó
    if (archivoNota) {
        formData.append('archivoNota', archivoNota);
    }

    // Enviar AJAX
    $.ajax({
        url: 'ajax/notas.ajax.php',
        method: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta) {
            if (respuesta.success) {
                console.log(respuesta); 
                swal({
                    icon: "success",
                    title: "La nota ha sido guardada correctamente.",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function() {
                    $('#nuevoTituloNota').val('');
                    $('#contenidoNota').val('');
                    $('#archivoNota').val(''); // Limpiar archivo

                    if (idCliente) {
                        cargarNotasCliente(idCliente);
                    } else if (idLeads) {
                        cargarNotasLead(idLeads);
                    }
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
            // console.log(respuesta);
            renderizarNotasEnCards(respuesta); 
        },
        error: function(xhr, status, error) {
            console.error("Error al cargar notas:", error);
        }
    });
}
function cargarNotasLead(idLeads) {
    $.ajax({
        url: 'ajax/notas.ajax.php',
        method: 'POST',
        data: { accion: 'mostrarNotasLead', idLeads: idLeads },
        dataType: 'json',
        success: function(respuesta) {
            renderizarNotasEnCards(respuesta);
        },
        error: function(xhr, status, error) {
            console.error("Error al cargar notas del lead:", error);
            console.log("Respuesta servidor:", xhr.responseText);
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
                    <span class="nota-usuario">Creada por ${nota.user_name} el dia ${formatearFecha(nota.fecha_creacion)}</span>
                </div>
                <div class="nota-body">
                    ${nota.contenido}
                </div>
                <div class="nota-footer">
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


