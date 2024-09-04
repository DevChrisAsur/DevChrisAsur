<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar usuarios
     
    </h1>

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

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAsignarGrupo">
          
          Asignar grupo

        </button>
     

      </div>

      <div class="box-body">
        
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th style="width:100px">Identificación</th>
           <th style="width:100px">Correo</th>
           <th style="width:100px">Nombre</th>
           <th style="width:100px">Usuario</th>
           <th style="width:100px">Perfil</th>
          <th style="width:100px">Area</th>
           <th style="width:100px">Último login</th>

           <th style="width:40px">Acciones</th>

         </tr> 

        </thead>
        <!-- Datatables -->
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
  integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
  integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
></script>        

   <style>
  
  .selectize-input {
    height: 45px;
    font-size: 16px; /* Tamaño de la fuente */
    line-height: 20px; /* Centra verticalmente el texto */
}

/* Centra horizontalmente el texto */
.selectize-input .item {
    text-align: center;
} 


.dt-button-collection.dropdown-menu {
  background-color: #007bff; /* Color de fondo */
  color: #ffffff; /* Color del texto */
  padding: 10px; /* Espaciado interno para mejorar la apariencia */
}

.dt-button-collection.dropdown-menu a {
  display: block;
  margin-bottom: 5px;
      color: #FF5833;

  /* Ajusta el margen según sea necesario */
}

.dt-button-collection.dropdown-menu a.active {
  background-color: #007bff !important; /* Color de fondo cuando está activo */
  color: #ffffff; /* Color del texto cuando está activo */
}
</style>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css">
     <!-- filtrar fechas -->
   <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.3.1/css/dataTables.dateTime.min.css">
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

        <tbody>

       <?php
$comparar = $_SESSION["perfil"];
$area = $_SESSION["area"];
$item = null;
$valor = null;

$usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

foreach ($usuarios as $key => $value) {
    // Agrega esta condición para filtrar solo los usuarios con perfil de "Administrador" y el área coincide
    if ($comparar == "Super Administrador" || ($comparar == "Administrador" && ($value["perfil"] == "Administrador" && $value["area"] == $area))) {
        echo '<tr>
                <td>' . ($key + 1) . '</td>
                <td>' . $value["identificacion"] . '</td>';
                    
        echo '
                <td>' . $value["correo"] . '</td>
                <td>' . $value["nombre"] . '</td>
                <td>' . $value["usuario"] . '</td>';
        if ($value["perfil"] == "Super Administrador") {
            echo '<td><button class="btn btn-warning btn-xs btnActivar" idUsuario="' . $value["perfil"] . '" estadoUsuario="0">Super Administrador</button></td>';
        }
        if ($value["perfil"] == "Administrador") {
            echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="' . $value["perfil"] . '" estadoUsuario="0">Administrador</button></td>';
        }
        if ($value["perfil"] == "Funcionario") {
            echo '<td><button class="btn btn-info btn-xs btnActivar" idUsuario="' . $value["perfil"] . '" estadoUsuario="0">Funcionario</button></td>';
        }
        if ($value["perfil"] == "Profesor") {
          echo '<td><button class="btn btn-info btn-xs btnActivar" idUsuario="' . $value["perfil"] . '" estadoUsuario="0">Profesor</button></td>';
      }
        if ($value["area"] != "") {
            echo '<td><button class="btn btn-warning btn-xs btnActivar text-uppercase" idUsuario="' . $value["area"] . '" estadoUsuario="0">' . $value["area"] . '</button></td>';
        } else {
            echo '<td><button class="btn btn-danger btn-xs btnActivar text-uppercase" idUsuario="' . $value["area"] . '" estadoUsuario="0">REGISTRAR AREA</button></td>';
        }

        $fecha = date('d/m/Y');
        echo '<td>' . $value["ultimo_login"] . '</td>';
        echo '
                <td>
                    <div class="btn-group">
                        <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'" style="margin-left: 8px;"><i class="fa fa-times"></i></button>
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
           <th style="width:100px">Identificación</th>
           <th style="width:100px">Correo</th>
           <th style="width:100px">Nombre</th>
           <th style="width:100px">Usuario</th>
           <th style="width:100px">Perfil</th>
          <th style="width:100px">Area</th>
           <th style="width:100px">Último login</th>

           <th style="width:40px">Acciones</th>

         </tr> 

        </tfoot>
       </table>
      
       <?php 
          // $searchString = " ";
          // $replaceString = "_";
          // // $originalString = $ofi; 
          // $outputString = str_replace($searchString, $replaceString, $originalString); 
          // $nueva_oficina = $outputString;
       ?>
    


      </div>

    </div>
   
<div class="container">

         <!--  <form action="excel_funcionarios.php" name="formulario" method="POST" enctype="multipart/form-data" / onsubmit="return validateForm()" required>

             <div class="up">
      <label for="inputTag">
        <br>
        <i class="fa fa-upload" style="font-size:24px"></i><br>
        Seleccionar archivo <br/>
          <input  type="file" name="dataCliente" id="inputTag" class="file-input__input "  accept=".csv"  />
        
        <br/>
        <span id="imageName"></span>
      </label>
    </div>

    <br>

              <button type="submit" name="subir" class="btn btn-warning pull-left">Subir Excel</button> 

          </form>

              <form method="post" action="import.php" name="excel" enctype="multipart/form-data" / onsubmit="return validateExcel()" required>
                <table class="table">
                  <tr>
                    <td width="25%" align="right">Select Excel File</td>
                    <td width="50%"><input type="file" name="import_excel" accept=".csv, .xlsx, .xls" /></td>
                    <td width="25%"><input type="submit" name="import" id="import" class="btn btn-primary" value="Import" /></td>
                  </tr>
                </table>
              </form>




<script>
  function validateForm() {
  var x = document.forms["formulario"]["dataCliente"].value;
  if (x == "" || x == null) {
    Swal.fire({
            title: "ERROR!",
            text: "Seleccione un archivo csv",
            icon: "error",
        });
    return false;
  }
}

function validateExcel() {
  var x = document.forms["excel"]["import_excel"].value;
  if (x == "" || x == null) {
    Swal.fire({
            title: "ERROR!",
            text: "Seleccione un archivo csv o excel",
            icon: "error",
        });
    return false;
  }
}


     
    
let input = document.getElementById("inputTag");
        let imageName = document.getElementById("imageName")

        input.addEventListener("change", ()=>{
            let inputImage = document.querySelector("input[type=file]").files[0];

            imageName.innerText = inputImage.name;
        })
     

</script>  -->
        </div>
</div>

<style>


.swal2-popup {
font-size: 1.6rem;
 font-family: Georgia, serif;
}

      .up{

 display: flex;
  justify-content: center;
  font-size: 15px;
  line-height: 1;
  border-radius: 2px;


  border: 0;
  transition: 0.2s;
  overflow: hidden;
  text-align:center;
  padding:4;
    border:thin solid black;
      }

      #inputTag{
       cursor: pointer;
  position: absolute;
  left: 0%;
  top: 0%;
  transform: scale(3);
  opacity: 0;
      }
      label{
        cursor:pointer;
      }
      #imageName{
        color:green;
      }
 
    </style>
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

        <div class="modal-header" style="background:#31B404; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA LA IDENTIFICACION -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoIdentificacion" placeholder="Ingresar Identificacion" required>

              </div>

            </div>

            


            <!-- ENTRADA PARA CORREO-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span> 

                <input type="email" class="form-control input-lg" name="nuevoCorreo" placeholder="Ingresar Correo" required>

              </div>

            </div>



            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" required>

              </div> 

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>

              </div>

            </div>

             

            <!-- ENTRADA PARA El area -->


            <div class="form-group"> 
               
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-suitcase"></i></span> 

                <select class="form-control input-lg" name="nuevaArea" required>
                  
                  <option value="">Seleccionar Area</option>

                  <?php

                    if($comparar == "Super Administrador"){
 
                      $item = null;
                      $valor = null;

                      $categorias = ControladorAreas::ctrMostrarAreas($item, $valor);

                      foreach ($categorias as $key => $value) {

                        echo'

                        <option value="'.$value["area"].'">'.$value["area"].'</option>';

                      }
                    }

                    if($comparar == "Administrador"){
 
                      $item = null;
                      $valor = null;

                      $categorias = ControladorAreas::ctrMostrarAreas($item, $valor);

                       
                          echo'

                          <option value="'.$area.'">'.$area.'</option>';
                        

                      
                    }
                  echo'

                </select>

              </div>

            </div>';

            ?>

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <?php
            if ($comparar=="Super Administrador"){
              echo '
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevoPerfil" required>
                  
                  <option value="">Seleccionar Perfil</option>

                  <option value="Super Administrador">Super Administrador</option>

                  <option value="Administrador">Administrador</option>

                  <option value="Funcionario">Funcionario</option>

                  <option value="Profesor">Profesor</option>

                </select>

              </div>

            </div>';
            }

            if ($comparar=="Administrador"){
              echo '
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevoPerfil" required>
                  
                  <option value="">Seleccionar perfil</option>

                  <option value="Funcionario">Funcionario</option>

                </select>

              </div>

            </div>';
            }
            
            ?>

           

           

            
            

            

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
          $crearUsuario -> ctrCrearUsuario();
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

                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" >

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="">
                  <input type="hidden"  name="idUsuario" id="idUsuario" >
              </div>

            </div>
              

            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña" >

                <input type="hidden" id="passwordActual" name="passwordActual">

              </div>

            </div>

            <!-- ENTRADA PARA EL CORREO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span> 

                <input type="email" class="form-control input-lg" id="editarCorreo" name="editarCorreo" placeholder="Escriba el nuevo correo" >

                <input type="hidden" id="correodActual" name="correodActual">

              </div>

            </div>

            

            

          
            


              <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <?php
            if ($comparar=="Super Administrador"){
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

            if ($comparar=="Administrador"){
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

                <select class="form-control input-lg" id="editarArea" name="editarArea" >
                  
                  <option value="">Seleccionar Area</option>

                  <?php

                    if($comparar == "Super Administrador"){
 
                      $item = null;
                      $valor = null;

                      $categorias = ControladorAreas::ctrMostrarAreas($item, $valor);

                      foreach ($categorias as $key => $value) {

                        echo'

                        <option value="'.$value["area"].'">'.$value["area"].'</option>';

                      }
                    }

                    if($comparar == "Administrador"){
 
                      $item = null;
                      $valor = null;

                      $categorias = ControladorAreas::ctrMostrarAreas($item, $valor);

                      
                        
                           echo'

                          <option value="'.$area.'">'.$area.'</option>';
                        

                      
                    }
                  echo'

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
          $editarUsuario -> ctrEditarUsuario();

        ?> 

      </form>

    </div>

  </div>

</div>

<div id="modalAsignarGrupo" class="modal fade" role="dialog">
  
<div class="modal-dialog">

<div class="modal-content">

  <form role="form" method="post" enctype="multipart/form-data">

    <!--=====================================
    CABEZA DEL MODAL
    ======================================-->

    <div class="modal-header" style="background:#31B404; color:white">

      <button type="button" class="close" data-dismiss="modal">&times;</button>

      <h4 class="modal-title">Asignar grupo</h4>

    </div>



    <!--=====================================
    CUERPO DEL MODAL
    ======================================-->

    <div class="modal-body">

      <div class="box-body">

        <!-- ENTRADA PARA LA IDENTIFICACION -->
        <div class="form-group"> 
           
          <div class="input-group">
          
            <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 

            <select class="selectize select-lg" name="asignarProfesor" id="asignarProfesor">
              
              <option value="">Seleccionar Profesor</option>

              <?php

         

                  $item = null;
                  $valor = null;

                  $categorias = ControladorUsuarios::ctrMostrarProfesores($item, $valor);
                  echo '<pre>'; print_r($categorias); echo '</pre>';
                  foreach ($categorias as $key => $value) {

                    echo'

                    <option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                  }
        ?>
          </select>

          </div>

        </div>
        


        <div class="form-group"> 
           
          <div class="input-group">
          
            <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 

            <select class="selectize select-lg" name="asignarGrupo" id="asignarGrupo">
              
              <option value="">Seleccionar Curso</option>

              <?php

         

                  $item = null;
                  $valor = null;

                  $categorias = ControladorCursos::ctrMostrarCursos($item, $valor);

                  foreach ($categorias as $key => $value) {

                    echo'

                    <option value="'.$value["id_grade"].'">'.$value["level_grade"]." ". $value["clasification"].'</option>';

                  }
        ?>
          </select>

          </div>

        </div>
       
            

      </div>

    </div>

    <!--=====================================
    PIE DEL MODAL
    ======================================-->

    <div class="modal-footer">

      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

      <button type="submit" name="register" class="btn btn-primary">Asignar Curso</button>

    </div>

    <?php
      $crearGrupoProfesor = new ControladorGrupos();
      $crearGrupoProfesor -> ctrAsignarGrupo();
    ?>

  </form>

</div>

</div>

</div>


<?php

  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();

?> 

<script>  
  
  $(".tablas").on("click", ".btnReenviarCorreo", function(){

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
  }).then(function(result){

    if(result.value){

      //window.location = "correos.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&idUser="+idUser;
      window.location = "correos.php?&idUsuario="+idUsuario;
    }

  })

})
</script>