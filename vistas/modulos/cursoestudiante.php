<div class="content-wrapper">

  <section class="content-header">
    
  <?php
  $comparar = $_SESSION["perfil"];
  $item = null;
  $valor = null;


  if($comparar == "Profesor"){
    echo'<h1>
      
       Mis Cursos
     
    </h1>';
  }else{
    echo '<h1>
      
            Administrar Cursos
  
          </h1>';
  };
  ?>
    

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Cursos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th style="width:100px">Profesor</th>
           <th style="width:100px">Nombre</th>
           <th style="width:100px">Apellido</th>
           <th style="width:100px">Curso Asignado</th>
           <th style="width:10px">Acciones</th>

         </tr> 

        </thead>

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
        localStorage.setItem('rutaActual', 'cursoestudiantes');

      </script>
        <tbody>

        <?php

  $comparar = $_SESSION["perfil"];

  if ($comparar == "Profesor") {

      $item = "u.id";  // El campo de la tabla 'usuarios' que vas a filtrar
      $valor = $_SESSION["id"];

      $categorias = ControladorCursoEstudiante::ctrMostrarGrupoProfesor($item, $valor);

      //echo '<pre>'; print_r($categorias); echo '</pre>';

      foreach ($categorias as $key => $value) {

          echo ' <tr>
                  <td>' . ($key + 1) . '</td>
                  <td class="text-uppercase">' . $value["nombre"] . '</td>
                  <td class="text-uppercase">' . $value["first_name"] . '</td>
                  <td class="text-uppercase">' . $value["last_name"] . '</td>
                  <td class="text-uppercase">' . $value["level_grade"] . "-" . $value["clasification"] . '</td>
                  <td>
                      <div class="btn-group">
                          <button class="btn btn-info btnEditarCursoEstudiante" idEstudianteCurso="' . $value["id_student"] . '" data-toggle="modal" data-target="#modalEditarCursoEstudiante"><i class="fa fa-book"></i></button>
                      </div>  
                  </td>
              </tr>';
      }
    } else{
      $categorias = ControladorCursoEstudiante::ctrMostrarCursosEstudiantes($item, $valor);
           // $categorias1 = ControladorCursoEstudiante::ctrMostrarCursoEstudiante($item, $valor);
           // echo '<pre>'; print_r($categorias1); echo '</pre>';

           foreach ($categorias as $key => $value) {
           
            echo ' <tr>

                     <td>'.($key+1).'</td>
                     <td class="text-uppercase">'.$value["nombre"].'</td>
                     <td class="text-uppercase">'.$value["first_name"].'</td>
                     <td class="text-uppercase">'.$value["last_name"].'</td>
                     <td class="text-uppercase">' . $value["level_grade"] . "-" . $value["clasification"]. '</td>


                     <td>

                       <div class="btn-group">

                         <button class="btn btn-info btnEditarCursoEstudiante" idEstudianteCurso="'.$value["id_student"].'" data-toggle="modal" data-target="#modalEditarCursoEstudiante"><i class="fa fa-book"></i></button>

                       </div>  

                     </td>

                   </tr>';
           }

    }


           

        ?>

        </tbody>
<tfoot>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th style="width:100px">Profesor</th>
           <th style="width:100px">Nombre</th>
           <th style="width:100px">Apellido</th>
           <th style="width:100px">Curso Asignado</th>
           <th style="width:10px">Acciones</th>

         </tr> 

        </tfoot>
       </table>

      </div>

    </div>

  </section>

</div>



<!--=====================================
    EDITAR CURSO
======================================-->
<div id="modalEditarCursoEstudiante" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Re asignar Curso</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">           

            <!-- ENTRADA PARA EL NOMBRE -->
           

            <div class="form-group"> 
               
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-suitcase"></i></span> 

                <select name="EditarCursoEstudiante" id="EditarCursoEstudiante" class="form-control input-lg" >
                  
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
           
           

           <div class="form-group"> 
               
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-suitcase"></i></span> 

                <select class="form-control input-lg" name="cursoEstudiante"
                                                         id="cursoEstudiante" >
                  
                  <option value="">Seleccionar Curso</option>

                  <?php

             
 
                      $item = null;
                      $valor = null;

                      $categorias = ControladorCursos::ctrMostrarCursos($item, $valor);

                      foreach ($categorias as $key => $value) {

                        echo'

                        <option value="'.$value["id_grade"].'">'.$value["level_grade"]. " ".$value["clasification"].'</option>';

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

          <button type="submit" class="btn btn-primary">Modificar Curso</button>

        </div>

     <?php

          $editarCursoEstudiante = new ControladorCursoEstudiante();
          $editarCursoEstudiante -> ctrEditarCursoEstudiante();

        ?> 

      </form>

    </div>

  </div>

</div>



<?php

  $borrarCursos = new ControladorCursos();
  $borrarCursos -> ctrBorrarCursos();

?>
