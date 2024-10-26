$(".tablas").on("click", ".btnEliminarSuscripcion", function(){

    var idSuscripcion = $(this).attr("idSuscripcion");

    swal({
        title: '¿Está seguro de eliminar esta suscripcion?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, eliminar suscripcion!'
    }).then(function(result){

        if(result.value){

            window.location = "index.php?ruta=suscripciones&idSuscripcion="+idSuscripcion;

        }

    })

})
