<style>
    .modal-header {
        background: #3e383d;
        color: white;
    }

    /* Asegura que el div btn-group se mantenga en una línea y no se rompa */
    .btn-group {
        display: flex;
        /* Usa flexbox para la alineación */
        flex-wrap: nowrap;
        /* No permite que los botones se envuelvan en una nueva línea */
    }

    /* Asegura que los botones se alineen de manera horizontal */
    .btn-group .btn {
        margin: 0 5px;
        /* Espacio entre botones */
        white-space: nowrap;
        /* Evita que el texto del botón se rompa */
    }

    /* Ajusta el tamaño de los botones para que sean más pequeños si es necesario */
    .btn-group .btn {
        font-size: 14px;
        padding: 6px 12px;
    }

    /* Ajusta el contenedor del grupo de botones para adaptarse al tamaño del contenido */
    .btn-group-container {
        text-align: center;
        /* Centra los botones dentro del contenedor */
    }

    .swal2-popup {
        font-size: 1.6rem;
        font-family: Georgia, serif;
    }

    .up {

        display: flex;
        justify-content: center;
        font-size: 15px;
        line-height: 1;
        border-radius: 2px;


        border: 0;
        transition: 0.2s;
        overflow: hidden;
        text-align: center;
        padding: 4;
        border: thin solid black;
    }

    #inputTag {
        cursor: pointer;
        position: absolute;
        left: 0%;
        top: 0%;
        transform: scale(3);
        opacity: 0;
    }

    label {
        cursor: pointer;
    }

    #imageName {
        color: green;
    }

    .selectize-input {
        height: 45px;
        font-size: 16px;
        /* Tamaño de la fuente */
        line-height: 20px;
        /* Centra verticalmente el texto */
    }

    /* Centra horizontalmente el texto */
    .selectize-input .item {
        text-align: center;
    }


    .dt-button-collection.dropdown-menu {
        background-color: #007bff;
        /* Color de fondo */
        color: #ffffff;
        /* Color del texto */
        padding: 10px;
        /* Espaciado interno para mejorar la apariencia */
    }

    .dt-button-collection.dropdown-menu a {
        display: block;
        margin-bottom: 5px;
        color: #FF5833;

        /* Ajusta el margen según sea necesario */
    }

    .dt-button-collection.dropdown-menu a.active {
        background-color: #007bff !important;
        /* Color de fondo cuando está activo */
        color: #ffffff;
        /* Color del texto cuando está activo */
    }

    .modal-dialog {
        max-width: 80%;
        /* Ajusta el tamaño máximo del modal */
        width: auto;
    }

    .modal-content {
        border-radius: 8px;
    }

    .modal-body {
        padding: 2rem;
        /* Ajusta el relleno del modal */
    }

    .form-control {
        border-radius: 4px;
        /* Opcional: Mejora el aspecto de los campos */
    }

    /* Asegurarse de que el select tenga el mismo tamaño y estilo que los campos de texto */
    .form-control.input-lg {
    height: calc(1.5em + .75rem + 4px); /* Ajustar la altura del select */
    padding: .75rem 1.25rem; /* Asegurar el mismo relleno que los campos de texto */
    font-size: 1.25rem; /* Asegurar el mismo tamaño de fuente */
    line-height: 1.5; /* Ajustar la línea de altura */
    border-radius: .3rem; /* Ajustar el radio de borde */
    }

    .input-group .form-control {
    border: 1px solid #ced4da; /* Asegurar que el borde sea igual al de los campos de texto */
    border-radius: .25rem; /* Radio de borde para las esquinas redondeadas */
    }

    .input-group-addon {
    background-color: #e9ecef; /* Asegurar el mismo color de fondo */
    border: 1px solid #ced4da; /* Borde del addon igual al de los campos de texto */
    border-radius: .25rem; /* Radio de borde para las esquinas redondeadas */
    }

</style>

<!-- selectize search  -->
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
    integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css">
<!-- filtrar fechas -->
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.3.1/css/dataTables.dateTime.min.css">
<!-- Datatables librerias -->

<script
    src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
    integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer">
</script>
<script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>

<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<!-- filtrar fechas -->
<script src="https://cdn.datatables.net/datetime/1.3.1/js/dataTables.dateTime.min.js"></script>
<script>
    localStorage.setItem('rutaActual', 'leads');
</script>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      Administrar Leads
    </h1>

    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Leads</li>
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarAreas">
          Registrar Lead
        </button>
      </div>

      <!-- Flexbox para alinear las tablas -->
      <div class="box-body d-flex">

        <!-- Primera tabla -->
        <div class="table-container" style="flex: 1;">
          <table class="table table-bordered table-striped dt-responsive tablas3" width="100%">
            <thead>
              <tr>
                <th style="width:10px">#</th>
                <th>Status</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>origen</th>
                <th>informacion adicional</th>
                <th style="width:80px">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $item = null;
                $valor = null;
                $categorias = ControladorLeads::ctrVerLeadsFrio($item, $valor);
                foreach ($categorias as $key => $value) {
                  echo ' <tr>
                          <td>'.($key+1).'</td>
                          <td class="text">'.$value["status_lead"].'</td>
                          <td class="text">'.$value["first_name"].'</td>
                          <td class="text">'.$value["last_name"].'</td>
                          <td class="text">'.$value["email"].'</td>
                          <td class="text">'.$value["phone"].'</td>
                          <td class="text">'.$value["origin"].'</td>
                          <td class="text">'.$value["note"].'</td>                                               
                          <td>
                            <div class="btn-group">
                              <button class="btn btn-warning btnEditarAreas" idLeads="'.$value["id_lead"].'" data-toggle="modal" data-target="#modalEditarAreas"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-danger btnEliminarAreas" idLeads="'.$value["id_lead"].'" style="margin-left: 8px;"><i class="fa fa-times"></i></button>
                            </div>
                          </td>
                        </tr>';
                }
              ?>
            </tbody>
          </table>
        </div>

        <!-- Segunda tabla -->
        <div class="table-container" style="flex: 1;">
          <table class="table table-bordered table-striped dt-responsive tablas4" width="100%">
            <thead>
              <tr>
                <th style="width:10px">#</th>
                <th>Status</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>origen</th>
                <th>informacion adicional</th>
                <th style="width:80px">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $item = null;
                $valor = null;
                $elementos = ControladorLeads::ctrVerLeadsMQL($item, $valor);
                foreach ($elementos as $key => $value) {
                  echo ' <tr>
                          <td>'.($key+1).'</td>
                          <td class="text">'.$value["status_lead"].'</td>
                          <td class="text">'.$value["first_name"].'</td>
                          <td class="text">'.$value["last_name"].'</td>
                          <td class="text">'.$value["email"].'</td>
                          <td class="text">'.$value["phone"].'</td>
                          <td class="text">'.$value["origin"].'</td>
                          <td class="text">'.$value["note"].'</td>                                               
                          <td>
                            <div class="btn-group">
                              <button class="btn btn-warning btnEditarAreas" idLeads="'.$value["id_lead"].'" data-toggle="modal" data-target="#modalEditarAreas"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-danger btnEliminarAreas" idLeads="'.$value["id_lead"].'" style="margin-left: 8px;"><i class="fa fa-times"></i></button>
                            </div>
                          </td>
                        </tr>';
                }
              ?>
            </tbody>
          </table>
        </div>

        <div class="table-container" style="flex: 1;">
          <table class="table table-bordered table-striped dt-responsive tablas5" width="100%">
            <thead>
              <tr>
                <th style="width:10px">#</th>
                <th>Status</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>origen</th>
                <th>informacion adicional</th>
                <th style="width:80px">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $item = null;
                $valor = null;
                $elementos = ControladorLeads::ctrVerLeadsSQL($item, $valor);
                foreach ($elementos as $key => $value) {
                  echo ' <tr>
                          <td>'.($key+1).'</td>
                          <td class="text">'.$value["status_lead"].'</td>
                          <td class="text">'.$value["first_name"].'</td>
                          <td class="text">'.$value["last_name"].'</td>
                          <td class="text">'.$value["email"].'</td>
                          <td class="text">'.$value["phone"].'</td>
                          <td class="text">'.$value["origin"].'</td>
                          <td class="text">'.$value["note"].'</td>                                               
                          <td>
                            <div class="btn-group">
                              <button class="btn btn-warning btnEditarAreas" idLeads="'.$value["id_lead"].'" data-toggle="modal" data-target="#modalEditarAreas"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-danger btnEliminarAreas" idLeads="'.$value["id_lead"].'" style="margin-left: 8px;"><i class="fa fa-times"></i></button>
                            </div>
                          </td>
                        </tr>';
                }
              ?>
            </tbody>
          </table>
        </div>

      </div> <!-- Fin de flexbox -->

    </div>

  </section>

</div>

<!-- MODAL AGREGAR Areas -->
<div id="modalAgregarAreas" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Area</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevaArea" placeholder="Ingresar Area" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Area</button>
        </div>
        <?php
          $crearCategoria = new ControladorAreas();
          $crearCategoria -> ctrCrearAreas();
        ?>
      </form>
    </div>
  </div>
</div>

<!-- MODAL EDITAR Areas -->
<div id="modalEditarAreas" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Area</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                <input type="text" class="form-control input-lg" name="editarAreas" id="editarAreas" required>
                <input type="hidden" name="idLeads" id="idLeads" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
        <?php
          $editarCategoria = new ControladorAreas();
          $editarCategoria -> ctrEditarAreas();
        ?>
      </form>
    </div>
  </div>
</div>

<?php
  $borrarCategoria = new ControladorAreas();
  $borrarCategoria -> ctrBorrarAreas();
?>

<!-- SCRIPTS PARA LAS TABLAS -->
<script>
$(document).ready(function() {
    // Inicializa la primera tabla
    $('.tablas3').DataTable({
        destroy: true,
        responsive: true,
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
        lengthChange: false, // Desactiva la opción de cambiar la cantidad de registros mostrados
        searching: false,    // Desactiva el filtro de búsqueda
    });

    // Inicializa la segunda tabla
    $('.tablas4').DataTable({
        destroy: true,
        responsive: true,
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
        lengthChange: false, // Desactiva la opción de cambiar la cantidad de registros mostrados
        searching: false,    // Desactiva el filtro de búsqueda
    });

    $('.tablas5').DataTable({
        destroy: true,
        responsive: true,
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
        lengthChange: false, // Desactiva la opción de cambiar la cantidad de registros mostrados
        searching: false,    // Desactiva el filtro de búsqueda
    });
});

</script>


<?php

  $eliminarCliente = new ControladorClientes();
  $eliminarCliente -> ctrEliminarCliente();

?> 





