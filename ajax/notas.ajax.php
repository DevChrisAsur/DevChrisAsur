<?php
require_once "../controladores/notas.controlador.php";
require_once "../modelos/notas.modelo.php";

/*=============================================
CREAR UNA NUEVA NOTA
=============================================*/
/*=============================================
CREAR NOTA (Cliente o Lead)
=============================================*/
if ((isset($_POST["idCliente"]) || isset($_POST["idLeads"])) && isset($_POST['nuevoTituloNota'])) {
    error_log("Datos recibidos para crear nota: " . print_r($_POST, true));

    $archivoCargado = null;
    $nombreArchivoFinal = null;

    // Verificar si hay un archivo cargado
    if (isset($_FILES['archivoNota']) && $_FILES['archivoNota']['error'] === UPLOAD_ERR_OK) {
        $directorio = "../uploads/notas/";
        $nombreOriginal = basename($_FILES['archivoNota']['name']);
        $nombreArchivoFinal = uniqid() . "_" . $nombreOriginal;
    } else {
        error_log("No se subió ningún archivo o hubo un error al cargarlo.");
    }

    // Definir si es cliente o lead
    $datos = [
        'nuevoTituloNota' => $_POST['nuevoTituloNota'],
        'contenidoNota' => $_POST['contenidoNota'],
        'nombreArchivo' => $nombreArchivoFinal,
    ];

    if (isset($_POST['idCliente'])) {
        $datos['idCliente'] = $_POST['idCliente'];
    }

    if (isset($_POST['idLeads'])) {
        $datos['idLead'] = $_POST['idLeads'];
    }

    // Llamar al controlador
    $respuesta = ControladorNotas::ctrCrearNota($datos);

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
/*=============================================
MOSTRAR NOTAS DE UN LEAD
=============================================*/
if (isset($_POST["accion"]) && $_POST["accion"] === "mostrarNotasLead" && isset($_POST["idLeads"])) {
    $idLeads = $_POST["idLeads"];

    $notas = ControladorNotas::ctrObtenerNotasPorLead($idLeads);

    echo json_encode($notas);
    exit;
}
