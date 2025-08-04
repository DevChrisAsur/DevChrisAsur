<?php

include("con_db.php"); 
$id2=$_SESSION["id"];

if(isset($_POST['edit'])) {
	if(strlen($_POST['nuevoPassword']) >= 1 && 
	   strlen($_POST['confirmPassword']) >= 1) {
		
		if ($_POST['nuevoPassword'] != $_POST['confirmPassword']) {
			echo '<script>
				swal({
					type: "error",
					title: "¡Los campos no coinciden!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
				});
			</script>';
		} else if(isset($_POST['nuevoPassword']) && !empty($_POST['nuevoPassword'])) {
			
			$password = trim($_POST['nuevoPassword']);
			$encriptar = md5($password); // CAMBIO: ahora se usa md5

			$sql = "UPDATE usuarios SET password='$encriptar' WHERE id=$id2";
			$res = mysqli_query($conex, $sql);

			if ($res) {
				echo '<script>
					swal({
						type: "success",
						title: "¡El usuario ha cambiado su contraseña exitosamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					});
				</script>';
			}
		}
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>


    
<body>

<!-- Optional JavaScript; choose one of the two! -->
<script src="./jquery/jquery-3.6.0.min.js"></script>

<script src="./sw/dist/sweetalert2.all.min.js"></script>
<!-- Option 1: Bootstrap Bundle with Popper 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>-->
<script src="./bootstrap/js/bootstrap.min.js"></script>

</body>

</html>