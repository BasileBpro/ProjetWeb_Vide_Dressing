<?php
include 'connexionBD.php';
include'C:\wamp64\www\VIDE_DRESSING2\VIDE_DRESSING1\ressources\controleurs\control_exportVendeurPdf.php';

require('fpdf/fpdf.php');

$pdoVendeur = new Controller_exportVendeurPdf;
$test = $pdoVendeur->cpdoVendeur();

ob_get_clean();
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(140, 10, 'VENDEURS', 0, 1, 'C');
$pdf->Ln();
$pdf->SetFillColor(100, 201, 255);
$pdf->Cell(80, 10, 'Nom', 1, 0, 'C', true);
$pdf->Cell(0, 10, 'Prenom', 1, 1, 'C', true);
$pdf->SetFont('Arial','',12);
$pdf->SetFillColor(235, 235, 255);
for($i=0;$i<count($test);$i++){
	$pdf->Cell(80,10, $test[$i]['Nom'], 1, 0, 'L', true);
	$pdf->MultiCell(0,10, $test[$i]['Prenom'], 1, 1, 'J');
}
$pdf->Output();
?>
