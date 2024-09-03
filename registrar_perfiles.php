<?php

include("con_db.php");

if(isset($_POST['register'])) {
require_once 'QRCODE/phpqrcode/qrlib.php'; 
include('smtp/smtp/PHPMailerAutoload.php');


		if(strlen($_POST['nuevoIdentificacion']) >= 1 &&  
		   strlen($_POST['nuevoCorreo']) >= 1 && 
		   strlen($_POST['nuevoNombre']) >= 1 &&
		   strlen($_POST['nuevoUsuario']) >= 1 &&
		   strlen($_POST['nuevoPassword']) >= 1 &&
		   strlen($_POST['nuevoPerfil']) >= 1 &&
		   
		   strlen($_POST['nuevaArea'])){

		   	if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){


			$encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
			$identificacion = trim($_POST['nuevoIdentificacion']);
			$correo = trim($_POST['nuevoCorreo']);
		   	$nombre = trim($_POST['nuevoNombre']);
		   	$usuario = trim($_POST['nuevoUsuario']);
		   	$password = trim($_POST['nuevoPassword']);
		   	$perfil = trim($_POST['nuevoPerfil']);
		   	$area = trim($_POST['nuevaArea']);
		   	$foto = "";
		   	$estado = "1";
		    $fecha1 = date('dd/mm/YYYY'); 
$dir = 'images/'; // Nombre de la carpeta

 if (!file_exists($dir))
        mkdir($dir);
    
        //Declaramos la ruta y nombre del archivo a generar
    $filename = $dir.'QR.png';

        //Parametros de Condiguración
    
    $tamaño = 10; //Tamaño de Pixel
    $level = 'L'; //Precisión Baja
    $framSize = 3; //Tamaño en blanco

        //---------------GENERAR CODIGO APP--------



        //Enviamos los parametros a la Función para generar código QR 
        QRcode::png($identificacion, $filename, $level, $tamaño, $framSize); 







$message= '
<html>
<head>
    <meta charset="utf-8" />
    <style>
        /* -------------------------------------
                  GLOBAL RESETS
        ------------------------------------- */
        
        header {
            border: 12px;
            display: flex;
            justify-content: space-between; /* Espacio uniformemente distribuido entre los elementos */
            align-items: center;
            padding: 8px;
        }

        body {
            border: 6px rgb(26, 9, 134);
            margin: auto;
            display: flex;
            padding: 0;
        }

        img {
            border: none;
            position: center;
            -ms-interpolation-mode: bicubic;
            max-width: 100%; /* Hacer que la imagen ocupe todo el ancho disponible */
            width: 100%;        
        }
        
        footer {
            height: auto;
            border: 12px;
            display: flex;
            justify-content: space-between; /* Espacio uniformemente distribuido entre los elementos */
            align-items: center;
            padding: 8px;
            background-color: #141313;
        }

        a {
            text-decoration: none; /* Elimina el subrayado */
            color: rgb(108, 108, 114); /* Cambia el color del texto del enlace */
        }

        a:hover {
            color: red; /* Cambia el color al pasar el mouse sobre el enlace */
        }



        /* -------------------------------------
              BODY & CONTAINER
        ------------------------------------- */

        .invoice-box {
            max-width: 750px;
            margin: auto;
            border: 1px solid #010392;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            color: #000000;
            position: relative;
            background-color: #1c1c1c;
        }

        .column_header {
            border: 2px;
            text-align: center; /* Alineación del texto en el centro */
            background-color: darkred; /* Color de fondo para visualizar las columnas */
        }

        .column_logo {
            flex-grow: 1; /* La columna 2 ocupará el espacio restante */
        }

        .qr_container{
            margin: 12px;
            padding: 18px;
            border: 2px;
            text-align: center; /* Alineación del texto en el centro */
            box-shadow: 0 0 10px rgba(255, 253, 253, 0.1); /* Puedes ajustar los valores según tu preferencia */
            background-color: #141313; /* Color de fondo para visualizar las columnas */
        }

        .qr_im{
            width: 300px;
            height: 300px;
            margin: 12px auto;
            padding: 18px;
            border: 2px solid #000000;
            text-align: center; /* Alineación del texto en el centro */
            /background-color: #000000; / Color de fondo para visualizar las columnas */
        }

        .info {
            border: 1px; /* Un borde para visualización */
            padding: 8px; /* Espaciado interno */
            margin: 10px; /* Margen externo */     
            box-shadow: 0 0 10px rgba(255, 253, 253, 0.1); /* Puedes ajustar los valores según tu preferencia */
            display: flex;
            justify-content: center;
            align-items: center; /* Centrar verticalmente */
      text-align: center; /* Centrar horizontalmente */
            background-color: #141313;
            text-align: center; /* Alineación horizontal del texto */
        }

        .footer_info {
            margin: auto;
            border: 2px;
            text-align: center; /* Alineación del texto en el centro */
            background-color: #141313; /* Color de fondo para visualizar las columnas */
            /box-shadow: 0 0 10px rgba(243, 17, 17, 0.911);/
        }

        

        /* -------------------------------------
              TYPOGRAPHY
        ------------------------------------- */
        h1 {
            color: #ffffff;
            text-align: center;
            font-family: monospace;
            font-style: italic;
            font-size: 13px; 
            display: flex;
            flex-direction: column;
        }
        h2 {
            color: #ffffff;
            text-align: center;
            font-family: monospace;
            font-style: italic;
            font-size: 25px; 
            display: flex;
            flex-direction: column;
        }
        

    </style>
</head>

<body>
    <div class="invoice-box">
        <header>
            <div class="column_header column_logo" align="center">
                <img src="https://algcreation.com/wp-content/uploads/2023/12/cropped-alg_icono2-270x270.png"/>   
            </div>
        </header>

        <div class="info" >
            <h2>¡Bienvenido a ALGcreation!</h2>
        </div>

        <div class="qr_container">
            <h1>
                Nos complace darte la bienvenida a nuestra familia de usuarios registrados.
                Con tu registro, ahora tienes acceso a nuestras instalaciones. 
            </h1>
            <p>
                <h1>No dudes en ponerte en contacto con nuestro equipo si necesitas ayuda o tienes alguna pregunta sobre el uso de tu código QR. 
                    Estamos aquí para ayudarte a aprovechar al máximo tu experiencia en ALGcreation.
                </h1>
            </p>
        </div>

        <footer>
            <div class="footer_info">
        <h1>Estamos emocionados de que formes parte de la comunidad.</h1>
        <p>
          <a href="https://algcreation.com/">algcreation.com</a>
        </p>
            </div>
        </footer>
    </div>
    
</body>
</html>';

//$img = "../images/QR.png";
 $imageData = file_get_contents("images/QR.png");

//echo "<center><img src='" . $img . "' /><hr/></center>";
// //return;
  $tema="Ingreso a ALG creation";
  $mail = new PHPMailer(); 
 	$mail->SMTPDebug  = 0;
 	$mail->IsSMTP(); 
 	$mail->SMTPAuth = true; 
 	$mail->SMTPSecure = 'tls'; 
 	$mail->Host = "smtp.gmail.com";
 	$mail->Port = 587; 
 	$mail->IsHTML(true);
 	$mail->CharSet = 'UTF-8';
 	$mail->Username = "bienvenidaviajaconganas@gmail.com";
 	$mail->Password = "ntyajuthupgietru";
 	$mail->SetFrom("bienvenidaviajaconganas@gmail.com");
 	$mail->Subject = $tema;
 	$mail->Body =$message;
 	$mail->AddAddress($correo);
      //$mail->addStringEmbeddedImage("../images/QR.png", "");
  $mail->addStringEmbeddedImage($imageData, "QR", "QR_ingreso.png");


//     // $mail->addAttachment($img);

// 	//$mail->addCC('rassijar@gmail.com');
 	$mail->SMTPOptions=array('ssl'=>array(
 		'verify_peer'=>false,
 		'verify_peer_name'=>false,
 		'allow_self_signed'=>false
 	));
 	if(!$mail->Send()){
 		echo $mail->ErrorInfo;
 	}


        //$img=$dir.basenam($filename);
	    	$consulta = "INSERT INTO usuarios(identificacion,correo,nombre,usuario,password,perfil, 
	    	area,foto,estado) VALUES ('$identificacion','$correo', '$nombre', '$usuario', '$encriptar', '$perfil','$area','$foto', '$estado')";
	    	$resultado = mysqli_query($conex , $consulta);
	    	if($resultado){
		    	echo '<script>
    swal({
        type: "success",
        title: "¡El usuario ha sido guardado correctamente!",
        showConfirmButton: true,
        confirmButtonText: "Aceptar"
    }).then(function() {
        window.location.href = "usuarios"; // Redirigir después de hacer clic en Aceptar
    });
</script>';
	        }
	        else{ 
		    	echo '<script>
				swal({

					type: "error",
					title: "¡Error , por favor registrar nuevamente!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"

				})
				</script>';
	        }
	    }
	    else{
	    	echo '<script>
				swal({

					type: "error",
					title: "¡Error , por favor registrar nuevamente!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"

				})
				</script>';

	    }
		   
		    

		
	}
}

?>