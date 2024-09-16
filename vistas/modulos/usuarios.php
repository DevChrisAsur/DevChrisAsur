<style>
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

  /* Estilos para SweetAlert2 */
  .swal2-popup {
    font-size: 1.6rem;
    font-family: Georgia, serif;
  }

  /* Estilos generales para el modal */
  .modal-dialog {
    width: 100%;
    /* Se ajusta a la pantalla completa */
    max-width: 830px;
    /* Ajusta el tamaño máximo de la ventana modal */
    margin: 30px auto;
  }

  .modal-content {
    border-radius: 8px;
  }

  .modal-body {
    padding: 2rem;
    max-width: 800px;
    max-height: 500px;
    /* Controla la altura máxima del cuerpo del modal */
    overflow-y: auto;
    /* Agrega scroll si el contenido excede la altura */
  }

  /* Estilos para el encabezado del modal */
  .modal-header {
    background: #3e383d;
    color: white;
  }

  /* Estilos para el grupo de botones dentro del modal */
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

  /* Estilos para el elemento con clase .up */
  .up {
    display: flex;
    justify-content: center;
    font-size: 15px;
    line-height: 1;
    border-radius: 2px;
    border: thin solid black;
    transition: 0.2s;
    overflow: hidden;
    text-align: center;
    padding: 4px;
  }

  /* Estilos para el input oculto */
  #inputTag {
    cursor: pointer;
    position: absolute;
    left: 0%;
    top: 0%;
    transform: scale(3);
    opacity: 0;
  }

  /* Estilos para etiquetas */
  label {
    cursor: pointer;
  }

  /* Estilos para el nombre de la imagen */
  #imageName {
    color: green;
  }

  /* Estilos para campos de formulario */
  .form-control {
    border-radius: 4px;
    width: 100%;
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
    min-width: 45px;
    /* Mantener el tamaño mínimo para los íconos */
    text-align: center;
  }

  /* Estilos para selectize-input */
  .selectize-input {
    height: 45px;
    font-size: 16px;
    line-height: 20px;
  }

  .selectize-input .item {
    text-align: center;
  }

  /* Estilos para el menú de colección de botones de DataTables */
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

  /* Controlar comportamiento en pantallas grandes */
  @media (min-width: 992px) {
    .modal-dialog {
      max-width: 830px;
      /* Ajusta el tamaño máximo de la ventana modal */
      margin: 30px auto;
    }

    .modal-body {
      max-width: 800px;
      max-height: 500px;
      /* Controla la altura máxima del cuerpo del modal */
      overflow-y: auto;
      /* Agrega scroll si el contenido excede la altura */
    }
  }

  /* Controlar el diseño en pantallas pequeñas */
  @media (max-width: 576px) {
    .modal-dialog {
      max-width: 100%;
      /* El modal ocupará todo el ancho de la pantalla */
      margin: 10px;
      /* Reducir márgenes en dispositivos pequeños */
    }

    .modal-body {
      max-height: 400px;
      /* Limitar la altura en dispositivos pequeños */
    }
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
    <h1>Administrar Usuarios</h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar usuarios</li>
    </ol>
  </section>

  <section class="content">

    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
          Agregar usuario
        </button>
      </div>

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
            $comparar = $_SESSION["perfil"];
            $area = $_SESSION["area"];
            $item = null;
            $valor = null;

            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

            foreach ($usuarios as $key => $value) {
              echo '<tr>
              <td>' . ($key + 1) . '</td>';
              if ($value["user_status"] != 0) {
                echo '<td><button class="btn btn-success btn-xs btnAprobarPagoPension" idUsuario="' . $value["id"] . '" estadoPagoPension="0">Habilitado</button></td>';
              } else {
                  echo '<td><button class="btn btn-danger btn-xs btnAprobarPagoPension" idUsuario="' . $value["id"] . '" estadoPagoPension="1">Inhabilitado</button></td>';
              };
              echo '
              <td>' . $value["cc"] . '</td>
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

              echo '
              <td>
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


<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3e383d; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA LA IDENTIFICACION -->
            <div class="container">
              <h5>Informacion del Usuario</h5>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                      <input type="number" class="form-control input-lg" name="nuevoIdentificacion" placeholder="Ingresar Identificacion" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                      <input type="text" class="form-control" name="nuevoNombre" placeholder="Ingresar Nombre">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                      <input type="text" class="form-control" name="nuevoApellido" placeholder="Ingresar Apellido">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="container mt-3">
              <h5>Informacion de Contacto</h5>
              <div class="row">
                <!-- ENTRADA PARA CORREO-->
                <div class="col-md-4">
                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>

                      <input type="email" class="form-control input-lg" name="nuevoCorreo" placeholder="Ingresar Correo" required>

                    </div>

                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>

                      <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar telefono de Contacto" required>

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

                      <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar nombre de Usuario" required>

                    </div>

                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-key"></i></span>

                      <input type="text" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>

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

                      <select class="form-control input-lg" name="nuevaArea" required>

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

                <select class="form-control input-lg" name="nuevoPerfil" required>
                  
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

                <select class="form-control input-lg" name="nuevoPerfil" required>
                  
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

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">



            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="">

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="">
                <input type="hidden" name="idUsuario" id="idUsuario">
              </div>

            </div>


            <!-- ENTRADA PARA LA CONTRASEÑA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">

                <input type="hidden" id="passwordActual" name="passwordActual">

              </div>

            </div>

            <!-- ENTRADA PARA EL CORREO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>

                <input type="email" class="form-control input-lg" id="editarCorreo" name="editarCorreo" placeholder="Escriba el nuevo correo">

                <input type="hidden" id="correodActual" name="correodActual">

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <?php
            if ($comparar == "Super Administrador") {
              echo '
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" id="editarPerfil" name="editarPerfil" >
                  
                  <option value="">Seleccionar perfil</option>

                  <option value="Super Administrador">Super Administrador</option>

                  <option value="Administrador">Administrador</option>

                  <option value="Funcionario">Funcionario</option>

                </select>

              </div>

            </div>';
            }

            if ($comparar == "Administrador") {
              echo '
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" id="editarPerfil" name="editarPerfil" >
                  
                  <option value="">Seleccionar perfil</option>
 <option value="Administrador">Administrador</option>

                  <option value="Funcionario">Funcionario</option>

                </select>

              </div>

            </div>';
            }

            ?>

            <!-- ENTRADA PARA El area -->


            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-suitcase"></i></span>

                <select class="form-control input-lg" id="editarArea" name="editarArea">

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



                  <!-- ENTRADA PARA SUBIR FOTO -->

                  <div class="form-group">

                    <div class="panel"></div>



                  </div>

              </div>

            </div>

            <!--=====================================
        PIE DEL MODAL
        ======================================-->

            <div class="modal-footer">

              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

              <button type="submit" class="btn btn-primary">Modificar usuario</button>

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

  $(document).ready(function() {
    $(".btnAprobarPagoPension").click(function() {
        console.log("Se ha clicado en el botón para cambiar el estado");
        $("#confirmacionModal").modal('show');
    });
});



</script>