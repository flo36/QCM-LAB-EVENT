<?php

//	description : formulaire de création du QCM


$chem="";

if(isset($_POST["envoi_reponse"]))
{
	
	$qcm =unserialize(stripslashes(urldecode($_POST["objet_qcm"])));

	print_r($qcm);
}
else
{
	header('Location:' . $chem . 'verif_qcm.php');
}

////////////////////debut HTML///////////////////////////

include ($chem."haut.inc.php");
?>