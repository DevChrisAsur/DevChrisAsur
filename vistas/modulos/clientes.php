<style>
    #boxBodySecundario .parent {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    grid-template-rows: repeat(5, 1fr);
    grid-column-gap: 0px;
    grid-row-gap: 0px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
    }

    .table tbody tr {
    display: table-row;
    }
    /* Estilos para div1 */
    .div1 {
        grid-area: 1 / 1 / 4 / 3;
        padding: 10px;
        margin: 2px 10px 0 2px;
    }

    /* Estilos para div2 */
    .div2 {
        grid-area: 1 / 3 / 6 / 6;
        padding: 10px;
        margin-top: 2px;
        position: relative;
        background-color: white;
        overflow: hidden;
    }

    .div2::before {
        content: '';
        position: absolute;
        top: 0;
        left: -4px;
        width: 2px;
        height: 100%;
        box-shadow: -4px 0 8px rgba(128, 128, 128, 0.5);
        pointer-events: none;
    }

    /* Estilos para div3 */
    .div3 {
        grid-area: 4 / 1 / 6 / 3;
        padding: 10px;
        padding-top: 0px;
        margin-top: -2px;
        margin-right: 10px;
        margin-left: 2px;
    }

    .container {
        width: calc(100% - 10px);
        /* Ajusta el ancho según sea necesario (resta padding o márgenes si es necesario) */
        padding: 0;
        /* Sin padding adicional */
        margin: 0;
        /* Sin margen adicional */
    }

    /* Estilos para el contenedor circular de la foto */
    .photo-container {
        margin: 10px auto;
        width: 150px;
        height: 150px;
        border: 1px solid #ccc;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
    }

    /* Estilos para la imagen dentro del contenedor circular */
    .photo-container img {
        width: 100%;
        /* Ancho de la imagen */
        height: 100%;
        /* Alto de la imagen */
        object-fit: cover;
        /* Ajustar imagen para que cubra el contenedor */
        border-radius: 50%;
        /* Forma circular para la imagen */
    }

    .input-group {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
    }

    /* Estilo para el label */
    .input-group label {
        margin-right: 10px;
        /* Espacio entre el label y el input */
        width: 150px;
        /* Ajusta el ancho según sea necesario */
    }

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
        padding: 8px 20px;
        /* Radio de borde para las esquinas redondeadas */
    }

    .input-group-addon {
    background-color: #e9ecef;
    border: 1px solid #ced4da;
    padding: 8px 20px; /* Reduce el padding para que el ícono tenga más espacio */
    font-size: 16px;   /* Ajusta el tamaño del ícono */
    border-radius: 0.25rem;
    }
</style>

<head>
    <!-- Importar la última versión de Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
</head>



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
    localStorage.setItem('rutaActual', 'cliente');
</script>

<div class="content-wrapper">

    <section class="content-header">

        <h1>
            Administrar Clientes
        </h1>

        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Clientes</li>
        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
                    Registrar Cliente
                </button>
            </div>

            <div class="box-body" id="boxBodyPrincipal">

                <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th style="width:100px">Lead</th>
                            <th style="width:100px">Identificación</th>
                            <th style="width:100px">Pais</th>
                            <th style="width:100px">Nombre</th>
                            <th style="width:100px">Apellido</th>
                            <th style="width:100px">Estado</th>
                            <th style="width:100px">Ciudad</th>
                            <th style="width:100px">Tipo Cliente</th>
                            <th style="width:100px">email</th>
                            <th style="width:100px">Telefono</th>
                            <th style="width:100px" align="center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $item = null;
                        $valor = null;
                        $clientes = ControladorClientes::ctrVerClientes($item, $valor);
                        // echo '<pre>'; print_r($clientes); echo '</pre>';

                        foreach ($clientes as $key => $value) {
                            echo '<tr>
                                        <td>' . ($key + 1) . '</td>
                                        <td>
                                            <button class="btn btn-info" id="btnInformacionAdicional" idCliente="' . $value["id_customer"] . '" style="margin-left: 8px;">
                                                <i class="fa-solid fa-info"></i>
                                            </button>
                                        </td>
                                        <td>' . $value["cc"] . '</td>
                                        <td>' . $value["country"] . '</td>
                                        <td>' . $value["first_name"] . '</td>
                                        <td>' . $value["last_name"] . '</td>
                                        <td>' . $value["state"] . '</td>
                                        <td>' . $value["city"] . '</td>
                                        <td>' . $value["customer_type"] . '</td>
                                        <td>' . $value["email"] . '</td>
                                        <td>' . $value["phone"] . '</td>
                                        <td>
                                            <div class="btn-group-container">
                                                <div class="btn-group">
                                                    <button class="btn btn-danger btnEliminarCliente" idCliente="' . $value["id_customer"] . '" style="margin-left: 8px;">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                    <button class="btn btn-primary btnGenerarPDF" idCliente="' . $value["id_customer"] . '" style="margin-left: 8px;">
                                                        <i class="fa fa-file-pdf-o"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>';
                        }

                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th style="width:10px">#</th>
                            <th style="width:100px">Lead</th>
                            <th style="width:100px">Identificación</th>
                            <th style="width:100px">Pais</th>
                            <th style="width:100px">Nombre</th>
                            <th style="width:100px">Apellido</th>
                            <th style="width:100px">Estado</th>
                            <th style="width:100px">Ciudad</th>
                            <th style="width:100px">Tipo Cliente</th>
                            <th style="width:100px">email</th>
                            <th style="width:100px">Telefono</th>
                            <th style="width:100px" align="center">Acciones</th>
                        </tr>
                    </tfoot>
                </table>

            </div>

                <div class="box-body" id="boxBodySecundario" style="display: none;">
                    <div class="parent">
                        <div class="div1">
                            <input type="hidden" name="infoIdCliente" id="infoIdCliente">
                            <label for="infoAsesor">Asesor asociado:</label>
                            <span id="infoAsesor" name="infoAsesor" class="info-display"></span> <!-- Cambiado a span -->

                            <div class="photo-container">
                                <!-- Aquí puedes insertar la foto -->
                                <img src="ruta/a/la/foto.jpg" alt="Foto del asesor">
                            </div>

                            <label for="infoStatus">Status:</label>
                            <span id="infoStatus" class="info-display"></span> <!-- Cambiado a span -->

                            <div class="container">
                                <h5>Información del Cliente</h5>

                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <label for="infoNombreApellido">Nombre:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <span id="infoNombreApellido" class="info-display"></span> <!-- Aquí irán ambos concatenados -->
                                    </div>
                                </div>


                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <label for="infoEmail">Email:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <span id="infoEmail" name="infoEmail" class="info-display"></span> <!-- Cambiado a span -->
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <label for="infoTelefono">Teléfono:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <span id="infoTelefono" name="infoTelefono" class="info-display"></span> <!-- Cambiado a span -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="div2">hola 2</div>

                        <div class="div3">
                            <div class="container">
                                <h5>Más Información del Cliente</h5>

                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <label for="infoAsesor1">Asesor 1:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <span id="infoAsesor1" name="infoAsesor1" class="info-display"></span> <!-- Cambiado a span -->
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <label for="infoAsesor2">Asesor 2:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <span id="infoAsesor2" name="infoAsesor2" class="info-display"></span> <!-- Cambiado a span -->
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <label for="infoAsesor3">Asesor 3:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <span id="infoAsesor3" name="infoAsesor3" class="info-display"></span> <!-- Cambiado a span -->
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <label for="infoAsesor4">Asesor 4:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <span id="infoAsesor4" name="infoAsesor4" class="info-display"></span> <!-- Cambiado a span -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <button class="btn btn-primary" id="btnVolver">Volver al Principal</button>
                    </div>
                </div>

        </div>

        <!-- MODAL AGREGAR CLIENTE -->
        <div id="modalAgregarCliente" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Registrar Cliente</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Contenedor de Información del Cliente -->
                            <div class="container">
                                <h5>Información del Cliente</h5>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                                                <input type="number" class="form-control" name="nuevoIdCliente" placeholder="Ingresar Identificación">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                <input type="text" class="form-control" name="nuevoNombre" placeholder="Ingresar Nombre">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                <input type="text" class="form-control" name="nuevoApellido" placeholder="Ingresar Apellido">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Dropdowns para País, Estado y Ciudad -->
                            <div class="container mt-3">
                            <h5>Dirección</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="countryValue">País</label>
                                        <select id="countryValue" class="form-control input-lg">
                                            <option value="">Seleccionar País</option>
                                        </select>
                                    </div>
                                </div>  
                            </div>
                            <div class="row">
                            <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="stateValue">Estado</label>
                                        <select id="stateValue" class="form-control input-lg" disabled>
                                            <option value="">Seleccionar Estado</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="cityValue">Ciudad</label>
                                        <select id="cityValue" class="form-control input-lg" disabled>
                                            <option value="">Seleccionar Ciudad</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Campos ocultos para enviar datos al servidor -->
                            <input type="hidden" name="nuevoPais" id="nuevoPais">
                            <input type="hidden" name="nuevoEstado" id="nuevoEstado">
                            <input type="hidden" name="nuevoCiudad" id="nuevoCiudad">
                        </div>

                            <div class="container mt-3">
                                <h5>Tipo de Cliente</h5>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <select class="form-control input-lg" name="nuevoTipoCliente" id="tipoCliente">
                                                    <option value="">Seleccione Tipo de Cliente</option>
                                                    <option value="Persona Natural">Persona Natural</option>
                                                    <option value="Empresa">Empresa</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Campo adicional para el número de empleados -->
                                    <div class="col-md-4" id="numEmpleadosContainer">
                                        <div class="form-group">
                                            <h5>Número de Empleados</h5>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                                <input type="number" class="form-control input-lg" name="nuevoEmpleado" placeholder="Ingresar Número de Empleados">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="AniosContainer">
                                        <div class="form-group">
                                            <h5>Años de experiencia</h5>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                                <input type="number" class="form-control input-lg" name="nuevoAnosExperiencia" placeholder="Ingresar Número de Empleados">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <!-- Contenedor de Información de Contacto -->
                            <div class="container mt-3">
                                <h5>Información de Contacto</h5>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                <input type="email" class="form-control" name="nuevoEmail" placeholder="Ingresar Correo Electrónico">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                <input type="text" class="form-control" name="nuevoTelefono" placeholder="Registrar Teléfono">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                            <button type="submit" name="register" class="btn btn-primary">Guardar Cliente</button>
                        </div>
                        <?php
                        $crearCliente = new ControladorClientes();
                        $crearCliente->ctrCrearCliente();
                        ?>
                    </form>
                </div>
            </div>
        </div>

    </section>
</div>

<?php

$eliminarCliente = new ControladorClientes();
$eliminarCliente->ctrEliminarCliente();

?>

<script>
    $(document).ready(function() {
        $('.btnGenerarPDF').click(function() {
            var idCliente = $(this).attr("idCliente");
            window.location.href = "path_to_generate_pdf.php?idCliente=" + idCliente;
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Detectar cambio en el campo Tipo de Cliente
        $('#tipoCliente').change(function() {
            var tipoCliente = $(this).val();

            if (tipoCliente === 'Persona Natural') {
                // Asignar "0" a los campos y deshabilitarlos
                $('#numEmpleadosContainer input').val(0).attr('readonly', true);
                $('#AniosContainer input').val(0).attr('readonly', true);
            } else {
                // Habilitar los campos y vaciarlos si el tipo de cliente no es "Persona Natural"
                $('#numEmpleadosContainer input').val('').removeAttr('readonly');
                $('#AniosContainer input').val('').removeAttr('readonly');
            }
        });
    });

    $(document).ready(function() {
        // Inicialmente el segundo box-body está oculto
        $('#boxBodySecundario').hide();

        // Delegar el evento click en los botones con la clase btn-info
        $(document).on('click', '#btnInformacionAdicional', function() {
            // Oculta el box-body principal y muestra el secundario
            $('#boxBodyPrincipal').hide(); // Oculta el box-body principal
            $('#boxBodySecundario').slideToggle(); // Muestra el segundo box-body
        });

        // Cuando se haga clic en el botón "Volver al Principal", mostrar el box-body principal y ocultar el secundario
        $('#btnVolver').click(function() {
            $('#boxBodySecundario').hide(); // Oculta el box-body secundario
            $('#boxBodyPrincipal').slideToggle(); // Muestra el box-body principal
        });
    });
</script>