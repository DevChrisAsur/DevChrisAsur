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