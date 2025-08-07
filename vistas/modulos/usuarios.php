
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

    .form-group {
      display: flex;
      flex-direction: column; /* Cambia a row si quieres alinear en una fila */
      gap: 5px; /* Espacio entre label e input */
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
    .perfil-super-administrador {
    background-color: #922b21;
    /* Rojo oscuro */
    color: black;
    padding: 5px;
    border-radius: 7px;
    font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
  }

  .perfil-administrador {
    background-color: #cd6155;
    /* Azul oscuro */
    color: black;
    padding: 5px;
    border-radius: 3px;
    font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
  }

  .perfil-asesor-comercial {
    background-color: #d4edda;
    /* Verde claro */
    color: #155724;
    /* Verde oscuro */
    padding: 5px;
    border-radius: 3px;
    font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
  }

  .perfil-coordinador-comercial {
    background-color: #2196F3;
    /* Azul claro */
    color: black;
    padding: 5px;
    border-radius: 3px;
    font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
  }

  .perfil-director-comercial {
    background-color: #ffeeba;
    /* Amarillo claro */
    color: #856404;
    /* Amarillo oscuro */
    padding: 5px;
    border-radius: 3px;
    font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
  }

  .perfil-especialista-juridico {
    background-color: #f8d7da;
    /* Rojo claro */
    color: #721c24;
    /* Rojo oscuro */
    padding: 5px;
    border-radius: 3px;
    font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
  }

  .perfil-director-juridico {
    background-color: #d1ecf1;
    /* Celeste claro */
    color: #0c5460;
    /* Celeste oscuro */
    padding: 5px;
    border-radius: 3px;
    font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
  }   

  .floating-label-group {
    position: relative;
    display: flex;
    flex-direction: column;
  }

  .floating-label-group input {
    height: 50px;
    padding: 12px 12px 0 12px; /* Espacio para el label */
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

  .floating-label-group input:focus + label,
  .floating-label-group input:not(:placeholder-shown) + label {
    top: 0;
    font-size: 12px;
    color: #007bff;
    background: white;
    padding: 0 5px;
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
              <th style="width:100px">Apellido</th>
              <th style="width:100px">Usuario</th>
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
          // Verificar si el usuario tiene el perfil de Super Administrador o Administrador
          if ($_SESSION["perfil"] == "Super Administrador" || $_SESSION["perfil"] == "Administrador") {

              $item = null;
              $valor = null;
              
              // Mostrar los usuarios solo para Super Administrador o Administrador
              $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

              foreach ($usuarios as $key => $value) {
                  echo '<tr>
                        <td>' . ($key + 1) . '</td>';
                        if($value["user_status"] != 0){
                          echo '<td><button class="btn btn-success btn-xs btnAprobarPagoPension" idUsuario="'.$value["id"].'" estadoPagoPension="0">Habilitado</button></td>';
                      } else {
                          echo '<td><button class="btn btn-danger btn-xs btnAprobarPagoPension" idUsuario="'.$value["id"].'" estadoPagoPension="1">No Habilitado</button></td>';
                      };
                  echo '<td>' . $value["cc"] . '</td>
                        <td>' . $value["first_name"] . '</td>
                        <td>' . $value["last_name"] . '</td>
                        <td>' . $value["user_name"] . '</td>';

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

                  echo '<td><span class="' . $perfilClass . '">' . $value["perfil"] . '</span></td>';
                  echo '<td>' . $value["area"] . '</td>
                        <td>' . $value["correo"] . '</td>
                        <td>' . $value["phone"] . '</td>';

                  // Verificar si la fecha de 'ultimo_login' está disponible y formatearla
                  if (isset($value["ultimo_login"])) {
                      $fechaFormateada = date('d/m/Y H:i:s', strtotime($value["ultimo_login"]));
                      echo '<td>' . $fechaFormateada . '</td>';
                  } else {
                      echo '<td>Sin registro</td>';
                  }

                  echo '<td>
                          <div class="btn-group-container">
                            <div class="btn-group">
                              <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>
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
              <th style="width:100px">Apellido</th>
              <th style="width:100px">Usuario</th>
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


<div class="modal fade" id="confirmacionModal"role="dialog" >
  <div class="modal-dialog" >
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

<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <!-- CABEZA DEL MODAL -->
        <div class="modal-header" style="background:#3e383d; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar usuario</h4>
        </div>

        <!-- CUERPO DEL MODAL -->
        <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
          <div class="box-body">

            <!-- INFORMACIÓN DEL USUARIO -->
            <div class="container">
              <h5>Información del Usuario</h5>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="floating-label-group">
                    <input type="number" class="form-control" id="nuevoIdentificacion" name="nuevoIdentificacion" placeholder=" " required>
                    <label for="nuevoIdentificacion">Identificación</label>
                  </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="floating-label-group">
                      <input type="text" class="form-control" name="nuevoNombre" id="nuevoNombre" placeholder=" " required>
                      <label for="nuevoNombre">Nombres</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="floating-label-group">                    
                      <input type="text" class="form-control " name="nuevoApellido" placeholder=" " required>
                      <label for="nuevoApellido">Apellidos</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- INFORMACIÓN DE CONTACTO -->
            <div class="container mt-3">
              <h5>Información de Contacto</h5>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="floating-label-group">                      
                      <input type="email" class="form-control" name="nuevoCorreo" placeholder=" " required>
                      <label for="nuevoCorreo">Correo electronico</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="floating-label-group">
                      <input type="text" class="form-control" name="nuevoTelefono" placeholder=" " required>
                      <label for="nuevoTelefono">Telefono de contacto</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- INFORMACIÓN DEL SISTEMA -->
            <div class="container mt-3">
              <h5>Información del Sistema</h5>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="floating-label-group">
                      <input type="text" class="form-control" name="nuevoUsuario" placeholder=" " required>
                      <label for="nuevoUsuario">Nombre de usuario</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="floating-label-group">
                      <input type="password" class="form-control" name="nuevoPassword" placeholder=" " required>
                      <label for="nuevoPassword">Contraseña del sistema</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- ÁREA Y PERFIL -->
            <div class="container mt-3">
              <h5>Área y Perfil</h5>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="floating-label-group">
                      <select class="form-control input-lg" name="nuevaArea" required>
                      <label for="nuevaArea">Area de trabajo</label>
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
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <div class="input-group">
                      <select class="form-control input-lg" name="nuevoPerfil" required>
                        <option value="">Seleccionar Perfil</option>
                        <?php
                          if ($comparar == "Super Administrador") {
                            echo '
                              <option value="Super Administrador">Super Administrador</option>
                              <option value="Director juridico">Director jurídico</option>
                              <option value="Director comercial">Director comercial</option>
                              <option value="Coordinador comercial">Coordinador comercial</option>
                              <option value="Asesor comercial">Asesor comercial</option>
                              <option value="Especialista juridico">Especialista jurídico</option>';
                          } elseif ($comparar == "Director juridico") {
                            echo '
                              <option value="Director juridico">Director jurídico</option>
                              <option value="Director comercial">Director comercial</option>
                              <option value="Coordinador comercial">Coordinador comercial</option>
                              <option value="Asesor comercial">Asesor comercial</option>
                              <option value="Especialista juridico">Especialista jurídico</option>';
                          } elseif ($comparar == "Director comercial") {
                            echo '
                              <option value="Asesor comercial">Asesor comercial</option>
                              <option value="Coordinador comercial">Coordinador comercial</option>';
                          } elseif ($comparar == "Coordinador comercial") {
                            echo '<option value="Asesor comercial">Asesor comercial</option>';
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- ASOCIAR COORDINADOR -->
            <div class="container mt-3">
              <h5>Asociar Coordinador</h5>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="input-group">
                      <select class="form-control input-lg" name="nuevoCoordinador">
                        <option value="">Asociar coordinador</option>
                        <?php
                          $item = null;
                          $valor = null;
                          $categorias = ControladorUsuarios::ctrMostrarCoordinadores($item, $valor);
                          echo '<option value="0">Sin asesor</option>';
                          foreach ($categorias as $key => $value) {
                            echo '<option value="' . $value["id"] . '">' . $value["user_name"] . '</option>';
                          }
                        ?>
                      </select>
                    </div>
                  </div>
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


<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarUsuario" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3e383d; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA LA IDENTIFICACION -->
            <div class="container mt-3">
              <h5>Informacion de Contacto</h5>
              <div class="row">
                <!-- ENTRADA PARA CORREO-->
                <div class="col-md-4">
                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>

                      <input type="email" class="form-control input-lg" id="editarCorreo" name="editarCorreo" placeholder="Actualizar Correo">
                      <input type="hidden" id="correodActual" name="correodActual">   
                    </div>

                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>

                      <input type="text" class="form-control input-lg" id="editarTelefone" name="editarTelefone" placeholder="Actualizar telefono de Contacto">

                    </div>

                  </div>
                </div>

              </div>
            </div>

            <div class="container mt-3">
              <h5>Informacion del Sistema</h5>
              <div class="row">
                <!-- ENTRADA PARA CORREO-->
                <div class="col-md-4">
                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-user"></i></span>

                      <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" placeholder="Actualizar nombre de Usuario">
                      <input type="hidden" name="idUsuario" id="idUsuario">    
                    </div>

                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                      <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Ingresar contraseña">
                      <input type="hidden" id="passwordActual" name="passwordActual">    
                    </div>

                  </div>
                </div>

              </div>
            </div>
            <!-- ENTRADA PARA El area -->
            <div class="container mt-3">
              <h5>Area y Perfil</h5>
              <div class="row">

                <div class="col-md-4">
                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-suitcase"></i></span>

                      <select class="form-control input-lg"  id="editarArea" name="editarArea">

                        <option value="">Seleccionar Area</option>

                        <?php

                        if ($comparar == "Super Administrador") {

                          $item = null;
                          $valor = null;

                          $categorias = ControladorAreas::ctrMostrarAreas($item, $valor);

                          foreach ($categorias as $key => $value) {

                            echo '

                        <option value="' . $value["area"] . '">' . $value["area"] . '</option>';
                          }
                        }

                        if ($comparar == "Administrador") {

                          $item = null;
                          $valor = null;

                          $categorias = ControladorAreas::ctrMostrarAreas($item, $valor);


                          echo '

                          <option value="' . $area . '">' . $area . '</option>';
                        }
                        echo '

                          </select>

                        </div>

                      </div>';

                        ?>


                    </div>
                    <div class="col-md-4">
                      <div class="form-group">

                        <div class="input-group">
                          
                          <?php
                          if ($comparar == "Super Administrador") {
                            echo '
                            <div class="form-group">
                              
                              <div class="input-group">
                              
                                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                                <select class="form-control input-lg" id="editarPerfil" name="editarPerfil">
                                  
                                  <option value="">Seleccionar Perfil</option>

                                  <option value="Super Administrador">Super Administrador</option>

                                  <option value="Administrador">Administrador</option>

                                  <option value="Asesor comercial">Asesor comercial</option>
                                  <option value="Coordinador comercial">Coordinador comercial</option>
                                  <option value="Director comercial">Director comercial</option>
                                  <option value="Especialista juridico">Especialista juridico</option>
                                  <option value="Director juridico">Director juridico</option>          

                                </select>

                              </div>

                            </div>';
                          }

                          if ($comparar == "Administrador") {
                            echo '
                            <div class="form-group">
                              
                              <div class="input-group">
                              
                                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                                <select class="form-control input-lg" id="editarPerfil" name="editarPerfil">
                                  
                                  <option value="">Seleccionar perfil</option>

                                  <option value="Director comercial">Director comercial</option>
                                  <option value="Especialista juridico">Especialista juridico</option>
                                  <option value="Director juridico">Director juridico</option>   

                                </select>

                              </div>

                            </div>';
                          }

                          ?>
                        </div>
                      </div>

                    </div>


                  </div>
                </div>
              </div>
            </div>
            <!--=====================================
        PIE DEL MODAL
        ======================================-->

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



<?php

$borrarUsuario = new ControladorUsuarios();
$borrarUsuario->ctrBorrarUsuario();

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