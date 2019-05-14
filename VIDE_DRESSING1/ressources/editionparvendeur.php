<?php


include 'connexionBD.php'; //fichier de connexion à la base de données
include 'C:\wamp64\www\VIDE_DRESSING2\VIDE_DRESSING1\ressources\controleurs\control_EditionVendeur.php';
//importer la library
require('fpdf/fpdf.php');

ob_get_clean();
// creer le pdf en mode portrait, unites en mm, de 270 sur 180 mm
$pdf=new FPDF('P','mm',array(270,180));
$pdf->SetAutoPageBreak(0);
// cree une page dans le document, sinon vide
$pdf->AddPage();

// definir la police : sf_old_republic en 45 points
// placement du pointeur et ecriture du titre
$pdf->SetFont('Arial','',15);
$pdf->SetXY(15,15);
$pdf->MultiCell(200,15,'Vide dressing du '.date('d/m/Y'));


// descriptif
// placer le pointeur pour le texte
// definir le texte
// ecrire le titre et texte avec multicell
$pdf->SetXY(10,30);
$pdf->SetFont('Arial','B',12);
$pdf->MultiCell(100,5,'Synthese vendeur',0,"L");


$pdf->SetFont('Arial','',9);
$trigramme=$_POST['trigramme'];
$pdo = new Controller_EditionVendeur;
$test = $pdo->cRecap($trigramme);
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
    $pdf->Cell(30,10, $test[$i]['Statut'], 1, 0, 'J', true);
    $pdf->MultiCell(15,10, $test[$i]['Taille'], 1, 0, 'J', true);
}

$test2 = $pdo->cRecapAll($trigramme);

$pdf->Cell(80,4,utf8_decode("Somme des prix des articles vendus : ".$test2[0]['SUM(prix)']." euros"));


// sortir le pdf vers le navigateur
$pdf->Output();
?>