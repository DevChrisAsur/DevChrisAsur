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

$(document).on('click', '#btnInformacionAdicional', function() {

    var idCliente = $(this).attr("idCliente"); // Recogemos el atributo idCliente
    console.log("idCliente:", idCliente); // Depuración

    if (!idCliente) {
        console.error("No se encontró idCliente en el botón.");
        return;
    }

    // Crear un FormData para pasar los datos por AJAX
    var datos = new FormData();
    datos.append("idCliente", idCliente);

    // Hacer la solicitud AJAX
    $.ajax({
        url: "ajax/clientes.ajax.php", // Asegúrate de apuntar al archivo correcto
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta) {
            console.log(respuesta);
            if (respuesta.error) {
                console.error("Error:", respuesta.error);
                alert("Error: " + respuesta.error);
            } else {
                var nombreCompleto = respuesta.first_name + ' ' + respuesta.last_name;
                $('#infoIdCliente').val(respuesta.cc);
                $('#infoNombreApellido').text(nombreCompleto);
                $('#infoEmail').text(respuesta.email);
                $('#infoTelefono').text(respuesta.phone);
                $('#infoIdLeads').text(respuesta.id_lead);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
        }
    });
});
