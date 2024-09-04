
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Estudiantes
     
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Estudiantes</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">
 
      <div class="box-header with-border">
        <?php

        $comparar = $_SESSION["perfil"];

        if($comparar !="Funcionario"){

        echo'
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEstudiante">
          
         Registrar estudiante

        </button>

        
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAsignarCurso">
          
         Asignar curso

        </button>
        
        '
        ; 
      }
        ?>

      </div>

      <div class="box-body">
        <div align="center"> 
          <div id="reportrange"  align="center" style="background: #c2c2c2; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 20%">
    <i class="fa fa-calendar"></i>&nbsp;
    <span></span> <i class="fa fa-caret-down"></i>
</div>
<br><br>
        </div>
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
            <th style="width:10px">#</th>
            <th style="width:100px">Fecha de Registro</th>
            <th style="width:100px">Identificación</th>
            <th style="width:100px">Status</th>
            <th style="width:100px">Nombre</th>
            <th style="width:100px">Apellido</th>           
            <th style="width:100px">Genero</th>
            <th style="width:100px">Grupo Sanguineo</th>
            <th style="width:100px">Direccion</th>
            <th style="width:100px">Barrio</th>
            <th style="width:100px">Jornada</th>
            <th style="width:100px">Sede</th>


           <th style="width:100px">Acciones</th>

         </tr> 

        </thead>
        <!-- Datatables -->
     <style>
  
 


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
     <!-- filtrar fechas datatable -->
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
    <!-- filtrar fechas datatable -->
<script src="https://cdn.datatables.net/datetime/1.3.1/js/dataTables.dateTime.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/moment/locale/es.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
      localStorage.setItem('rutaActual', 'estudiantes');

</script>
        <tbody>

       <?php

$item = null;
$valor = null;

$estudiantes = ControladorEstudiantes::ctrMostrarEstudiantesConCampus($item, $valor);
// echo '<pre>'; print_r($estudiantes); echo '</pre>';

foreach ($estudiantes as $key => $value) {
  echo '<tr>';
echo '<td>' . ($key + 1) . '</td>';
echo '<td>' . $value["registration_date"] . '</td>';
echo '<td>' . $value["cc"] . '</td>';
if($value["st_status"] != 0){

  echo '<td><button class="btn btn-success btn-xs btnActivar" idEstudiante="'.$value["id_student"].'" estadoUsuario="0">Activo</button></td>';

}else{

  echo '<td><button class="btn btn-danger btn-xs btnActivar" idEstudiante="'.$value["id_student"].'" estadoUsuario="1">Inactivo</button></td>';

}; 
echo '<td>' . $value["first_name"] . '</td>';
echo '<td>' . $value["last_name"] . '</td>';
echo '<td>' . $value["gender"] . '</td>';
echo '<td>' . $value["rh"] . '</td>';
echo '<td>' . $value["st_address"] . '</td>';
echo '<td>' . $value["st_neighborhood"] . '</td>';
echo '<td>' . $value["schedule"] . '</td>';
echo '<td>' . $value["campus_name"] . '</td>';
echo '<td>';
echo '<div class="btn-group">';
echo '<button class="btn btn-warning btnEditarEstudiante" idEstudiante="'.$value["id_student"].'" data-toggle="modal" data-target="#modalEditarEstudiante"><i class="fa fa-pencil"></i></button>';
echo '<button class="btn btn-danger btnEliminarEstudiante" idEstudiante="'.$value["id_student"].'" style="margin-left: 8px;"><i class="fa fa-times"></i></button>';
echo '</div>';
echo '</td>';
echo '</tr>';
}

?>

        </tbody>
 <tfoot>
         
         <tr>
           
            <th style="width:10px">#</th>
            <th style="width:100px">Fecha de Registro</th>
            <th style="width:100px">Identificación</th>
            <th style="width:100px">Status</th>
            <th style="width:100px">Nombre</th>
            <th style="width:100px">Apellido</th>
            <th style="width:100px">Genero</th>
            <th style="width:100px">Grupo Sanguineo</th>
            <th style="width:100px">Direccion</th>
            <th style="width:100px">Barrio</th>
            <th style="width:100px">Jornada</th>
            <th style="width:100px">Sede</th>


           <th style="width:100px">Acciones</th>

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

         <!--  <form action="excel_funcionarios.php" name="formulario" method="POST" enctype="multipart/form-data" / onsubmit="return validateForm()" >

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

      <div class="modal fade" id="confirmacionModal"role="dialog" >
  <div class="modal-dialog" >
    <div class="modal-content">
       <div class="modal-header" style="background:Gold; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Confirmacion</h4>

        </div>

      <div class="modal-body">
        ¿Está seguro de que desea cambiar el estado del estudiante?
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

<div id="modalAgregarEstudiante" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#31B404; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Registrar estudiante</h4>

        </div>



        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


          <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="date" class="form-control input-lg" name="nuevoRegistro" placeholder="Ingresar fecha de registro"required>

              </div>

            </div>
          
            <!-- ENTRADA PARA LA IDENTIFICACION -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 

                <input type="number" class="form-control input-lg" name="nuevoIdentificacion" placeholder="Ingresar Identificacion"  >

              </div>

            </div>


            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Nombre" >

              </div>

            </div>

<div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoApellido" placeholder="Ingresar Apellido" >

              </div>

            </div>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevoGenero" >
                  
                  <option value="">Seleccione Genero</option>

                  <option value="Masculino">Masculino</option>

                  <option value="Femenino">Femenino</option>


                </select>

              </div>

            </div>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevaSangre" >
                  
                  <option value="">Seleccione Grupo Sanguíneo</option>

                  <option value="A+">A+</option>
                  <option value="A-">A-</option>
                  <option value="B+">B+</option>
                  <option value="B-">B-</option>
                  <option value="AB+">AB+</option>
                  <option value="AB-">AB-</option>
                  <option value="O+">O+</option>
                  <option value="O-">O-</option>

                </select>

              </div>

            </div>

            
<!-- ENTRADA PARA LA FECHA DE CADU -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="date" class="form-control input-lg" name="nuevaBirth" placeholder="Ingresar fecha nacimiento"required>

              </div>

            </div>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar direccion de residencia" >

              </div>

            </div>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoBarrio" placeholder="Ingresar Barrio" >

              </div>

            </div>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevaJornada" >
                  
                  <option value="">Seleccione Jornada</option>

                  <option value="Media">Media</option>

                  <option value="Completa">Completa</option>


                </select>

              </div>

            </div>



          


            <div class="form-group"> 
               
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-suitcase"></i></span> 

                <select class="form-control input-lg" name="nuevaSede" >
                  
                  <option value="">Seleccionar Sede</option>

                  <?php

             
 
                      $item = null;
                      $valor = null;

                      $categorias = ControladorSedes::ctrMostrarSedes($item, $valor);

                      foreach ($categorias as $key => $value) {

                        echo'

                        <option value="'.$value["id_campus"].'">'.$value["campus_name"].'</option>';

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

          <button type="submit" name="register" class="btn btn-primary">Guardar Estudiante</button>

        </div>

        <?php
          $crearEstudiante = new ControladorEstudiantes();
          $crearEstudiante -> ctrCrearEstudiante();
        ?>

      </form>

    </div>
 
  </div>

</div>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarEstudiante" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Estudiante</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

             

            <!-- ENTRADA PARA EL NOMBRE -->
            
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 

                <input type="number" class="form-control input-lg" name="editarIdentificacion" 
                    id="editarIdentificacion" disabled >

                 <input type="hidden" name="idEstudiante" id="idEstudiante" >

              </div>

            </div>


            <!-- ENTRADA PARA EL USUARIO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="">
                 
              </div>

            </div>
              


             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 

                <input type="text" class="form-control input-lg" name="editarApellido" id="editarApellido" value="" >

              </div>

            </div>

            </div>

            <!-- ENTRADA PARA EL CORREO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarGenero" id="editarGenero" >
                  
                  <option value="">Seleccione Genero</option>

                  <option value="Masculino">Masculino</option>

                  <option value="Femenino">Femenino</option>


                </select>

              </div>

            </div>

            <!-- ENTRADA PARA LA FECHA DE CADU -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="date" class="form-control input-lg" name="editarBirth" id="editarBirth" required>

              </div>

            </div>

            
 <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarJornada" id="editarJornada" >
                  
                  <option value="">Seleccione Jornada</option>

                  <option value="Media">Media</option>

                  <option value="Completa">Completa</option>


                </select>

              </div>

            </div>
           
           

           <div class="form-group"> 
               
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-suitcase"></i></span> 

                <select class="form-control input-lg" name="editarSede" id="editarSede" >
                  
                  <option value="">Seleccionar Sede</option>

                  <?php

             
 
                      $item = null;
                      $valor = null;

                      $categorias = ControladorSedes::ctrMostrarSedes($item, $valor);

                      foreach ($categorias as $key => $value) {

                        echo'

                        <option value="'.$value["id_campus"].'">'.$value["campus_name"].'</option>';

                      }

            ?>
</select>

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

          $editarEstudiante = new ControladorEstudiantes();
          $editarEstudiante -> ctrEditarEstudiante();

        ?> 

      </form>

    </div>

  </div>

</div>


<div id="modalAsignarCurso" class="modal fade" role="dialog">
  
<div class="modal-dialog">

<div class="modal-content">

  <form role="form" method="post" enctype="multipart/form-data">

    <!--=====================================
    CABEZA DEL MODAL
    ======================================-->

    <div class="modal-header" style="background:#31B404; color:white">

      <button type="button" class="close" data-dismiss="modal">&times;</button>

      <h4 class="modal-title">Asignar curso</h4>

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

            <select class="form-control input-lg" name="asignarEstudiante" id="EditarCursoEstudiante" >
              
              <option value="">Seleccionar Estudiante</option>

              <?php

         

                  $item = null;
                  $valor = null;

                  $categorias = ControladorEstudiantes::ctrMostrarEstudiantes($item, $valor);

                  foreach ($categorias as $key => $value) {

                    echo'

                    <option value="'.$value["id_student"].'">'.$value["first_name"]. " " . $value["last_name"].'</option>';

                  }
        ?>
          </select>

          </div>

        </div>
        


        <div class="form-group"> 
           
          <div class="input-group">
          
            <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 

            <select class="form-control input-lg" name="asignarCurso" >
              
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
      $crearCursoEstudiante = new ControladorEstudiantes();
      $crearCursoEstudiante -> ctrAsignarCurso();
    ?>

  </form>

</div>

</div>

</div>


<?php

  $borrarUsuario = new ControladorEstudiantes();
  $borrarUsuario -> ctrBorrarEstudiante();

?> 

<script>  
  
//   $(".tablas").on("click", ".btnReenviarCorreo", function(){

//   var idUsuario = $(this).attr("idUsuario");
//   var usuario = $(this).attr("usuario");
//   var idUser = $(this).attr("idUser")

//   swal({
//     title: '¿Está seguro de Reenviar el correo?',
//     text: "¡Si no lo está puede cancelar la accíón!",
//     type: 'warning',
//     showCancelButton: true,
//     confirmButtonColor: '#3085d6',
//       cancelButtonColor: '#d33',
//       cancelButtonText: 'Cancelar',
//       confirmButtonText: 'Si, Reenviar correo!'
//   }).then(function(result){

//     if(result.value){

//       //window.location = "correos.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&idUser="+idUser;
//       window.location = "correos.php?&idUsuario="+idUsuario;
//     }

//   })

// })
</script>


<script>
// $(document).ready(function(){
//     $('.btnGenerarPDF').click(function(){
//         var idUsuario = $(this).attr('idUsuario');


//           swal({
//     title: '¿Está seguro de generar el certificado?',
//     text: "¡Este llegara al correo si confirma. de lo contrario puede cancelar la accíón!",
//     type: 'warning',
//     showCancelButton: true,
//     confirmButtonColor: '#3085d6',
//       cancelButtonColor: '#d33',
//       cancelButtonText: 'Cancelar',
//       confirmButtonText: 'Si, Generar certificado!'
//   }).then(function(result){

//     if(result.value){

//       //window.location = "correos.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&idUser="+idUser;
//       window.location = 'generar_pdf.php?idUsuario=' + idUsuario;
//     }

//   })


       
//     });
// });
</script>