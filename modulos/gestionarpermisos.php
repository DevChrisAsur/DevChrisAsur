
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Gestionar permisos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Gestionar permisos</li>
    
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
          
          Agregar Controladora

        </button>'; 
      }
        ?>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th style="width:100px">Rol</th>
            <th style="width:150px">Piso1</th>
            <th style="width:150px">Piso2</th>
            <th style="width:150px">Piso3</th>
            <th style="width:150px">Piso4</th>
            <th style="width:150px">Piso5</th>
            <th style="width:150px">Piso6</th>
            <th style="width:150px">Piso7</th>
            <th style="width:150px">Piso8</th>
           <th style="width:150px">IP</th>
           <th style="width:80px">Entrada</th>
           <th style="width:110px">Salida</th>
            <th style="width:110px">Permiso Oficina</th>
            <th style="width:110px">Area</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

        $comparar = $_SESSION["perfil"];
        $ofi = $_SESSION["oficina"];
        $item = null;
        $valor = null;

        $usuarios = ControladorPiso1::ctrMostrarPiso1($item, $valor);

        if($comparar == "Super Administrador"){
         foreach ($usuarios as $key => $value){

            echo ' <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["rol"].'</   td>
                    <td>'.$value["piso1"].'</td>
                    <td>'.$value["piso2"].'</td>
                    <td>'.$value["piso3"].'</td>
                    <td>'.$value["piso4"].'</td>
                    <td>'.$value["piso5"].'</td>
                    <td>'.$value["piso6"].'</td>
                    <td>'.$value["piso7"].'</td>
                    <td>'.$value["piso8"].'</td>
                    <td>'.$value["ip"].'</td>
                    <td>'.$value["entrada"].'</td>
                    <td>'.$value["salida"].'</td>
                    <td>'.$value["PermisoOficina"].'</td>
                    <td>'.$value["area"].'</td>';
                   
                     
                      
                      
                    


                    
                      echo'
                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarControladora" idControladora="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarControladora"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarControladora" idControladora="'.$value["id"].'" fotoUsuario="" usuario=""><i class="fa fa-times"></i></button>

                      </div>  

                    </td>

                  </tr>';
              }
            }

            if($comparar == "Administrador"){
               foreach ($usuarios as $key => $value){

                
                echo ' <tr>
                        <td>'.($key+1).'</td>
                        <td>'.$value["identificacion"].'</td>
                        <td>'.$value["correo"].'</td>
                        <td>'.$value["nombre"].'</td>
                        <td>'.$value["usuario"].'</td>';
                       
                          
                          
                      
                    

                        

                                      

                       
                          echo'
                        <td>

                          <div class="btn-group">
                              
                            <button class="btn btn-warning btnEditarControladora" idControladora="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarControladora"><i class="fa fa-pencil"></i></button>

                            <button class="btn btn-danger btnEliminarControladora" idControladora="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fa fa-times"></i></button>

                          </div>  

                        </td>

                      </tr>';
                  }
                }
            


        ?> 

        </tbody>

       </table>
        <a href="#"><i class="fa fa-file-excel-o" aria-hidden="true"></i> EXPORTAR REPORTE</a>

      </div>

    </div>
   

</div>


<!--=====================================
MODAL AGREGAR Controladora
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

          <h4 class="modal-title">Agregar Controladora</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL rol -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 

               <select class="form-control input-lg" name="       nuevoRol" required>
                <option value="">Seleccione Rol</option>
                <option value="SuperAdmin">SuperAdmin</option>
                <option value="Admin">Admin</option>
                <option value="Funcionario">Funcionario</option>
                   
                </select>

              </div>

            </div>

            <!-- ENTRADA PARA PISO 1 -->
            <div class="form-group">
              
              <div class="input-group">
              
               <span class="input-group-addon"><i class="fa  fa-address-book-o"></i></span> 

           <select class="form-control input-lg" name="nuevoPiso1" required>
            <option value="">Seleccione Acceso piso 1</option>
              <option value="Acceso">Acceso</option>
              <option value="Sin acceso">Sin acceso</option>
                   
                </select>

              </div>
              
            </div>
            
            <!-- ENTRADA PARA PISO 2 -->
            <div class="form-group">
              
              <div class="input-group">
              
               <span class="input-group-addon"><i class="fa  fa-address-book-o"></i></span> 

           <select class="form-control input-lg" name="nuevoPiso2" required>
            <option value="">Seleccione Acceso piso 2</option>
              <option value="Acceso">Acceso</option>
              <option value="Sin acceso">Sin acceso</option>
                   
                </select>

              </div>
              
            </div>

            <!-- ENTRADA PARA PISO 3 -->
            <div class="form-group">
              
              <div class="input-group">
              
               <span class="input-group-addon"><i class="fa  fa-address-book-o"></i></span> 

           <select class="form-control input-lg" name="nuevoPiso3" required>
            <option value="">Seleccione Acceso piso 3</option>
              <option value="Acceso">Acceso</option>
              <option value="Sin acceso">Sin acceso</option>
                   
                </select>

              </div>
              
            </div> 
            <!-- ENTRADA PARA PISO 4 -->
            <div class="form-group">
              
              <div class="input-group">
              
               <span class="input-group-addon"><i class="fa  fa-address-book-o"></i></span> 

           <select class="form-control input-lg" name="nuevoPiso4" required>
            <option value="">Seleccione Acceso piso 4</option>
              <option value="Acceso">Acceso</option>
              <option value="Sin acceso">Sin acceso</option>
                   
                </select>

              </div>
              
            </div>

            <!-- ENTRADA PARA PISO 5 -->
            <div class="form-group">
              
              <div class="input-group">
              
               <span class="input-group-addon"><i class="fa  fa-address-book-o"></i></span> 

           <select class="form-control input-lg" name="nuevoPiso5" required>
            <option value="">Seleccione Acceso piso 5</option>
              <option value="Acceso">Acceso</option>
              <option value="Sin acceso">Sin acceso</option>
                   
                </select>

              </div>
              
            </div>
             <!-- ENTRADA PARA PISO 4 -->
            <div class="form-group">
              
              <div class="input-group">
              
               <span class="input-group-addon"><i class="fa  fa-address-book-o"></i></span> 

           <select class="form-control input-lg" name="nuevoPiso6" required>
            <option value="">Seleccione Acceso piso 6</option>
              <option value="Acceso">Acceso</option>
              <option value="Sin acceso">Sin acceso</option>
                   
                </select>

              </div>
              
            </div>

             <!-- ENTRADA PARA PISO 4 -->
            <div class="form-group">
              
              <div class="input-group">
              
               <span class="input-group-addon"><i class="fa  fa-address-book-o"></i></span> 

           <select class="form-control input-lg" name="nuevoPiso7" required>
            <option value="">Seleccione Acceso piso 7</option>
              <option value="Acceso">Acceso</option>
              <option value="Sin acceso">Sin acceso</option>
                   
                </select>

              </div>
              
            </div>

             <!-- ENTRADA PARA PISO 4 -->
            <div class="form-group">
              
              <div class="input-group">
              
               <span class="input-group-addon"><i class="fa  fa-address-book-o"></i></span> 

           <select class="form-control input-lg" name="nuevoPiso8" required>
            <option value="">Seleccione Acceso piso 8</option>
              <option value="Acceso">Acceso</option>
              <option value="Sin acceso">Sin acceso</option>
                   
                </select>

              </div>
              
            </div>



            <!-- ENTRADA PARA IP-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaIP" placeholder="Ingresar IP" required>

              </div>

            </div>


            <!-- ENTRADA PARA ENTRADA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaEntrada" placeholder="Ingresar Entrada" required>

              </div>
              
            </div>

            

            <!-- ENTRADA PARA SALIDA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaSalida" placeholder="Ingresar Salida" id="nuevaSalida" required>

              </div> 

            </div>

            <!-- ENTRADA PARA LA Oficina -->

             

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
              /*echo '
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

            </div>';*/
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

            

            <!-- ENTRADA PARA LA PLACA -->

             
            <!-- ENTRADA PARA LA FECHA DE CADU -->


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
         include("registrar_pisos.php");
        ?>

      </form>

    </div>
 
  </div>

</div>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarControladora" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar controladora</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

             
<!-- ENTRADA PARA EL rol -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 
               
               <select class="form-control input-lg" name="       editarRol" required>
                <option value="">Seleccione Rol</option>
                <option value="SuperAdmin">SuperAdmin</option>
                <option value="Admin">Admin</option>
                <option value="Funcionario">Funcionario</option>
                   
                </select>

              </div>

            </div>

            <!-- ENTRADA PARA PISO 1 -->
            <div class="form-group">
              
              <div class="input-group">
              
               <span class="input-group-addon"><i class="fa  fa-address-book-o"></i></span> 

           <select class="form-control input-lg" name="editarPiso1" required>
            <option value="">Seleccione Acceso piso 1</option>
              <option value="Acceso">Acceso</option>
              <option value="Sin acceso">Sin acceso</option>
                   
                </select>

              </div>
              
            </div>
            
            <!-- ENTRADA PARA PISO 2 -->
            <div class="form-group">
              
              <div class="input-group">
              
               <span class="input-group-addon"><i class="fa  fa-address-book-o"></i></span> 

           <select class="form-control input-lg" name="editarPiso2" required>
            <option value="">Seleccione Acceso piso 2</option>
              <option value="Acceso">Acceso</option>
              <option value="Sin acceso">Sin acceso</option>
                   
                </select>

              </div>
              
            </div>

            <!-- ENTRADA PARA PISO 3 -->
            <div class="form-group">
              
              <div class="input-group">
              
               <span class="input-group-addon"><i class="fa  fa-address-book-o"></i></span> 

           <select class="form-control input-lg" name="editarPiso3" required>
            <option value="">Seleccione Acceso piso 3</option>
              <option value="Acceso">Acceso</option>
              <option value="Sin acceso">Sin acceso</option>
                   
                </select>

              </div>
              
            </div> 
            <!-- ENTRADA PARA PISO 4 -->
            <div class="form-group">
              
              <div class="input-group">
              
               <span class="input-group-addon"><i class="fa  fa-address-book-o"></i></span> 

           <select class="form-control input-lg" name="editarPiso4" required>
            <option value="">Seleccione Acceso piso 4</option>
              <option value="Acceso">Acceso</option>
              <option value="Sin acceso">Sin acceso</option>
                   
                </select>

              </div>
              
            </div>

            <!-- ENTRADA PARA PISO 5 -->
            <div class="form-group">
              
              <div class="input-group">
              
               <span class="input-group-addon"><i class="fa  fa-address-book-o"></i></span> 

           <select class="form-control input-lg" name="editarPiso5" required>
            <option value="">Seleccione Acceso piso 5</option>
              <option value="Acceso">Acceso</option>
              <option value="Sin acceso">Sin acceso</option>
                   
                </select>

              </div>
              
            </div>
             <!-- ENTRADA PARA PISO 4 -->
            <div class="form-group">
              
              <div class="input-group">
              
               <span class="input-group-addon"><i class="fa  fa-address-book-o"></i></span> 

           <select class="form-control input-lg" name="editarPiso6" required>
            <option value="">Seleccione Acceso piso 6</option>
              <option value="Acceso">Acceso</option>
              <option value="Sin acceso">Sin acceso</option>
                   
                </select>

              </div>
              
            </div>

             <!-- ENTRADA PARA PISO 4 -->
            <div class="form-group">
              
              <div class="input-group">
              
               <span class="input-group-addon"><i class="fa  fa-address-book-o"></i></span> 

           <select class="form-control input-lg" name="editarPiso7" required>
            <option value="">Seleccione Acceso piso 7</option>
              <option value="Acceso">Acceso</option>
              <option value="Sin acceso">Sin acceso</option>
                   
                </select>

              </div>
              
            </div>

             <!-- ENTRADA PARA PISO 4 -->
            <div class="form-group">
              
              <div class="input-group">
              
               <span class="input-group-addon"><i class="fa  fa-address-book-o"></i></span> 

           <select class="form-control input-lg" name="editarPiso8" required>
            <option value="">Seleccione Acceso piso 8</option>
              <option value="Acceso">Acceso</option>
              <option value="Sin acceso">Sin acceso</option>
                   
                </select>

              </div>
              
            </div>



            <!-- ENTRADA PARA IP-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span> 

                <input type="text" class="form-control input-lg" name="editarIP" id="editarIP" placeholder="Ingresar IP" required>
                <input type=" hidden"  name="idControladora" id="idControladora" required>

              </div>

            </div>


            <!-- ENTRADA PARA ENTRADA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarEntrada" placeholder="Ingresar Entrada" required>

              </div>
              
            </div>

            

            <!-- ENTRADA PARA SALIDA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="editarSalida" placeholder="Ingresar Salida" id="editarSalida" required>

              </div> 

            </div>

            <!-- ENTRADA PARA LA Oficina -->

             

             <div class="form-group"> 
               
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa  fa-address-book-o"></i></span> 

                <select class="form-control input-lg" name="editarOficina" required>
                  
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
              /*echo '
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

            </div>';*/
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

            <!-- ENTRADA PARA TIPO DE VEHICULO -->

            

            <!-- ENTRADA PARA LA PLACA -->

             
            <!-- ENTRADA PARA LA FECHA DE CADU -->


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

          <button type="submit" class="btn btn-primary">Modificar Controladora</button>

        </div>

     <?php

          $editarControladora = new ControladorPiso1();
          $editarControladora -> ctrEditarPiso1();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarControladora = new ControladorPiso1();
  $borrarControladora -> ctrBorrarPiso1();

?> 


