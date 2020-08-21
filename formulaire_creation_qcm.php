<?php



$chem="";

if(isset($_POST["valider"]))
{
	$nb_reponse = $_POST["nb_reponse"];
	$nb_question = $_POST["nb_question"];
	$nb_appreciations = $_POST["nb_appreciations"];
}
else
{
	$nb_reponse = 2;
	$nb_question = 1;
	$nb_appreciations = 1;
}

////////////////////debut HTML///////////////////////////

include ($chem."haut.inc.php");
?>

	<h1 class="text-center">Création du formulaire</h1>

<div class="row">
   	<div class="col-12 m-2 card">
		<form action="formulaire_creation_qcm.php" method="post">
			<div class="card-body">
				<h5 class="card-title">Initialisation du formulaire</h5>
				<div class="col-8">
					<label for="nb_question">Saisissez le nombre de question que vous voulez saisir (au maximum 10)</label>
					<input type="number" class="form-control col-3" id="nb_question" name="nb_question" min="1" step="1" max="10" value="<?php echo $nb_question;?>"/>
				</div>
				<div class="col-8">
					<label for="nb_reponse">Saisissez le nombre de réponses par questions (au maximum 4)</label>
					<input type="number" class="form-control col-3" id="nb_reponse" name="nb_reponse" min="2" step="1" max="4" value="<?php echo $nb_reponse;?>"/>
				</div>
				<div class="col-8">
					<label for="nb_appreciations">Saisissez le nombre d'appréciations différentes (au maximum 5)</label>
					<input type="number" class="form-control col-3" id="nb_appreciations" name="nb_appreciations" min="1" step="1" max="5" value="<?php echo $nb_reponse;?>"/>
				</div>
				<input type="submit" name="valider" value="Commencer" class="btn btn-lg btn-primary form-control col-4 offset-8 mt-2">
			</div>
		</form>
	</div>
	
	<div class="col-12 m-4">
		<form action="verif_qcm.php" method="post">

			<?php 
				echo '<div class="card m-2 mt-4">';
				echo '<div class="card-body bg-secondary mx-2 mt-2">';
					echo '<div class="col-12">';
					echo '<h5 class="card-title">Appréciations</h5>';

						echo '<p>% de bonne réponse (sur 100). L\'affichage se fera si le taux de réussite au questionnaire est supérieur au seuil que vous saisissez</p> '."\n";
			for ($z=1; $z <= $nb_appreciations; $z++) 
			{ 
					echo '<div class="col-6 mt-4">';

						echo '<p><b>Seuil n°'.$z.'</b></p>';
						echo '<label for="seuil'.$z.'">%de bonne réponse (entre 0 et 100)</label>';
						echo '<input type="number" required class="form-control col-3" min="0" max="100" step="1" name="seuil_'.$z.'"/>'."\n";
						echo '<label for="appreciation_'.$z.'">L\'appréciation à afficher</label>'."\n";
						echo '<textarea id="appreciation'.$z.'" class="form-control" required name="appreciation'.$z.'" rows="2" cols="30"></textarea>'."\n";

					echo '</div>'."\n";

			}
				echo '</div>'."\n";
				echo '</div>'."\n";

			for ($i=1; $i <= $nb_question; $i++) 
			{ 
				echo '<div class="card m-2 mt-4">'."\n";
				echo '<div class="card-body bg-secondary">'."\n";
					echo '<div class="col-12">'."\n";
					echo '<h5 class="card-title">Question</h5>';
						echo '<label for="question'.$i.'">Saisissez votre question</label>'."\n";
						echo '<textarea id="question'.$i.'" required class="form-control" name="quest'.$i.'" rows="3" cols="30"></textarea>'."\n";
					echo "</div>"."\n";

					echo '<h5 class="card-title mt-2 ml-2">Réponses</h5>'."\n";
					for ($j=1; $j <= $nb_reponse; $j++) 
					{ 
						echo '<div class="col-12">'."\n";

							echo '<label for="resp'.$i.'-'.$j.'">Saisissez une reponse</label>'."\n";
							echo '<textarea id="reponse'.$i.'-'.$j.'" class="form-control" required name="resp'.$i.'-'.$j.'" rows="2" cols="30"></textarea>'."\n";
							// if($j == 1)
							// {
							// 	$vrai = "checked";
							// 	$faux = "";
							// }
							// else
							// {
							// 	$vrai = "";
							// 	$faux = "checked";
							// }
							// echo '<label for="bonne_rep1">Est-ce la bonne réponse ? </label>';
							// echo '<div class="form-check form-check-inline">';
							// 	echo '<input type="radio" name="bonne_rep'.$i.'-'.$j.'" value="Vrai" '.$vrai.'>Vrai</input>';
							// echo '</div>';
							// echo '<div class="form-check form-check-inline">';
							// 	echo '<input type="radio" name="bonne_rep'.$i.'-'.$j.'" value="Faux" '.$faux.'>Faux</input>';
							// echo '</div>';
						echo "</div>"."\n";

					}

					//bonne réponse
					echo '<div class="col-12">'."\n";
						echo '<label for="quest"><h5 class="card-title mt-2 ml-2">Sélectionnez la bonne réponse &nbsp;</h5></label>'."\n";
						echo '<SELECT name="bonne_rep'.$i.'" class="btn bg-white" required size="1">'."\n";
							
						for ($a=1; $a <= $nb_reponse; $a++) 
						{ 
							echo '<OPTION>Réponse '.$a.'</option>'."\n";
						}
						
						echo '</SELECT>';
					echo '</div>';

					//phrase corrective
					echo '<div class="col-12">';
						echo '<label for="quest"><h5 class="card-title mt-2 ml-2">Phrase corrective</h5></label>'."\n";
						echo '<textarea id="correction'.$i.'" required class="form-control" name="correction'.$i.'" rows="2" cols="30"></textarea>'."\n";
					echo '</div>'."\n";

				//fin du card
				echo '</div>'."\n"; 
				echo '</div>'."\n"; 
			
			}
			?>

			<input type="submit" value="valider le questionnaire" name="validerQCM" class="btn btn-lg btn-primary col-4 offset-8"/>
		</form>
	</div>

</div>
<?php


include($chem."bas.inc.php");
?>
