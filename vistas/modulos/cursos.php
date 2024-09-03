<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
       Administrar Cursos
     
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Cursos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCursos">
          
          Agregar Curso

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Curso</th>
           <th>Clasificacion</th>
           <th style="width:80px">Acciones</th>

         </tr> 

        </thead>
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
        <tbody>

        <?php
 
          $item = null;
          $valor = null;

          $categorias = ControladorCursos::ctrMostrarCursos($item, $valor);

          foreach ($categorias as $key => $value) {
           
           echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["level_grade"].'</td>
                     <td class="text-uppercase">'.$value["clasification"].'</td>


                    <td>

                      <div class="btn-group">
                          
                        

                        <button class="btn btn-warning btnEditarCursos" idCursos="'.$value["id_grade"].'" data-toggle="modal" data-target="#modalEditarCursos"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarCursos" idCursos="'.$value["id_grade"].'" style="margin-left: 8px;"><i class="fa fa-times"></i></button>

                      </div>  

                    </td>

                  </tr>';
          }

        ?>

        </tbody>
<tfoot>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Curso</th>
           <th>Clasificacion</th>
           <th style="width:80px">Acciones</th>

         </tr> 

        </tfoot>
       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR Cursos
======================================-->

<div id="modalAgregarCursos" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Curso</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCursoNombre" 
                id="nuevoCursoNombre" placeholder="Ingresa nombre del curso" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA CLASIFICACIÓN -->
            <div class="form-group">
              <label for="nuevoCursoClasificacion">Clasificación del curso:</label>
              <select class="form-control input-lg" name="nuevoCursoClasificacion" id="nuevoCursoClasificacion" required>
                <option value=""> </option>
                <option value="a">A</option>
                <option value="b">B</option>
                <option value="c">C</option>
              </select>
            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Curso</button>

        </div>

        <?php

          $crearCurso = new ControladorCursos();
          $crearCurso -> ctrCrearCursos();

        ?>

      </form>

    </div>

  </div>

</div>


<!--=====================================
MODAL EDITAR Areas
======================================-->

<div id="modalEditarCursos" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post"  enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Curso</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarNombreCurso" 
                id="editarNombreCurso" placeholder="Ingresa nombre del curso" required>

                <input type="hidden" name="idCursos" id="idCursos" >

              </div>

            </div>

            <!-- ENTRADA PARA LA CLASIFICACIÓN -->
            <div class="form-group">
              <label for="editarClasificacion">Clasificación del curso:</label>
              <select class="form-control input-lg" name="editarClasificacion" id="editarClasificacion" required>
                <option value=""> </option>
                <option value="a">A</option>
                <option value="b">B</option>
                <option value="c">C</option>
              </select>
            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Cambios</button>

        </div>

        <?php

          $editarCurso = new ControladorCursos();
          $editarCurso -> ctrEditarCursos();

        ?>

      </form>

    </div>

  </div>

</div>



<?php

  $borrarCursos = new ControladorCursos();
  $borrarCursos -> ctrBorrarCursos();

?>
