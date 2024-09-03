<?php



if(isset($_POST['register'])) {
        if(strlen($_POST['nuevoIdentificacion']) >= 1 && 
           
           strlen($_POST['nuevoCorreo']) >= 1 && 
           strlen($_POST['nuevoNombre']) >= 1 &&
           strlen($_POST['nuevoUsuario']) >= 1 &&
           strlen($_POST['nuevoPassword']) >= 1 &&
           strlen($_POST['nuevoPerfil']) >= 1 &&
           
           strlen($_POST['nuevaArea'])
          ){

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
             $cadu = trim($_POST['nuevaFecha']);
            $foto = "";
            $estado = "1";
            $fecha_actual = date('Y-m-d'); 
            $acuerdo = trim($_POST['nuevoAcuerdo']);
            // 
            // $fecha_dividida = explode("-", $fecha_actual);
            $fecha_dividida = explode("-", $cadu);
echo "el estado es".$acuerdo." " ;
 echo "la fecha es  ".$cadu." ";
  echo "la fecha en dias es  ".$fecha_dividida[2]." ";  
  echo "la fecha1  es  ".$fecha_actual." ";

  $interes=0;
           // if ($fecha_dividida[2] >=1 && $fecha_dividida[2] <=5) {
           //  $interes;
           // }
            
           //  if ($fecha_dividida[2] >=6 && $fecha_dividida[2] <=15) {
           //  $interes=10000;
           // }
           // if ($fecha_dividida[2] >=16 && $fecha_dividida[2] <=31) {
           //  $interes=20000;
           // } 
        if ($fecha_dividida[2] >=1 && $fecha_dividida[2] <=5) {
             $interes;
            }
            
             if ($fecha_dividida[2] >=6 && $fecha_dividida[2] <=15) {
             $interes=10000;
            }
            if ($fecha_dividida[2] >=16 && $fecha_dividida[2] <=31) {
             $interes=20000;
            } 
               echo "interes vale  ".$interes;         

            if($resultado){
                echo '<script>
                swal({

                    type: "success",
                    title: "¡El usuario ha sido guardado correctamente!",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"

                })
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