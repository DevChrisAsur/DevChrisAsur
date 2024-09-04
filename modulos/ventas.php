<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar registros
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar registros</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">
       <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
          
        <thead>
          
         <tr>
           
          <th style="width:10px">#</th>
          <th style="width:100px">Identificación</th>
          <th style="width:150px">Correo</th>
          <th style="width:80px">Nombre</th>
          <th style="width:110px">Apellidos</th>
          <th style="width:120px">Perfil</th>
          <th style="width:120px">Oficina</th>
          <th style="width:80px">Fecha Cadu</th>
          <th style="width:100px">Registrado por</th>
          <th style="width:90px">Fecha Reg</th>
          <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php
 
        $item = null;
        $valor = null;
        $comparar = $_SESSION["perfil"];
         $ofi = $_SESSION["oficina"];
         
        $invitados = ControladorProductos::ctrMostrarProductos($item, $valor);
       if($comparar == "Super Administrador"){
         foreach ($invitados as $key => $value){
            echo ' <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["identificacion"].'</td>
                    <td>'.$value["correo"].'</td>
                    <td>'.$value["nombre"].'</td>
                    <td>'.$value["apellidos"].'</td>';
                    if($value["perfil"] == "Visitante"){

                        echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["perfil"].'" estadoUsuario="0">Visitante</button></td>';

                    }
                    if($value["perfil"] == "Contratista"){

                        echo '<td><button class="btn btn-info  btn-xs btnActivar" idUsuario="'.$value["perfil"].'" estadoUsuario="0">Contratista</button></td>';

                    }

                    echo '<td><button class="btn btn-warning btn-xs btnActivar text-uppercase" idUsuario="'.$value["oficina"].'" estadoUsuario="0">'.$value["oficina"].'</button></td>'; 

                    echo '<td>'.$value["fecha_cadu"].'</td>'; 

                    
                    
                    echo '<td>'.$value["registro"].'</td>';
                

                    echo '<td>'.$value["fecha_registro"].'</td>
                     <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-danger btnEliminarUsuario1" idUsuario="'.$value["id"].'"><i class="fa fa-times"></i></button>

                      </div>  

                    </td>

            

                  </tr>';
              }
            }

          if($comparar == "Administrador"){
         foreach ($invitados as $key => $value){
          if($value["oficina"] == $ofi){
            echo ' <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["identificacion"].'</td>
                    <td>'.$value["correo"].'</td>
                    <td>'.$value["nombre"].'</td>
                    <td>'.$value["apellidos"].'</td>';
                    if($value["perfil"] == "Visitante"){

                        echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["perfil"].'" estadoUsuario="0">Visitante</button></td>';

                    }
                    if($value["perfil"] == "Contratista"){

                        echo '<td><button class="btn btn-info  btn-xs btnActivar" idUsuario="'.$value["perfil"].'" estadoUsuario="0">Contratista</button></td>';

                    }

                    echo '<td><button class="btn btn-warning btn-xs btnActivar text-uppercase" idUsuario="'.$value["oficina"].'" estadoUsuario="0">'.$value["oficina"].'</button></td>'; 

                    echo '<td>'.$value["fecha_cadu"].'</td>'; 

                    
                    
                    echo '<td>'.$value["registro"].'</td>';
                

                    echo '<td>'.$value["fecha_registro"].'</td>
                     <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-danger btnEliminarUsuario1" idUsuario="'.$value["id"].'"><i class="fa fa-times"></i></button>

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

         //$ofi=$_SESSION["oficina"];
        //echo " <input  type='hidden' name='newofi' class='form-control' value = '".$ofi."' readonly> ";
          $searchString = " ";
          $replaceString = "_";
          $originalString = $ofi; 
          $outputString = str_replace($searchString, $replaceString, $originalString); 
          $nueva_oficina = $outputString;

         ?> 
        <div>
        
       </div>
        
      <a href=<?php echo "excel1.php?id=".$nueva_oficina?>><i class="fa fa-file-excel-o" aria-hidden="true"></i> EXPORTAR REPORTE</a>


      </div>
      </div>

    </div>

  </section>

</div>

<?php

  $borrarUsuario = new ControladorProductos();
  $borrarUsuario -> ctrEliminarProducto();

?> 


