<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Registros Locales
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Registros Locales</li>
    
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
           <th>Identificacion</th>
           <th>Nombres</th>
           <th>Apellidos</th>
           <th>Autoriza</th>
           <th>Oficina</th>
           <th>Departamento</th>
           <th>No_Tarjeta</th>
           <th>Empresa</th>
           <th>Observaciones</th>
           <th>Fecha y Hora</th>

           
         </tr> 

        </thead>

        <tbody>

        <?php
        $comparar = $_SESSION["perfil"];
        $ofi = $_SESSION["oficina"];

        $inc = include("con_db.php");
        if ($inc){
          $consulta = "SELECT * FROM transacciones_creacion";
          $resultado = mysqli_query($conex,$consulta);
          if($resultado){
            if($comparar == "Super Administrador"){
              while ($row = $resultado -> fetch_array()) {
                $id = $row['id'];
                $cedula = $row['identificacion'];
                $Nombres = $row['nombres'];
                $Apellidos = $row['apellidos'];
                $Autoriza = $row['autoriza'];
                $Oficina = $row['oficina'];
                $Departamento = $row['Departamento'];
                $Tarjeta = $row['No_Tarjeta'];
                $Empresa = $row['Empresa'];
                $Observaciones = $row['Observaciones'];
                 $Fecha = $row['fecha_hora'];
                 echo ' <tr>
                      <td>'.$id.'</td>
                      <td>'.$cedula.'</td>
                      <td>'.$Nombres.'</td>
                      <td>'.$Apellidos.'</td>
                      <td>'.$Autoriza.'</td> 
                      <td><button class="btn btn-warning btn-xs btnActivar text-uppercase" idUsuario="'.$Oficina.'" estadoUsuario="0">'.$Oficina.'</button></td>
                      <td>'.$Departamento.'</td>
                      <td>'.$Tarjeta.'</td>
                      <td>'.$Empresa.'</td>
                      <td>'.$Observaciones.'</td>
                      <td>'.$Fecha.'</td>';   

              }
            }
            if ($comparar == "Administrador"){
              while ($row = $resultado -> fetch_array()) {
                
                $cedula = $row['identificacion'];
                $Nombres = $row['nombres'];
                $Apellidos = $row['apellidos'];
                $Autoriza = $row['autoriza'];
                $Oficina = $row['oficina'];
                $Departamento = $row['Departamento'];
                $Tarjeta = $row['No_Tarjeta'];
                $Empresa = $row['Empresa'];
                $Observaciones = $row['Observaciones'];
                 $Fecha = $row['fecha_hora'];
                 if($ofi == $Oficina){
                 echo ' <tr>
                      <td>1</td>
                      <td>'.$cedula.'</td>
                      <td>'.$Nombres.'</td>
                      <td>'.$Apellidos.'</td>
                      <td>'.$Autoriza.'</td> 
                      <td><button class="btn btn-warning btn-xs btnActivar text-uppercase" idUsuario="'.$Oficina.'" estadoUsuario="0">'.$Oficina.'</button></td>
                      <td>'.$Departamento.'</td>
                      <td>'.$Tarjeta.'</td>
                      <td>'.$Empresa.'</td>
                      <td>'.$Observaciones.'</td>
                      <td>'.$Fecha.'</td>'; 
                      }  

              }

            }
          }
        }
     
        ?> 

        </tbody>

       </table>
        <a href="excel2.php"><i class="fa fa-file-excel-o" aria-hidden="true"></i> EXPORTAR REPORTE</a>

      </div>

    </div>

  </section>

</div>

