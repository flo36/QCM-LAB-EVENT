<?php

//	description : fichier pour la classe Reponse
//  création 	: 20/08/2020 9h30


class Reponse {

	private $str_reponse = "";
	private $bl_bonne_reponse = false;

	//création d'une question vide.
	public function __construct($str_rep = null) 
	{
	    if (!empty($str_rep))
	    {
	    	//la question n'est pas vide, on instancie l'objet Question avec la question en paramètre
	        $this->str_reponse = $str_rep;
	    }
	    else
	    	echo "veuillez renseigner votre réponse";
	}


///////////////////////les getters des attributs de la classe Conseil//////////////////////////////////////////////

	public function getStr_reponse() 
	{
	    return $this->str_reponse;
	}
	

///////////////////////les setters des attributs de la classe Conseil//////////////////////////////////////////////

    public function setStr_quest($new_question)
    {
        $this->str_quest = $new_question;
    }


}


?>