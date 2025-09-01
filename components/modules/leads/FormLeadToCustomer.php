<style>
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


#confirmacionModal label {
  font-size: 1.2rem;
  font-weight: 500;
  color: #555;
  font-family: "Segoe UI", Arial, sans-serif;
}


#confirmacionModal .form-control {
  border-radius: 4px;
  height: 40px !important;
}

#confirmacionModal .floating-label-group {
  position: relative;
  display: flex;
  flex-direction: column;
}


#confirmacionModal .floating-label-group input {
  height: 50px;
  padding: 12px 12px 0 12px;
}


#confirmacionModal .floating-label-group label {
  position: absolute;
  top: 50%;
  left: 12px;
  transform: translateY(-50%);
  font-size: 16px;
  color: #aaa;
  pointer-events: none;
  transition: all 0.2s ease;
}

#confirmacionModal .floating-label-group input:focus+label,
#confirmacionModal .floating-label-group input:not(:placeholder-shown)+label {
  top: 0;
  font-size: 12px;
  color: #007bff;
  background: white;
  padding: 0 5px;
}
</style>
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

<script>
  $(document).on('click', '.tab a', function(e) {
  e.preventDefault();

  // Ocultar todas las pestañas
  $('.tab-content').hide();

  // Mostrar la pestaña clicada
  const target = $(this).attr('href');
  $(`${target} .tab-content`).show();
});

// Inicializar siempre en tab1
$('#confirmacionModal').on('shown.bs.modal', function () {
  $('.tab-content').hide();
  $('#tab1 .tab-content').show();
});

</script>

<script>
  $(document).on('change', '#tipoCliente', function() {
  var tipoCliente = $(this).val();
  if (tipoCliente === 'Persona Natural') {
    $('#numEmpleadosContainer input').val(0).attr('readonly', true);
    $('#AniosContainer input').val(0).attr('readonly', true);
  } else {
    $('#numEmpleadosContainer input').val('').removeAttr('readonly');
    $('#AniosContainer input').val('').removeAttr('readonly');
  }
});

</script>

<!-- <script>
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
</script> -->
