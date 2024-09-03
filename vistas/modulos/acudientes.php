
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Acudientes
     
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Acudientes</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">
 
      <div class="box-header with-border">
   

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarAcudiente">
          
         Registrar Acudiente

        </button>


        </button>
  
      </div>

      <div class="box-body">
       
</script>
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th style="width:100px">Identificación</th>
           <th style="width:100px">Nombre</th>
           <th style="width:100px">Apellido</th>
           <th style="width:100px">Correo</th>
         
          <th style="width:100px">Estudiantes Asociados</th>
          <th style="width:100px">Telefono Contacto</th> 


           <th style="width:100px" align="center">Acciones</th>

         </tr> 

        </thead>
        <!-- Datatables -->
    <!-- <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" /> -->
  
    

   
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
//     $("#nuevoAcuEst").selectize({
//         delimiter: ',', // Establece la coma como delimitador
//         plugins: ['remove_button'], // Agrega el botón para eliminar elementos seleccionados
//         maxItems: null, // Permite seleccionar cualquier cantidad de elementos
//         persist: false, // No persiste los elementos seleccionados al recargar la página
//         //create: true, // Permite la creación de nuevos elementos si no existen

//         onChange: function(value) {
//             console.log("Seleccionado:", value);
//         }
//     });
// });
</script>
    
    <!-- Datatables -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js">
    </script> -->

        <!-- Datatables -->
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
      localStorage.setItem('rutaActual', 'acudientes');

</script>
        <tbody>

       <?php

$item = null;
$valor = null;

$acudientes = ControladorAcudientes::ctrMostrarAcudientesConEstudiante($item, $valor);
//echo '<pre>'; print_r($acudientes); echo '</pre>';
// $respuesta = ControladorAcudientes::ctrMostrarEstudiantesConParent($item, $valor);
// echo '<pre>'; print_r($respuesta); echo '</pre>';

foreach ($acudientes as $key => $value) {
    // Agrega esta condición para filtrar solo los usuarios con perfil de "Administrador" y el área coincide
   
        echo '<tr>
                  <td>' . ($key + 1) . '</td>
                  <td>' . $value["cc_parent"] . '</td>
                  <td>' . $value["first_name_parent"] . '</td>   
                  <td>' . $value["last_name_parent"] . '</td>
                  <td>' . $value["email"] . '</td> 
                  <td>' . $value["first_name"] . " " . $value["last_name"]. '</td>
                  <td>' . $value["phone"] . '</td> 
            


        
        
                <td>
                    <div class="btn-group">
                         <button class="btn btn-warning btnEditarAcudiente" idAcudiente="'.$value["id_parent"].'" data-toggle="modal" data-target="#modalEditarAcudiente"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarAcudiente" idAcudiente="'.$value["id_parent"].'" style="margin-left: 8px;"><i class="fa fa-times"></i></button>

                        
                    </div>

<button class="btn btn-primary btnGenerarPDF" idStudent="'.$value["id_student"].'" style="margin-left: 8px;"><i class="fa fa-file-pdf-o"></i></button>    
                </td>
            </tr>';
    
}
?>

        </tbody>
<tfoot>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th style="width:100px">Identificación</th>
           <th style="width:100px">Nombre</th>
           <th style="width:100px">Apellido</th>
           <th style="width:100px">Correo</th>
         
          <th style="width:100px">Estudiantes Asociados</th>
          <th style="width:100px">Telefono Contacto</th> 


           <th style="width:100px" align="center">Acciones</th>

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
<script>
  
</script>
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

<div id="modalAgregarAcudiente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#31B404; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Registrar acudiente</h4>

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

                <input type="number" class="form-control input-lg" name="nuevoIdentificacion" placeholder="Ingresar Identificacion" >

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
              
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 

                <input type="email" class="form-control input-lg" name="nuevoCorreo" placeholder="Ingresar correo electronico" >

              </div>

            </div>

      
<div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Registrar Telefono" >

              </div>

            </div> 


          


            <div class="form-group"> 
               
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-suitcase"></i></span> 

                <select name="nuevoAcuEst[]" id="nuevoAcuEst" class="selectize select-lg" >
                  
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

          <button type="submit" name="register" class="btn btn-primary">Guardar Acudiente</button>

        </div>

        <?php
          $crearAcudiente = new ControladorAcudientes();
          $crearAcudiente -> ctrCrearAcudiente();
        ?>
<?php
              $registrarTelefono = new ControladorTelefonoP();
              $registrarTelefono -> ctrRegistrarTelefonoP();
        ?>
      </form>

    </div>
 
  </div>

</div>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarAcudiente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Acudiente</h4>

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
                    id="editarIdentificacion" >

                 <input type="hidden" name="idAcudiente" id="idAcudiente" >

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
              
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 

                <input type="email" class="form-control input-lg" name="editarCorreo"  id="editarCorreo" placeholder="Ingresar correo electronico" >

              </div>

            </div>

            

           

          
      

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar acudiente</button>

        </div>

     <?php

          $editarAcudiente = new ControladorAcudientes();
          $editarAcudiente -> ctrEditarAcudiente();

        ?> 

      </form>

    </div>

  </div>

</div>

<div id="modalRegistrarTelefono" class="modal fade" role="dialog">
  
<div class="modal-dialog">

<div class="modal-content">

  <form role="form" method="post" enctype="multipart/form-data">

    <!--=====================================
    CABEZA DEL MODAL
    ======================================-->

    <div class="modal-header" style="background:#31B404; color:white">

      <button type="button" class="close" data-dismiss="modal">&times;</button>

      <h4 class="modal-title">Registrar Telefono</h4>

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

            <select class="form-control input-lg" name="nuevoPadreTelefono"  >
              
              <option value="">Seleccionar Acudiente</option>

              <?php

         

                  $item = null;
                  $valor = null;

                  $categorias = ControladorAcudientes::ctrMostrarAcudientes($item, $valor);

                  foreach ($categorias as $key => $value) {

                    echo'

                    <option value="'.$value["id_parent"].'">'.$value["first_name_parent"]. " " . $value["last_name_parent"].'</option>';

                  }
        ?>
          </select>

          </div>

        </div>
       
        <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Registrar Telefono" >

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
      $registrarTelefono = new ControladorTelefonoP();
      $registrarTelefono -> ctrRegistrarTelefonoP();
    ?>

  </form>

</div>

</div>

</div>


<?php

  $borrarAcudiente = new ControladorAcudientes();
  $borrarAcudiente -> ctrBorrarAcudiente();

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
    text: "¡Este llegara al correo del acudiente si confirma. de lo contrario puede cancelar la accíón!",
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

$(document).ready(function(){
    $('.btnGenerarPDFPrueba').click(function(){
        var idStudent = $(this).attr('idStudent');
       


          swal({
    title: '¿Está seguro de generar el certificado de prueba?',
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
 window.location = 'generar_pdf_prueba.php?idStudent='+idStudent;


    }

  })


       
    });
});
</script>