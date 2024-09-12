<head>
    <!-- Incluye FontAwesome desde CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<style>

.treeview-menu:hover {
    display: block; /* Asegura que se mantenga abierto al hacer hover */
}

.treeview-menu {
    position: relative;
}

.treeview-menu::before {
    content: "";
    position: absolute;
    top: -10px; /* Ajusta estos valores según lo necesario */
    left: -10px;
    right: -10px;
    bottom: -10px;
    z-index: -1; /* Coloca este pseudo-elemento detrás */
}


.treeview-menu:hover {
    display: block;
}

/* Aplica el mismo fondo de gradiente al sidebar */
.main-sidebar {
    padding-top: 50px;
    background: linear-gradient(to bottom, #353037, #101111); /* Mismo gradiente que el main-header */
    color: #ffffff; /* Asegura que el texto sea legible */
    border: none;
}

/* Ajusta el padding y tamaño de la imagen en el sidebar */
.main-sidebar .logo .logo-lg img {
    padding: 5px 15px; /* Reduce el padding de la imagen */
    max-width: 200px; /* Ajusta el tamaño de la imagen */
    height: auto; /* Mantiene la proporción de la imagen */
    background-color: transparent; /* Fondo transparente para la imagen */
}

/* Ajuste para los elementos de la sidebar */
.main-sidebar .sidebar-menu > li > a {
    color: #ffffff; /* Color blanco para el texto de los enlaces */
}

.main-sidebar .sidebar-menu > li > a:hover {
    background: #353037; /* Fondo un poco más claro en hover para mejor visibilidad */
    color: #ffffff;
}

/* Ajuste para los submenús */
.main-sidebar .treeview-menu {
    background: #2a292e; /* Un tono ligeramente más claro para los submenús */
}

</style>
<aside class="main-sidebar">

    

    <section class="sidebar">
        <ul class="sidebar-menu">
            <li>
                <a href="inicio" class="active">
                    <i class="fa fa-home"></i>
                    <span>Inicio</span>
                </a>
            </li>
            <?php
            $comparar = $_SESSION["perfil"];
            $item = null;
            $valor = null;

            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
            ?>

            <?php
            if ($comparar == "Super Administrador") {
                echo '

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user-circle-o"></i>
                        <span>Operadores</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        
                        <li>
                            <a href="usuarios">
                                <i class="fa fa-book"></i>
                                <span>Usuarios</span>
                            </a>
                        </li>
                        <li>
                            <a href="areas">
                                <i class="fa fa-gavel"></i>
                                <span>Areas de trabajo</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-group"></i>
                        <span>Contactos</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        
                        <li>
                            <a href="clientes">
                                <i class="fa fa-address-book"></i>
                                <span>clientes</span>
                            </a>
                        </li>
                        <li>
                            <a href="leads">
                                <i class="fa fa-exclamation"></i>
                                <span>Leads</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-group"></i>
                        <span>Ofertas</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        
                        <li>
                            <a href="servicios">
                                <i class="fa fa-address-card"></i>
                                <span>Productos</span>
                            </a>
                        </li>
                        <li>
                            <a href="suscripciones">
                                <i class="fa fa-address-card"></i>
                                <span>suscripciones</span>
                            </a>
                        </li>
                    </ul>
                </li>
                ';
            }
            ?>
        </ul>
    </section>
</aside>

<!-- JavaScript -->
<script>

document.addEventListener('DOMContentLoaded', function() {
    const treeviewMenu = document.querySelector('.treeview-menu');
    const adjacentElements = document.querySelectorAll('.treeview-menu + li, .some-adjacent-selector'); // Selecciona los elementos adyacentes

    // Mantén el menú desplegado mientras el ratón esté sobre él
    treeviewMenu.addEventListener('mouseenter', function() {
        treeviewMenu.style.display = 'block';
    });

    // Cuando el ratón sale del menú, oculta tras un retraso
    treeviewMenu.addEventListener('mouseleave', function() {
        setTimeout(function() {
            treeviewMenu.style.display = 'none';
        }, 500);
    });

    // Desactiva el treeview cuando pasa por los elementos adyacentes
    adjacentElements.forEach(function(element) {
        element.addEventListener('mouseenter', function() {
            treeviewMenu.style.display = 'none'; // Cierra el menú al pasar sobre los adyacentes
        });
    });
});

</script>
