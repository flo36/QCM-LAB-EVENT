<?php

//	description : fichier pour la classe Question
//  création 	: 20/08/2020 9h15


class Question {

	private $str_quest = "";
	private $tab_reponse = [];
	private $str_correction = "";
	private $bonne_reponse = 1;

	//création d'une question vide.
	public function __construct($str_question = null) 
	{
	    if (!empty($str_question))
	    {
	    	//la question n'est pas vide, on instancie l'objet Question avec la question en paramètre
	        $this->str_quest = $str_question;
	    }
	    else
	    	echo "veuillez renseigner votre question";
	}


///////////////////////les getters des attributs de la classe Conseil//////////////////////////////////////////////

	public function getStr_quest() 
	{
	    // TODO
	    return $this->str_quest;
	}

	public function getTab_reponse()
	{
	    return $this->tab_reponse;
	}

	public function getStr_correction() 
	{
	    // TODO
	    return $this->str_correction;
	}

	public function getBonne_reponse() 
	{
	    // TODO
	    return $this->bonne_reponse;
	}

///////////////////////les setters des attributs de la classe Conseil//////////////////////////////////////////////

    public function setStr_quest($new_question)
    {
        $this->str_quest = $new_question;
    }
     
    public function setTab_reponse($new_Tabreponse)
    {
        $this->tab_reponse = $new_Tabreponse;
    }

    public function ajouteReponse($new_reponse)
    {
    	array_push($this->tab_reponse, $new_reponse);
    }

    public function setStr_correction($new_correction) 
	{
	    $this->str_correction = $new_correction;
	}

	public function setBonne_reponse($new_bonne_reponse)
    {
        $this->bonne_reponse = $new_bonne_reponse;
    }
}


?>