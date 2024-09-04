<?php
require('fpdf/fpdf.php');
require('smtp/smtp/PHPMailerAutoload.php'); // Asegúrate de incluir la ruta correcta a PHPMailer

// Verifica si se proporcionó un ID de usuario en la solicitud
if (isset($_GET['idStudent'])) {
    // Obtén el ID de usuario de la solicitud
    $idStudent = $_GET['idStudent'];
   
    //$idParent = $_GET['idParent'];
       
 
    // Aquí debes escribir el código para obtener los datos del usuario de la base de datos
    // Reemplaza este código de ejemplo con el código real que obtiene los datos del usuario

    // Ejemplo de conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "sistema_gestion_academica");

    // Verifica si la conexión fue exitosa
    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    // Consulta para obtener los datos del usuario según su ID
     $consulta="SELECT 
    student.*, 
    parent.*, 
    grade.*
FROM 
    student 
INNER JOIN 
    student_parent ON student.id_student = student_parent.id_student 
INNER JOIN 
    parent ON student_parent.id_parent = parent.id_parent 
INNER JOIN 
    student_grade ON student.id_student = student_grade.id_student 
INNER JOIN 
    grade ON student_grade.id_grade = grade.id_grade 
WHERE 
    student.id_student = $idStudent";
    $resultado = $conexion->query($consulta);

    // Verifica si se encontraron resultados
    if ($resultado->num_rows > 0) {
        // Obtiene los datos del usuario
        $fila = $resultado->fetch_assoc();

        // Crea un nuevo objeto FPDF
        // Crea un nuevo objeto FPDF
        class PDF extends FPDF
{
// Page header
function Header()
{
 $this->Image('images/header.png',0,0);

}
// Page footer
function Footer()
{
 $this->SetY(-20);
 $this->Image('images/footer.png');
}
}


setlocale(LC_TIME, "spanish");
$fecha_actual=strftime("(%d) días de %B de %Y");
// echo strftime("%A %d de %B del %Y");


// Instanciation of inherited class
$pdf = new PDF();
$pdf->SetMargins(10,45,10);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Image('images/fondo.png', 30, 67, 159); // Aumentando la coordenada Y a 30 para mover la imagen hacia abajo

$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,10,'CERTIFICADO  DE RETIRO ESCOLAR',0,1,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',14);
$pdf->Write(9, utf8_decode('EL LICEO PEDAGÓGICO ALEGRÍA'));
$pdf->SetFont('Arial','',14);

$pdf->Write(9,utf8_decode(' con resolución 001145 de la secretaria de Soacha Cundinamarca, certifica que el estudiante'));
        
$pdf->SetFont('Arial','B',14);
$pdf->Write(9, strtoupper(utf8_decode(' '.$fila["first_name"].' '.$fila["last_name"].'')));
$pdf->SetFont('Arial','',14);
$pdf->Write(9,utf8_decode(' con documento'));
$pdf->SetFont('Arial','B',14);
$pdf->Write(9, utf8_decode(' N°'.$fila["cc"]));
$pdf->SetFont('Arial','',14);
$pdf->Write(9,utf8_decode('. ha sido oficialmente retirado de nuestra institución educativa '));
$pdf->SetFont('Arial','',14);
$pdf->Write(9,utf8_decode(' el dia '.$fila["retirement_date"].'.'));
$pdf->Ln();
$pdf->SetFont('Arial','',14);
$pdf->Write(9,utf8_decode('La presente certificación se expide a petición del interesado y para los fines que el    mismo convenga.'));
$pdf->Ln();
$pdf->SetFont('Arial','',14);
$pdf->Write(9,utf8_decode('Dado en Soacha a los '. $fecha_actual.'.'));
$pdf->Ln();
$pdf->SetFont('Arial','',14);
$pdf->Write(9,utf8_decode('Se entrega sin tachones ni enmendadura.'));
$pdf->Ln();
$pdf->SetFont('Arial','',14);
$pdf->Write(9,utf8_decode('sin otro particular.'));
$pdf->Ln();
$pdf->SetFont('Arial','',14);
$pdf->Write(9,utf8_decode('CORDIALMENTE:'));
$pdf->Ln();
$pdf->Image('images/firma.png', 10, 160, 50);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',14);
$pdf->Write(5,utf8_decode('CAROLINA OVALLE OCHOA'));
$pdf->Ln();
$pdf->Write(5,utf8_decode('DIRECTORA'));
$pdf->Ln();
$pdf->SetFont('Arial','B',12);
$pdf->Write(5,utf8_decode('La firma digital tiene validez'));
        // Agrega más datos del usuario según sea necesario

        // Guarda el PDF en una variable
        $pdfContent = $pdf->Output('', 'S');

        // Cierra la conexión a la base de datos
        $conexion->close();

        // Envía el correo con PHPMailer
       
       
       $nombres_completos=' '.$fila["first_name"].' '.$fila["last_name"].'';


 $tema="Certificado de retiro";
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
    $mail->Body = 'Adjunto encontrarás el certificado de retiro escolar en un PDF .';
    $mail->addAddress($fila["email"]);
      //$mail->addStringEmbeddedImage("../images/QR.png", "");
 $mail->AddStringAttachment($pdfContent, 'certificado_retiro'.$nombres_completos.'.pdf');

//     // $mail->addAttachment($img);

//  //$mail->addCC('rassijar@gmail.com');
    $mail->SMTPOptions=array('ssl'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>false
    ));


        if (!$mail->send()) {
            echo 'No se pudo enviar el correo.';
            echo 'Error: ' . $mail->ErrorInfo;
        } else {
            echo "

        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script src='sweetalert2.min.js'></script>


    <style>

.swal2-popup {
font-size: 1rem;
}
    </style>
<body>

<script>
   
        swal.fire({

            title: 'Certificado generado para el estudiante  $nombres_completos',
            icon: 'success',
            button: 'Aceptar',
}).then(function() {
    window.location = 'acudientes';
});
 

</script>
</body>";
        }
    } else {
         echo "

        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script src='sweetalert2.min.js'></script>


    <style>

.swal2-popup {
font-size: 1rem;
}
    </style>
<body>

<script>
   
        swal.fire({

            title: 'No se encontraron datos para el estudiante con ID $idStudent',
            icon: 'error',
            button: 'Aceptar',
}).then(function() {
    window.location = 'acudientes';
});";

    }
} else {
    echo "

        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script src='sweetalert2.min.js'></script>


    <style>

.swal2-popup {
font-size: 1rem;
}
    </style>
<body>

<script>
   
        swal.fire({

            title: 'No se proporcionó un ID de estudiante',
            icon: 'error',
            button: 'Aceptar',
}).then(function() {
    window.location = 'acudientes';
});";
 
}
?>