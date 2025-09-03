<style>
  .modal-body .container {
  width: 100% !important;
  padding-left: 0;
  padding-right: 0;
  margin-left: 0;
  margin-right: 0;
}

.modal-header {
  background: #3e383d;
  color: white;
}

.btn-group {
  display: flex;
  flex-wrap: nowrap;
}

.btn-group .btn {
  margin: 0 5px;
  white-space: nowrap;
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

.form-group {
  display: flex;
  flex-direction: column;
  gap: 5px;
}

.modal-dialog {
  max-width: 80%;
  width: auto;
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

.input-group .form-control {
  border: 1px solid #ced4da;
  border-radius: .25rem;
}

.input-group-addon {
  background-color: #e9ecef;
  border: 1px solid #ced4da;
  border-radius: .25rem;
}

/* Colores para perfiles */
.perfil-super-administrador {
  background-color: #922b21;
  color: black;
  padding: 5px;
  border-radius: 7px;
  font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
}

.perfil-administrador {
  background-color: #cd6155;
  color: black;
  padding: 5px;
  border-radius: 3px;
  font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
}

.perfil-asesor-comercial {
  background-color: #d4edda;
  color: #155724;
  padding: 5px;
  border-radius: 3px;
  font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
}

.perfil-coordinador-comercial {
  background-color: #2196F3;
  color: black;
  padding: 5px;
  border-radius: 3px;
  font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
}

.perfil-director-comercial {
  background-color: #ffeeba;
  color: #856404;
  padding: 5px;
  border-radius: 3px;
  font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
}

.perfil-especialista-juridico {
  background-color: #f8d7da;
  color: #721c24;
  padding: 5px;
  border-radius: 3px;
  font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
}

.perfil-director-juridico {
  background-color: #d1ecf1;
  color: #0c5460;
  padding: 5px;
  border-radius: 3px;
  font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
}
.dt-button-collection.dropdown-menu {
    background-color: #007bff;
    color: #ffffff;
    padding: 10px;
}
</style>
<!-- Datatables -->
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
  integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css">
<!-- filtrar fechas -->
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.3.1/css/dataTables.dateTime.min.css">
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
  integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer">
</script>

<!-- Datatables librerias -->

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
  localStorage.setItem('rutaActual', 'usuarios');
</script>
<script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
<div class="content-wrapper">

  <section class="content-header">
    <h1>
      <?php
      // Verificar el perfil del usuario y mostrar el mensaje correspondiente
      if ($_SESSION["perfil"] == "Super Administrador") {
        echo "Administrar Usuarios";
      } elseif ($_SESSION["perfil"] == "Coordinador comercial") {
        echo "Administrar Asesores";
      } else {
        echo "Bienvenido, " . $_SESSION["perfil"];
      }
      ?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar usuarios</li>
    </ol>
  </section>

  <section class="content">

    <div class="box">
      <!-- Verificar si el usuario tiene el perfil de Super Administrador -->
      <?php if ($_SESSION["perfil"] == "Super Administrador" || $_SESSION["perfil"] == "Coordinador comercial"): ?>
        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
            Agregar usuario
          </button>
        </div>
      <?php endif; ?>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th style="width:100px">Status</th>
              <th style="width:100px">Identificación</th>
              <th style="width:100px">Nombre</th>
              <th style="width:100px">Coordinador</th>
              <th style="width:100px">Perfil</th>
              <th style="width:100px">Area</th>
              <th style="width:100px">Correo</th>
              <th style="width:100px">Telefono</th>
              <th style="width:100px">Último login</th>
              <th style="width:40px">Acciones</th>
            </tr>
          </thead>

          <tbody>
              <?php
                // Verificar si el usuario tiene el perfil de Super Administrador
                if ($_SESSION["perfil"] == "Super Administrador") {

                  $item = null;
                  $valor = null;

                  // Mostrar los usuarios usando el nuevo controlador
                  $usuarios = ControladorUsuarios::ctrVerUsuariosParaAdminitradores($item, $valor);

                  foreach ($usuarios as $key => $value) {
                    echo '<tr>
                    <td>' . ($key + 1) . '</td>';
                    // Botón de estado (se mantiene igual)
                    if ($value["user_status"] != 0) {
                      echo '<td><button class="btn btn-success btn-xs btnAprobarPagoPension" idUsuario="' . $value["id"] . '" estadoPagoPension="0">Habilitado</button></td>';
                    } else {
                      echo '<td><button class="btn btn-danger btn-xs btnAprobarPagoPension" idUsuario="' . $value["id"] . '" estadoPagoPension="1">No Habilitado</button></td>';
                    }
                    echo '<td>' . htmlspecialchars($value["cc"]) . '</td>
                    <td>' . htmlspecialchars($value["usuario_nombre"]) . '</td>';
                    // Mostrar coordinador
                    echo '<td>' . htmlspecialchars($value["coordinador_nombre"]) . '</td>';
                    // Asignar clase según el perfil
                    $perfilClass = '';
                    switch ($value["perfil"]) {
                      case 'Super Administrador':
                        $perfilClass = 'perfil-super-administrador';
                        break;
                      case 'Administrador':
                        $perfilClass = 'perfil-administrador';
                        break;
                      case 'Asesor comercial':
                        $perfilClass = 'perfil-asesor-comercial';
                        break;
                      case 'Coordinador comercial':
                        $perfilClass = 'perfil-coordinador-comercial';
                        break;
                      case 'Director comercial':
                        $perfilClass = 'perfil-director-comercial';
                        break;
                      case 'Especialista juridico':
                        $perfilClass = 'perfil-especialista-juridico';
                        break;
                      case 'Director juridico':
                        $perfilClass = 'perfil-director-juridico';
                        break;
                    }

                    echo '<td><span class="' . $perfilClass . '">' . htmlspecialchars($value["perfil"]) . '</span></td>
              <td>' . htmlspecialchars($value["area"]) . '</td>
              <td>' . htmlspecialchars($value["correo"]) . '</td>
              <td>' . htmlspecialchars($value["phone"]) . '</td>';

                    // Fecha último login
                    if (!empty($value["ultimo_login"])) {
                      $fechaFormateada = date('d/m/Y H:i:s', strtotime($value["ultimo_login"]));
                      echo '<td>' . $fechaFormateada . '</td>';
                    } else {
                      echo '<td>Sin registro</td>';
                    }
                    // Botones de acción
                    echo '<td>
                      <div class="btn-group-container">
                        <div class="btn-group">
                          <button class="btn btn-warning btnEditarUsuario" idUsuario="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>
                          <button class="btn btn-danger btnEliminarUsuario" idUsuario="' . $value["id"] . '" title="Eliminar Cliente">
                            <i class="fa fa-times"></i>
                          </button>
                        </div>
                      </div>
                    </td>
                </tr>';
                  }
                }
            ?>

            <?php
            // Verificar si el usuario tiene el perfil de Coordinador comercial o Director comercial
            if (in_array($_SESSION["perfil"], ["Coordinador comercial", "Director comercial"])) {

              // Obtener el ID del coordinador desde la sesión y asegurarse de que sea un entero
              $idCoordinador = isset($_SESSION["id"]) ? (int) $_SESSION["id"] : 0; // Asegurarse de que sea un entero

              if ($idCoordinador > 0) {
                // Llamar al controlador para obtener los asesores asociados
                $usuarios = ControladorUsuarios::ctrMostrarAsesoresPorCoordinador($idCoordinador);

                foreach ($usuarios as $key => $value) {
                  echo '<tr>
                  <td>' . ($key + 1) . '</td>';

                  // Verificar el estado del usuario
                  if ($value["user_status"] != 0) {
                    echo '<td><button class="btn btn-success btn-xs btnAprobarPagoPension" idUsuario="' . $value["id"] . '" estadoPagoPension="0">Habilitado</button></td>';
                  } else {
                    echo '<td><button class="btn btn-danger btn-xs btnAprobarPagoPension" idUsuario="' . $value["id"] . '" estadoPagoPension="1">Inhabilitado</button></td>';
                  }

                  // Mostrar información del asesor
                  echo '<td>' . htmlspecialchars($value["cc"]) . '</td>
                  <td>' . htmlspecialchars($value["first_name"]) . '</td>
                  <td>' . htmlspecialchars($value["last_name"]) . '</td>
                  <td>' . htmlspecialchars($value["user_name"]) . '</td>';

                  // Asignar clase según el perfil del asesor
                  $perfilClass = '';
                  switch ($value["perfil"]) {
                    case 'Super Administrador':
                      $perfilClass = 'perfil-super-administrador';
                      break;
                    case 'Administrador':
                      $perfilClass = 'perfil-administrador';
                      break;
                    case 'Asesor comercial':
                      $perfilClass = 'perfil-asesor-comercial';
                      break;
                    case 'Coordinador comercial':
                      $perfilClass = 'perfil-coordinador-comercial';
                      break;
                    case 'Director comercial':
                      $perfilClass = 'perfil-director-comercial';
                      break;
                    case 'Especialista juridico':
                      $perfilClass = 'perfil-especialista-juridico';
                      break;
                    case 'Director juridico':
                      $perfilClass = 'perfil-director-juridico';
                      break;
                    default:
                      $perfilClass = 'perfil-otros'; // Clase por defecto en caso de no coincidir con ningún perfil
                      break;
                  }

                  echo '<td><span class="' . $perfilClass . '">' . htmlspecialchars($value["perfil"]) . '</span></td>';
                  echo '<td>' . htmlspecialchars($value["area"]) . '</td>
                  <td>' . htmlspecialchars($value["correo"]) . '</td>
                  <td>' . htmlspecialchars($value["phone"]) . '</td>';

                  // Verificar si la fecha de 'ultimo_login' está disponible y formatearla
                  if (!empty($value["ultimo_login"])) {
                    $fechaFormateada = date('d/m/Y H:i:s', strtotime($value["ultimo_login"]));
                    echo '<td>' . $fechaFormateada . '</td>';
                  } else {
                    echo '<td>Sin registro</td>';
                  }

                  echo '</tr>';
                }
              } else {
                echo '<tr><td colspan="10">No se encontraron asesores asociados.</td></tr>';
              }
            }
            ?>




          </tbody>

          <tfoot>
            <tr>
              <th style="width:10px">#</th>
              <th style="width:100px">Status</th>
              <th style="width:100px">Identificación</th>
              <th style="width:100px">Nombre</th>
              <th style="width:100px">Coordinador</th>
              <th style="width:100px">Perfil</th>
              <th style="width:100px">Area</th>
              <th style="width:100px">Correo</th>
              <th style="width:100px">Telefono</th>
              <th style="width:100px">Último login</th>
              <th style="width:40px">Acciones</th>
            </tr>
          </tfoot>

        </table>

      </div>

    </div>

  </section>

</div>




<script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>


<div class="modal fade" id="confirmacionModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:Gold; color:white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Confirmacion</h4>

      </div>

      <div class="modal-body">
        ¿Está seguro de que desea cambiar el estado del usuario?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" style="background:Black; color:white" id="confirmarAccion">Confirmar</button>
      </div>
    </div>
  </div>
</div>
<?php
$borrarUsuario = new ControladorUsuarios();
$borrarUsuario->ctrBorrarUsuario();
?>
<?php
include_once __DIR__ . '/../../components/modules/users/FormRegisterUser.php';
include_once __DIR__ . '/../../components/modules/users/FormUpdateUser.php';
?>
<!-- MODAL DE CONFIRMACION PARA EL CAMBIO DE ESTADO -->
<div class="modal fade" id="confirmacionModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Confirmacion</h4>

      </div>

      <div class="modal-body">
        ¿Está seguro de modificar el estado del usuario?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" style="background:Black; color:white" id="confirmarAccion">Confirmar</button>
      </div>
    </div>
  </div>
</div>


<script>
  $(".tablas").on("click", ".btnReenviarCorreo", function() {

    var idUsuario = $(this).attr("idUsuario");
    var usuario = $(this).attr("usuario");
    var idUser = $(this).attr("idUser")

    swal({
      title: '¿Está seguro de Reenviar el correo?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, Reenviar correo!'
    }).then(function(result) {

      if (result.value) {

        //window.location = "correos.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&idUser="+idUser;
        window.location = "correos.php?&idUsuario=" + idUsuario;
      }

    })

  })
</script>