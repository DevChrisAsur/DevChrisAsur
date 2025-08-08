<?php
require_once "../controladores/notas.controlador.php";
require_once "../modelos/notas.modelo.php";

/*=============================================
CREAR UNA NUEVA NOTA
=============================================*/
if (isset($_POST["idCliente"]) && isset($_POST['nuevoTituloNota'])) {
    error_log("Datos recibidos para crear nota: " . print_r($_POST, true));

    $archivoCargado = null;
    $nombreArchivoFinal = null;

    // Verificar si hay un archivo cargado
    if (isset($_FILES['archivoNota']) && $_FILES['archivoNota']['error'] === UPLOAD_ERR_OK) {
        $directorio = "../uploads/notas/";

        // Preparar la información del archivo con un nombre único
        $nombreOriginal = basename($_FILES['archivoNota']['name']);
        $nombreArchivoFinal = uniqid() . "_" . $nombreOriginal;
    } else {
        error_log("No se subió ningún archivo o hubo un error al cargarlo.");
    }

    // Llamar al controlador con los datos preparados, incluyendo el nombre final del archivo
    $respuesta = ControladorNotas::ctrCrearNota([
        'idCliente' => $_POST['idCliente'],
        'nuevoTituloNota' => $_POST['nuevoTituloNota'],
        'contenidoNota' => $_POST['contenidoNota'],
        'nombreArchivo' => $nombreArchivoFinal, // Guardar el nombre con uniqid en la base de datos
    ]);

    if ($respuesta === "ok") {
        echo json_encode(['success' => true]);
    } else {
        error_log("Error al crear la nota: " . $respuesta);
        echo json_encode(['success' => false, 'error' => $respuesta]);
    }
    exit;
}
/*=============================================
MOSTRAR NOTAS DE UN CLIENTE
=============================================*/
if (isset($_POST["accion"]) && $_POST["accion"] === "mostrarNotas" && isset($_POST["idCliente"])) {
    $idCliente = $_POST["idCliente"];

    $notas = ControladorNotas::ctrObtenerNotasPorCliente($idCliente);

    echo json_encode($notas);
    exit;
}
