<?php

session_start();
include 'connexionBD.php'; //fichier de connexion à la base de données

include'C:\wamp64\www\VIDE_DRESSING2\VIDE_DRESSING1\ressources\controleurs\control_ConvPDF.php';

//importer la library
require('fpdf/fpdf.php');


// creer le pdf en mode portrait, unites en mm, de 270 sur 180 mm
ob_get_clean();
$pdf=new FPDF('P','mm',array(270,180));
$pdf->SetAutoPageBreak(0);
// cree une page dans le document, sinon vide
$pdf->AddPage();

// definir la police : sf_old_republic en 45 points
// placement du pointeur et ecriture du titre
$pdf->SetFont('Arial','',15);
$pdf->SetXY(15,15);



// descriptif
// placer le pointeur pour le texte
// definir le texte
// ecrire le titre et texte avec multicell
$pdf->SetXY(10,30);
$pdf->SetFont('Arial','B',12);
$pdf->MultiCell(100,5,'Synthese vendeur',0,"L");


$pdf->SetFont('Arial','',9);
$nomListe=$_POST['nomListe'];

$pdo = new Controller_ConvPDF;
$test = $pdo->cSelectArticle($nomListe);


$pdf->SetFont('Arial','B',11);
$pdf->Ln();
$pdf->SetFillColor(100, 201, 255);
$pdf->Cell(30, 10, 'Code Article', 1, 0, 'C', true);
$pdf->Cell(50, 10, 'Description', 1, 0, 'C', true);
$pdf->Cell(20, 10, 'Prix', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Statut', 1, 0, 'C', true);
$pdf->Cell(15, 10, 'Taille', 1, 1, 'C', true);
$pdf->SetFont('Arial','',11);
$pdf->SetFillColor(235, 235, 255);
for($i=0;$i < count($test); $i++){
    $pdf->Cell(30,10, $test[$i]['CodeArticle'], 1, 0, 'L', true);
    $pdf->Cell(50,10, $test[$i]['Description'], 1, 0, 'C', true);
    $pdf->Cell(20,10, $test[$i]['Prix'], 1, 0, 'J', true);
    $pdf->Cell(30,10, $test[$i]['statut'], 1, 0, 'J', true);
    $pdf->MultiCell(15,10, $test[$i]['taille'], 1, 0, 'J', true);
}

$trigramme = $_SESSION['tri'];
$test2 =$pdo->cSelectSum($trigramme);

// sortir le pdf vers le navigateur
$pdf->Output();
?>