<style>
/* Estilo general para el logo */
.main-header .logo .logo-lg img {
    padding: 5px 15px;
    max-width: 200px;
    height: auto;
}

/* Estilos para la cabecera y la barra de navegación */
.skin-blue .main-header .logo {
    background: #b2babb;
    color: #ffffff;
    border-bottom: 0 solid transparent;
    border-right: 1px solid transparent; /* Corrige el borde derecho */
}

/* Estilo del botón sidebar-toggle para que coincida con el main-header */
.skin-blue .main-header .navbar .sidebar-toggle {
    background: #b2babb; /* Invertir gradiente al hacer hover */
    border: none; /* Elimina cualquier borde por defecto */
    color: #ffffff; /* Asegura que el ícono o texto sea visible */
}

.skin-blue .main-header .navbar {
    background: #b2babb;
}

.skin-blue .main-header .navbar .sidebar-toggle:hover {
    background: #b2babb; /* Invertir gradiente al hacer hover */
}

/* Estilo para el dropdown-menu */
.navbar-custom-menu .dropdown-menu {
    background: #b2babb; /* Gradiente similar al sidebar-toggle */
    border: none; /* Elimina el borde predeterminado */
    border-radius: 4px; /* Bordes ligeramente redondeados */
    padding: 10px; /* Espaciado interno */
}

/* Elimina el borde y margenes del elemento li dentro del dropdown-menu */
.navbar-custom-menu .dropdown-menu > li {
    border: none; /* Elimina cualquier borde del elemento li */
    margin: 0; /* Elimina márgenes */
    padding: 0; /* Elimina el padding */
}
.navbar-nav > .user-menu > .dropdown-menu > .user-body {
  padding: 15px;
  border: none;
}

/* Estilo para los elementos dentro del dropdown-menu */
.navbar-custom-menu .dropdown-menu .user-body { 
    background: #b2babb; /* Aplica el gradiente de fondo */
    color: #ffffff; /* Color del texto */
    border: none; /* Elimina cualquier borde */
    border-radius: 0; /* Asegura que no haya bordes redondeados */
    margin: 0; /* Elimina márgenes */
    padding: 10px; /* Añade padding interno para asegurar buen espaciado */
}

/* Estilo para el icono dentro de .user-body */
.navbar-custom-menu .dropdown-menu .user-body i {
    color: #ffffff; /* Color del icono */
    margin-right: 8px; /* Espaciado entre el icono y el texto */
    border: none; /* Asegura que no haya borde en el ícono */
}

/* Hover state para .user-body */
.navbar-custom-menu .dropdown-menu .user-body:hover {
    background: #b2babb; /* Inversión del gradiente en hover */
    color: #ffffff; /* Asegura que el texto se mantenga blanco en hover */
    border: none; /* Asegura que no aparezcan bordes en hover */
}

/* Estilo para el botón "Editar Usuario" */
.navbar-custom-menu .dropdown-menu .btnEditarUsuario1 {
    background: #f39c12; /* Color de fondo del botón de editar */
    border: none; /* Elimina el borde del botón */
    color: #ffffff; /* Color del texto del botón */
}

.navbar-custom-menu .dropdown-menu .btnEditarUsuario1:hover {
    background: #e08e0b; /* Fondo del botón en hover */
    color: #ffffff; /* Color del texto del botón en hover */
}

/* Estilo para el botón "Salir" */
.navbar-custom-menu .dropdown-menu .btn-danger {
    background: #dd4b39; /* Color de fondo del botón de salir */
    border: none; /* Elimina el borde del botón */
    color: #ffffff; /* Color del texto del botón */
}

.navbar-custom-menu .dropdown-menu .btn-danger:hover {
    background: #d73925; /* Fondo del botón en hover */
    color: #ffffff; /* Color del texto del botón en hover */
}

/* Asegura que los textos se alineen correctamente */
.navbar-custom-menu .dropdown-menu .pull-right {
    float: right; /* Alinea el contenido a la derecha */
}

/* Breakpoint para pantallas pequeñas (sm) */
@media (max-width: 767px) {
    .main-header .logo .logo-lg img {
        max-width: 150px; /* Reduce el tamaño del logo */
    }

    .main-header .logo .logo-lg {
        display: none; /* Oculta el logo grande */
    }

    .main-header .logo .logo-mini {
        display: block; /* Muestra el logo mini */
        max-width: 50px; /* Ajusta el tamaño del logo mini */
    }

    .navbar-custom-menu {
        display: none; /* Oculta el menú personalizado en pantallas pequeñas */
    }
}

/* Breakpoint para pantallas medianas (md) */
@media (min-width: 768px) and (max-width: 991px) {
    .main-header .logo .logo-lg img {
        max-width: 175px; /* Ajusta el tamaño del logo */
    }

    .navbar-custom-menu {
        display: flex; /* Asegura que el menú personalizado sea visible */
    }
}

/* Breakpoint para pantallas grandes (lg) */
@media (min-width: 992px) {
    .main-header .logo .logo-lg img {
        max-width: 200px; /* Tamaño máximo para pantallas grandes */
    }

    .navbar-custom-menu {
        display: flex; /* Asegura que el menú personalizado sea visible */
    }
}

/* Estilo del dropdown-menu para pantallas medianas y pequeñas */
@media (max-width: 991px) {
    .navbar-custom-menu > .navbar-nav > li > .dropdown-menu {
        position: absolute;
        right: 5%;
        left: auto;
        border: 0;
        background: #5c4d4d; /* Aplica el gradiente al fondo */
        border-radius: 4px; /* Bordes ligeramente redondeados */
        padding: none; /* Espaciado interno */
        color: #ffffff; /* Asegura que el texto sea visible sobre el fondo oscuro */
    }
}

</style>
<div class="main-header">
    <!-- LOGOTIPO -->
    <a href="inicio" class="logo">
        <!-- Logo mini para dispositivos móviles -->


        <!-- Logo normal -->
        <span class="logo-lg">
            <img src="vistas/img/plantilla/Logo.jpeg" width="150">
        </span>
    </a>

    <!-- BARRA DE NAVEGACIÓN -->
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <!-- Perfil de usuario -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <?php

                        if ($_SESSION["foto"] != "") {

                            echo '<img src="' . $_SESSION["foto"] . '" class="user-image">';
                        } else {


                            echo '<img src="vistas/img/usuarios/default/usuario.png" class="user-image">';
                        }


                        ?>

                        <span class="hidden-xs"><?php echo $_SESSION["nombre"]; ?></span>

                    </a>

                    <!-- Dropdown-toggle -->

                    <ul class="dropdown-menu">

                        <li class="user-body">
                            <i class="fa  fa-address-book-o"></i>
                            <span class="hidden-xs">PERFIL</span>
                            <span class="hidden-xs pull-right"><?php echo $_SESSION["perfil"];  ?></span>
                        </li>

                        <li class="user-body">
                            <button class="btn btn-warning btnEditarUsuario1" data-toggle="modal" data-target="#modalEditarUsuario1"><i class="fa fa-pencil"></i></button>

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


                    <h4 class="modal-title">Editar Contraseña</h4>

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

                    <button type="submit" name="edit" class="btn btn-primary">Modificar perfiless</button>

                    <?php

                    include("actualizar.php");

                    ?>

                </div>

            </form>



        </div>

    </div>

</div>