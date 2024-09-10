<head>
    <!-- Incluye FontAwesome desde CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<style>

.treeview-menu {
    display: none;
    list-style: none;
    padding-left: 20px;
}

.treeview:hover > .treeview-menu,
.treeview-menu:hover {
    display: block;
}

.treeview > a {
    cursor: pointer;
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
            if ($comparar != "Profesor") {
                echo '
                <li>
                    <a href="usuarios">
                        <i class="fa fa-address-book"></i>
                        <span>Usuarios</span>
                    </a>
                </li>';
            }
            ?>

            <?php
            if ($comparar == "Profesor") {
                echo '
                <li>
                    <a href="cursoestudiante">
                        <i class="fa fa-drivers-license-o"></i>
                        <span>Cursos y Estudiantes</span>
                    </a>
                </li>';
            }
            ?>

            <?php
            if ($comparar == "Super Administrador") {
                echo '
                <li>
                    <a href="areas">
                        <i class="fa fa-address-card"></i>
                        <span>Roles de Usuario</span>
                    </a>
                </li>
                <li>
                    <a href="clientes">
                        <i class="fa fa-address-card"></i>
                        <span>clientes</span>
                    </a>
                </li>
                <li>
                    <a href="servicios">
                        <i class="fa fa-address-card"></i>
                        <span>servicios</span>
                    </a>
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
    var treeviewItems = document.querySelectorAll('.treeview > a');

    treeviewItems.forEach(function(item) {
        item.addEventListener('click', function(event) {
            event.preventDefault();
            var menu = this.nextElementSibling;
            if (menu.style.display === 'block') {
                menu.style.display = 'none';
            } else {
                // Cerrar otros submenús abiertos
                var allSubMenus = document.querySelectorAll('.treeview-menu');
                allSubMenus.forEach(function(subMenu) {
                    subMenu.style.display = 'none';
                });
                menu.style.display = 'block';
            }
        });
    });

    // Cerrar el submenú si el mouse sale del área del submenú
    var subMenus = document.querySelectorAll('.treeview-menu');
    subMenus.forEach(function(menu) {
        menu.addEventListener('mouseleave', function() {
            this.style.display = 'none';
        });
    });
});
</script>
