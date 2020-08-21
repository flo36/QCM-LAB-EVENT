<?php


class Qcm {

	private $cpt_bonne_reponse = 0;
	private $tab_questions = [];
	private $tab_appreciations = [];
	

	//création d'une question vide.
	public function __construct($tab_quest = null) 
	{
	    if (!empty($tab_quest))
	    {
	    	//la question n'est pas vide, on instancie l'objet Question avec la question en paramètre
	        $this->tab_questions = $tab_quest;
	    }
	    else
	    	echo "veuillez renseigner des questions";
	}


///////////////////////les getters des attributs de la classe Conseil//////////////////////////////////////////////

	public function getCpt_bonne_reponse()
	{
	    return $this->cpt_bonne_reponse;
	}

	public function getTab_questions()
	{
		return $this->tab_questions;
	}

	public function getTab_appreciations()
	{
		return $this->tab_appreciations;
	}

	

///////////////////////les setters des attributs de la classe Conseil//////////////////////////////////////////////

    public function setCpt_bonne_reponse()
    {
    	//la fonction doit être utilisé seulement lorsqu'une bonne réponse est choisie
        $this->cpt_bonne_reponse +=1;
    }
     
    public function setTab_questions($new_Tabquestions)
    {
        $this->tab_questions = $new_Tabquestions;
    }

    public function ajouteQuestion($new_question)
    {
    	array_push($this->tab_questions, $new_question);
    }

    public function ajoute_appreciation($tab_apprec)
    {
    	$this->tab_appreciations[$tab_apprec["seuil"]] = $tab_apprec["apprec"];
    } 

    public function genereQCM()
    {


    	$objet_qcm = urlencode(serialize($this));
    	//print_r($this->tab_questions);
    	echo '<form action="verif_qcm.php" method="post">'."\n";
    	echo '<input type="hidden" value="'.$objet_qcm.'" name="objet_qcm"/>';
    	$cpt_question = 0;
    	foreach ($this->tab_questions as $question) 
    	{
    		$cpt_question++;

    		echo '<div class="card mt-4 bg-secondary text-white">'."\n";
    			echo '<div class="card_body mx-2">'."\n";
    				echo '<h5 class="card-title">Question n°'.$cpt_question.'</h5>'."\n";
    		
    				echo '<p>'.$question->getStr_quest().'</p>'."\n";

    				$tab_reponse = $question->getTab_reponse();
    				$cpt_reponse =0;

    				foreach ($tab_reponse as $reponse)
    				{
    					$cpt_reponse++;
    					echo "<p>Réponse n°".$cpt_reponse.": <br/>"."\n";
    					echo $reponse->getStr_reponse()."</p>"."\n";
    					echo "<br/>";
    				}
    				echo "<br/>";

    				//choix de la bonne réponse
    				echo '<div class="col-12">'."\n";
						echo '<label for="rep_choisie"><h5 class="card-title mt-2 ml-2">Sélectionnez la bonne réponse &nbsp;</h5></label>'."\n";

						echo '<SELECT name="rep_choisie'.$cpt_question.'" required class="btn bg-white" size="1">'."\n";
							
						for ($a=1; $a <= $cpt_reponse; $a++) 
						{ 
							echo '<OPTION>Réponse '.$a.'</option>'."\n";
						}
						
						echo '</SELECT>'."\n";
					echo '</div>'."\n";


    			echo "</div>"."\n";
    		echo "</div>"."\n";

    	}

    		echo '<input type="submit" value="Envoyer les réponses" name="envoi_reponse" class="form-control btn-lg col-4 offset-8 mt-4 btn btn-lg btn-primary" />';
    	echo "</form>";
    }

    function traiter_qcm($tab_reponse)
    {
    	$cpt_question = 1;
    	foreach ($tab_reponse as $num_question => $reponse) 
    	{
    		if($num_question != "envoi_reponse" && $num_question != "objet_qcm")
    		{

    			echo '<div class="card mt-4 bg-secondary">'."\n";
    			echo '<div class="card_body text-white m-2">'."\n";
    			echo '<div class="card-title" text-white m-2">'."\n";
    			echo '<h5>Question n°'.$cpt_question.'</h5>'."\n";
    			//on traite les réponses envoyées
    			$num = substr($num_question, 11);
    			$tab_question = $this->getTab_questions();
    			$question = $tab_question[$num-1];

    			if($question->getBonne_reponse() == substr($reponse, 8))
    			{
    				//la réponse donnée est la bonne
    				$bonne_reponse = $question->getBonne_reponse();
    				$rep = $question->getTab_reponse();
    				$reponse_donne = $rep[substr($reponse, 8)-1]->getStr_reponse();
    				//print_r($reponse[substr($reponse, 8)]);
    				echo '<p><span class="bg-success m-2 col-6"> '.$question->getStr_quest().'</span></p>'."\n";
    				echo '<p>'.$reponse_donne.'<i class="fas fa-check"></i></p>'."\n";
    				$this->setCpt_bonne_reponse();
    			}
    			else
    			{	//la réponse donnée n'est pas bonne
    				$rep = $question->getTab_reponse();
    				$correction = $question->getStr_correction();
    				$reponse_donne = $rep[substr($reponse, 8)-1]->getStr_reponse();
    				$bonne_reponse = $rep[$question->getBonne_reponse()-1];
    				echo '<p><span class="bg-warning m-2 col-6"> '.$question->getStr_quest().'</span></p>'."\n";
    				echo '<p>Votre réponse : '.$reponse_donne.' <i class="fas fa-times"></i></p>'."\n";
    				echo "La bonne réponse était : ".$bonne_reponse->getStr_reponse()."\n";
    				echo '<p>'.$correction.'</p>';
    			}
    			echo "</div>"."\n";
    			echo "</div>"."\n";
    			echo "</div>"."\n";
    		
    		$cpt_question++;
    		}

    	}

    	$nb_questions = count($this->tab_questions);

    	if($this->getCpt_bonne_reponse() == 0)
		{
			$reussite = 0;
		}
		else
		{
    		$reussite = ($this->getCpt_bonne_reponse()/$nb_questions)*100;
		}

		//print_r($this->tab_appreciations);
		echo '<div class="card mt-4  bg-secondary">';
    		echo '<div class="card_body text-white m-2">';
    			echo '<p>Pourcentage de réussite : '.$reussite.'%</p>';
		    	foreach ($this->tab_appreciations as $seuil => $apprec) 
		    	{
		    		if($reussite <= $seuil)
		    		{
		    			echo $apprec;
		    			break;
		    		}

		    	}
    		echo "</div>";
    	echo "</div>";
    }

}


?>