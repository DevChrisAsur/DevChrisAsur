<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
<style>
</style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>LegalTech</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="vistas/img/plantilla/AsurLogo.png">
   <!--=====================================
  PLUGINS DE CSS
  ======================================-->

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
  
  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="vistas/dist/css/skins/estilos-admin.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

   <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
  

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="vistas/plugins/iCheck/all.css">

  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->

  <!-- jQuery 3 -->
  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
  
  <!-- Bootstrap 3.3.7 -->
  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- FastClick -->
  <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
  
  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>

  <!-- DataTables -->
  <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>



  <!-- SweetAlert 2 -->
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
  <!-- By default SweetAlert2 doesn't support IE. To enable IE 11 support, include Promise polyfill:-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

  <!-- iCheck 1.0.1 -->
  <script src="vistas/plugins/iCheck/icheck.min.js"></script>

  <!-- InputMask -->
  <script src="vistas/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="vistas/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="vistas/plugins/input-mask/jquery.inputmask.extensions.js"></script>

  <!-- jQuery Number -->
  <script src="vistas/plugins/jqueryNumber/jquerynumber.min.js"></script>


</head>

<!--=====================================
CUERPO DOCUMENTO
======================================-->

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">
 




<?php
  /**
   * Definimos las rutas públicas que pueden ser accedidas sin iniciar sesión.
   */
  $rutasPublicas = ["login"];

  if(isset($_GET["ruta"]) && in_array($_GET["ruta"], $rutasPublicas)){

      /**
       * Si la ruta solicitada es pública, incluimos el módulo correspondiente.
       */
      include "modulos/".$_GET["ruta"].".php";

  } else if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){

      echo '<div class="wrapper">';

      /*=============================================
      CABEZOTE
      =============================================*/
      include "modulos/cabezote.php";

      /*=============================================
      MENU
      =============================================*/
      include "modulos/menu.php";

      /*=============================================
      CONTENIDO
      =============================================*/
      if(isset($_GET["ruta"])){
          $ruta = $_GET["ruta"];
          $perfil = $_SESSION["perfil"];

          /**
           * Definimos las rutas permitidas para cada perfil.
           */
          $rutasAdmin = ["inicio", "usuarios", "areas", "clientes", "servicios", "suscripciones", "leads", "facturas", "salir"];
          $rutasCoordinador = ["inicio", "usuarios", "clientes", "cartera", "salir"];
          $rutasAsesor = ["inicio", "clientes", "leads", "salir"];

          if(($perfil == "Super Administrador" || $perfil == "Administrador") && in_array($ruta, $rutasAdmin)){
              include "modulos/".$ruta.".php";
          } else if($perfil == "Coordinador comercial" && in_array($ruta, $rutasCoordinador)){
              include "modulos/".$ruta.".php";
          } else if($perfil == "Asesor comercial" && in_array($ruta, $rutasAsesor)){
              include "modulos/".$ruta.".php";
          } else {
              include "modulos/404.php";
          }
      } else {
          include "modulos/inicio.php";
      }

      /*=============================================
      FOOTER
      =============================================*/
      include "modulos/footer.php";

      echo '</div>';

  } else {
      /**
       * Si no hay sesión iniciada y la ruta no es pública, mostramos la página de inicio de sesión.
       */
      include "modulos/home.php";
  }
?>
  <?php

 //  if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){

 //   echo '<div class="wrapper">';

 //    /*=============================================
 //    CABEZOTE
 //    =============================================*/

 //    include "modulos/cabezote.php";

 //    /*=============================================
 //    MENU
 //    =============================================*/

 //    include "modulos/menu.php";

 //    /*=============================================
 //    CONTENIDO
 //    =============================================*/
 // $perfil = $_SESSION["perfil"];

 // if($perfil == "Super Administrador"){
 //  if(isset($_GET["ruta"])){
 //    if($_GET["ruta"] == "inicio" ||
 //    $_GET["ruta"] == "usuarios" ||
 //    $_GET["ruta"] == "areas" ||
 //    $_GET["ruta"] == "clientes" ||
 //    $_GET["ruta"] == "servicios" ||
 //    $_GET["ruta"] == "suscripciones" ||
 //    $_GET["ruta"] == "leads" ||
 //     $_GET["ruta"] == "home" ||
 //    $_GET["ruta"] == "salir"){

 //        include "modulos/".$_GET["ruta"].".php";

 //      }else{

 //        include "modulos/404.php";

 //      }
 //   }
 //  }
 //  if($perfil == "Coordinador comercial"){

 //    if(isset($_GET["ruta"])){
 //      if(
 //      $_GET["ruta"] == "inicio" ||
 //      $_GET["ruta"] == "usuarios" ||
 //      $_GET["ruta"] == "clientes" ||
 //      $_GET["ruta"] == "salir"){

 //        include "modulos/".$_GET["ruta"].".php";

 //      }else{

 //        include "modulos/404.php";

 //      }
 //   }
 //  } 

 //  if($perfil == "Asesor comercial"){

 //    if(isset($_GET["ruta"])){
 //      if(
 //      $_GET["ruta"] == "inicio" ||
 //      $_GET["ruta"] == "clientes" ||
 //      $_GET["ruta"] == "leads" ||
 //      $_GET["ruta"] == "salir"){

 //        include "modulos/".$_GET["ruta"].".php";

 //      }else{

 //        include "modulos/404.php";

 //      }
 //   }
 //  } 

 //    /*=============================================
 //    FOOTER
 //    =============================================*/

 //    include "modulos/footer.php";

 //    echo '</div>';

 //  }else{

 //    include "modulos/login.php";

 //  }

  ?>
<script src="vistas/js/areaderecho.js"></script>
<script src="vistas/js/clientes.js"></script>
<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/areas.js"></script>
<script src="vistas/js/servicios.js"></script>
<script src="vistas/js/leads.js"></script>
<script src="vistas/js/cities.js"></script>
<script src="vistas/js/facturas.js"></script>
<script src="vistas/js/suscripciones.js"></script>
<script src="vistas/js/notas.js"></script>