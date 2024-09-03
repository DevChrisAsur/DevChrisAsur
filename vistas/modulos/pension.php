
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar pensiones
     
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar pensiones</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">
 
      <div class="box-header with-border">
   

        

      
  
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPension">
          
         Registrar Pension

        </button>

       

        </button>
  
      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
            <th style="width:10px">#</th>
            <th style="width:100px">Año</th>
            <th style="width:100px">Estado pension</th>
            <th style="width:80px">Fecha creacion</th>
            <th style="width:80px">Fecha Registro</th>
            <th style="width:80px">Costo pension</th>
            <th style="width:100px">Interes mensual</th>
            <th style="width:100px">Observaciones</th>
            <th style="width:100px">Estudiante Asociado</th>
            <th style="width:80px">Estado ruta</th>
            <th style="width:80px">Tipo ruta</th>
            <th style="width:80px">Estado Almuerzo</th>
            <th style="width:100px">Tipo Almuerzo</th>
            <th style="width:100px">Estado clases extracurriculares</th>
            <th style="width:130px">Clases extracurriculares</th>
            
            
           


            <th style="width:200px">Acciones</th>

         </tr> 

        </thead>
     
    

   
  <!-- selectize search  -->
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


        <!-- Tags -->

 <!-- <script src="https://cdn.jsdelivr.net/npm/jquery-tags-input@1.3.5/dist/jquery.tagsinput.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/jquery-tags-input@1.3.5/dist/jquery.tagsinput.min.css" rel="stylesheet"> -->
  
     

<script>
      localStorage.setItem('rutaActual', 'pension');

</script>
        <tbody>

       <?php

$item = null;
$valor = null;

$pension = ControladorPension::ctrMostrarPensionConEstudiantes($item, $valor);
// echo '<pre>'; print_r($pension); echo '</pre>';

// $pension1 = Controladorpension::ctrMostrarpension($item, $valor);
// echo '<pre>'; print_r($pension1); echo '</pre>';

foreach ($pension as $key => $value) {
    // Agrega esta condición para filtrar solo los usuarios con perfil de "Administrador" y el área coincide
   
       echo '<tr>';
                echo '<td>' . ($key + 1) . '</td>';
                echo'<td>' . $value["scholar_year"] . '</td>'; 
                
                if($value["status_payment_pension"] != 0){
                  echo '<td><button class="btn btn-success btn-xs btnAprobarPagoPension" idPension="'.$value["id_pension"].'" estadoPagoPension="0">Aprobado</button></td>';
              } else {
                  echo '<td><button class="btn btn-danger btn-xs btnAprobarPagoPension" idPension="'.$value["id_pension"].'" estadoPagoPension="1">No aprobado</button></td>';
              };
                echo '<td>' . $value["pension_date"] . '</td>';
                echo '<td>' . $value["pay_date"] . '</td>'; 
                echo '<td>' . $value["pension_cost"] . '</td>'; 
                echo  '<td>' . $value["monthly_payment"] . '</td>';
                echo    '<td>' . $value["pension_observation"] . '</td>'; 
                echo '<td>' . $value["first_name"] . " " . $value["last_name"]. '</td>'; 

                if($value["route_state"] != 0){

                    echo '<td><button class="btn btn-success btn-xs">Aprobado</button></td>';

                  }else{

                  echo '<td><button class="btn btn-danger btn-xs">No aprobado</button></td>';

                  };
                  if($value["route_type"] == 2){

                    echo '<td><button class="btn btn-warning btn-xs">Media</button></td>';

                  }
                  if($value["route_type"] == 1){

                    echo '<td><button class="btn btn-success btn-xs">Completa</button></td>';

                  }
                  if($value["route_type"] == 0){

                    echo '<td><button class="btn btn-danger btn-xs">No aprobado</button></td>';

                  }

                  if($value["lunch_state"] != 0){

                    echo '<td><button class="btn btn-success btn-xs">Aprobado</button></td>';

                  }else{

                  echo '<td><button class="btn btn-danger btn-xs">No aprobado</button></td>';

                  } 
                if($value["lunch_type"] == 2){

                    echo '<td><button class="btn btn-warning btn-xs">Diario</button></td>';

                  }
                  if($value["lunch_type"] == 1){

                    echo '<td><button class="btn btn-success btn-xs">Completo</button></td>';

                  }
                  if($value["lunch_type"] == 0){

                    echo '<td><button class="btn btn-danger btn-xs">No almuerza</button></td>';

                  }

                  if($value["extracurricular_course_status"] != 0){

                    echo '<td><button class="btn btn-success btn-xs">Aprobado</button></td>';

                  }else{

                  echo '<td><button class="btn btn-danger btn-xs">No aprobado</button></td>';

                  } 

                  if ($value["extracurricular_course_type"] == "N/A") {
                    echo '<td><button class="btn btn-danger btn-xs">N/A</button></td>';
                } else {
                    echo '<td>'; // Abre la celda de la tabla
    
                    $extracurricular_courses = explode(",", $value["extracurricular_course_type"]);
                    foreach ($extracurricular_courses as $course) {
                        echo '<button class="btn btn-info btn-xs">' . $course . '</button> ';
                    }
    
                    echo '</td>'; // Cierra la celda de la tabla
                }
               
               
              
                

                echo '<td>';
                    echo '<div class="btn-group">';
                         echo '<button class="btn btn-warning btnEditarPension" idPension="'.$value["id_pension"].'" data-toggle="modal" data-target="#modalEditarPension"><i class="fa fa-pencil"></i></button>';

                        echo '<button class="btn btn-danger
                        btnEliminarPension"
                        idPension="'.$value["id_pension"].'"
                        style="margin-left: 1px;"><i class="fa
                        fa-times"></i></button>';

                       if ($value["lunch_type"] == 2) {
    if ($value["estado_reloj"] == 1) {
        echo '<button class="btn btn-info btnAsignarAlmuerzo" 
                     PensionId="' . $value["id_pension"] . '" 
                     cont_lunch="' . $value["cont_lunch"] . '" 
                     monthly="' . $value["monthly_payment"] . '" 
                     countdown_end_time="' . $value["countdown_end_time"] . '" 
                     data-estado-reloj="' . $value["estado_reloj"] . '" 
                     name="' . $value["first_name"] . " " . $value["last_name"].  '" 
                     style="margin-left: 1px;" disabled><i class="fa fa-cutlery"></i></button>';
    } else {
        echo '<button class="btn btn-info btnAsignarAlmuerzo" 
                     PensionId="' . $value["id_pension"] . '" 
                     cont_lunch="' . $value["cont_lunch"] . '" 
                     monthly="' . $value["monthly_payment"] . '" 
                     data-estado-reloj="' . $value["estado_reloj"] . '" 
                     style="margin-left: 1px;"><i class="fa fa-cutlery"></i></button>';
    }
}

 if ($value["status_payment_pension"] == 0) {
        echo '<button class="btn btn-success btnEnviarNotificacionPension" 
                idPension="' . $value["id_pension"] . '"  
                Telefono="' . $value["phone"] . '"
                style="margin-left: 1px;"
                ><i class="fa fa-commenting"></i></button>';
  }                   
                    echo '</div>';

            echo '</tr>';
    
}
?>

        </tbody>
<tfoot>
         
         <tr>
           
            <th style="width:10px">#</th>
            <th style="width:100px">Año</th>
            <th style="width:100px">Estado pension</th>
            <th style="width:80px">Fecha creacion</th>
            <th style="width:80px">Fecha Registro</th>
            <th style="width:80px">Costo pension</th>
            <th style="width:100px">Interes mensual</th>
            <th style="width:100px">Observaciones</th>
            <th style="width:100px">Estudiante Asociado</th>
            <th style="width:80px">Estado ruta</th>
            <th style="width:80px">Tipo ruta</th>
            <th style="width:80px">Estado Almuerzo</th>
            <th style="width:100px">Tipo Almuerzo</th>
            <th style="width:100px">Estado clases extracurriculares</th>
            <th style="width:130px">Clases extracurriculares</th>

            <th style="width:200px">Acciones</th>

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

        <div class="modal fade" id="confirmacionModal"role="dialog" >
  <div class="modal-dialog" >
    <div class="modal-content">
       <div class="modal-header" style="background:Gold; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Confirmacion</h4>

        </div>

      <div class="modal-body">
        ¿Está seguro de que desea cambiar el estado del Pago?
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

<div id="modalAgregarPension" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#31B404; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Registrar Pension</h4>

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

                <input type="number" class="form-control input-lg" name="nuevoCosto" placeholder="Ingresar costo Pension" >

              </div>

            </div>

      


      <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoFechaPago" placeholder="Ingresar fecha pago" onfocus="(this.type='date')" onblur="(this.type='text')">

              </div>

            </div>
<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 
        <select name="ConfirmRuta" id="ConfirmRuta" class="form-control input-lg" required>
            <option value="">¿Desea Añadir servicio de ruta?</option>
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
    </div>
</div>

<div class="form-group" id="selectMatriRutaGroup" style="display: none;">
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 
        <select name="MatriRuta" id="MatriRuta" class="form-control input-lg">
            <option value="">Seleccione tipo ruta</option>
            <option value="1">Completa</option>
            <option value="2">Media</option>
        </select>
    </div>
</div>
<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 
        <select name="ConfirmAlmuerzo" id="ConfirmAlmuerzo" class="form-control input-lg" required>
            <option value="">¿Desea Añadir servicio de almuerzo?</option>
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
    </div>
</div>

<div class="form-group" id="selectMatriAlmuerzoGroup" style="display: none;">
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 
        <select name="MatriAlmuerzo" id="MatriAlmuerzo" class="form-control input-lg" >
            <option value="">Seleccione tipo almuerzo</option>
            <option value="1">Completo</option>
            <option value="2">Diario</option>
        </select>
    </div>
</div>


<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 
        <select name="ConfirmExtraCur" id="ConfirmExtraCur" class="form-control input-lg" required>
            <option value="">¿Desea Seleccionar cursos extracurriculares?</option>
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
    </div>
</div>

<div class="form-group" id="selectMatriExtraCurGroup" style="display: none;">
 
        
        <div class="form-group"> 
               
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-suitcase"></i></span> 

                <select name="nuevoCursoExtra[]" id="nuevoCursoExtra" class="selectize select-lg">
                  
                  <option value="">Seleccione Cursos extracurriculares</option>
                 <option value="Baloncesto">Baloncesto</option>
                 <option value="Futbol">Futbol</option>
                <option value="Musica">Musica</option>
                 <option value="Porras">Porras</option>
                 <option value="Refuerzo escolar">Refuerzo escolar</option>
</select>

              </div>

            </div>
    
</div>

          <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 

                
              <textarea class="form-control input-lg" maxlength="150" cols="50" rows="5" id="nuevoComeMatri" name="nuevoComeMatri" placeholder="Ingrese observación pension"></textarea>

              </div>

            </div>


            <div class="form-group"> 
               
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-suitcase"></i></span> 

                <select name="nuevoEstPen" id="nuevoEstPen" class="selectize select-lg" required>
                  
                  <option value="">Seleccione Estudiantes a Asociar</option>

                  <?php

             
 
                      $item = null;
                      $valor = null;

                      $categorias = ControladorEstudiantes::ctrMostrarEstudiantesConCampus($item, $valor);

                      foreach ($categorias as $key => $value) {

                        echo'

                        <option value="'.$value["id_student"].'">'.$value["first_name"]. " " . $value["last_name"].'</option>';

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

          <button type="submit" name="register" class="btn btn-primary">Guardar Pension</button>

        </div>

        <?php
          $crearPension = new ControladorPension();
          $crearPension -> ctrCrearPension();
        ?>

      </form>

    </div>
 
  </div>

</div>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarPension" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" name="myForm" method="post" enctype="multipart/form-data" >

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Pension</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

             

           
              
<div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 

                <input type="number" class="form-control input-lg" name="editarCosto" id="editarCosto" placeholder="Ingresar costo Pension" >

              </div>
                 <input type="hidden"  name="idPension" id="idPension" required>

            </div>

      


      <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 

                <input type="text" class="form-control input-lg" name="editarFechaPago" id="editarFechaPago" placeholder="Ingresar fecha pago" onfocus="(this.type='date')" onblur="(this.type='text')">

              </div>

            </div>

<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 
        <select name="editarConfirmRuta" id="editarConfirmRuta" class="form-control input-lg">
            <option value="">¿Desea Añadir servicio de ruta?</option>
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
    </div>
</div>

<div class="form-group" id="editarselectMatriRutaGroup" style="display: none;">
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 
        <select name="editarMatriRuta" id="editarMatriRuta" class="form-control input-lg">
            <option value="">Selecciona una opción</option>
            <option value="1">Completa</option>
            <option value="2">Media</option>
        </select>
    </div>
</div>
<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 
        <select name="editarConfirmAlmuerzo" id="editarConfirmAlmuerzo" class="form-control input-lg">
            <option value="">¿Desea Añadir servicio de almuerzo?</option>
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
    </div>
</div>

<div class="form-group" id="editarselectMatriAlmuerzoGroup" style="display: none;">
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 
        <select name="editarMatriAlmuerzo" id="editarMatriAlmuerzo" class="form-control input-lg" >
            <option value="" disabled>Seleccione tipo almuerzo</option>
            <option value="1">Completo</option>
            <option value="2">Diario</option>
        </select>
    </div>
</div>


<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 
        <select name="editarConfirmExtraCur" id="editarConfirmExtraCur" class="form-control input-lg">
            <option value="">¿Desea Seleccionar cursos extracurriculares?</option>
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
    </div>
</div>

<div class="form-group" id="editarselectMatriExtraCurGroup" style="display: none;">
 
        
        <div class="form-group"> 
               
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-suitcase"></i></span> 

                <select name="editarnuevoCursoExtra[]" id="editarnuevoCursoExtra" class="selectize select-lg">
                  
                  <option value="" disabled selected>Seleccione Cursos extracurriculares</option>
                 <option value="Baloncesto">Baloncesto</option>
                 <option value="Futbol">Futbol</option>
                <option value="Musica">Musica</option>
                 <option value="Porras">Porras</option>
                 <option value="Refuerzo escolar">Refuerzo escolar</option>
</select>

              </div>

            </div>
    
</div>

          <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 

                
              <textarea class="form-control input-lg" maxlength="150" cols="50" rows="5" id="editarComeMatri" name="editarComeMatri"></textarea>

              </div>

            </div>
          


        

            

            </div>

   






           

          
      

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Pension</button>

        </div>

     <?php

          
           $editarPension = new ControladorPension();
           $editarPension -> ctrEditarPension();

        ?> 

      </form>
<?php

  // $CambiarEstadoAlmuerzo = new ControladorPension();
  // $CambiarEstadoAlmuerzo -> ctrCambiarEstadoAlmuerzo();
?> 
    </div>
<?php

  $asignarAlmuerzo = new ControladorPension();
  $asignarAlmuerzo -> ctrAsignarAlmuerzo();
?> 
  </div>

</div>

<?php

  $borrarPension = new ControladorPension();
  $borrarPension -> ctrBorrarPension();
 
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


<script>
$(document).ready(function(){
    $('.btnGenerarPDF').click(function(){
        var idStudent = $(this).attr('idStudent');
       


          swal({
    title: '¿Está seguro de generar el certificado?',
    text: "¡Este llegara al correo si confirma. de lo contrario puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, Generar certificado!'
  }).then(function(result){

    if(result.value){

      //window.location = "correos.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&idUser="+idUser;
 window.location = 'generar_pdf.php?idStudent='+idStudent;


    }

  })


       
    });
});
</script>