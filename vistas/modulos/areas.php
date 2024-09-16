

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      Administrar Areas
    </h1>

    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Areas</li>
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarAreas">
          Agregar Area
        </button>
      </div>

      <!-- Flexbox para alinear las tablas -->
      <div class="box-body d-flex" style="display: flex; gap: 20px;">

        <!-- Primera tabla -->
        <div class="table-container" style="flex: 1;">
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width:10px">#</th>
                <th>Area</th>
                <th style="width:80px">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $item = null;
                $valor = null;
                $categorias = ControladorAreas::ctrMostrarAreas($item, $valor);
                foreach ($categorias as $key => $value) {
                  echo ' <tr>
                          <td>'.($key+1).'</td>
                          <td class="text-uppercase">'.$value["area"].'</td>
                          <td>
                            <div class="btn-group">
                              <button class="btn btn-warning btnEditarAreas" idAreas="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarAreas"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-danger º" idAreas="'.$value["id"].'" style="margin-left: 8px;"><i class="fa fa-times"></i></button>
                            </div>
                          </td>
                        </tr>';
                }
              ?>
            </tbody>
          </table>
        </div>

        <!-- Segunda tabla -->
        <div class="table-container" style="flex: 1;">
          <table class="table table-bordered table-striped dt-responsive tablas2" width="100%">
            <thead>
              <tr>
                <th style="width:10px">#</th>
                <th>Areas de derecho</th>
                <th style="width:80px">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $item = null;
                $valor = null;
                $elementos = ControladorAreaDerecho::ctrVerAreasDerecho($item, $valor);
                foreach ($elementos as $key => $value) {
                  echo ' <tr>
                          <td>'.($key+1).'</td>
                          <td class="text-uppercase">'.$value["law_area"].'</td>
                          <td>
                            <div class="btn-group">
                              <button class="btn btn-warning btnEditarAreaDerecho" idAreasDerecho="'.$value["id_area"].'" data-toggle="modal" data-target="#modalEditarCursos"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-danger btnEliminarAreaDerecho" idAreasDerecho="'.$value["id_area"].'" style="margin-left: 8px;"><i class="fa fa-times"></i></button>
                            </div>
                          </td>
                        </tr>';
                }
              ?>
            </tbody>
          </table>
        </div>

      </div> <!-- Fin de flexbox -->

    </div>

  </section>

</div>

<!-- MODAL AGREGAR Areas -->
<div id="modalAgregarAreas" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <div class="modal-header" style="background:#3e383d; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Area</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevaArea" placeholder="Ingresar Area" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Area</button>
        </div>
        <?php
          $crearCategoria = new ControladorAreas();
          $crearCategoria -> ctrCrearAreas();
        ?>
      </form>
    </div>
  </div>
</div>

<!-- MODAL EDITAR Areas -->
<div id="modalEditarAreas" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <div class="modal-header" style="background:#3e383d; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Area</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                <input type="text" class="form-control input-lg" name="editarAreas" id="editarAreas" required>
                <input type="hidden" name="idAreas" id="idAreas" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
        <?php
          $editarCategoria = new ControladorAreas();
          $editarCategoria -> ctrEditarAreas();
        ?>
      </form>
    </div>
  </div>
</div>

<!-- MODAL EDITAR AREAS DE DERECHO -->
<div id="modalEditarCursos" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post"  enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3e383d; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Area de derecho</h4>

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

                <input type="text" class="form-control input-lg" name="editarNombreAreaDerecho" 
                id="editarNombreAreaDerecho" placeholder="Ingresa nombre del curso" required>

                <input type="hidden" name="idAreasDerecho" id="idAreasDerecho" >

              </div>

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

          $editarCurso = new ControladorAreaDerecho();
          $editarCurso -> ctrEditarAreaDerecho();

        ?>

      </form>

    </div>

  </div>

</div>



<?php
  $borrarCategoria = new ControladorAreas();
  $borrarCategoria -> ctrBorrarAreas();
?>

<?php
  $borrarCategoria = new ControladorAreaDerecho();
  $borrarCategoria -> ctrBorrarAreaDerecho();
?>

<!-- SCRIPTS PARA LAS TABLAS -->
<script>
$(document).ready(function() {
    // Inicializa la primera tabla
    $('.tablas').DataTable({
        destroy: true,
        responsive: true,
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
        lengthChange: false, // Desactiva la opción de cambiar la cantidad de registros mostrados
        searching: false,    // Desactiva el filtro de búsqueda
    });

    // Inicializa la segunda tabla
    $('.tablas2').DataTable({
        destroy: true,
        responsive: true,
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
        lengthChange: false, // Desactiva la opción de cambiar la cantidad de registros mostrados
        searching: false,    // Desactiva el filtro de búsqueda
    });
});

</script>
