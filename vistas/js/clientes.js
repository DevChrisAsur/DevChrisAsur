/*=============================================
ELIMINAR Area
=============================================*/
$(".tablas").on("click", ".btnEliminarCliente", function(){

    var idCategoria = $(this).attr("idCliente");

    swal({
        title: '¿Está seguro de eliminar este cliente?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Curso!'
    }).then(function(result){

        if(result.value){

            window.location = "index.php?ruta=clientes&idCliente="+idCategoria;

        }

    })

})

// Al hacer clic en el botón para obtener la información del cliente
$(document).on('click', '#btnInformacionAdicional', function() {
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
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta) {
            if (respuesta.error) {
                console.error("Error:", respuesta.error);
                alert("Error: " + respuesta.error);
            } else {
                var nombreCompleto = respuesta.first_name + ' ' + respuesta.last_name;
                
                // Asignar la información del cliente a los campos correspondientes
                $('#infoIdCCliente').val(respuesta.cc);
                $('#infoNombreApellido').text(nombreCompleto);
                $('#infoEmail').text(respuesta.email);
                $('#infoTelefono').text(respuesta.phone);
                var paisCiudad = (respuesta.country || 'Desconocido') + '/' + (respuesta.city || 'Desconocida');
                $('#infoCity').text(paisCiudad);
                $('#infoIdLeads').text(respuesta.id_customer); // Este será el id_customer
                $('#infoTipoCliente').text(respuesta.customer_type);

                // Guardar el ID del cliente en una variable global para su uso posterior
                window.idClienteSeleccionado = respuesta.id_customer;
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
        }
    });
});

// Función para crear la suscripción con el cliente y el servicio seleccionado
$(document).on('click', '#guardarProducto', function(e) {
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

    // Hacer la solicitud AJAX para crear la suscripción
    $.ajax({
        url: "ajax/suscripciones.ajax.php",
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            if (respuesta == "ok") {  // La respuesta debe ser "ok" en caso de éxito
                swal({
                    type: "success",
                    title: "La suscripción ha sido registrada",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result) {
                    if (result.value) {
                        window.location = "suscripciones"; // Redirigir a la página de suscripciones
                    }
                });
            } else {
                swal({
                    type: "error",
                    title: "¡Error al registrar la suscripción!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result) {
                    if (result.value) {
                        window.location = "suscripciones";
                    }
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
        }
    });
    
});

