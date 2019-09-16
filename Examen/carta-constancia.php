<?php
require('fpdf181/fpdf.php');

$nombreAlumno = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombreAlumno = test_input($_POST["nombreAlumno"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$fecha = date("d").' de '.date("m").' de '.date("Y");

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',14);
$pdf->Image('imagenes/logo.png');
$pdf->MultiCell(0,6,$fecha,0,'L');
$pdf->Ln(5);
$pdf->SetFont('Arial','B',20);
$pdf->SetTextColor(55,151,206);
$pdf->MultiCell(0,6,$nombreAlumno,0,'L');
$pdf->Ln(10);
$pdf->SetFont('Arial','',14);
$pdf->SetTextColor(0,0,0);
$pdf->MultiCell(0,6,'Finalizo exitosamente el curso
	',0,'L');
$pdf->SetFont('Arial','B',20);
$pdf->SetTextColor(55,151,206);
$pdf->MultiCell(0,6,'Componentes de una oracion
	',0,'L');
$pdf->SetFont('Arial','',14);
$pdf->SetTextColor(0,0,0);
$pdf->MultiCell(0,6,'Durante este tiempo, el alumno(a) adquirio los conocimientos necesarios para afrontar la tematica de manera sobresaliente, haciendo uso de distintas herramientas de tecnologias de informacion.
	');
$pdf->Cell(0,6,'Atentamente,',0,1,'C');
$pdf->Ln(10);
$pdf->Image('imagenes/firma.jpg',75,null,50);

$pdf->MultiCell(0,6,'Dora Elizabeth Garcia Olivier
	Directora del Centro Virtual de Aprendizaje',0,'C');
$pdf->Ln(10);

$pdf->SetFont('Arial','I',12);
$pdf->SetTextColor(200,200,200);
$pdf->MultiCell(0,6,'Este documento no certifica al participante, solo hace constancia de que el participante logro adquirir el conocimiento necesario para llevar los temas del curso.Para mas informacion, visitar www.centroscomunitariosdeaprendizaje.org.mx');

$pdf->Output();
?>