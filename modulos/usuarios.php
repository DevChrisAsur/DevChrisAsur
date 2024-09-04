
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
        <?php

        $comparar = $_SESSION["perfil"];

        if($comparar !="Funcionario"){

        echo'
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
          
          Agregar usuario

        </button>'; 
      }
        ?>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th style="width:100px">Identificación</th>
           <th style="width:100px">Tarjeta</th>
           <th style="width:100px">Correo</th>
           <th style="width:150px">Nombre</th>
           <th style="width:80px">Usuario</th>
           <th style="width:110px">Perfil</th>
          <th style="width:110px">Dependencia</th>
           <th style="width:80px">Fecha Cadu</th>
           <th style="width:120px">Último login</th>

           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

        $comparar = $_SESSION["perfil"];
        $ofi = $_SESSION["oficina"];
        $area = $_SESSION["area"];
        $item = null;
        $valor = null;

        $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

        if($comparar == "Super Administrador"){
         foreach ($usuarios as $key => $value){

            echo ' <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["identificacion"].'</td>';
                    if($value["tarjeta"] == ""){

                        echo '<td><button class="btn btn-danger btn-xs btnActivar" estadoUsuario="0">No hay tarjeta</button></td>';

                      }
                      else{
                        echo '
                        <td>'.$value["tarjeta"].'</td>';
                      }
                    echo '
                    
                    <td>'.$value["correo"].'</td>
                    <td>'.$value["nombre"].'</td>
                    <td>'.$value["usuario"].'</td>';
                    if($value["perfil"] == "Super Administrador"){

                        echo '<td><button class="btn btn-warning btn-xs btnActivar" idUsuario="'.$value["perfil"].'" estadoUsuario="0">Super Administrador</button></td>';

                      }
                      if($value["perfil"] == "Administrador"){

                        echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["perfil"].'" estadoUsuario="0">Administrador</button></td>';

                      }
                      if($value["perfil"] == "Funcionario"){

                        echo '<td><button class="btn btn-info btn-xs btnActivar" idUsuario="'.$value["perfil"].'" estadoUsuario="0">Funcionario</button></td>';

                      }
                      if($value["oficina"] != ""){
                      echo '<td><button class="btn btn-warning btn-xs btnActivar text-uppercase" idUsuario="'.$value["oficina"].'" estadoUsuario="0">'.$value["oficina"].'</button></td>';
                    }else{
                      echo '<td><button class="btn btn-danger btn-xs btnActivar text-uppercase" idUsuario="'.$value["oficina"].'" estadoUsuario="0">REGISTRAR OFICINA</button></td>';
                    }

                   
           
                    echo '<td>'.$value["cadu"].'</td>';

                    $fecha = date('d/m/Y');


                    echo '<td>'.$value["ultimo_login"].'</td>';
                      echo'
                    <td>

                      <div class="btn-group">
                          
                      <button class="btn btn-success btnReenviarCorreo" idUsuario="'.$value["identificacion"].' "idUser="'.$value["id"].'"><i class="fa fa-envelope"></i></button>


                        <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fa fa-times"></i></button>

                      </div>  

                    </td>

                  </tr>';
              }
            }

            if($comparar == "Administrador"){
               foreach ($usuarios as $key => $value){

                if($value["oficina"] == $ofi){
               echo ' <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["identificacion"].'</td>';
                    if($value["tarjeta"] == ""){

                        echo '<td><button class="btn btn-danger btn-xs btnActivar" estadoUsuario="0">No hay tarjeta</button></td>';

                      }
                      else{
                        echo '
                        <td>'.$value["tarjeta"].'</td>';
                      }
                      echo '
                    <td>'.$value["correo"].'</td>
                    <td>'.$value["nombre"].'</td>
                    <td>'.$value["usuario"].'</td>';
                    if($value["perfil"] == "Super Administrador"){

                        echo '<td><button class="btn btn-warning btn-xs btnActivar" idUsuario="'.$value["perfil"].'" estadoUsuario="0">Super Administrador</button></td>';

                      }
                      if($value["perfil"] == "Administrador"){

                        echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["perfil"].'" estadoUsuario="0">Administrador</button></td>';

                      }
                      if($value["perfil"] == "Funcionario"){

                        echo '<td><button class="btn btn-info btn-xs btnActivar" idUsuario="'.$value["perfil"].'" estadoUsuario="0">Funcionario</button></td>';

                      }
                      if($value["oficina"] != ""){
                      echo '<td><button class="btn btn-warning btn-xs btnActivar text-uppercase" idUsuario="'.$value["oficina"].'" estadoUsuario="0">'.$value["oficina"].'</button></td>';
                    }else{
                      echo '<td><button class="btn btn-danger btn-xs btnActivar text-uppercase" idUsuario="'.$value["oficina"].'" estadoUsuario="0">REGISTRAR OFICINA</button></td>';
                    }
                     
                    
                           
                    echo '<td>'.$value["cadu"].'</td>';

                    $fecha = date('d/m/Y');


                    echo '<td>'.$value["ultimo_login"].'</td>';
                      echo'
                    <td>

                      <div class="btn-group">
                          
                         <button class="btn btn-success btnReenviarCorreo" idUsuario="'.$value["identificacion"].' "idUser="'.$value["id"].'"><i class="fa fa-envelope"></i></button>

                        <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fa fa-times"></i></button>

                      </div>  

                    </td>

                  </tr>';
                  }
                }
            }


        ?> 

        </tbody>

       </table>
      
       <?php 
          $searchString = " ";
          $replaceString = "_";
          $originalString = $ofi; 
          $outputString = str_replace($searchString, $replaceString, $originalString); 
          $nueva_oficina = $outputString;
       ?>
    


      </div>

    </div>
   
<div class="container">

          <form action="excel_funcionarios.php" name="formulario" method="POST" enctype="multipart/form-data" / onsubmit="return validateForm()" required>

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
     

</script> 
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

             <!-- ENTRADA PARA LA TARJETA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fas fa-id-badge"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoTarjeta" placeholder="Ingresar Tarjeta" required>

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

             <div class="form-group"> 
               
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa  fa-address-book-o"></i></span> 

                <select class="form-control input-lg" name="nuevaOficina" required>
                  
                  <option value="">Selecionar Dependencia</option>

                  <?php

                    if($comparar == "Super Administrador"){
 
                      $item = null;
                      $valor = null;

                      $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                      foreach ($categorias as $key => $value) {

                        echo'

                        <option value="'.$value["oficina"].'">'.$value["oficina"].'</option>';

                      }
                    }

                    if($comparar == "Administrador"){
 
                      $item = null;
                      $valor = null;

                      $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                      foreach ($categorias as $key => $value) {
                        if($value["oficina"] == $ofi){
                          echo'

                          <option value="'.$value["oficina"].'">'.$value["oficina"].'</option>';
                        }

                      }
                    }
                  echo'

                </select>

              </div>

            </div>';

            ?>

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
                  
                  <option value="">Selecionar Perfil</option>

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

                <select class="form-control input-lg" name="nuevoPerfil" required>
                  
                  <option value="">Selecionar perfil</option>

                  <option value="Funcionario">Funcionario</option>

                </select>

              </div>

            </div>';
            }
            
            ?>

            <!-- ENTRADA PARA TIPO DE CONTRATO -->
            <div class="form-group">
              
              <div class="input-group">
              
                

               

              </div>

            </div>

            <!-- ENTRADA PARA TIPO DE VEHICULO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-car"></i></span> 

                <select class="form-control input-lg" name="nuevoVehiculo">
                  
                  <option value="">Selecionar vehiculo</option>

                  <option value="Carro">Carro</option>

                  <option value="Moto">Moto</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA LA PLACA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-motorcycle"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoPlaca" placeholder="Ingresar placa">

              </div>

            </div>
            <!-- ENTRADA PARA LA FECHA DE CADU -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="date" class="form-control input-lg" name="nuevoFecha" placeholder="Ingresar fecha limite      dd/mm/AAAA"required>

              </div>

            </div>

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

          <button type="submit" name="register" class="btn btn-primary">Guardar usuario</button>

        </div>

        <?php
          include("registrar_aplicacion.php");
          include("registrar_perfiles.php");
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

                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="">
                  <input type="hidden"  name="idUsuario" id="idUsuario" required>
              </div>

            </div>
              <!-- ENTRADA PARA LA TARJETA-->
             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fas fa-id-badge"></i></span> 

                <input type="text" class="form-control input-lg" name="editarTarjeta" placeholder="Editar Tarjeta" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña" required>

                <input type="hidden" id="passwordActual" name="passwordActual">

              </div>

            </div>

            <!-- ENTRADA PARA EL CORREO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span> 

                <input type="email" class="form-control input-lg" name="editarCorreo" placeholder="Escriba el nuevo correo" required>

                <input type="hidden" id="correodActual" name="correodActual">

              </div>

            </div>

             <div class="form-group"> 
               
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa  fa-address-book-o"></i></span> 

                <select class="form-control input-lg" name="editarOficina" required>
                  
                  <option value="">Selecionar Dependencia</option>

            <?php

                    if($comparar == "Super Administrador"){
 
                      $item = null;
                      $valor = null;

                      $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                      foreach ($categorias as $key => $value) {

                        echo'

                        <option value="'.$value["oficina"].'">'.$value["oficina"].'</option>';

                      }
                    }

                    if($comparar == "Administrador"){
 
                      $item = null;
                      $valor = null;

                      $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                      foreach ($categorias as $key => $value) {
                        if($value["oficina"] == $ofi){
                          echo'

                          <option value="'.$value["oficina"].'">'.$value["oficina"].'</option>';
                        }

                      }
                    }
                  echo'

                </select>

              </div>

            </div>';

            ?>
            <!-- ENTRADA PARA TIPO DE VEHICULO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-car"></i></span> 

                <select class="form-control input-lg" name="editarVehiculo">
                  
                  <option value="">Selecionar vehiculo</option>

                  <option value="Carro">Carro</option>

                  <option value="Moto">Moto</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA LA PLACA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-motorcycle"></i></span> 

                <input type="text" class="form-control input-lg" name="editarPlaca" placeholder="Ingresar placa">

              </div>

            </div>
            

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

              <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <?php
            if ($comparar=="Super Administrador"){
              echo '
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarPerfil" required>
                  
                  <option value="">Selecionar perfil</option>

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

                <select class="form-control input-lg" name="editarPerfil" required>
                  
                  <option value="">Selecionar perfil</option>

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

                <select class="form-control input-lg" name="editarArea" required>
                  
                  <option value="">Selecionar Area</option>

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
            <!-- ENTRADA PARA TIPO DE CONTRATO -->
            <div class="form-group">
              
              <div class="input-group">
              
                

              </div>

            </div>
            <!-- ENTRADA PARA LA FECHA DE CADU -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="date" class="form-control input-lg" name="editarFecha" placeholder="Ingresar fecha limite"required>

              </div>

            </div>

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


