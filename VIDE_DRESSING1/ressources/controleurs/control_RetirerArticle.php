<?php

include'C:\wamp64\www\VIDE_DRESSING2\VIDE_DRESSING1\ressources\models\model_RetirerArticle.php';
	
class Controller_RetirerArticle{

	function cUpdateArticle($codeArticle){
		$recap = new RetirerArticle;
		$recap->mUpdateArticle($codeArticle);
		return true;
	}
}
?>