<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Incluye Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    
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

<body>
    <header>
            <img src="vistas/img/plantilla/legaltech_logo.png" alt="Logo"> <!-- Ajusta la ruta y extensión aquí -->
    </header>

    <main class="main-content">
        <div class="login-box">
            <div class="login-box-body">
                <p class="login-box-msg text-center">Ingresar al sistema</p>
                <form method="post">
                    <div class="form-group has-feedback" style="position: relative;">
                        <input type="email" class="form-control" placeholder="Correo" name="ingUsuario" id="correo" required>
                        <span style="position: absolute; top: 50%; right: 15px; transform: translateY(-50%); cursor: pointer; color: #333;">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>
                    <div class="form-group has-feedback" style="position: relative;">
                        <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" id="clave" required>

                        <span id="togglePassword" style="position: absolute; top: 50%; right: 15px; transform: translateY(-50%); cursor: pointer; color: #333;">
                            <i class="fa fa-eye-slash"></i>
                        </span>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <button type="submit" id="btn-login" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
            $login = new ControladorUsuarios();
            $login -> ctrIngresoUsuario();
        ?>
    </main>
    <footer>
        <img src="vistas/img/plantilla/AsurLogo.png" alt="Logo"> <!-- Ajusta la ruta y extensión aquí -->
    </footer>    
</body>


    <!-- Incluye Bootstrap JS, Popper.js, y jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.getElementById("togglePassword").addEventListener("click", function () {
  const campo = document.getElementById("clave");
  const icono = this.querySelector("i");

  if (campo.type === "password") {
    campo.type = "text";
    icono.classList.remove("fa-eye-slash");
    icono.classList.add("fa-eye");
  } else {
    campo.type = "password";
    icono.classList.remove("fa-eye");
    icono.classList.add("fa-eye-slash");
  }
    });
</script>

<script>
document.getElementById("btn-login").addEventListener("click", function() {

  const correoRegex = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

  if (correo.value === "") {
    Swal.fire("Error", "Por favor ingrese su correo", "error");
    return;
  }

  if (!correoRegex.test(correo.value)) {
    Swal.fire("Error", "Correo electrónico inválido", "error");
    return;
  }

  if (clave.value === "") {
    Swal.fire("Error", "Por favor ingrese su contraseña", "error");
    return;
  }

});

</script>

</html>
