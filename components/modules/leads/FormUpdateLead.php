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
    color: #007bff;
    background: white;
    padding: 0 5px;
  }


  #modalActualizarLead h5 {
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


  #modalActualizarLead label {
    font-size: 1.2rem;
    font-weight: 500;
    color: #555;
    font-family: "Segoe UI", Arial, sans-serif;
  }
</style>
<div id="modalActualizarLead" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!-- CABEZA DEL MODAL -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Lead</h4>
        </div>

        <!-- CUERPO DEL MODAL -->
        <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
          <div class="container-fluid">

            <!-- Información del Usuario -->
            <h5>Información del Usuario</h5>
            <div class="row">
              <div class="col-12 col-sm-6 col-md-6">
                <div class="floating-label-group">
                  <input type="text" class="form-control" name="editarNombre" id="editarNombre" placeholder=" " required>
                  <label for="editarNombre">Nombre</label>
                  <input type="hidden" name="idLeads" id="idLeads" required>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-6">
                <div class="floating-label-group">
                  <input type="text" class="form-control" name="editarApellido" id="editarApellido" placeholder=" " required>
                  <label for="editarApellido">Apellido</label>
                </div>
              </div>
            </div>

            <h5>Información de Contacto</h5>
            <div class="row">
              <div class="col-12 col-sm-6 col-md-6">
                <div class="floating-label-group">
                  <input type="email" class="form-control" name="editarCorreo" id="editarCorreo" placeholder=" " required>
                  <label for="editarCorreo">Correo electrónico</label>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-6">
                <div class="floating-label-group">
                  <input type="text" class="form-control" name="editarTelefono" id="editarTelefono" placeholder=" " required>
                  <label for="editarTelefono">Teléfono</label>
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