<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="vistas/img/plantilla/AsurLogo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página en Mantenimiento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        /* Estilos del cuerpo y fondo */
        body {
            background-image: url('vistas/img/plantilla/Fondo.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        /* Estilos para el logo */
        .main-logo {
            max-width: 800px;
            height: auto;
        }

        .logo {
            max-width: 150px;
            height: auto;
        }

        /* Estilos generales para el contenido */
        .content {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 2rem;
            border-radius: 6px;
            border: 1px solid #b3c2d1;
        }


        /* Estilos para la barra de navegación */
        .navbar {
            background-color: rgba(255, 255, 255, 0.9);
        }

        /* Estilos para el pie de página */
        .footer {
            text-align: center;
            padding: 1rem 0;
            background-color: rgba(255, 255, 255, 0.8);
            position: relative;
            bottom: 0;
            width: 100%;
        }

       /* Estilos para el contenedor de Quienes Somos */
#quienes-somos {
    height: auto;
    width: 90vw;
    max-width: 1200px;
    padding: 2vh 3vw;
    margin: 5vh auto;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
    background-color: rgba(255, 255, 255, 0.8);
    border: 1px solid #b3c2d1;
    border-radius: 10px;
    transition: max-height 1s ease, padding 1s ease, visibility 0s 1s; /* Despliegue más lento */

}

/* Estilos para las cajas colapsables */
.box-collapsible {
    width: 100%;
    height: auto;
    margin: 1rem 0;
    background-color: rgba(255, 255, 255, 0.8);
    border: 1px solid #b3c2d1;
    border-radius: 10px;
    text-align: left;
    cursor: pointer;
    overflow: hidden;
    transition: height 0.4s ease;
}

/* Títulos dentro de las cajas */
.box-collapsible h2 {
    margin: 0;
    padding: 1rem;
    font-size: 2vw;
    text-transform: uppercase;
    color: #333;
    text-align: left;
}

/* Ocultar el contenido por defecto */
.content-quienes-somos {
    background-color: rgba(255, 255, 255, 0.9);
    padding: 1rem;
    border-radius: 6px;
    border: 1px solid #b3c2d1;
    display: none;  /* Oculto inicialmente */
    max-height: 0;
    overflow: hidden;
    visibility: hidden; /* El contenido es invisible al inicio */
    transition: transform 0.3s;
}

/* Cuando se hace clic en el título y el contenido se expande */
.box-collapsible.expanded .content-quienes-somos {
    display: block; /* Mostrar el contenido */
    max-height: 500px;
    visibility: visible;
    padding: 1rem;
    transition: transform 0.3s;}

.content-quienes-somos p {
    color: #333;
    font-size: calc(1rem + 0.5vw);
    text-align: left;
}

/* Estilos para pantallas pequeñas */
@media (max-width: 768px) {
    .box-collapsible h2 {
        font-size: 3vw;
    }

    .content-quienes-somos p {
        font-size: calc(0.8rem + 1vw);
    }
}

        /* Botón flotante (FAB) y sub-botones */
        .fab-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 100;
        }

        .fab-toggle {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            transition: transform 0.3s;
        }

        .fab-menu {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: absolute;
            bottom: 70px;
            right: 0;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease-in-out;
        }

        .fab-item {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .fab-container.active .fab-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(-10px);
        }

        .fab-container.active .fab-toggle {
            transform: rotate(45deg);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img src="vistas/img/plantilla/Logo.jpeg" alt="logo" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#quienes-somos">QUIENES SOMOS</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            SERVICIOS
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#especialidades">Especialidades</a></li>
                            <li><a class="dropdown-item" href="#planes">Planes</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">CONTACTO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login">INGRESAR</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid d-flex justify-content-center align-items-center vh-100">
        <div class="content text-center">
            <h1 class="display-4">¡Estamos en mantenimiento!</h1>
            <p class="lead">Volveremos pronto. Gracias por tu paciencia.</p>
            <p class="lead">Click <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal">aquí</a> para obtener información de nuestros servicios</p>
        </div>
    </div>

    <div id="quienes-somos" class="container-fluid">
        <div class="box-collapsible" id="mision-box">
            <h2>MISIÓN</h2>
            <div class="content-quienes-somos">
            <p>En Legaltech, nos comprometemos a ofrecer asesoría y apoyo en procesos jurídicos y financieros
                    tanto en Colombia como en el exterior. Nuestra misión es proporcionar soluciones efectivas a problemas no resueltos
                    mediante una combinación de derecho y tecnología avanzada. Buscamos revolucionar el ambito legal
                    con herramientas innovadoras, haciéndolo más accesible y eficiente.</p>        
            </div>
        </div>
        
        <div class="box-collapsible" id="vision-box">
            <h2>VISIÓN</h2>
            <div class="content-quienes-somos">
            <p>Ser líderes en la integración de derecho y tecnología, redefiniendo la práctica y gestión de los servicios legales
                    en el mundo digital. En ASJURFIN, creemos que nuestro sistema legaltech es la clave para un futuro legal más accesible,
                    eficiente y conectado, facilitando el acceso a la justicia para personas y empresas</p>        
            </div>
        </div>
    </div>



    <div id="especialidades" class="container-fluid d-flex justify-content-center align-items-center vh-100">
        <div class="content text-center">
            <h2>Especialidades</h2>
            <p>Aquí puedes colocar la información sobre las especialidades.</p>
        </div>
    </div>

    <!-- Sección para Planes -->
    <div id="planes" class="container-fluid d-flex justify-content-center align-items-center vh-100">
        <div class="content text-center">
            <h2>Planes</h2>
            <p>Aquí puedes colocar la información sobre los planes disponibles.</p>
        </div>
    </div>

    <!-- Botón flotante y sub-botones -->
    <div class="fab-container">
        <button class="btn btn-primary fab-toggle">
            <i class="bi bi-plus"></i>
        </button>
        <div class="fab-menu">
            <a href="https://wa.me/3057131652" target="_blank" class="fab-item btn btn-success">
                <i class="bi bi-whatsapp"></i>
            </a>
            <a href="https://www.facebook.com" target="_blank" class="fab-item btn btn-primary">
                <i class="bi bi-facebook"></i>
            </a>
            <a href="https://twitter.com" target="_blank" class="fab-item btn btn-info">
                <i class="bi bi-twitter"></i>
            </a>
            <a href="#" class="fab-item btn btn-danger" onclick="window.scrollTo({ top: 0, behavior: 'smooth' })">
                <i class="bi bi-house"></i> <!-- Botón de Home -->
            </a>
        </div>
    </div>

    <div class="modal fade" id="imageModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="vistas/img/plantilla/QR.jpeg" alt="Imagen de Servicio" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>Si necesitas asesoría, contáctanos al correo <a href="mailto:registro@asjurfinlegaltech.com">registro@asjurfinlegaltech.com</a></p>
        <p>O comunícate a nuestro WhatsApp <a href="https://wa.me/3057131652">3057131652</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.querySelector('.fab-toggle').addEventListener('click', function() {
            document.querySelector('.fab-container').classList.toggle('active');
        });
    </script>
        <script>
document.querySelectorAll('.box-collapsible h2').forEach(header => {
    header.addEventListener('click', function() {
        const box = this.parentElement;
        const content = box.querySelector('.content-quienes-somos');
        if (box.classList.contains('expanded')) {
            box.classList.remove('expanded');
            content.style.maxHeight = null; // Ocultamos el contenido
            content.style.visibility = 'hidden'; // Lo hacemos invisible
        } else {
            box.classList.add('expanded');
            content.style.maxHeight = content.scrollHeight + "px"; // Desplegamos el contenido
            content.style.visibility = 'visible'; // Lo hacemos visible
        }
    });
});


        </script>

</body>

</html>