<?php
include'C:\wamp64\www\VIDE_DRESSING2\VIDE_DRESSING1\ressources\models\model_ConvPDF.php';

class Controller_ConvPDF{

	function cSelectArticle($nomliste){
		$acc = new ConvPDF;
		$result = $acc->mSelectArticle($nomliste);
		return $result;
	}

	function cSelectSum($tri){
		$acc = new ConvPDF;
		$result = $acc->mSelectSum($tri);
		return $result;
	}
}
?>