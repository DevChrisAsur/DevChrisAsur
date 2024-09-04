<div class="main-header">
 	
	<!--=====================================
	LOGOTIPO
	======================================-->
	<a href="inicio" class="logo">
		
		<span class="logo-mini">
			
			<img src="vistas/img/plantilla/logo_ccexpress.png" class="img-responsive" style="padding:5px">

		</span>

		<!-- logo normal -->

		<span class="logo-lg">
			
			<img src="vistas/img/plantilla/logo-ecopetrol-1.png" class="img-responsive" style="padding:10px 30px">

		</span>

	</a>

	<!--=====================================
	BARRA DE NAVEGACIÓN
	======================================-->
	<nav class="navbar navbar-static-top" role="navigation">
		
		<!-- Botón de navegación -->

	 	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        	
        	<span class="sr-only">Toggle navigation</span>
      	
      	</a>

		<!-- perfil de usuario -->

		<div class="navbar-custom-menu">
				
			<ul class="nav navbar-nav">
				
				<li class="dropdown user user-menu">
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">

					<?php

					if($_SESSION["foto"] != ""){

						echo '<img src="'.$_SESSION["foto"].'" class="user-image">';

					}else{


						echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';

					}


					?>
						
						<span class="hidden-xs"><?php  echo $_SESSION["nombre"]; ?></span>

					</a>

					<!-- Dropdown-toggle -->

					<ul class="dropdown-menu">

						<li class="user-body">
							<i class="fa  fa-address-book-o"></i>
							<span class="hidden-xs">PERFIL</span>
							<span class="hidden-xs pull-right"><?php echo $_SESSION["perfil"];  ?></span>
						</li>

						<li class="user-body">
							 <button class="btn btn-warning btnEditarUsuario1"  data-toggle="modal" data-target="#modalEditarUsuario1"><i class="fa fa-pencil"></i></button>

							<div class="pull-right">
								<a href="salir" class="btn btn-danger">Salir</a>

							</div>

						</li>

					</ul>

				</li>

			</ul>

		</div>

	</nav>
</div>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarUsuario1" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">
        

          <button type="button" class="close" data-dismiss="modal">&times;</button>
          

          <h4 class="modal-title">Editar perfil</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

		
          <div class="box-body">

             
            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
             <!-- <script type="text/javascript" language="javascript" src="funciones.js"></script>-->
              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingrese la nueva contraseña" required>

              </div>
            <!--  <div>
               <p>&nbsp&nbsp<input class="form-check-input" type="checkbox" onclick="mostrarContrasena()"> Mostrar contraseña</input>
               </div>-->
              <br>

              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="confirmPassword" placeholder="Confirme la nueva contraseña" required>

              </div>
              <!--
              <div>
               <p>&nbsp&nbsp<input class="form-check-input" type="checkbox" onclick="mostrarConclave()"> Mostrar contraseña</input>
               </div>-->

            </div>

            </div>


             

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel"></div>



            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" name="edit" class="btn btn-primary">Modificar perfil</button>

           <?php
      
          include("actualizar.php");

        ?>

        </div>

      </form>
      


    </div>

  </div>

</div>