<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Reportes Parking
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Reportes Parking</li>
    
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
       

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Cedula</th>
           <th>Nombres</th>
           <th>Apellidos</th>
           <th>Perfil</th>
           <th>Placa</th>
           <th>Controladora</th>
           <th>Fecha y Hora</th>

           
         </tr> 

        </thead>

        <tbody>

        <?php

        $inc = include("con_db.php");
        if ($inc){
          $consulta = "SELECT * FROM parking_transa";
          $resultado = mysqli_query($conex,$consulta);
          if($resultado){
            while ($row = $resultado -> fetch_array()) {
              $cedula = $row['identificacion'];
              $Nombres = $row['nombre'];
              $Apellidos = $row['apellidos'];
              $Perfil = $row['perfil'];
              $Placa = $row['Placa'];
              $Contoladora = $row['Controlador'];
              $fecha = $row['Fecha_Hora'];

               echo ' <tr>
                    <td>1</td>
                    <td>'.$cedula.'</td>
                    <td>'.$Nombres.'</td>
                    <td>'.$Apellidos.'</td>';
                    if($Perfil =="Funcionario"){
                    echo '<td><button class="btn btn-warning btn-xs btnActivar" idUsuario="'.$Perfil.'" estadoUsuario="0">'.$Perfil.'</button></td>';
                  }
                   if($Perfil =="Administrador"){
                    echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$Perfil.'" estadoUsuario="0">'.$Perfil.'</button></td>';
                  }
                  if($Perfil =="Super Administrador"){
                    echo '<td><button class="btn btn-primary btn-xs btnActivar" idUsuario="'.$Perfil.'" estadoUsuario="0">'.$Perfil.'</button></td>';
                  }

                   if($Perfil =="Visitante"){
                    echo '<td><button class="btn btn-info btn-xs btnActivar" idUsuario="'.$Perfil.'" estadoUsuario="0">'.$Perfil.'</button></td>';
                  }
                  if($Perfil =="Contratista"){
                    echo '<td><button class="btn btn-warning  btn-xs btnActivar" idUsuario="'.$Perfil.'" estadoUsuario="0">'.$Perfil.'</button></td>';
                  }
                   if($Perfil =="Asociado"){
                    echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$Perfil.'" estadoUsuario="0">'.$Perfil.'</button></td>';
                  }
                  echo '<td>'.$Placa.'</td>';
                    if($Contoladora == 1){

                      echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$Contoladora.'" estadoUsuario="0">ENTRADA</button></td>';

                    }else{

                      echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$Contoladora.'" estadoUsuario="1">SALIDA</button></td>';
                    }   

                    echo '<td>'.$fecha.'</td>

                  </tr>';

            }

        
          }
      }
     
        ?> 

        </tbody>

       </table>
       <a href="excel4.php"><i class="fa fa-file-excel-o" aria-hidden="true"></i> EXPORTAR REPORTE</a>

      </div>

    </div>

  </section>

</div>

