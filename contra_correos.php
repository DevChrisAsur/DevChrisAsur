<?php 
        

    
if (isset($_POST['register'])) {
    require_once 'QRCODE/phpqrcode/qrlib.php'; 

    //GENERAR CODIGO DE INGRESO---
    function get_random_string($length = 6)
    {
        $cons = array('1','2','3','4','5','6','7','8','9',  );
        $voca = array('1','2','3','4','5','6','7','8','9');
        srand((double)microtime()*1000000);
        $max = $length/2;
        $password = '';
        for($i=1;$i<=$max;$i++){
            $password .= $cons[rand(0,count($cons)-1)];
            $password .= $voca[rand(0,count($voca)-1)];
        }
        if(($length % 2) == 1) $password .= $cons[rand(0,count($cons)-1)];
        return $password;
    } 

    
    

        $email = trim($_POST['nuevoCorreo']);
        $contenido2=trim($_POST['nuevoIdentificacion']);
       $verificaion = get_random_string(8); 
        $con = get_random_string(8);
       
       $verificacion = $verificaion;
       $contraseña =  $con;
        $para      = $email;
        $titulo    = 'ingreso a gobernacion';
        $mensaje1 = "Su codigo de Verificacion es: $verificacion ";
        $mensaje2 = "Su contraseña es: $contraseña";

      
        //$mensajeCompleto = $link_android ."\n". $link_ios ."\n".$mensaje1 ."\n".$mensaje2 ."\n";
        $cabeceras = 'From: visitantes@meta.gov.co' . "\r\n" .
            'Reply-To: asistente@photonic-access.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion(). "\r\n" .'Content-type: text/html; charset=iso-8859-1'. "\r\n" .'MIME-Version: 1.0'
            . "\r\n" .'Content-Type: multipart/mixed;';
 //. "\r\n" .'Content-Type: application/octet-stream'
            //. "\r\n".'Content-Disposition: attachment; filename="vistas/assets/img/plantilla/1.png"'
            $dir = 'images/';
    
    //Si no existe la carpeta la creamos
    if (!file_exists($dir))
        mkdir($dir);
    
        //Declaramos la ruta y nombre del archivo a generar
    $filename = $dir.'QR.png';

        //Parametros de Condiguración
    
    $tamaño = 10; //Tamaño de Pixel
    $level = 'L'; //Precisión Baja
    $framSize = 3; //Tamaño en blanco

        //---------------GENERAR CODIGO APP--------


        //----definir meses y dias dela;o 

        $enero = 31;
        $febrero = 59;
        $marzo = 90;
        $abril = 120;
        $mayo = 151;
        $junio= 181;
        $julio =212;
        $agosto = 243;
        $septiembre = 273;
        $octubre = 304;
        $noviembre = 334;
        $diciembre = 365;
        $dia = date("d");
        $mes = date("n");
        
        if ($mes == "1")
        {  
            $numa = $dia;
            $data = $contenido2 * $numa;
        }

        if ($mes == "2")
        {  
            $numa = $dia + $enero;
             $data = $contenido2 * $numa;
        }

        if ($mes == "3")
        {  
            $numa = $dia + $febrero;
             $data = $contenido2 * $numa;
        }

        if ($mes == "4")
        {  
            $numa = $dia + $marzo;
             $data = $contenido2 * $numa;
        }

        if ($mes == "5")
        {  
            $numa = $dia + $abril;
             $data = $contenido2 * $numa;
        }

        if ($mes == "6")
        {  
            $numa = $dia + $mayo;
             $data = $contenido2 * $numa;
        }

        if ($mes == "7")
        {  
            $numa = $dia + $junio;
             $data = $contenido2 * $numa;
        }

        if ($mes == "8")
        {  
            $numa = $dia +$julio;
             $data = $contenido2 * $numa;
        }

        if ($mes == "9")
        {  
            $numa = $dia + $agosto;
            $data = $contenido2 * $numa;

          //  echo $data;
        }

        if ($mes == "10")
        {  
            $numa = $dia + $septiembre;
             $data = $contenido2 * $numa;
        }

        if ($mes == "11")
        {  
            $numa = $dia + $octubre;
             $data = $contenido2 * $numa;
        }

        if ($mes == "12")
        {  
            $numa = $dia + $noviembre;
             $data = $contenido2 * $numa;
        }

        //Enviamos los parametros a la Función para generar código QR 
        QRcode::png($data, $filename, $level, $tamaño, $framSize); 
        

$to = $email;
//Email subject
$subject = "Ingreso a gobernacion";
//Read the content of the file
$filename1 = 'images/QR.png';
$content = file_get_contents($filename1);
$content = chunk_split(base64_encode($content));
//Generate random hash number
$separator = md5(microtime(true));

//Message configuration
$message = "--" . $separator . "\r\n";
$message .= "Content-Type: text/html; charset=\"iso-8859-1\"" . "\r\n";
$message .= "Content-Transfer-Encoding: 16bit" . "\r\n";
$message .= "<html>
  <head>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    
    <style>
      /* -------------------------------------
          GLOBAL RESETS
      ------------------------------------- */
      
      /*All the styling goes here*/
      
      img {
        border: none;
        -ms-interpolation-mode: bicubic;
        max-width: 100%; 
      }

      body {
        background-color: #f6f6f6;
        font-family: sans-serif;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%; 
      }

      table {
        border-collapse: separate;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        width: 100%; }
        table td {
          font-family: sans-serif;
          font-size: 14px;
          vertical-align: top; 
      }

      /* -------------------------------------
          BODY & CONTAINER
      ------------------------------------- */

      .body {
        background-color: #f6f6f6;
        width: 100%; 
      }

      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
      .container {
        display: block;
        margin: 0 auto !important;
        /* makes it centered */
        max-width: 580px;
        padding: 10px;
        width: 580px; 
      }

      /* This should also be a block element, so that it will fill 100% of the .container */
      .content {
        box-sizing: border-box;
        display: block;
        margin: 0 auto;
        max-width: 580px;
        padding: 10px; 
      }

      /* -------------------------------------
          HEADER, FOOTER, MAIN
      ------------------------------------- */
      .main {
        background: #ffffff;
        border-radius: 3px;
        width: 100%; 
      }

      .wrapper {
        box-sizing: border-box;
        padding: 20px; 
      }

      .content-block {
        padding-bottom: 10px;
        padding-top: 10px;
      }

      .footer {
        clear: both;
        margin-top: 10px;
        text-align: center;
        width: 100%; 
      }
        .footer td,
        .footer p,
        .footer span,
        .footer a {
          color: #999999;
          font-size: 12px;
          text-align: center; 
      }

      /* -------------------------------------
          TYPOGRAPHY
      ------------------------------------- */
      h1,
      h2 {
    font-weight: bold;
}
      h3,
      h4 {
        color: #000000;
        font-family: sans-serif;
        font-weight: 400;
        line-height: 1.4;
        margin: 0;
        margin-bottom: 30px; 
      }

      h1 {
        font-size: 35px;
        font-weight: 300;
        text-align: center;
        text-transform: capitalize; 
      }

      p,
      ul,
      ol {
        font-family: sans-serif;
        font-size: 14px;
        font-weight: normal;
        margin: 0;
        margin-bottom: 15px; 
      }
        p li,
        ul li,
        ol li {
          list-style-position: inside;
          margin-left: 5px; 
      }

      a {
        color: #3498db;
        text-decoration: underline; 
      }

      
      .last {
        margin-bottom: 0; 
      }

      .first {
        margin-top: 0; 
      }

      .align-center {
        text-align: center; 
      }

      .align-right {
        text-align: right; 
      }

      .align-left {
        text-align: left; 
      }

      .clear {
        clear: both; 
      }

      .mt0 {
        margin-top: 0; 
      }

      .mb0 {
        margin-bottom: 0; 
      }

      .preheader {
        color: transparent;
        display: none;
        height: 0;
        max-height: 0;
        max-width: 0;
        opacity: 0;
        overflow: hidden;
        mso-hide: all;
        visibility: hidden;
        width: 0; 
      }

      .powered-by a {
        text-decoration: none; 
      }

      hr {
        border: 0;
        border-bottom: 1px solid #f6f6f6;
        margin: 20px 0; 
      }

      /* -------------------------------------
          RESPONSIVE AND MOBILE FRIENDLY STYLES
      ------------------------------------- */
      @media only screen and (max-width: 620px) {
        table.body h1 {
          font-size: 28px !important;
          margin-bottom: 10px !important; 
        }
        table.body p,
        table.body ul,
        table.body ol,
        table.body td,
        table.body span,
        table.body a {
          font-size: 16px !important; 
        }
        table.body .wrapper,
        table.body .article {
          padding: 10px !important; 
        }
        table.body .content {
          padding: 0 !important; 
        }
        table.body .container {
          padding: 0 !important;
          width: 100% !important; 
        }
        table.body .main {
          border-left-width: 0 !important;
          border-radius: 0 !important;
          border-right-width: 0 !important; 
        }
        table.body .btn table {
          width: 100% !important; 
        }
        table.body .btn a {
          width: 100% !important; 
        }
        table.body .img-responsive {
          height: auto !important;
          max-width: 100% !important;
          width: auto !important; 
        }
      }

      /* -------------------------------------
          PRESERVE THESE STYLES IN THE HEAD
      ------------------------------------- */
      @media all {
        .ExternalClass {
          width: 100%; 
        }
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
          line-height: 100%; 
        }
        .apple-link a {
          color: inherit !important;
          font-family: inherit !important;
          font-size: inherit !important;
          font-weight: inherit !important;
          line-height: inherit !important;
          text-decoration: none !important; 
        }
        #MessageViewBody a {
          color: inherit;
          text-decoration: none;
          font-size: inherit;
          font-family: inherit;
          font-weight: inherit;
          line-height: inherit;
        }
        .btn-primary table td:hover {
          background-color: #34495e !important; 
        }
        .btn-primary a:hover {
          background-color: #34495e !important;
          border-color: #34495e !important; 
        } 
      }

    </style>
  </head>
  <body>

   
    <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='body'>
      <tr>
        <td>&nbsp;</td>
        <td class='container'>
          <div class='content'>

            <!-- START CENTERED WHITE CONTAINER -->
            <table role='presentation' class='main'>
            <br>
           <div align='center'>
                 
                     <img src='https://pbs.twimg.com/profile_images/1560289078158950400/Wk9sSC4q_400x400.jpg' width='150' height='150'/>         
                     </div> 
            <br>
            <br>
              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class='wrapper'>
                  <table role='presentation' border='0' cellpadding='0' cellspacing='0'>
                    <tr>

                      <td>
                      <h2>Le damos la bienvenida a la gobernacion del meta</h2>
                      <br>
                        <p>Señor usuario (a)</p>
                        <p>Reciba un cordial saludo por parte de la gobernacion del meta. Su presencia en nuestras instalaciones es de vital importancia para nosotros.</p>
                        
                        </table>
                       
                        <p>Adjunto a este correo se encuentra el codigo QR para ingresar a nuestras instalaciones.</p>
                        <p>¡Disfruta tu visita en las instalaciones!</p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>
            <!-- END CENTERED WHITE CONTAINER -->

            <!-- START FOOTER -->
            <div class='footer'>
              <table role='presentation' border='0' cellpadding='0' cellspacing='0'>
                <tr>
                  <td class='content-block'>
                    <span class='apple-link'>Carrera 33 # 38-45 El Centro – Plazoleta Los Libertadores, Villavicencio - Meta, Colombia, Teléfono Conmutador: +57 608  681 85 00  | Línea Nacional Gratuita de Servicio al Ciudadano: 018000129202</span>
                    <br> Visita nuestro sitio web haciendo clic aquí <a href='https://meta.gov.co/'>Gobernación del meta</a>.
                  </td>
                </tr>
                <tr>
                  <td class='content-block powered-by'>
                    Desarrollado por <a href='https://www.photonic-access.com/'>Photonic S.A.S</a>. 
                  </td>
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->

          </div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </body>
</html>". "\r\n";
$message .= "--" . $separator . "\r\n";
$message .= "Content-Type: application/octet-stream; name=\"" . $filename1 . "\"" . "\r\n";
$message .= "Content-Transfer-Encoding: base64" . "\r\n";
$message .= "Content-Disposition: attachment" . "\r\n";
$message .= $content . "\r\n";
$message .= "--" . $separator . "--";

//Header information
$headers = 'MIME-Version: 1.0'."\r\n";
$headers .= "From: Visitantes Gobernacion meta <visitantes@meta.gov.co>"."\r\n";
$headers .= "Reply-To: Visitantes Gobernacion meta <visitantes@meta.gov.co>"."\r\n";
$headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" ."\r\n";


                mail($to, $subject, $message, $headers);
       






       


              

}

?>