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
        height: calc(1.5em + .75rem + 4px);
        /* Ajustar la altura del select */
        padding: .75rem 1.25rem;
        /* Asegurar el mismo relleno que los campos de texto */
        font-size: 1.25rem;
        /* Asegurar el mismo tamaño de fuente */
        line-height: 1.5;
        /* Ajustar la línea de altura */
        border-radius: .3rem;
        /* Ajustar el radio de borde */
    }

    .input-group .form-control {
        border: 1px solid #ced4da;
        /* Asegurar que el borde sea igual al de los campos de texto */
        border-radius: .25rem;
        /* Radio de borde para las esquinas redondeadas */
    }

    .input-group-addon {
        background-color: #e9ecef;
        /* Asegurar el mismo color de fondo */
        border: 1px solid #ced4da;
        /* Borde del addon igual al de los campos de texto */
        border-radius: .25rem;
        /* Radio de borde para las esquinas redondeadas */
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
    localStorage.setItem('rutaActual', 'facturas');
</script>

<div class="content-wrapper">

    <section class="content-header">

        <h1>
            Administrar Suscripciones
        </h1>

        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Suscripciones</li>
        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">
                
            </div>

            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th style="width:50px">Status</th>
                            <th style="width:100px">Fecha de emision</th>
                            <th style="width:40px">banco</th>
                            <th style="width:100px">titular</th>
                            <th style="width:100px">tipo de cuenta</th>
                            <th style="width:100px">numero de cuenta</th>
                            <th style="width:100px">monto</th>
                            <th style="width:100px">fecha limite de pago</th>
                            <th style="width:80px" align="center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $item = null;
                        $valor = null;
                        $suscripciones = ControladorFacturas::ctrVerFacturas($item, $valor);
                        // echo '<pre>'; print_r($clientes); echo '</pre>';

                        foreach ($suscripciones as $key => $value) {
                            echo '<tr>
                      <td>' . ($key + 1) . '</td>
                      <td>' . $value["status_factura"] . '</td>
                      <td>' . $value["fecha_emision"] . '</td>
                      <td>' . $value["bank"] . '</td>
                      <td>' . $value["titular"] . '</td>
                      <td>' . $value["account_type"] . '</td>
                      <td>' . $value["account_number"] . '</td>
                      <td>' . $value["monto"] . '</td>
                      <td>' . $value["fecha_limite"] . '</td>
                      <td>
                          <div class="btn-group-container">
                            <div class="btn-group">
                                <button class="btn btn-danger btnEliminarSuscripcion" idSuscripcion="' . $value["id_suscripcion"] . '" style="margin-left: 8px;"><i class="fa fa-times"></i></button>                            </div>
                            </div>
                      </td>
                  </tr>';
                        }
                        ?>
                    </tbody>
                    <tfoot>
                    <th style="width:10px">#</th>
                            <th style="width:50px">Status</th>
                            <th style="width:100px">Fecha de emision</th>
                            <th style="width:40px">banco</th>
                            <th style="width:100px">titular</th>
                            <th style="width:100px">tipo de cuenta</th>
                            <th style="width:100px">numero de cuenta</th>
                            <th style="width:100px">monto</th>
                            <th style="width:100px">fecha limite de pago</th>
                            <th style="width:80px" align="center">Acciones</th>
                    </tfoot>
                </table>

            </div>

        </div>

        <!-- MODAL AGREGAR CLIENTE -->
        <div id="modalAgregarSuscripcion" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Registrar Suscripción</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Contenedor de Información de la Suscripción -->
                            <div class="container mt-3">
                                <h5>Información de Suscripción</h5>
                                <div class="row">
                                    <!-- Selección de Servicio -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-cogs"></i></span>
                                                <select class="form-control input-lg" name="nuevoServicio" id="nuevoServicio" required>
                                                    <option value="">Seleccione Servicio</option>
                                                    <?php
                                                    $item = null;
                                                    $valor = null;
                                                    $servicios = ControladorServicios::ctrVerServicios($item, $valor);
                                                    foreach ($servicios as $key => $value) {
                                                        echo '<option value="' . $value["id_service"] . '">' . $value["service_name"] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Selección de Cliente -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                <select class="form-control input-lg" name="nuevaSuscripcion" required>
                                                    <option value="">Seleccione Cliente</option>
                                                    <?php
                                                    $item = null;
                                                    $valor = null;
                                                    $clientes = ControladorClientes::ctrVerClientes($item, $valor);
                                                    foreach ($clientes as $key => $value) {
                                                        echo '<option value="' . $value["id_customer"] . '">' . $value["first_name"] . " " . $value["last_name"] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie de la Modal -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                            <button type="submit" name="register" class="btn btn-primary">Registrar Suscripción</button>
                        </div>

                        <?php
                        $crearSuscripcion = new ControladorSuscripcion();
                        $crearSuscripcion->ctrCrearSuscripcion();
                        ?>
                    </form>
                </div>
            </div>
        </div>



    </section>
</div>

<?php

$eliminarServicio = new ControladorSuscripcion();
$eliminarServicio->ctrEliminarSuscripcion();

?>