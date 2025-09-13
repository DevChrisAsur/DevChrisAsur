<style>
  .tabs {
    padding: 10px;
    color: var(--tabs-text-color);
    margin-left: 10;
  }

  .tab-content {
    padding: 20px;
    border: var(--tabs-border-size) solid #f0f0f0;
    border-radius: 0 0 10px 10px;
    position: relative;
    top: 0;
    z-index: 100;
    display: none;
  }

  .tab>a {
    background-color: #f0f0f0;
    padding: 10px;
    border: none;
    border-radius: 10px 10px 0 0;
    border-bottom: 0;
    color: var(--tabs-text-color);
    position: absolute;
    top: 10px;
    left: 10px;
    right: 10px;
    bottom: 10px;
  }

  .tab-container {
    position: relative;
    padding-top: var(--tabs-height);
  }

  .tab:target>a,
  .tab:last-of-type>a {
    background-color: #f0f0f0;
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
  }

  :root {
    --tabs-border-color: #cccccc;
    --tabs-border-size: 3px;
    --tabs-text-color: black;
    --tabs-dark-color: #f0f0f0;
    --tabs-lite-color: #f0f0f0;
    --tabs-width: 120px;
    --tabs-height: 40px;
  }

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

  .btn-group {
    display: flex;
    flex-wrap: nowrap;
  }

  .btn-group .btn {
    font-size: 14px;
    padding: 6px 12px;
  }

  .btn-group-container {
    text-align: center;
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
    line-height: 20px;
  }

  .selectize-input .item {
    text-align: center;
  }

  .dt-button-collection.dropdown-menu {
    background-color: #007bff;
    color: #ffffff;
    padding: 10px;
  }

  .dt-button-collection.dropdown-menu a {
    display: block;
    margin-bottom: 5px;
    color: #FF5833;
  }

  .dt-button-collection.dropdown-menu a.active {
    background-color: #007bff !important;
    color: #ffffff;
  }

  /* ==================== CONFIRMACION MODAL ==================== */
  #confirmacionModal .modal-header {
    background: #3e383d;
    color: white;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
    padding: 1rem 1.5rem;
  }

  #confirmacionModal .modal-dialog {
    max-width: 800px;
    width: 100%;
  }

  input.form-control,
  select.form-control,
  textarea.form-control {
    height: 40px !important;
  }

  #confirmacionModal .modal-content {
    border-radius: 8px;
  }

  #confirmacionModal .modal-body {
    padding: 2rem;
  }

  #confirmacionModal .form-control {
    border-radius: 4px;
  }

  #confirmacionModal .form-control.input-lg {
    height: calc(1.5em + .75rem + 4px);
    padding: .75rem 1.25rem;
    font-size: 1.25rem;
    line-height: 1.5;
    border-radius: .3rem;
  }

  .row {
    padding: 10px 0;
    gap: 15px
  }

  #confirmacionModal .input-group {
    display: flex;
    margin-bottom: 10px;
  }

  #confirmacionModal .input-group .form-control {
    border: 1px solid #ced4da;
    border-radius: .25rem;
  }

  #confirmacionModal .input-group-addon {
    background-color: #e9ecef;
    border: 1px solid #ced4da;
    padding: 6px 12px;
    padding-right: 30px;
    font-size: 16px;
    border-radius: 0.25rem;
  }

  /* Floating labels */
  #confirmacionModal .floating-label-group {
    position: relative;
    display: flex;
    flex-direction: column;
    margin-bottom: 20px;
  }

  #confirmacionModal label {
    position: absolute;
    top: 50%;
    left: 14px;
    transform: translateY(-50%);
    font-size: 15px;
    color: #aaa;
    pointer-events: none;
    transition: all 0.2s ease;
    font-size: 1.2rem;
    font-weight: 500;
    color: #555;
  }

#confirmacionModal .floating-label-group input,
#confirmacionModal .floating-label-group select {
  height: 40px;           /* mismo tamaño que los otros */
  padding: 10px 12px;     /* menos aire */
}

  #confirmacionModal h5 {
    font-size: 1.2rem;
    font-weight: 600;
    color: #3e383d;
    margin-top: 1rem;
    margin-bottom: 0.9rem;
    padding: 10px;
    font-family: "Segoe UI", Arial, sans-serif;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-bottom: 1px solid #ddd;
  }

  #confirmacionModal .floating-label-group label {
    position: absolute;
    top: 50%;
    left: 12px;
    transform: translateY(-50%);
    font-size: 14px;
    color: #aaa;
    pointer-events: none;
    transition: all 0.2s ease;
  }

  #confirmacionModal .floating-label-group input:focus+label,
  #confirmacionModal .floating-label-group input:not(:placeholder-shown)+label,
  #confirmacionModal .floating-label-group select:focus+label,
  #confirmacionModal .floating-label-group select:valid+label {
    top: 0;
    font-size: 12px;
    color: #555;
    /* gris consistente */
    background: white;
    padding: 0 5px;
  }
  .swal2-icon.swal2-info {
  font-size: 1.5rem !important; /* Ajusta el tamaño de la "i" */
  width: 3em !important;
  height: 3em !important;
  line-height: 3em !important;
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
      <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarLead">
        Registrar Lead
      </button>
    </div>

    <div class="box-body">

      <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
        <thead>
          <tr>
            <th style="width:10px">N°</th>
            <th>Estado</th>
            <th>Fecha de registro</th>
            <th>Documento</th>
            <th>Cliente</th>
            <th>Teléfono</th>
            <th>Sector de interés</th>
            <th>Asesor asignado</th>
            <th>Medio de contacto</th>
            <th>Notas</th>
            <th style="width:80px">Opciones</th>
          </tr>
        </thead>

        <tbody>
          <?php

          /* ============================
             PERFIL: ASESOR COMERCIAL
          ============================ */
          if ($_SESSION["perfil"] === "Asesor comercial") {

            $id_asesor = $_SESSION["id"];
            $leads = ControladorLeads::ctrVerLeadAsesor($id_asesor);

            foreach ($leads as $key => $lead) {
              echo '<tr>
                <td>' . ($key + 1) . '</td>';

              echo ($lead["status_lead"] != 0)
                ? '<td><button class="btn btn-success btn-xs btnCambiarEstadoLead" idLead="' . $lead["id_lead"] . '" estadoActualLead="0">Cliente</button></td>'
                : '<td><button class="btn btn-info btn-xs btnCambiarEstadoLead" idLead="' . $lead["id_lead"] . '" estadoActualLead="1">Lead</button></td>';

              echo '<td class="text">' . htmlspecialchars($lead["creation_date"]) . '</td>
                <td class="text">' . htmlspecialchars($lead["cc"]) . '</td>
                <td class="text">' . htmlspecialchars($lead["first_name"] . ' ' . $lead["last_name"]) . '</td>
                <td class="text">' . htmlspecialchars($lead["phone"]) . '</td>
                <td class="text">' . htmlspecialchars($lead["sector"]) . '</td>
                <td>' . htmlspecialchars($lead["asesor_first_name"]) . ' ' . htmlspecialchars($lead["asesor_last_name"]) . '</td>
                <td class="text">' . htmlspecialchars($lead["origin"]) . '</td>
                <td class="text">' . htmlspecialchars($lead["note"]) . '</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning btnEditarLead" idLeads="' . $lead["id_lead"] . '" 
                      data-toggle="modal" data-target="#modalActualizarLead">
                      <i class="fa fa-pencil"></i>
                    </button>
                  </div>
                </td>
              </tr>';
            }
          }

          /* ============================
             PERFIL: ADMINISTRADORES
          ============================ */
          else if ($_SESSION["perfil"] === "Super Administrador" || $_SESSION["perfil"] === "Administrador") {

            $categorias = ControladorLeads::ctrVerInteresLead(null, null);

            foreach ($categorias as $key => $value) {
              echo '<tr>
                <td>' . ($key + 1) . '</td>';

              echo ($value["status_lead"] != 0)
                ? '<td><button class="btn btn-success btn-xs btnCambiarEstadoLead" idLead="' . $value["id_lead"] . '" estadoActualLead="0">Cliente</button></td>'
                : '<td><button class="btn btn-info btn-xs btnCambiarEstadoLead" idLead="' . $value["id_lead"] . '" estadoActualLead="1">Lead</button></td>';

              echo '<td class="text">' . htmlspecialchars($value["creation_date"]) . '</td>
                <td class="text">' . htmlspecialchars($value["cc"]) . '</td>
                <td class="text">' . htmlspecialchars($value["first_name"] . ' ' . $value["last_name"]) . '</td>
                <td class="text">' . htmlspecialchars($value["phone"]) . '</td>
                <td class="text">' . htmlspecialchars($value["sector"]) . '</td>
                <td>' . htmlspecialchars($value["asesor_first_name"]) . ' ' . htmlspecialchars($value["asesor_last_name"]) . '</td>
                <td class="text">' . htmlspecialchars($value["origin"]) . '</td>
                <td class="text">' . htmlspecialchars($value["note"]) . '</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning btnEditarLead" idLeads="' . $value["id_lead"] . '" 
                      data-toggle="modal" data-target="#modalActualizarLead">
                      <i class="fa fa-pencil"></i>
                    </button>
                    <button class="btn btn-danger btnEliminarLead" idLeads="' . $value["id_lead"] . '" style="margin-left: 8px;">
                      <i class="fa fa-times"></i>
                    </button>
                    <button class="btn btn-info btnAgregarNotaLead" 
                            idLeads="' . $value["id_lead"] . '" 
                            data-toggle="modal" 
                            data-target="#modalNotasLead">
                        <i class="fa fa-sticky-note"></i>
                    </button>
                  </div>
                </td>
              </tr>';
            }
          }

          /* ============================
             PERFIL: COORDINADOR COMERCIAL
          ============================ */
          else if ($_SESSION["perfil"] === "Coordinador comercial") {

            $id_coordinador = $_SESSION["id"];
            $leads = ControladorLeads::ctrVerLeadsCoordinador($id_coordinador);

            foreach ($leads as $key => $lead) {
              echo '<tr>
                <td>' . ($key + 1) . '</td>';

              echo ($lead["status_lead"] != 0)
                ? '<td><button class="btn btn-success btn-xs btnCambiarEstadoLead" idLead="' . $lead["id_lead"] . '" estadoActualLead="0">Cliente</button></td>'
                : '<td><button class="btn btn-info btn-xs btnCambiarEstadoLead" idLead="' . $lead["id_lead"] . '" estadoActualLead="1">Lead</button></td>';

              echo '<td class="text">' . htmlspecialchars($lead["creation_date"]) . '</td>
                <td class="text">' . htmlspecialchars($lead["cc"]) . '</td>
                <td class="text">' . htmlspecialchars($lead["first_name"] . ' ' . $lead["last_name"]) . '</td>
                <td class="text">' . htmlspecialchars($lead["phone"]) . '</td>
                <td class="text">' . htmlspecialchars($lead["sector"]) . '</td>
                <td>' . htmlspecialchars($lead["asesor"]) . '</td>
                <td class="text">' . htmlspecialchars($lead["origin"]) . '</td>
                <td class="text">' . htmlspecialchars($lead["note"]) . '</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning btnEditarLead" idLeads="' . $lead["id_lead"] . '" 
                      data-toggle="modal" data-target="#modalActualizarLead">
                      <i class="fa fa-pencil"></i>
                    </button>
                  </div>
                </td>
              </tr>';
            }
          }

          /* ============================
             PERFIL: GESTOR DE PAGOS
          ============================ */
          else if ($_SESSION["perfil"] === "Gestor de pagos") {

            $categorias = ControladorLeads::ctrVerInteresLead(null, null);

            foreach ($categorias as $key => $value) {
              echo '<tr>
                <td>' . ($key + 1) . '</td>';

              echo ($value["status_lead"] != 0)
                ? '<td><span class="label label-success">Cliente</span></td>'
                : '<td><span class="label label-info">Lead</span></td>';

              echo '<td class="text">' . htmlspecialchars($value["creation_date"]) . '</td>
                <td class="text">' . htmlspecialchars($value["cc"]) . '</td>
                <td class="text">' . htmlspecialchars($value["first_name"] . ' ' . $value["last_name"]) . '</td>
                <td class="text">' . htmlspecialchars($value["phone"]) . '</td>
                <td class="text">' . htmlspecialchars($value["sector"]) . '</td>
                <td>' . htmlspecialchars($value["asesor_first_name"]) . ' ' . htmlspecialchars($value["asesor_last_name"]) . '</td>
                <td class="text">' . htmlspecialchars($value["origin"]) . '</td>
                <td class="text">' . htmlspecialchars($value["note"]) . '</td>
                <td></td>
              </tr>';
            }
          }
          ?>
        </tbody>

        <tfoot>
          <tr>
            <th style="width:10px">N°</th>
            <th>Estado</th>
            <th>Fecha de registro</th>
            <th>Documento</th>
            <th>Cliente</th>
            <th>Teléfono</th>
            <th>Sector de interés</th>
            <th>Asesor asignado</th>
            <th>Medio de contacto</th>
            <th>Notas</th>
            <th style="width:80px">Opciones</th>
          </tr>
        </tfoot>

      </table>

    </div>
  </div>
</section>


</div>


<div class="modal fade" id="confirmacionModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background: #3e383d; color: white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Actualizar estado del cliente</h4>
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
                    <div class="container-fluid">

                      <!-- Información del Cliente -->
                      <h5>Información del Cliente</h5>
                      <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                          <div class="floating-label-group">
                            <input type="text" class="form-control" name="nuevoIdCliente" id="nuevoIdCliente" placeholder=" " required>
                            <label for="nuevoIdCliente">Identificación</label>
                            <input type="hidden" name="idLeads" id="idLeads" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                          <div class="floating-label-group">
                            <input type="text" class="form-control" name="nuevoNombre" id="nuevoNombre" placeholder=" ">
                            <label for="nuevoNombre">Nombre</label>
                          </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                          <div class="floating-label-group">
                            <input type="text" class="form-control" name="nuevoApellido" id="nuevoApellido" placeholder=" ">
                            <label for="nuevoApellido">Apellido</label>
                          </div>
                        </div>
                      </div>

                      <!-- Residencia -->
                      <h5>Residencia</h5>
                      <div class="row">
                        <div class="col-12 col-sm-4">
                          <div class="floating-label-group">
                            <select id="countryValue" class="form-control" required>
                              <option value="" disabled selected></option>
                            </select>
                            <label for="countryValue"> </label>
                          </div>
                        </div>
                        <div class="col-12 col-sm-4">
                          <div class="floating-label-group">
                            <select id="stateValue" class="form-control" disabled required>
                              <option value="" disabled selected></option>
                            </select>
                            <label for="stateValue"> </label>
                          </div>
                        </div>
                        <div class="col-12 col-sm-4">
                          <div class="floating-label-group">
                            <select id="cityValue" class="form-control" disabled required>
                              <option value="" disabled selected></option>
                            </select>
                            <label for="cityValue"> </label>
                          </div>
                        </div>
                      </div>
                      <!-- ocultos -->
                      <input type="hidden" name="nuevoPais" id="nuevoPais">
                      <input type="hidden" name="nuevoEstado" id="nuevoEstado">
                      <input type="hidden" name="nuevoCiudad" id="nuevoCiudad">

                      <!-- Tipo de Cliente -->
                      <h5>Tipo de Cliente</h5>
                      <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                          <div class="floating-label-group">
                            <select class="form-control" name="nuevoTipoCliente" id="tipoCliente" required>
                              <option value="" disabled selected></option>
                              <option value="Persona Natural">Persona Natural</option>
                              <option value="Empresa">Empresa</option>
                            </select>
                            <label for="tipoCliente">Tipo de Cliente</label>
                          </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6" id="numEmpleadosContainer">
                          <div class="floating-label-group">
                            <input type="number" class="form-control" name="nuevoEmpleado" placeholder=" ">
                            <label for="nuevoEmpleado">Número de Empleados</label>
                          </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6" id="AniosContainer">
                          <div class="floating-label-group">
                            <input type="number" class="form-control" name="nuevoAnosExperiencia" placeholder=" ">
                            <label for="nuevoAnosExperiencia">Años de experiencia</label>
                          </div>
                        </div>
                      </div>

                      <!-- Información de Contacto -->
                      <h5>Información de Contacto</h5>
                      <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                          <div class="floating-label-group">
                            <input type="email" class="form-control" name="nuevoEmail" id="nuevoEmail" placeholder=" ">
                            <label for="nuevoEmail">Correo electrónico</label>
                          </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                          <div class="floating-label-group">
                            <input type="text" class="form-control" name="nuevoTelefono" id="nuevoTelefono" placeholder=" ">
                            <label for="nuevoTelefono">Teléfono</label>
                          </div>
                        </div>
                      </div>

                      <!-- Footer -->
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="creaCliente">Guardar Cambios</button>
                      </div>
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

<?php
include_once __DIR__ . '/../../components/modules/leads/FormRegisterLead.php';
include_once __DIR__ . '/../../components/modules/leads/FormUpdateLead.php';
include_once __DIR__ . '/../../components/modules/leads/ModalDialogNotes.php';

?>