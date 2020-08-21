<?php
//	description : vérif et création du QCM

$chem = "";

include($chem.'config.inc.php');

if(isset($_POST["validerQCM"]))
{

	$tab_question = [];
	$tab_appreciations = [];

	//création du formulaire avec les infos du post
	//print_r($_POST);
	foreach ($_POST as $key => $value) 
	{
		//récupération du type d'info (question, réponse, phrase corrective)
		$bl_question = strpos($key , 'quest');
		$bl_reponse = strpos($key, '-');
		$bl_correction = strpos($key, 'correction');
		$bl_bonne_reponse = strpos($key, 'bonne_rep');
		$bl_seuil = strpos($key, 'seuil_');
		$bl_appreciation = strpos($key, 'appreciation_');

		if($bl_question !== false)
		{
			//récupération du numéro de la question
			$num_question = substr($key, 5);

			//création de la question et ajout dans un tableau
			$question = new Question($value);
			$tab_question[$num_question] = $question;
		}
		elseif($bl_reponse !== false)
		{
			//récupération du numéro de la question
			$longueur = $bl_reponse - 4;

			$num_question = substr($key, $bl_reponse-1, $longueur);
			//récupération du numéro de la réponse
			$num_reponse = substr($key, $bl_reponse+1);

			$reponse = new Reponse($value);

			$tab_question[$num_question]->ajouteReponse($reponse);
		}
		elseif($bl_correction !== false)
		{
			//récupération du numéro de la question
			$num_question = substr($key, 10);

			if(isset($tab_question[$num_question]))
			{
				$question = $tab_question[$num_question];
				$question->setStr_correction($value);
			}
		}
		elseif($bl_bonne_reponse !== false)
		{
			//récupération du numéro de la question
			$num_question = substr($key, 9);
			//récupération du numéro de la bonne réponse
			$num_bonne_reponse = substr($value, 9);

			if(isset($tab_question[$num_question]))
			{
				$tab_question[$num_question]->setBonne_reponse($num_bonne_reponse);
			}
		}
		elseif($bl_seuil !== false)
		{

			//test
			// echo "seuil";
			//récupération du numéro de la tranche
			$num_tranche = substr($key, 6);
			// echo "<br/>".$num_tranche;
			$seuil = $value;

			if(isset($_POST['appreciation'.$num_tranche]))
			{
				// echo "appreciation";
				//on ajoute l'appréciation au qcm
				$tab_apprec['seuil'] = $value;
				$tab_apprec['apprec'] = $_POST['appreciation'.$num_tranche];
				//test
				// print_r($tab_apprec);
				array_push($tab_appreciations, $tab_apprec);
			}
		}
	}

	//création du qcm
	global $qcm;
	$qcm = new QCM($tab_question);
	foreach ($tab_appreciations as $tab_apprec) 
	{
		//ajout de tous les seuils et appréciations qui vont avec au qcm
		$qcm->ajoute_appreciation($tab_apprec);
	}
	$tab = $qcm->getTab_appreciations();
	// print_r($tab);
	$tab_question = $qcm->getTab_questions();
    $question = $tab_question[1];
    //echo $question->getBonne_reponse();
}
elseif(isset($_POST["envoi_reponse"]))
{
	//traitement du formulaire
	$qcm = unserialize(stripslashes(urldecode($_POST["objet_qcm"])));
}
elseif(isset($_GET["nom_qcm"]))
{
	$qcm = $tab_qcm[$_GET["nom_qcm"]];
}
else
{
    header('Location:' . $chem . 'formulaire_creation_qcm.php');
}


/////////////////////////début html///////////////////

include ($chem."haut.inc.php");
?>

<?php
	if(isset($_POST["validerQCM"]))
	{
		echo'<h1 class="text-center">Voici le QCM</h1>';
		$qcm->genereQCM();
	}
	elseif(isset($_POST["envoi_reponse"]))
	{
		echo'<h1 class="text-center">Résultat du QCM</h1>';
		$qcm->traiter_qcm($_POST);
	}
	elseif($_GET["nom_qcm"])
	{
		$qcm->genereQCM();
	}



include ($chem."bas.inc.php");
?>

	