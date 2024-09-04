<style >
  

body
{
    background-size: cover !important;

}

.bg-gray
{
    background-color: rgba(167, 188, 201, 0.5);
}

.bg-white
{
    background-color: rgba(255, 255, 255, 0.9);
}
.header
{
    margin-top: 4%;
    background-color: #0dcaf0;
    color: #f0f5fa;
    text-transform: uppercase;
    padding: 2%;
    border-radius: 50px
}


.icon-title
{
    border: #0dcaf0 5px solid;
    border-radius: 50%;
    margin-top: 20px;
    margin-left: -10px;
    margin-right: 10px;
    padding: 1.3%;
    background-color: white;
    color: #0dcaf0;
}

</style>
<div class="content-wrapper">

  <section class="content-header">
    
    <header class="header">
        <h4>
            <span class="icon-title">
                <i class="fa fa-filter" style="font-size:24px;"></i>
            </span>
            Buscar por filtros
        </h4>
    </header>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Filtrar controladoras</li>
    
    </ol>

  </section>
  
  <section class="content">
 
    <div class="row">

      <!--=====================================
      EL FORMULARIO
      ======================================-->
      
      <div class="col-lg-11 col-xs-12">
        
        <div class="box box-success">
          
          <div class="box-header with-border"></div>

          <form class="row" id="multi-filters">

            <div class="box-body">
  
              <div class="box">

                <!--=====================================
                ENTRADA DEL VENDEDOR
                ======================================-->
            
                <div class="container col-md-2">
                
                  <div class="col-2">
                    
                   <h6>Rol</h6>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="superadmin" name="rol[]" value="SuperAdmin" >
                <label class="form-check-label" >Super Admin</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="admin" name="rol[]" value="Admin">
                <label class="form-check-label" >Admin</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="funcionario" name="rol[]" value="Funcionario">
                <label class="form-check-label" >Funcionario</label>
            </div>

                  </div>

                </div> 

                 <div class="container col-md-2">
                 <div class="col-2">
                  <h6>Areas</h6>
                   <?php
                    $comparar = $_SESSION["perfil"];

                    if($comparar == "Super Administrador"){
 
                      $item = null;
                      $valor = null;

                      $categorias = ControladorAreas::ctrMostrarAreas($item, $valor);

                      foreach ($categorias as $key => $value) {

                       echo '<div class="form-check">
                    <input type="checkbox" class="form-check-input" name="area[]" value="'.$value["area"].'">
                     <label class="form-check-label" >'.$value["area"].'</label>
                      </div>';
                        

                      }
                    }

                    if($comparar == "Administrador"){
 
                      $item = null;
                      $valor = null;

                      $categorias = ControladorAreas::ctrMostrarAreas($item, $valor);

                      foreach ($categorias as $key => $value) {
                        if($value["area"] == $ofi){
                          echo'
                      <input type="checkbox" class="form-check-input" name="area[]" value="'.$value["area"].'">'.$value["area"].'>';
                        }

                      }
                    }
            ?>
              </div>
                </div> 


                 <div class="container col-md-2">
                 <div class="col-2">
                  <h6>Piso 1</h6>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="piso1" name="piso1[]" value="Acceso">
                <label class="form-check-label">Piso 1</label>
            </div>
            </div>
              </div>
                
              <div class="container col-md-2">
                 <div class="col-2">
                  <h6>Piso 2</h6>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="piso2" name="piso2[]" value="Acceso">
                <label class="form-check-label">Piso 2</label>
            </div>
            </div>
              </div>
              <div class="container col-md-2">
                 <div class="col-2">
                  <h6>Piso 3</h6>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="piso3" name="piso3[]" value="Acceso">
                <label class="form-check-label">Piso 3</label>
            </div>
            </div>
              </div>
              <div class="container col-md-2">
                 <div class="col-2">
                  <h6>Piso 4</h6>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="piso4" name="piso4[]" value="Acceso">
                <label class="form-check-label">Piso 4</label>
            </div>
            </div>
              </div>
              <div class="container col-md-2">
                 <div class="col-2">
                  <h6>Piso 5</h6>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="piso5" name="piso5[]" value="Acceso">
                <label class="form-check-label">Piso 5</label>
            </div>
            </div>
              </div>
              <div class="container col-md-2">
                 <div class="col-2">
                  <h6>Piso 6</h6>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="piso6" name="piso6[]" value="Acceso">
                <label class="form-check-label">Piso 6</label>
            </div>
            </div>
              </div>
              <div class="container col-md-2">
                 <div class="col-2">
                  <h6>Piso 7</h6>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="piso7" name="piso7[]" value="Acceso">
                <label class="form-check-label">Piso 7</label>
            </div>
            </div>
              </div>
              <div class="container col-md-2">
                 <div class="col-2">
                  <h6>Piso 8</h6>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="piso1" name="piso8[]" value="Acceso">
                <label class="form-check-label">Piso 8</label>
            </div>
            </div>
              </div>
               

                
        </div>
      </div>
    </form>
    <br>
    <br>
    <table class="table table-bordered table-hover table-responsive">
        <thead class="bg-info" id="table-result">
       <tr>
            <th>ID</th>
            <th>Rol</th>
            <th>Piso 1</th>
            <th>Piso 2</th>
            <th>Piso 3</th>
            <th>Piso 4</th>
            <th>Piso 5</th>
            <th>Piso 6</th>
            <th>Piso 7</th>
            <th>Piso 8</th>
            <th>IP</th>
            <th>Area</th>
            
            
        </tr>



        </thead>
        <tbody id="filters-result" class="bg-white">

        </tbody>
    </table>
  </div> 
</div>


</div>

</section>


</div>
</div>
