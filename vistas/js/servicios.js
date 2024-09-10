$(".tablas").on("click", ".btnEliminarServicio", function(){

    var idCategoria = $(this).attr("idServicio");

    swal({
        title: '¿Está seguro de borrar el producto?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar producto!'
    }).then(function(result){

        if(result.value){

            window.location = "index.php?ruta=servicios&idServicio="+idCategoria;

        }

    })

})