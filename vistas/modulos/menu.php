<head>
    <!-- Incluye FontAwesome desde CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<style>
/* Estructura del sidebar y colores */
.main-sidebar {
    padding-top: 50px;
    background: #b2babb;
    color: #ffffff;
}

/* Colores de los enlaces en el sidebar */
.main-sidebar .sidebar-menu > li > a {
    color: #353037;
    padding: 10px 15px;
}

.main-sidebar .sidebar-menu > li > a:hover {
    background: #595b5d;
    color: #ffffff;
}

/* Submenús ocultos por defecto */
.main-sidebar .treeview-menu {
    background: #d0d3d4;
    color: #353037;
    padding-left: 15px;
    display: none;
}

/* En resoluciones grandes, se permite mostrar submenús en hover */
@media (min-width: 769px) {
    .main-sidebar .treeview:hover .treeview-menu {
        display: block;
    }
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
                    <li>
                            <a href="facturas">
                                <i class="fa fa-address-card"></i>
                                <span>facturas</span>
                            </a>
                        </li>
                </li>
                ';
            }
            ?>
            <?php
            if($comparar == 'Coordinador comercial'){

                echo '
                  <li class="treeview">
                    <li>
                            <a href="usuarios">
                                <i class="fa fa-book"></i>
                                <span>Usuarios</span>
                            </a>
                    </li>
                </li>';
            }
            ?>
            <?php
            if($comparar == 'Asesor comercial'){

                echo '
                  <li class="treeview">
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
                </li>';
            }
            ?>
        </ul>
    </section>
</aside>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const treeviewItems = document.querySelectorAll('.treeview');

    treeviewItems.forEach(item => {
        const submenu = item.querySelector('.treeview-menu');

        // Solo activa el despliegue en clic si la resolución es menor a 769px
        item.addEventListener('click', function(e) {
            if (window.innerWidth <= 768) {
                e.preventDefault();

                // Cierra otros submenús abiertos
                treeviewItems.forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.classList.remove('active');
                        otherItem.querySelector('.treeview-menu').style.display = 'none';
                    }
                });

                // Alterna la visualización del submenú actual
                const isVisible = submenu.style.display === 'block';
                submenu.style.display = isVisible ? 'none' : 'block';
                item.classList.toggle('active', !isVisible);
            }
        });
    });

    // Asegura que los submenús estén ocultos cuando la ventana se redimensiona a resoluciones mayores
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            treeviewItems.forEach(item => {
                const submenu = item.querySelector('.treeview-menu');
                submenu.style.display = 'none';
                item.classList.remove('active');
            });
        }
    });
});

</script>
