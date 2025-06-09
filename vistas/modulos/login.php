<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Incluye Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Incluye algún estilo personalizado si es necesario -->
    <style>
        /* Estilos para el encabezado */
        header {
            background: rgba(0, 0, 0, 0.01); /* Fondo casi transparente */
            color: #fff; /* Color del texto del encabezado */
            padding: 10px;
            text-align: center;
            position: relative;
        }
        body{
            background-image: url('vistas/img/plantilla/login.jpeg');
            background-size: cover; /* Para que la imagen cubra todo el contenedor */
            background-position: center; /* Para centrar la imagen */
            background-repeat: no-repeat; /* Para que no se repita */
        }

        header img {
            max-width: 200px; /* Ajusta el tamaño del logo según tus necesidades */
            height: auto;
            padding-top: 30px;
        }

        /* Estilos para el contenido principal */
        .main-content {
            flex: 1; /* Permite que el contenedor principal crezca para llenar el espacio disponible */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            width: 100%;
            max-width: 400px;
            padding: 0; /* Elimina el padding del login-box */
            border-radius: 5px;
            background-color: transparent; /* Fondo transparente */
            position: relative;
        }

        .login-box-body {
            color: #fff;
            padding: 20px; /* Añade padding dentro del login-box-body */
            background: rgba(0, 0, 0, 0.01); /* Fondo casi transparente */
            border-radius: 5px; /* Bordes redondeados */
        }

        /* Estilos para el pie de página */
        footer {
            background: rgba(0, 0, 0, 0.01); /* Fondo casi transparente */
            color: #fff; /* Color del texto del pie de página */
            padding: 10px;
            text-align: center;
            position: relative;
        }

        footer img {
            max-width: 200px; /* Ajusta el tamaño del logo según tus necesidades */
            height: auto;
        }
    </style>
</head>

<header>
        <img src="vistas/img/plantilla/legaltech_logo.png" alt="Logo"> <!-- Ajusta la ruta y extensión aquí -->
    </header>
<body>


    <div class="main-content">
        <div class="login-box">
            <div class="login-box-body">
                <p class="login-box-msg text-center">Ingresar al sistema</p>
                <form method="post">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
            $login = new ControladorUsuarios();
            $login -> ctrIngresoUsuario();
        ?>
    </div>


    <!-- Incluye Bootstrap JS, Popper.js, y jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>


<footer>
        <img src="vistas/img/plantilla/AsurLogo.png" alt="Logo"> <!-- Ajusta la ruta y extensión aquí -->
    </footer>
</html>
