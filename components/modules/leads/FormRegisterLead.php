<style>
  .modal-header {
    background: #3e383d;
    color: white;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
  }


  .modal-dialog {
    max-width: 800px;
    width: 100%;
  }

  input.form-control,
  select.form-control,
  textarea.form-control {
    height: 40px !important;
  }

  .modal-content {
    border-radius: 8px;
  }

  .modal-body {
    padding: 2rem;
  }

  .form-control {
    border-radius: 4px;
  }

  .form-control.input-lg {
    height: calc(1.5em + .75rem + 4px);
    padding: .75rem 1.25rem;
    font-size: 1.25rem;
    line-height: 1.5;
    border-radius: .3rem;
  }

  .row {
    padding: 10px 0;
  }

  .input-group {
    display: flex;
    margin-bottom: 10px;
  }

  .input-group .form-control {
    border: 1px solid #ced4da;
    border-radius: .25rem;
  }

  .input-group-addon {
    background-color: #e9ecef;
    border: 1px solid #ced4da;
    padding: 6px 12px;
    padding-right: 30px;
    font-size: 16px;
    border-radius: 0.25rem;
  }

  /* Floating labels */
  .floating-label-group {
    position: relative;
    display: flex;
    flex-direction: column;
  }

  .floating-label-group input {
    height: 50px;
    padding: 12px 12px 0 12px;
  }

  .floating-label-group label {
    position: absolute;
    top: 50%;
    left: 12px;
    transform: translateY(-50%);
    font-size: 16px;
    color: #aaa;
    pointer-events: none;
    transition: all 0.2s ease;
  }

  .floating-label-group input:focus+label,
  .floating-label-group input:not(:placeholder-shown)+label {
    top: 0;
    font-size: 12px;
    color: #555;
    background: white;
    padding: 0 5px;
  }


  #modalAgregarLead h5 {
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

  #modalAgregarLead label {
    font-size: 1.2rem;
    font-weight: 500;
    color: #555;
    font-family: "Segoe UI", Arial, sans-serif;
  }
</style>

<div id="modalAgregarLead" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg"><!-- modal más grande y flexible -->

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!-- CABEZA DEL MODAL -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar nuevo cliente</h4>
        </div>

        <!-- CUERPO DEL MODAL -->
        <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
          <div class="box-body">
            <div class="container-fluid">

              <!-- Información del Usuario -->
              <h5>Información del Usuario</h5>
              <div class="row">
                <div class="col-12 col-sm-6 col-md-6">
                  <div class="floating-label-group">
                    <input type="text" class="form-control" name="nuevoIdLead" id="nuevoIdLead" placeholder=" ">
                    <label for="nuevoIdLead">Identificación</label>
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

              <!-- Área de Derecho y Servicio Solicitado -->
              <h5>Área de Derecho y Servicio Solicitado</h5>
              <div class="row">
                <div class="col-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label for="nuevaArea">Área de Derecho</label>
                    <select class="form-control" name="nuevaArea" id="nuevaArea" required>
                      <option value="" disabled selected>Seleccione un área</option>
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

                <div class="col-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label for="nuevoServicio">Servicio</label>
                    <select class="form-control" name="nuevoServicio" id="nuevoServicio" required>
                      <option value="" disabled selected>Seleccione un servicio</option>
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

              <!-- Información Adicional -->
              <h5>Información Adicional</h5>
              <div class="row">
                <div class="col-12 col-sm-6 col-md-6">
                  <div class="floating-label-group">
                    <input type="text" class="form-control" name="origenLead" id="origenLead" placeholder=" ">
                    <label for="origenLead">Cómo se enteró del servicio</label>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6">
                  <div class="floating-label-group">
                    <input type="text" class="form-control" name="observaciones" id="observaciones" placeholder=" ">
                    <label for="observaciones">Observaciones</label>
                  </div>
                </div>
              </div>

              <!-- Grupo Poblacional -->
              <h5>Grupo Poblacional</h5>
              <div class="row">
                <div class="col-12 col-sm-6 col-md-6">
                  <div class="floating-label-group">
                    <select class="form-control" name="nuevoSector" id="nuevoSector">
                      <option value=" " disabled selected>Seleccione una opción</option>
                      <option value="Fuerzas armadas">Fuerzas armadas</option>
                      <option value="Ministerio publico">Ministerio público</option>
                      <option value="Naturales">Naturales</option>
                    </select>
                  </div>
                </div>
              </div>
              <?php if ($_SESSION["perfil"] == "Super Administrador" || $_SESSION["perfil"] == "Coordinador comercial") { ?>
                <h5>Asignar Asesor</h5>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group floating-label-group">
                      <label for="AsignarAsesor"> </label>
                      <select class="form-control input-lg" name="AsignarAsesor" id="AsignarAsesor">
                        <option value="0">Sin asesor</option>
                        <?php
                        $item = null;
                        $valor = null;

                        if ($_SESSION["perfil"] == "Super Administrador") {
                          $usuarios = ControladorUsuarios::ctrMostrarAsesoresCoordinadores($item, $valor);
                        } elseif ($_SESSION["perfil"] == "Coordinador comercial") {
                          $usuarios = ControladorUsuarios::ctrMostrarAsesores($item, $valor);
                        }

                        foreach ($usuarios as $key => $value) {
                          echo '<option value="' . $value["id"] . '">' .
                            $value["first_name"] . ' ' . $value["last_name"] . ' - ' . $value["perfil"] .
                            '</option>';
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
              <?php } ?>
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