<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Nuevo Vistante TODO EL DIA
      
    </h1> 

    <ol class="breadcrumb">
       
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Nuevo Visitante</li>
    
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

                 <div class="form-group">
                
                  <div class="input-group">
                    
                   <span class="input-group-addon"><i class="fa  fa-address-book-o"></i></span> 

                    <input type="text" class="form-control input-lg" name="nuevaOficina" placeholder="Ingresar Oficina" required>

                  </div>

                </div>

               

               <!-- ENTRADA PARA TIPO DE VEHICULO -->

            </div>
                <div class="form-group">
                
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                    <input type="date" class="form-control input-lg" name="nuevoFecha" placeholder="Ingresar Fecha    dd/mm/AAAA" required>

                  </div>

                </div>

                <div class="box-footer">
            <button type="submit" name="register" class="btn btn-success pull-right">Guardar Registro</button>
          </div> 
        </div>
      </div>

    </form>
    <?php

 
     
include("registrar_visitantes.php");
include("visitantes_correos.php");

?>

  </div> 
</div> 
<div class="container">

  <form action="recibe_excel_validando.php"  name="formulario" method="POST" enctype="multipart/form-data" / onsubmit="return validateForm()" required>

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
      <button type="submit" name="subir" class="btn btn-warning pull-left">Subir Archivo</button> 

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
     
    
let input = document.getElementById("inputTag");
        let imageName = document.getElementById("imageName")

        input.addEventListener("change", ()=>{
            let inputImage = document.querySelector("input[type=file]").files[0];

            imageName.innerText = inputImage.name;
        })
     




    //ejecutar el evento submit del formulario
    

</script> 
</div>


</div>
       
    

</body>
</html>'
</div>

</section>


</div>
</div>
<style>

/*input::file-selector-button {
   
 font-size: 14px;
 font-weight: 600;
 color: #fff;
 background-color: #106BA0;
 display: inline-block;
 transition: all .5s;
 cursor: pointer;
 padding: 10px 40px !important;
 text-transform: uppercase;
 width: fit-content;
 text-align: center;
 
}

.btn-warning{
  position: relative;
  padding: 11px 16px;
  font-size: 15px;
  line-height: 1.5;
  border-radius: 3px;
  color: #fff;
  background-color: #ffc100;
  border: 0;
  transition: 0.2s;
  overflow: hidden; \\ L
}

.btn-warning input::file-selector{
  cursor: pointer;
  position: absolute;
  left: 0%;
  top: 0%;
  transform: scale(3);
  opacity: 0;
}

.btn-warning:hover{
  background-color: #d9a400;
}
*/
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
