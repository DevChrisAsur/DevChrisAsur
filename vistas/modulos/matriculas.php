
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Matriculas
     
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Matriculas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">
 
      <div class="box-header with-border">
   

        

      
  
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarMatricula">
          
         Registrar Matricula

        </button>

       

        </button>
  
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
           <th style="width:90px">Fecha Matricula</th>
           <th style="width: 10px">Estado Pago</th>
           <th style="width:100px">Costo Matricula</th>
           <th style="width:100px">Fecha Pago</th>
           <th style="width:100px">Fecha Registro</th>
           <th style="width:100px">T.I Estudiante</th>
           <th style="width:100px">Estudiante</th>
           <th style="width:100px">Direccion</th>
           <th style="width:100px">Padre</th>
           <th style="width:100px">C.C</th>
           <th style="width:100px">Email</th>
           <th style="width:100px">Telefono</th>
           <th style="width:100px">Acciones</th>

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
   <script>
//   $(function () {
//     $("#nuevoEst").selectize({

//     });
// });
</script>
    
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
      localStorage.setItem('rutaActual', 'matriculas');

</script>
        <tbody>

       <?php

$item = null;
$valor = null;

$matriculas = ControladorMatriculas::ctrMostrarMatriculasConEstudiantes($item, $valor);
// echo '<pre>'; print_r($matriculas); echo '</pre>';

// $matriculas1 = ControladorMatriculas::ctrMostrarMatriculas($item, $valor);
// echo '<pre>'; print_r($matriculas1); echo '</pre>';

foreach ($matriculas as $key => $value) {
  echo '<tr>'; 
  echo '<td>' . ($key + 1) . '</td>';
  echo '<td>' . $value["tuition_date"] . '</td>';
  if($value["status_payment"] != 0){
    echo '<td><button class="btn btn-success btn-xs btnAprobarPago" idMatricula="'.$value["id_tuition"].'" estadoPago="0">Aprobado</button></td>';
} else {
    echo '<td><button class="btn btn-danger btn-xs btnAprobarPago" idMatricula="'.$value["id_tuition"].'" estadoPago="1">No aprobado</button></td>';
};
  echo '<td>' . $value["tuition_cost"] . '</td>';
  echo '<td>' . $value["pay_date"] . '</td>'; 
  echo '<td>' . $value["registration_date"] . '</td>';
  echo '<td>' . $value["cc"] . '</td>'; 
  echo '<td>' . $value["first_name"] . " " . $value["last_name"]. '</td>';
  echo '<td>' . $value["st_address"] . '</td>'; 
  echo '<td>' . $value["first_name_parent"] . " " . $value["last_name_parent"]. '</td>';
  echo '<td>' . $value["cc_parent"] . '</td>'; 
  echo '<td>' . $value["email"] . '</td>'; 
  echo '<td>' . $value["phone"] . '</td>';
  echo '<td>';
  echo '<div class="btn-group">';
  echo '<button class="btn btn-warning btnEditarMatricula" idMatricula="'.$value["id_tuition"].'" data-toggle="modal" data-target="#modalEditarMatricula"><i class="fa fa-pencil"></i></button>';
  echo '<button class="btn btn-danger btnEliminarMatricula" idMatricula="'.$value["id_tuition"].'" style="margin-left: 8px;"><i class="fa fa-times"></i></button>';
  if ($value["status_payment"] == 0) {
        echo '<button class="btn btn-info btnEnviarNotificacion" 
                idMatricula="' . $value["id_tuition"] . '"  
                Telefono="' . $value["phone"] . '"
                Padre="' . $value["id_parent"] . '"
                ><i class="fa fa-commenting"></i></button>';
  }
  echo '</div>';
  echo '</td>';

  echo '</tr>';
}

?>

        </tbody>
 <tfoot>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th style="width:90px">Fecha Matricula</th>
           <th style="width: 10px">Estado Pago</th>
           <th style="width:100px">Costo Matricula</th>
           <th style="width:100px">Fecha Pago</th>  
           <th style="width:100px">Fecha Registro</th>
           <th style="width:100px">T.I Estudiante</th>
           <th style="width:100px">Estudiante</th>
           <th style="width:100px">Direccion</th>
           <th style="width:100px">Padre</th>
           <th style="width:100px">C.C</th>
           <th style="width:100px">Email</th>
           <th style="width:100px">Telefono</th>
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

<div id="modalAgregarMatricula" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#31B404; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Registrar Matricula</h4>

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

                <input type="number" class="form-control input-lg" name="nuevoCosto" placeholder="Ingresar costo matricula" >

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
              
                <span class="input-group-addon"><i class="fa fa-suitcase"></i></span> 

                <select name="nuevoEstMatri" id="nuevoEstMatri" class="selectize select-lg" >
                  
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

          <button type="submit" name="register" class="btn btn-primary">Guardar Matricula</button>

        </div>

        <?php
          $crearMatricula = new ControladorMatriculas();
          $crearMatricula -> ctrCrearMatricula();
        ?>

      </form>

    </div>
 
  </div>

</div>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarMatricula" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Matricula</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

             

           
              
<div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 

                <input type="number" class="form-control input-lg" name="editarCosto" id="editarCosto" placeholder="Ingresar costo matricula" >

              </div>
                 <input type="hidden"  name="idMatricula" id="idMatricula" required>

            </div>

      


      <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 

                <input type="text" class="form-control input-lg" name="editarFechaPago" id="editarFechaPago" placeholder="Ingresar fecha pago" onfocus="(this.type='date')" onblur="(this.type='text')">

              </div>

            </div>    


            <div class="form-group"> 
               
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-suitcase"></i></span> 

                <select name="editarEst" id="editarEst" class="selectize select-lg" >
                  
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

          <button type="submit" class="btn btn-primary">Modificar matricula</button>

        </div>

     <?php

          $editarMatricula = new ControladorMatriculas();
          $editarMatricula -> ctrEditarMatricula();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarMatricula = new ControladorMatriculas();
  $borrarMatricula -> ctrBorrarMatricula();

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