<?php

include 'connexionBD.php';
include'C:\wamp64\www\VIDE_DRESSING2\VIDE_DRESSING1\ressources\controleurs\control_Ticket.php';

$ticket=$_GET['liste'];
$tableau = explode(";", $ticket);

// library fpdf
require('fpdf/fpdf.php');

// creer le pdf en mode portrait, unites en mm, de 270 sur 180 mm
ob_get_clean();
$pdf=new FPDF('P','mm',array(270,180));
$pdf->SetAutoPageBreak(0);


// cree une page dans le document, sinon vide
$pdf->AddPage();

// definir la police : sf_old_republic en 45 points
// placement du pointeur et ecriture du titre
$pdf->SetFont('Arial','',20);
$pdf->SetXY(15,15);
$pdf->MultiCell(200,15,'Vide dressing du '.date('d/m/Y'));


// descriptif
// placer le pointeur pour le texte
// definir le texte
// ecrire le titre et texte avec multicell
$pdf->SetXY(10,30);
$pdf->SetFont('Arial','B',12);
$pdf->MultiCell(100,5,'Ticket client',0,"L");


$pdf->SetFont('Arial','',9);

$pdf->SetFont('Arial','B',11);
$pdf->Ln();
$pdf->SetFillColor(100, 201, 255);
$pdf->Cell(30, 10, 'Code Article', 1, 0, 'C', true);
$pdf->Cell(50, 10, 'Description', 1, 0, 'C', true);
$pdf->Cell(20, 10, 'Prix', 1, 0, 'C', true);
$pdf->Cell(15, 10, 'Taille', 1, 1, 'C', true);
$pdf->SetFont('Arial','',11);
$pdf->SetFillColor(235, 235, 255);

$prix=0;
$updatePdo = new Controller_Ticket;
$recupPdo = new Controller_Ticket;

for ($i=0; $i < count($tableau)-1; $i++) { 
	$recap = $updatePdo->cUpdate($tableau[$i]);
	$test = $recupPdo->cRecup($tableau[$i]);

	// $test = $result[0]['Prix'];
	// echo "<script>alert($test)</script>";
	// $recap = $pdo -> query('UPDATE vetement SET Statut="VENDU" WHERE CodeArticle=\'' .$tableau[$i]. '\'');//passe les articles du tableau en VENDU
	// $recap = $pdo -> query('SELECT CodeArticle, Description, Prix,  taille FROM vetement WHERE CodeArticle=\'' .$tableau[$i]. '\'');
	// while ($donnees = $recap -> fetch()){
		$pdf->Cell(30,10, $test[0]['CodeArticle'], 1, 0, 'L', true);
    	$pdf->Cell(50,10, $test[0]['Description'], 1, 0, 'C', true);
    	$pdf->Cell(20,10, $test[0]['Prix'], 1, 0, 'J', true);
    	$pdf->MultiCell(15,10, $test[0]['Taille'], 1, 0, 'J', true);
    	$prix+=intval($test[0]['Prix']);
    // }//permet d'afficher les résultats de la requête dans un tableau
    
}

$pdf->Cell(80,4,utf8_decode("Somme des prix des articles achetés : ".$prix." euros"));



// sortir le pdf vers le navigateur
$pdf->Output();
?>