<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

			<li class="active">

				<a href="inicio">

					<i class="fa fa-home"></i>
					<span>Inicio</span>

				</a>

			</li>
			<?php
			$comparar = $_SESSION["perfil"];
	        $item = null;
	        $valor = null;

	        $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
	        if($comparar !="Funcionario"){
	        echo'
			<li>

				<a href="usuarios">

					<i class="fa fa-user"></i>
					<span>Usuarios</span>

				</a>

			</li>';

	        }

			?>

			<li class="treeview">

				<a href="#">

					<i class="fa fa-user-plus"></i>
					
					<span>Registros</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">

					<li>

						<a href="crear-venta">
							
							<i class="fa fa-circle-o"></i>
							<span>Nuevo Visitante(DIA)</span>

						</a>
					</li>

					<li>

						<a href="crear-venta5">
							
							<i class="fa fa-circle-o"></i>
							<span>Nuevo Visitante(E/S)</span>

						</a>
					</li>		
	
					<li>

						<a href="crear-venta2">
							
							<i class="fa fa-circle-o"></i>
							<span>Nuevo Contratista</span>
							
						</a>

					</li>

					
				</ul>

			</li>
			<?php
			$comparar = $_SESSION["perfil"];
	        $item = null;
	        $valor = null;

	        $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
	        if($comparar =="Super Administrador"){
	        echo'

	        <li class="treeview">

				<a href="#">

					<i class="fa  fa-address-book-o"></i>
					
					<span>Dependencias</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>
  
				</a>


				<ul class="treeview-menu">

				<li>

						<a href="categorias">
							
							<i class="fa fa-circle-o"></i>
							<span>Administrar Dependencias</span>

						</a>

					</li>
					
				</ul>

			</li>

			<li class="treeview">

				<a href="#">


					<i class="fa fa-list-ul"></i>
					
					<span>Reportes</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>


				<ul class="treeview-menu">

				<li>

						<a href="reportes5">
							
							<i class="fa fa-circle-o"></i>
							<span>Reportes Usuarios</span>

						</a>

					</li>


				<li>

						<a href="ventas">
							
							<i class="fa fa-circle-o"></i>
							<span>Registros Web</span>

						</a>

					</li>
					<li>

						<a href="reportes2">
							
							<i class="fa fa-circle-o"></i>
							<span>Registros Locales</span>

						</a>

					</li>
					
					<li>

						<a href="reportes">
							
							<i class="fa fa-circle-o"></i>
							<span>Reportes Ingreso</span>

						</a>

					</li>
  					


					


				</ul>
				<li>

				<a href="gestionarpermisos">

					<i class="fa fa-calendar-check-o"></i>
					<span>Gestionar permisos</span>

				</a>

			</li>
			</li>

			<li class="treeview">

				<a href="#">

					<i class="fa fa-suitcase"></i>
					
					<span>Areas</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>


				<ul class="treeview-menu">

				<li>

						<a href="areas">
							
							<i class="fa fa-circle-o"></i>
							<span>Administrar Areas</span>

						</a>

					</li>
					
				</ul>

			</li>
			<li>

				<a href="controladoras">

					<i class="fa fa-500px"></i>
					<span>Filtrar Controladoras</span>

				</a>

			

';


	        }

	    if($comparar =="Administrador"){
	        echo'

			<li class="treeview">

				<a href="#">


					<i class="fa fa-list-ul"></i>
					
					<span>Reportes</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>


				<ul class="treeview-menu">
				<li>

						<a href="reportes5">
							
							<i class="fa fa-circle-o"></i>
							<span>Reportes Usuarios</span>

						</a>

					</li>

				<li>

						<a href="ventas">
							
							<i class="fa fa-circle-o"></i>
							<span>Registros Web</span>

						</a>

					</li>
					<li>

						<a href="reportes2">
							
							<i class="fa fa-circle-o"></i>
							<span>Registros Locales</span>

						</a>

					</li>
					
					<li>

						<a href="reportes">
							
							<i class="fa fa-circle-o"></i>
							<span>Reportes Ingreso</span>

						</a>

					</li>

					


				</ul>

			</li>'

			;

	        }

			?>

			

		</ul>

	 </section>

</aside>