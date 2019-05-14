<?php
class AjouterListe{
	function mAjouterVetement($codeArticle, $description, $taille, $prix, $idListe){
			echo "<script>alert('ok')</script>";
			$pdo = new PDO("mysql:host=localhost;dbname=acces", "root", "");
			$ajoutVetement = $pdo->prepare("INSERT INTO `vetement` (`CodeArticle`, `Taille`, `Prix`, `Description`, `Statut`, `LISTE_idLISTE`) VALUES (:codeArticle, :taille, :prix, :description, :statut, :idListe)");
			$statut = "Non fourni";
			$ajoutVetement->bindValue(':codeArticle', $codeArticle);	
			$ajoutVetement->bindValue(':taille', $taille);
			$ajoutVetement->bindValue(':prix', $prix);
			$ajoutVetement->bindValue(':description', $description);
			$ajoutVetement->bindValue(':statut', $statut);
			$ajoutVetement->bindValue(':idListe', $idListe);
			$ajoutVetement->execute();
			return true;
	}
}
?>