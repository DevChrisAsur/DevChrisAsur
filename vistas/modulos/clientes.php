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

            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th style="width:100px">Identificación</th>
                            <th style="width:100px">Nombre</th>
                            <th style="width:100px">Apellido</th>
                            <th style="width:100px">Tipo Cliente</th>
                            <th style="width:100px">No. Empleados</th>
                            <th style="width:100px">Años Experiencia</th>
                            <th style="width:100px">email</th>
                            <th style="width:100px">Telefono</th>
                            <th style="width:100px">Usuario</th>
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
                      <td>' . $value["cc"] . '</td>
                      <td>' . $value["first_name"] . '</td>
                      <td>' . $value["last_name"] . '</td>
                      <td>' . $value["customer_type"] . '</td>
                      <td>' . $value["employers"] . '</td>
                      <td>' . $value["experience_years"] . '</td>
                      <td>' . $value["email"] . '</td>
                      <td>' . $value["customer_phone"] . '</td>
                      <td>' . $value["customer_username"] . '</td>
                      <td>
                          <div class="btn-group-container">
                            <div class="btn-group">
                                <button class="btn btn-warning btnEditarCliente" idCliente="' . $value["id_customer"] . '" data-toggle="modal" data-target="#modalEditarCliente"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger btnEliminarCliente" idCliente="' . $value["id_customer"] . '" style="margin-left: 8px;"><i class="fa fa-times"></i></button>
                                <button class="btn btn-primary btnGenerarPDF" idCliente="' . $value["id_customer"] . '" style="margin-left: 8px;"><i class="fa fa-file-pdf-o"></i></button>    
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
                            <th style="width:100px">Identificación</th>
                            <th style="width:100px">Nombre</th>
                            <th style="width:100px">Apellido</th>
                            <th style="width:100px">Tipo Cliente</th>
                            <th style="width:100px">No. Empleados</th>
                            <th style="width:100px">Años Experiencia</th>
                            <th style="width:100px">email</th>
                            <th style="width:100px">Teléfono</th>
                            <th style="width:100px">Usuario</th>
                            <th style="width:100px" align="center">Acciones</th>
                        </tr>
                    </tfoot>
                </table>

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

                            <!-- Contenedor de Información del Sistema -->
                            <div class="container mt-3">
                                <h5>Información del Sistema</h5>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                                                <input type="text" class="form-control" name="nuevoUsuario" placeholder="Ingresar Nombre de Usuario">
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


        <!-- MODAL EDITAR CLIENTE -->
        <div id="modalEditarCliente" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" method="post" enctype="multipart/form-data">
                        <div class="modal-header" style="background:#3c8dbc; color:white">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Editar Cliente</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                                        <input type="number" class="form-control input-lg" name="editarIdentificacion" id="editarIdentificacion">
                                        <input type="hidden" name="idCliente" id="idCliente">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control input-lg" name="editarApellido" id="editarApellido">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input type="email" class="form-control input-lg" name="editarCorreo" id="editarCorreo">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                            <button type="submit" class="btn btn-primary">Modificar Cliente</button>
                        </div>
                        <?php
                        $editarCliente = new ControladorClientes();
                        //$editarCliente -> ctrEditarCliente();
                        ?>
                    </form>
                </div>
            </div>
        </div>

    </section>
</div>

<?php

  $eliminarCliente = new ControladorClientes();
  $eliminarCliente -> ctrEliminarCliente();

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
</script>


