<style>
    #modalEditarUsuario h5 {
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

  #modalEditarUsuario label {
    font-size: 1.2rem;
    font-weight: 500;
    color: #555;
    font-family: "Segoe UI", Arial, sans-serif;
  }
</style>
<!--=====================================
MODAL EDITAR USUARIO
======================================-->
<div id="modalEditarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <!-- CABEZA DEL MODAL -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar usuario</h4>
        </div>

        <!-- CUERPO DEL MODAL -->
        <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
          <div class="box-body container-fluid">

            <!-- INFORMACIÓN DEL USUARIO -->
            <h5>Información del Usuario</h5>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group floating-label-group">
                  <input type="text" class="form-control" id="editarNombre" name="editarNombre" placeholder=" ">
                  <label for="editarNombre">Nombres</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group floating-label-group">
                  <input type="text" class="form-control" id="editarApellido" name="editarApellido" placeholder=" ">
                  <label for="editarApellido">Apellidos</label>
                </div>
              </div>
            </div>

            <!-- INFORMACIÓN DE CONTACTO -->
            <h5>Información de Contacto</h5>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group floating-label-group">
                  <input type="email" class="form-control" id="editarCorreo" name="editarCorreo" placeholder=" ">
                  <label for="editarCorreo">Correo electrónico</label>
                  <input type="hidden" id="correodActual" name="correodActual">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group floating-label-group">
                  <input type="text" class="form-control" id="editarTelefone" name="editarTelefone" placeholder=" ">
                  <label for="editarTelefone">Teléfono de contacto</label>
                </div>
              </div>
            </div>

            <!-- INFORMACIÓN DEL SISTEMA -->
            <h5>Información del Sistema</h5>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group floating-label-group">
                  <input type="text" class="form-control" id="editarUsuario" name="editarUsuario" placeholder=" ">
                  <label for="editarUsuario">Nombre de usuario</label>
                  <input type="hidden" name="idUsuario" id="idUsuario">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group floating-label-group">
                  <input type="password" class="form-control" name="editarPassword" placeholder=" ">
                  <label for="editarPassword">Contraseña del sistema</label>
                  <input type="hidden" id="passwordActual" name="passwordActual">
                </div>
              </div>
            </div>

            <!-- ÁREA Y PERFIL -->
            <h5>Área y Perfil</h5>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group floating-label-group">
                  <select class="form-control input-lg" id="editarArea" name="editarArea">
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
                  <label for="editarArea"></label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group floating-label-group">
                  <select class="form-control input-lg" id="editarPerfil" name="editarPerfil">
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
                  <label for="editarPerfil"></label>
                </div>
              </div>
            </div>

            <!-- REASIGNAR COORDINADOR -->
            <h5>Reasignar Coordinador</h5>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group floating-label-group">
                  <select class="form-control input-lg" id="reasignarCoordinador" name="reasignarCoordinador">
                    <option value="0">Sin coordinador</option>
                    <?php
                    $item = null;
                    $valor = null;
                    $coordinadores = ControladorUsuarios::ctrMostrarCoordinadores($item, $valor);
                    foreach ($coordinadores as $key => $value) {
                      echo '<option value="' . $value["id"] . '">' . $value["first_name"] . ' ' . $value["last_name"]. ' - ' .$value["perfil"] . '</option>';
                    }
                    ?>
                  </select>
                  <label for="reasignarCoordinador"></label>
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- PIE DEL MODAL -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" name="register" class="btn btn-primary">Actualizar usuario</button>
        </div>

        <?php
        $editarUsuario = new ControladorUsuarios();
        $editarUsuario->ctrEditarUsuario();
        ?>
      </form>
    </div>
  </div>
</div>
