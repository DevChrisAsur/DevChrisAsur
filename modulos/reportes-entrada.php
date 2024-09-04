
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
      <form name="form" method="post">
<div class="col-md-5">
                       
                            <div class="input-group-prepend">
                            <i class="fa fa-calendar-o" style="color:green"></i>&nbsp&nbsp<label>Fecha Inicio</label>
                             <input type="text" class="form-control" id="start_date" name="fecha1" placeholder="Fecha Inicio" readonly>
                            </div>
                           
                        
                    </div>
                    <div class="col-md-5">
                        
                            <div class="input-group-prepend">
                              <i class="fa fa-calendar-o  " style="color:red"></i>&nbsp&nbsp<label>Fecha Final</label>
                            
                            <input type="text" class="form-control" id="end_date" name="fecha2" placeholder="Fecha Fin" readonly>
                        </div>
                    </div>
                    <br>
                     
                     <div class="input-group-prepend">
                         &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                     &nbsp&nbsp<button type="submit" name="filter" class="btn btn-success" style="margin: 4px 2px;width:110px; height:35px">Buscar</button>
                     &nbsp<button id="reset" class="btn btn-warning" style="margin: 4px 2px;width:110px; height:35px">Limpiar</button>
                </div>
                <div class="box-body">
       <table class="table table-bordered table-striped dt-responsive tablas"id="records" width="100%">
        <thead>
         <tr>
           <th style="width:10px">#</th>
           <th style="width:100px">Identificación</th>
           <th style="width:100px">Tarjeta</th>
           <th style="width:100px">Correo</th>
           <th style="width:150px">Nombre</th>
           <th style="width:80px">Usuario</th>
           <th style="width:110px">Perfi</th>
          <th style="width:110px">Dependencia</th>
           <th style="width:120px">Tipo de Vehiculo</th>
           <th style="width:120px">Placa</th>
           <th style="width:150px">Fecha Registro</th>
           <th style="width:80px">Fecha Cadu</th>
           <th style="width:120px">Último login</th>

           <th>Acciones</th>
         </tr> 
        </thead>
        <tbody>
      <?php

      $inc = include("con_db.php");

      if (isset($_POST['filter'])){ 
          $fechainicio=$_POST['fecha1'];
          $fechafin=$_POST['fecha2'];
          $ofi = $_SESSION["oficina"];
          $perfil = $_SESSION["perfil"];
          //echo $ofi;
          //echo $fechainicio;
          //echo $fechafin;

           $consulta ="SELECT * FROM usuarios WHERE   fecha BETWEEN '$fechainicio' AND '$fechafin'";
           $resultado = mysqli_query($conex,$consulta);
          if($resultado){
             if($perfil == "Super Administrador"){
              while ($row = $resultado -> fetch_array()) {
                $id = $row['id'];
                $cedula = $row['identificacion'];
                $tarjeta = $row['tarjeta'];
                $correo = $row['correo'];
                $Nombre = $row['nombre'];
                $Usuario = $row['usuario'];
                $Perfil = $row['perfil'];
                $Dependencia = $row['oficina'];
                $Vehiculo = $row['vehiculo'];
                $Placa = $row['placa'];
                $Fecha_registro = $row['fecha'];
                $Cadu = $row['cadu'];
                $log = $row['ultimo_login'];
                 echo ' <tr>  
                      <td>'.$id.'</td>
                      <td>'.$cedula.'</td>';

                      if($tarjeta == ""){
                        echo '<td><button class="btn btn-danger btn-xs btnActivar" estadoUsuario="0">No hay tarjeta</button></td>';
                      }
                      else{
                        echo '
                        <td>'.$tarjeta.'</td>';
                      }

                      echo '  
                      <td>'.$correo.'</td>
                      <td>'.$Nombre.'</td>
                      <td>'.$Usuario.'</td>';

                      if($Perfil == "Super Administrador"){

                        echo '<td><button class="btn btn-warning btn-xs btnActivar" idUsuario="'.$Perfil.'" estadoUsuario="0">Super Administrador</button></td>';

                      }
                      if($Perfil == "Administrador"){

                        echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$Perfil.'" estadoUsuario="0">Administrador</button></td>';

                      }
                      if($Perfil == "Funcionario"){

                        echo '<td><button class="btn btn-info btn-xs btnActivar" idUsuario="'.$Perfil.'" estadoUsuario="0">Funcionario</button></td>';

                      }

                      if($Dependencia != ""){
                      echo '<td><button class="btn btn-warning btn-xs btnActivar text-uppercase" idUsuario="'.$Dependencia.'" estadoUsuario="0">'.$Dependencia.'</button></td>';
                    }else{
                      echo '<td><button class="btn btn-danger btn-xs btnActivar text-uppercase" idUsuario="'.$Dependencia.'" estadoUsuario="0">REGISTRAR OFICINA</button></td>';
                    }

                    if($Vehiculo == ''){

                       echo '<td> No tiene vehiculo</td>';

                    }else{

                       echo '<td>'.$Vehiculo.'</td>';

                    }   
                    if($Vehiculo == ''){

                       echo '<td> No tiene vehiculo</td>';

                    }else{

                       echo '<td>'.$Vehiculo.'</td>';

                    } 

                      echo '
                      <td>'.$Fecha_registro.'</td>
                      <td>'.$Cadu.'</td>
                      <td>'.$log.'</td>'; 
                      echo'
                    <td>

                      <div class="btn-group">
                          
                      <button class="btn btn-success btnReenviarCorreo" idUsuario="'.$correo.' "idUser="'.$row['id'].'"><i class="fa fa-envelope"></i></button>


                        <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$row['id'].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$row['id'].'" fotoUsuario="'.$row['foto'].'" usuario="'.$row['usuario'].'"><i class="fa fa-times"></i></button>

                      </div>  

                    </td>

                  </tr>';

              }

             }

             if ($comparar == "Administrador"){
              while ($row = $resultado -> fetch_array()) {
                
                $cedula = $row['Cedula'];
                $tarjeta = $row['Tarjeta'];
                $Nombres = $row['Nombres'];
                $Perfil = $row['Perfil'];
                $Oficina = $row['Oficina'];
                $Contoladora = $row['Controlador'];
                $Fecha = $row['FechaHora'];
                 if($ofi == $Oficina){
                 echo ' <tr>
                     <td>1</td>
                      <td>'.$cedula.'</td>
                      <td>'.$tarjeta.'</td>
                      <td>'.$Nombres.'</td>
                      <td><button class="btn btn-info btn-xs btnActivar " idUsuario="'.$Perfil.'" estadoUsuario="0">'.$Perfil.'</button></td>
                      <td><button class="btn btn-warning btn-xs btnActivar text-uppercase" idUsuario="'.$Oficina.'" estadoUsuario="0">'.$Oficina.'</button></td>';
                       if($Contoladora == "1"){
                        echo '<td><button class="btn btn-success btn-xs btnActivar text-uppercase" idUsuario="ENTRADA" estadoUsuario="0">ENTRADA</button></td>';

                      }else{
                        echo '<td><button class="btn btn-danger btn-xs btnActivar text-uppercase" idUsuario="SALIDA" estadoUsuario="0">SALIDA</button></td>';

                      }
                      echo'
                      <td>'.$Fecha.'</td>'; 
                      }  
              }

            }
          }


          }
        
     

        
        
     
    ?>  

        </tbody>

       </table>
         <?php 

          $searchString = " ";
          $replaceString = "_";
          $originalString = $_SESSION["oficina"]; 
          $outputString = str_replace($searchString, $replaceString, $originalString); 
          $nueva_oficina = $outputString;

         ?> 

      

      </div>
               

  </form>

      

      </div>

    </div>
   

</div>


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

                      foreach ($categorias as $key => $value) {
                        if($value["area"] == $ofi){
                          echo'

                          <option value="'.$value["area"].'">'.$value["area"].'</option>';
                        }

                      }
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

                <select class="form-control input-lg" name="nuevaOficina" required>
                  
                  <option value="">Selecionar Oficina</option>

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
            <!-- ENTRADA PARA LA FECHA DE CADU -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="date" class="form-control input-lg" name="editarFecha" placeholder="Ingresar fecha limite"required>

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

                <select class="form-control input-lg" name="nuevoPerfil" required>
                  
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

                <select class="form-control input-lg" name="nuevoPerfil" required>
                  
                  <option value="">Selecionar perfil</option>

                  <option value="Funcionario">Funcionario</option>

                </select>

              </div>

            </div>';
            }
            
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


<!-- Datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
   

  
    <!-- Datepicker -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Datatables -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js">
    </script>
    <!-- Momentjs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

    <script>
    $(function() {
        $("#start_date").datepicker({
            //"dateFormat": "yy-mm-dd"
        closeText: 'Cerrar',
        prevText: '< Ant',
        nextText: 'Sig >',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'yy/mm/dd 00:00:00',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''

        });
        $("#end_date").datepicker({
            //"dateFormat": "yy-mm-dd"
            closeText: 'Cerrar',
        prevText: '< Ant',
        nextText: 'Sig >',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'yy/mm/dd 23:59:59',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
        });
    });
    </script>

    <script>
    // Fetch records

    
   $(document).ready( function () {
    $('#records').DataTable({


"dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    "buttons": [
    {extend:"copy",title: "Entradas Gobernacion",text:'<i class="fa fa-copy"></i>&nbsp;&nbsp;Copiar',titleAttr:"Copiar",className:"btn-warning"},
      {extend:"csv",title: "Entradas Gobernacion ",text:'<i class="fa fa-file-o"></i>&nbsp;&nbsp;CSV',titleAttr:"Descargar CSV",className:"btn btn-info"},
      {extend:"excel",title: "Entradas Gobernacion",text:'<i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;Excel',titleAttr:"Exportar a excel",className:"btn-success"},
      {extend:"pdf", title: "Entradas Gobernacion", orientation: 'landscape', pageSize: 'A4',text:'<i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;PDF',titleAttr:"Exportar a PDF",className:"btn-danger"},
      {extend:"print",title: "Entradas Gobernacion",text:'<i class="fa fa-print"></i>&nbsp;&nbsp; Imprimir',titleAttr:"Imprimir",className:"btn-primary"}
                    ],
                    "language": {

       "sProcessing":     "Procesando...",
       "sLengthMenu":     "Mostrar _MENU_ registros",
       "sZeroRecords":    "No se encontraron resultados",
       "sEmptyTable":     "Ningún dato disponible en esta tabla",
       "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
       "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
       "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
       "sInfoPostFix":    "",
       "sSearch":         "Buscar:",
       "sUrl":            "",
       "sInfoThousands":  ",",
       "sLoadingRecords": "Cargando...",
       "oPaginate": {
         "sFirst":    "Primero",
         "sLast":     "Último",
         "sNext":     "Siguiente",
         "sPrevious": "Anterior"

       },
       "oAria": {
         "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
         "sSortDescending": ": Activar para ordenar la columna de manera descendente"
       },
       "buttons": {
                copyTitle: 'Copiado al portapapeles',
                copySuccess: {
                    _: 'Copiadas %d filas al portapapeles',
                    1: 'Copiadas 1 fila al portapapeles'
                }
            }

     },
        
                    // responsive
                    "responsive": true,
                     "aLengthMenu":[[100, 200, 300, 400, 500],[100, 200, 300, 400, 500]],

    });
} );

    // Reset

    $(document).on("click", "#reset", function(e) {
        e.preventDefault();

        $("#start_date").val(''); // empty value
        $("#end_date").val('');

        $('#records').DataTable().clear().destroy();
       
    });
    </script>
