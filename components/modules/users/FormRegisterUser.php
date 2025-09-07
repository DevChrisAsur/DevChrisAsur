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


  #modalAgregarUsuario h5 {
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

  #modalAgregarUsuario label {
    font-size: 1.2rem;
    font-weight: 500;
    color: #555;
    font-family: "Segoe UI", Arial, sans-serif;
  }
</style>

<!--=====================================
MODAL AGREGAR USUARIO
======================================-->
<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <!-- CABEZA DEL MODAL -->
        <div class="modal-header" style="background:#3e383d; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar nuevo usuario</h4>
        </div>

        <!-- CUERPO DEL MODAL -->
        <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
          <div class="box-body container-fluid">

            <!-- INFORMACIÓN DEL USUARIO -->
            <h5>Información del Usuario</h5>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group floating-label-group">
                  <input type="number" class="form-control" id="nuevoIdentificacion" name="nuevoIdentificacion" placeholder=" " required>
                  <label for="nuevoIdentificacion">Identificación</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group floating-label-group">
                  <input type="text" class="form-control" name="nuevoNombre" id="nuevoNombre" placeholder=" " required>
                  <label for="nuevoNombre">Nombres</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group floating-label-group">
                  <input type="text" class="form-control" name="nuevoApellido" placeholder=" " required>
                  <label for="nuevoApellido">Apellidos</label>
                </div>
              </div>
            </div>

            <!-- INFORMACIÓN DE CONTACTO -->
            <h5>Información de Contacto</h5>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group floating-label-group">
                  <input type="email" class="form-control" name="nuevoCorreo" placeholder=" " required>
                  <label for="nuevoCorreo">Correo electrónico</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group floating-label-group">
                  <input type="text" class="form-control" name="nuevoTelefono" placeholder=" " required>
                  <label for="nuevoTelefono">Teléfono de contacto</label>
                </div>
              </div>
            </div>

            <!-- INFORMACIÓN DEL SISTEMA -->
            <h5>Información del Sistema</h5>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group floating-label-group">
                  <input type="text" class="form-control" name="nuevoUsuario" placeholder=" " required>
                  <label for="nuevoUsuario">Nombre de usuario</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group floating-label-group">
                  <input type="password" class="form-control" name="nuevoPassword" placeholder=" " required>
                  <label for="nuevoPassword">Contraseña del sistema</label>
                </div>
              </div>
            </div>

            <!-- ÁREA Y PERFIL -->
            <h5>Área y Perfil</h5>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group floating-label-group">
                  <select class="form-control input-lg" name="nuevaArea" required>
                    <option value="">Seleccionar Área</option>
                    <?php
                    $item = null;
                    $valor = null;
                    $categorias = ControladorAreas::ctrMostrarAreas($item, $valor);
                    foreach ($categorias as $key => $value) {
                      echo '<option value="' . $value["area"] . '">' . $value["area"] . '</option>';
                    }
                    ?>
                  </select>
                  <label for="nuevaArea"> </label>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group floating-label-group">
                  <select class="form-control input-lg" name="nuevoPerfil" required>
                    <option value="">Seleccionar Perfil</option>
                    <?php
                    if ($comparar == "Super Administrador") {
                      echo '
                        <option value="Super Administrador">Super Administrador</option>
                        <option value="Coordinador comercial">Coordinador comercial</option>
                        <option value="Asesor comercial">Asesor comercial</option>
                        <option value="Gestor de pagos">Gestor de pagos</option>';
                    } elseif ($comparar == "Administrador") {
                      echo '
                        <option value="Coordinador comercial">Coordinador comercial</option>
                        <option value="Asesor comercial">Asesor comercial</option>
                        <option value="Gestor de pagos">Gestor de pagos</option>';
                    } elseif ($comparar == "Director comercial") {
                      echo '
                        <option value="Asesor comercial">Asesor comercial</option>
                        <option value="Coordinador comercial">Coordinador comercial</option>';
                    } elseif ($comparar == "Coordinador comercial") {
                      echo '<option value="Asesor comercial">Asesor comercial</option>';
                    }
                    ?>
                  </select>
                  <label for="nuevoPerfil"> </label>
                </div>
              </div>
            </div>

            <!-- ASOCIAR COORDINADOR -->
            <h5>Asociar Coordinador</h5>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group floating-label-group">
                  <select class="form-control input-lg" name="nuevoCoordinador">
                    <option value="">Asociar coordinador</option>
                    <?php
                    $item = null;
                    $valor = null;
                    $categorias = ControladorUsuarios::ctrMostrarCoordinadores($item, $valor);
                    echo '<option value="0">Sin asesor</option>';
                    foreach ($categorias as $key => $value) {
                      echo '<option value="' . $value["id"] . '">' . $value["first_name"] . ' ' . $value["last_name"]. ' - ' .$value["perfil"] .  '</option>';
                    }

                    ?>
                  </select>
                  <label for="nuevoCoordinador"> </label>
                </div>
              </div>
            </div>

          </div> <!-- .box-body -->
        </div> <!-- .modal-body -->

        <!-- PIE DEL MODAL -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" name="register" class="btn btn-primary">Guardar usuario</button>
        </div>

        <?php
        $crearUsuario = new ControladorUsuarios();
        $crearUsuario->ctrCrearUsuario();
        ?>

      </form>
    </div>
  </div>
</div>