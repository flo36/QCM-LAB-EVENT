<?php


$chem="";

////////////////////debut HTML///////////////////////////

include ($chem."haut.inc.php");
include ($chem."config.inc.php");

?>

<h1 class="text-center">Création et participation à des formulaires</h1>

	<h3>Création d'un nouveau formulaire</h3>

	<a href="formulaire_creation_qcm.php" class="btn btn-lg bg-danger col-5">Créer mon propre formulaire</a>

	<h3 class="mt-2">Répondre à un questionnaire existant<h3>

<div class="row">
	<div class="col-12">
		<?php
		$cpt_qcm = 0;
		foreach ($tab_qcm as $key => $qcm) 
		{
			$cpt_qcm++;

			switch ($cpt_qcm%5) 
			{
				case '1':
					$bg = "bg-warning";
					break;
				case '2':
					$bg = "bg-success";
					break;
				case '3':
					$bg = "bg-primary";
					break;
				case '4':
					$bg = "bg-secondary";
					break;
				case '0':
					$bg = "bg-danger";
					break;
				
				default:
					$bg = "bg-dark";
					break;
			}
			echo '<a href="verif_qcm.php?nom_qcm='.$key.'" class="btn btn-lg '.$bg.' col-5 m-2">'.ucfirst($key).'</a>';

		}
		?>
	</div>
</div>