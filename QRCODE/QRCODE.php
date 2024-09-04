<?php
  			
 		require_once 'QR/phpqrcode/qrlib.php'; 
	//dirname(__FILE__).'/qrlib.php';  
	//Declaramos una carpeta temporal para guardar la imagenes generadas
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
	$contenido =  base64_decode($_GET['id']);
	$contenido2 = base64_decode($_GET['id1']);
        //Enviamos los parametros a la Función para generar código QR 
	QRcode::png($contenido.",".$contenido2, $filename, $level, $tamaño, $framSize); 
        //Mostramos la imagen generada
	//echo '<center><img src="'.$dir.basename($filename).'" /><hr/></center>';  
 

  echo '<div class="card card-primary card-outline">
<form name="form" method="post" action="/">
<div class="card-header">
 <h2 class="card-text" align="center">CODIGO QR GENERADO</h2>
<div class="col-md-8 offset-md-2">
<div class="form-group mt-2">
<center><img src="'.$dir.basename($filename).'" /><hr/></center> 
</div>
</div>
</div>
<div class="card-footer">
<div class="col-md-8 offset-md-2">
<div class="form-group">
<div align="center">
<button type="submit" style="width:190px; height:70px"  class="btn btn-danger"><i class="fa fa-home" style="font-size:36px" ></i>&nbsp&nbspVolver a inicio</button>

</div>
</div>
</div>
</div>
</form>
</div>';

?>