<style>
  .tabs {
    padding: 10px;
    color: var(--tabs-text-color);
    margin-left: 10;
    /* Cambia el valor según sea necesario */
  }

  .tab-content {
    padding: 20px;
    border: var(--tabs-border-size) solid #f0f0f0;
    /* Borde gris */
    border-radius: 0 0 10px 10px;
    position: relative;
    /* Cambia a 'relative' para que esté contenido en el contenedor */
    top: 0;
    /* Ajusta según sea necesario */
    z-index: 100;
    display: none;
    /* Asegúrate de que esté oculto por defecto */
  }


  .tab>a {
    background-color: #f0f0f0;
    /* Color neutro para las pestañas */
    padding: 10px;
    border: none;
    border-radius: 10px 10px 0 0;
    border-bottom: 0;
    color: var(--tabs-text-color);
    /* Color del texto */
    position: absolute;
    /* Asegúrate de que el tab sea posicionado absolutamente */
    top: 10px;
    /* Ajusta la posición superior */
    left: 10px;
    /* Ajusta la posición izquierda */
    right: 10px;
    /* Ajusta la posición derecha */
    bottom: 10px;
    /* Ajusta la posición inferior */
  }

  .tab-container {
    position: relative;
    padding-top: var(--tabs-height);
    /* Espaciado para las pestañas */
  }


  .tab:target>a,
  .tab:last-of-type>a {
    background-color: #f0f0f0;
    /* Mantener el mismo color neutro en la pestaña seleccionada */
    z-index: 200;
  }


  #tab1>a {
    --tabs-position: 0;
  }

  #tab2>a {
    --tabs-position: 1;
  }

  .tab>a {
    text-align: center;
    position: absolute;
    width: calc(var(--tabs-width));
    height: calc(var(--tabs-height) + var(--tabs-border-size));
    top: 0;
    left: calc(var(--tabs-width) * var(--tabs-position));
    /* posición de cada pestaña */
  }

  :root {
    --tabs-border-color: #cccccc;
    /* Color gris para los bordes */
    --tabs-border-size: 3px;
    --tabs-text-color: black;
    --tabs-dark-color: #f0f0f0;
    /* Color neutro, puedes ajustarlo si es necesario */
    --tabs-lite-color: #f0f0f0;
    /* Color neutro para mantener la consistencia */
    --tabs-width: 120px;
    --tabs-height: 40px;
  }

  /* aspecto básico */
  body {
    font-family: sans-serif;
    line-height: 1.2;
  }

  h2,
  p {
    margin: 0;
  }

  a {
    color: inherit;
    text-decoration: none;
  }

  .tabs * {
    box-sizing: border-box;
  }

  .tab-content {
    display: none;
  }

  .tab:target .tab-content {
    display: block;
    /* Muestra el contenido de la pestaña activa */
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

  .input-group {
    display: flex;
    margin-bottom: 10px;
  }


  .input-group .form-control {
    border: 1px solid #ced4da;
    /* Asegurar que el borde sea igual al de los campos de texto */
    border-radius: .25rem;
    /* Radio de borde para las esquinas redondeadas */
  }

  .input-group-addon {
    background-color: #e9ecef;
    border: 1px solid #ced4da;
    padding: 6px 12px;
    padding-right: 30px;
    font-size: 16px;
    border-radius: 0.25rem;
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
      <li class="active">LEads</li>
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarLead">
          Registrar Lead
        </button>
      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Fecha Lead</th>
              <th>Identificacion</th>
              <th>sector</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Telefono</th>
              <?php if ($_SESSION["perfil"] === "Asesor comercial" || $_SESSION["perfil"] === "Coordinador comercial"): ?>
                <th>Asesor</th>
              <?php endif; ?>
              <th>Status</th>
              <th>Origen</th>
              <th>Informacion adicional</th>
              <th style="width:80px">Acciones</th>
            </tr>
          </thead>

          <tbody>
            <?php
            // Primero verificamos si el perfil es "Asesor comercial"
            if ($_SESSION["perfil"] === "Asesor comercial") {
              // Obtenemos el id del asesor a partir de la sesión
              $id_asesor = $_SESSION["id"];

              // Llamamos al controlador para obtener los leads registrados por el asesor
              $leads = ControladorLeads::ctrVerLeadAsesor($id_asesor);

              // Iteramos sobre los leads y los mostramos en la tabla
              foreach ($leads as $key => $lead) {
                echo '<tr>
                <td>' . ($key + 1) . '</td>
                <td class="text">' . htmlspecialchars($lead["creation_date"]) . '</td>
                <td class="text">' . htmlspecialchars($lead["cc"]) . '</td>
                <td class="text">' . htmlspecialchars($lead["sector"]) . '</td>
                <td class="text">' . htmlspecialchars($lead["first_name"]) . '</td>
                <td class="text">' . htmlspecialchars($lead["last_name"]) . '</td>
                <td class="text">' . htmlspecialchars($lead["phone"]) . '</td>
                <td>' . htmlspecialchars($lead["asesor_first_name"]) . ' ' . htmlspecialchars($lead["asesor_last_name"]) . '</td>';
                if ($lead["status_lead"] != 0) {
                  echo '<td><button class="btn btn-success btn-xs btnCambiarEstadoLead" idLead="' . $lead["id_lead"] . '" estadoActualLead="0">Cliente</button></td>';
                } else {
                  echo '<td><button class="btn btn-info btn-xs btnCambiarEstadoLead" idLead="' . $lead["id_lead"] . '" estadoActualLead="1">Lead</button></td>';
                }
                echo '
              <td class="text">' . htmlspecialchars($lead["origin"]) . '</td>
              <td class="text">' . htmlspecialchars($lead["note"]) . '</td>
              <td>
                    <div class="btn-group">
                      <button class="btn btn-warning btnEditarLead" idLeads="' . $lead["id_lead"] . '" data-toggle="modal" data-target="#modalActualizarLead"><i class="fa fa-pencil"></i></button>
                    </div>
                  </td>
              </tr>';
              }
            }
            // Ahora verificamos si el perfil es "Super Administrador" o "Administrador"
            else if ($_SESSION["perfil"] === "Super Administrador" || $_SESSION["perfil"] === "Administrador") {
              $item = null;
              $valor = null;
              $categorias = ControladorLeads::ctrVerInteresLead($item, $valor);

              foreach ($categorias as $key => $value) {
                echo '<tr>
                      <td>' . ($key + 1) . '</td>
                      <td class="text">' . htmlspecialchars($value["creation_date"]) . '</td>
                      <td class="text">' . htmlspecialchars($value["cc"]) . '</td>
                      <td class="text">' . htmlspecialchars($value["sector"]) . '</td>
                      <td class="text">' . htmlspecialchars($value["first_name"]) . '</td>
                      <td class="text">' . htmlspecialchars($value["last_name"]) . '</td>
                      <td class="text">' . htmlspecialchars($value["phone"]) . '</td>';
                if ($value["status_lead"] != 0) {
                  echo '<td><button class="btn btn-success btn-xs btnCambiarEstadoLead" idLead="' . $value["id_lead"] . '" estadoActualLead="0">Cliente</button></td>';
                } else {
                  echo '<td><button class="btn btn-info btn-xs btnCambiarEstadoLead" idLead="' . $value["id_lead"] . '" estadoActualLead="1">Lead</button></td>';
                }
                echo '
                  <td class="text">' . htmlspecialchars($value["origin"]) . '</td>
                  <td class="text">' . htmlspecialchars($value["note"]) . '</td>
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-warning btnEditarLead" idLeads="' . $value["id_lead"] . '" data-toggle="modal" data-target="#modalActualizarLead"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-danger btnEliminarLead" idLeads="' . $value["id_lead"] . '" style="margin-left: 8px;"><i class="fa fa-times"></i></button>
                    </div>
                  </td>
              </tr>';
              }
            } // Verificamos si el perfil es "Coordinador comercial"
            else if ($_SESSION["perfil"] === "Coordinador comercial") {
              $id_coordinador = $_SESSION["id"];

              // Llamamos al controlador para obtener los leads de los asesores bajo este coordinador
              $leads = ControladorLeads::ctrVerLeadsCoordinador($id_coordinador);

              foreach ($leads as $key => $lead) {
                echo '<tr>
                  <td>' . ($key + 1) . '</td>
                  <td class="text">' . htmlspecialchars($lead["creation_date"]) . '</td>
                  <td class="text">' . htmlspecialchars($lead["cc"]) . '</td>
                  <td class="text">' . htmlspecialchars($lead["sector"]) . '</td>
                  <td class="text">' . htmlspecialchars($lead["first_name"]) . '</td>
                  <td class="text">' . htmlspecialchars($lead["last_name"]) . '</td>
                  <td class="text">' . htmlspecialchars($lead["phone"]) . '</td>
                  <td>' . htmlspecialchars($lead["asesor"]) . '</td>';

                if ($lead["status_lead"] != 0) {
                  echo '<td><button class="btn btn-success btn-xs btnCambiarEstadoLead" idLead="' . $lead["id_lead"] . '" estadoActualLead="0">Cliente</button></td>';
                } else {
                  echo '<td><button class="btn btn-info btn-xs btnCambiarEstadoLead" idLead="' . $lead["id_lead"] . '" estadoActualLead="1">Lead</button></td>';
                }

                echo '
                  <td class="text">' . htmlspecialchars($lead["origin"]) . '</td>
                  <td class="text">' . htmlspecialchars($lead["note"]) . '</td>
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-warning btnEditarLead" idLeads="' . $lead["id_lead"] . '" data-toggle="modal" data-target="#modalActualizarLead"><i class="fa fa-pencil"></i></button>
                    </div>
                  </td>
                </tr>';
              }
            }
            ?>
          </tbody>

          <tfoot>
            <tr>
              <th style="width:10px">#</th>
              <th>Fecha Lead</th>
              <th>Identificacion</th>
              <th>sector</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Telefono</th>
              <?php if ($_SESSION["perfil"] === "Asesor comercial" || $_SESSION["perfil"] === "Coordinador comercial"): ?>
                <th>Asesor</th>
              <?php endif; ?>
              <th>Status</th>
              <th>Origen</th>
              <th>Informacion adicional</th>
              <th style="width:80px">Acciones</th>
            </tr>
          </tfoot>
        </table>

      </div>

    </div>
  </section>
</div>
<!-- MODAL EDITAR Areas -->
<div id="modalActualizarLead" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- CABEZA DEL MODAL -->
        <div class="modal-header" style="background:#3e383d; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Lead</h4>
        </div>
        <!-- CUERPO DEL MODAL -->
        <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
          <div class="box-body">
            <div class="container">
              <h5>Información del Usuario</h5>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                      <input type="text" class="form-control" name="editarNombre" id="editarNombre" placeholder="Ingresar Nombre" required>
                      <input type="hidden" name="idLeads" id="idLeads" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                      <input type="text" class="form-control" name="editarApellido" id="editarApellido" placeholder="Ingresar Apellido" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                      <input type="email" class="form-control" name="editarCorreo" id="editarCorreo" placeholder="Ingresar Correo" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                      <input type="text" class="form-control" name="editarTelefono" id="editarTelefono" placeholder="Ingresar Teléfono" required>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- PIE DEL MODAL -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
        <?php
        $editarCategoria = new ControladorLeads();
        $editarCategoria->ctrEditarLead();
        ?>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="confirmacionModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background: #3e383d; color: white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Confirmación</h4>
      </div>
      <div class="modal-body">
        <div class="tabs">
          <div class="tab-container">
            <div id="tab1" class="tab">
              <a href="#tab1">Lead</a>
              <div class="tab-content">
                <h5>¿Está seguro de que desea cambiar el estado de lead a cliente?</h5>
                <br>
                <h5>Necesita completar algunos campos adicionales en la siguiente pestaña</h5>
                <button type="button" class="btn btn-secondary" style="background: Black; color: white; position: absolute; bottom: 10px; right: 10px;" id="confirmarAccion">Confirmar</button>
              </div>
            </div>
            <div id="tab2" class="tab">
              <a href="#tab2">Cliente</a>
              <div class="tab-content">
                <div class="box-body">
                  <form id="formularioCliente" method="POST">
                    <div class="container">
                      <div class="container">
                        <h5>Información del Cliente</h5>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                                <input type="text" class="form-control" name="nuevoIdCliente" id="nuevoIdCliente" placeholder="Ingresar Identificación">
                                <input type="hidden" name="idLeads" id="idLeads" required>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="container">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                                <input type="text" class="form-control" name="nuevoNombre" id="nuevoNombre" placeholder="Ingresar Nombre">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                                <input type="text" class="form-control" name="nuevoApellido" id="nuevoApellido" placeholder="Ingresar Apellido">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Dropdowns para País, Estado y Ciudad -->
                      <div class="container mt-3">
                        <h5>Residencia</h5>
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
                                <input type="number" class="form-control input-lg" name="nuevoAnosExperiencia" placeholder="Ingresar Número de Años de Experiencia">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="container mt-3">
                        <h5>Información de Contacto</h5>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" class="form-control" name="nuevoEmail" id="nuevoEmail" placeholder="Ingresar Correo Electrónico">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input type="text" class="form-control" name="nuevoTelefono" id="nuevoTelefono" placeholder="Registrar Teléfono">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Botón de enviar -->
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" id="creaCliente">Guardar Cambios</button>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalAgregarLead" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!-- CABEZA DEL MODAL -->
        <div class="modal-header" style="background:#3e383d; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Lead</h4>
        </div>

        <!-- CUERPO DEL MODAL -->
        <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
          <div class="container">
            <!-- Información del Usuario -->
            <h5>Información del Usuario</h5>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                    <input type="text" class="form-control" name="nuevoIdLead" id="nuevoIdLead" placeholder="Ingresar Identificación">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" name="nuevoNombre" id="nuevoNombre" placeholder="Ingresar Nombre">
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" name="nuevoApellido" id="nuevoApellido" placeholder="Ingresar Apellido">
                  </div>
                </div>
              </div>
            </div>

            <!-- Información de Contacto -->
            <h5>Información de Contacto</h5>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                    <input type="email" class="form-control" name="nuevoEmail" id="nuevoEmail" placeholder="Ingresar Correo">
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input type="text" class="form-control" name="nuevoTelefono" id="nuevoTelefono" placeholder="Ingresar Teléfono">
                  </div>
                </div>
              </div>
            </div>

            <!-- Área de Derecho y Servicio Solicitado -->
            <h5>Área de Derecho y Servicio Solicitado</h5>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-suitcase"></i></span>
                    <select class="form-control" name="nuevaArea" id="nuevaArea">
                      <option value="">Seleccionar Área de Derecho</option>
                      <?php
                      $item = null;
                      $valor = null;
                      $categorias = ControladorAreaDerecho::ctrVerAreasDerecho($item, $valor);
                      foreach ($categorias as $key => $value) {
                        echo '<option value="' . $value["id_area"] . '">' . $value["law_area"] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-suitcase"></i></span>
                    <select class="form-control" name="nuevoServicio" id="nuevoServicio">
                      <option value="">Seleccionar Servicio</option>
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
            </div>

            <!-- Información Adicional -->
            <h5>Información Adicional</h5>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info-circle"></i></span>
                    <input type="text" class="form-control" name="origenLead" id="origenLead" placeholder="Cómo se enteró del servicio">
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info-circle"></i></span>
                    <input type="text" class="form-control" name="observaciones" id="observaciones" placeholder="Observaciones del asesor">
                  </div>
                </div>
              </div>
            </div>

            <!-- Grupo Poblacional -->
            <h5>Grupo Poblacional</h5>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <input type="text" class="form-control" name="nuevoSector" id="nuevoSector" placeholder="Grupo poblacional">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- PIE DEL MODAL -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" name="register" class="btn btn-primary">Guardar Lead</button>
        </div>

        <?php
        $crearLead = new ControladorLeads();
        $crearLead->ctrRegistrarLead();
        ?>

      </form>
    </div>

  </div>
</div>



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
    $(".btnAprobarCliente").click(function() {
      //console.log("Se ha clicado en el botón para cambiar el estado");
      $("#confirmacionModal").modal('show');
    });
  });

  document.querySelectorAll('.tab a').forEach(tab => {
  tab.addEventListener('click', function(e) {
    e.preventDefault();
    // Ocultar todas las pestañas
    document.querySelectorAll('.tab-content').forEach(content => {
      content.style.display = 'none';
    });
    // Mostrar la pestaña seleccionada
    const activeTabContent = document.querySelector(this.getAttribute('href') + ' .tab-content');
    if (activeTabContent) {
      activeTabContent.style.display = 'block';
    }
  });
});

// Inicializar la primera pestaña como activa
document.querySelector('#tab1 .tab-content').style.display = 'block';

</script>


<?php
$borrarLead = new ControladorLeads();
$borrarLead->ctrEliminarLead();
?>