<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Nuevo Invitado / Escuelas Deportivas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Escuelas Deportivas</li>
    
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

          <form role="form" method="post" class="formularioVenta">

            <div class="box-body">
  
              <div class="box">

                <!--=====================================
                ENTRADA DEL VENDEDOR
                ======================================-->
            
                <div class="form-group">
                
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                    <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                    <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"]; ?>">

                  </div>

                </div> 

                 <div class="form-group">
                
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span> 

                    <input type="text" class="form-control input-lg" name="nuevoIdentificacion" placeholder="Ingresar Identificacion" required>

                  </div>

                </div> 

                <div class="form-group">
                
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span> 

                    <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Nombre" required>

                  </div>

                </div> 

                <div class="form-group">
                
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-user-circle"></i></span> 

                    <input type="text" class="form-control input-lg" name="nuevoApellido" placeholder="Ingresar Apellidos" required>

                  </div>

                </div> 

                <div class="form-group">
                
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span> 

                    <input type="text" class="form-control input-lg" name="nuevoCorreo" placeholder="Ingresar Correo" required>

                  </div>

                </div>

               <!-- ENTRADA PARA TIPO DE VEHICULO -->

            </div>
                <div class="form-group">
                
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                    <input type="text" class="form-control input-lg" name="nuevoFecha" placeholder="Ingresar Fecha    dd/mm/AAAA" required>

                  </div>

                </div>

                <div class="box-footer">
            <button type="submit" name="register" class="btn btn-success pull-right">Guardar Registro</button>
          </div> 
        </div>
      </div>
    </form>
  </div> 
</div>
<div class="col-md-7">

  <form action="recibe_excel_validando.php" method="POST" enctype="multipart/form-data"/>

    <div class="file-input text-center">

        <input  type="file" name="dataCliente" id="file-input" class="file-input__input "/>
    </div>

      <button type="submit" name="subir" class="btn btn-warning pull-left">Subir Excel</button> 

  </form>

</div>

</div>

</section>

<?php
include("registrar_deportivas.php");

?>
</div>
</div>
