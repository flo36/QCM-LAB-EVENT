<?php

include($chem.'Qcm.php');
include($chem.'Question.php');
include($chem.'Reponse.php');

$tab_qcm = [];

///////////////////////////////////////////////////questionnaire 1////////////////////////////////////////////

$question1 = new Question("A qui doit-on l'école gratuite laïque et obligatoire ?");
$question1->ajouteReponse(new Reponse("Jules Ferry"));
$question1->ajouteReponse(new Reponse("Charlemagne"));
$question1->ajouteReponse(new Reponse("Jean Jaurès"));

$question1->setBonne_reponse(1);

$question2 = new Question("Qui a écrit \"La petite Fadette\" ?");
$question2->ajouteReponse(new Reponse("Simone De Beauvoir"));
$question2->ajouteReponse(new Reponse("George Sand"));
$question2->ajouteReponse(new Reponse("Victor Hugo"));

$question2->setBonne_reponse(2);

$question3 = new Question("En France, la loi a baisssé la majorité ivile de 21 ans à 18 ans en :");
$question3->ajouteReponse(new Reponse("1789"));
$question3->ajouteReponse(new Reponse("1974"));
$question3->ajouteReponse(new Reponse("2001"));

$question3->setBonne_reponse(2);

$question4 = new Question("Qui a inventé la photographie?");
$question4->ajouteReponse(new Reponse("Nicéphore Niepce"));
$question4->ajouteReponse(new Reponse("Thomas Edison"));
$question4->ajouteReponse(new Reponse("Louis et >Auguste Lumière"));

$question4->setBonne_reponse(3);

$tab_question_qcm1 = [];
array_push($tab_question_qcm1, $question1);
array_push($tab_question_qcm1, $question2);
array_push($tab_question_qcm1, $question3);
array_push($tab_question_qcm1, $question4);


$qcm1 = new Qcm($tab_question_qcm1);

$tab_apprec = [];
$tab_apprec["seuil"] = 0;
$tab_apprec2["seuil"] = 25;
$tab_apprec3["seuil"] = 50;
$tab_apprec4["seuil"] = 75;

$tab_apprec["apprec"] = "Il faut travailler";
$tab_apprec2["apprec"] = "Il faut réviser un peu plus";
$tab_apprec3["apprec"] = "C'est Bien";
$tab_apprec4["apprec"] = "Félicitations";

$qcm1->ajoute_appreciation($tab_apprec);
$qcm1->ajoute_appreciation($tab_apprec2);
$qcm1->ajoute_appreciation($tab_apprec3);
$qcm1->ajoute_appreciation($tab_apprec4);

$tab_qcm["Culture Générale 1"] = $qcm1;
///////////////////////////////////////////////////questionnaire 2////////////////////////////////////////////

$question1 = new Question("Qui a gagné Roland Garros ?");
$question1->ajouteReponse(new Reponse("Yannick Noa"));
$question1->ajouteReponse(new Reponse("Benoit Paire"));
$question1->ajouteReponse(new Reponse("Gaël Monfils"));

$question1->setBonne_reponse(1);

$question2 = new Question("En quelle année la France a gagné la coupe du monde de football?");
$question2->ajouteReponse(new Reponse("2019"));
$question2->ajouteReponse(new Reponse("2002"));
$question2->ajouteReponse(new Reponse("1998"));

$question2->setBonne_reponse(3);

$question3 = new Question("Quel est le nom du stade de Saint Etienne ?");
$question3->ajouteReponse(new Reponse("Geoffroy Guichard"));
$question3->ajouteReponse(new Reponse("Orange Vélodrome"));
$question3->ajouteReponse(new Reponse("Le Parc des Princes"));

$question3->setBonne_reponse(1);

$question4 = new Question("Quel est le prénom du Biathlète Fourcade?");
$question4->ajouteReponse(new Reponse("Pierre"));
$question4->ajouteReponse(new Reponse("Paul"));
$question4->ajouteReponse(new Reponse("Martin"));

$question4->setBonne_reponse(3);

$tab_question_qcm2 = [];
array_push($tab_question_qcm2, $question1);
array_push($tab_question_qcm2, $question2);
array_push($tab_question_qcm2, $question3);
array_push($tab_question_qcm2, $question4);

$qcm2 = new Qcm($tab_question_qcm2);

$tab_apprec = [];
$tab_apprec["seuil"] = 0;
$tab_apprec2["seuil"] = 25;
$tab_apprec3["seuil"] = 50;
$tab_apprec4["seuil"] = 75;

$tab_apprec["apprec"] = "Il faut travailler";
$tab_apprec2["apprec"] = "Il faut réviser un peu plus";
$tab_apprec3["apprec"] = "C'est Bien";
$tab_apprec4["apprec"] = "Félicitations";

$qcm2->ajoute_appreciation($tab_apprec);
$qcm2->ajoute_appreciation($tab_apprec2);
$qcm2->ajoute_appreciation($tab_apprec3);
$qcm2->ajoute_appreciation($tab_apprec4);

$tab_qcm["Sport"] = $qcm2;

///////////////////////////////////////////////////questionnaire 3////////////////////////////////////////////

$question1 = new Question("Quel est le plus long fleuve Français ?");
$question1->ajouteReponse(new Reponse("La Loire"));
$question1->ajouteReponse(new Reponse("La Seine"));
$question1->ajouteReponse(new Reponse("La Garonne"));

$question1->setBonne_reponse(1);

$question2 = new Question("Combien la France possède-t-elle de régions ?");
$question2->ajouteReponse(new Reponse("27"));
$question2->ajouteReponse(new Reponse("18"));
$question2->ajouteReponse(new Reponse("13"));

$question2->setBonne_reponse(3);

$question3 = new Question("Où se situe la ville de La Châtre ?");
$question3->ajouteReponse(new Reponse("En Corse"));
$question3->ajouteReponse(new Reponse("Dans l'indre"));
$question3->ajouteReponse(new Reponse("En Vendée"));

$question3->setBonne_reponse(3);

$question4 = new Question("Quelle île n'appartient pas à la France ?");
$question4->ajouteReponse(new Reponse("Pierre & Miquelon"));
$question4->ajouteReponse(new Reponse("La Cisille"));
$question4->ajouteReponse(new Reponse("Guadeloupe"));

$question4->setBonne_reponse(2);

$tab_question_qcm3 = [];
array_push($tab_question_qcm3, $question1);
array_push($tab_question_qcm3, $question2);
array_push($tab_question_qcm3, $question3);
array_push($tab_question_qcm3, $question4);

$qcm3 = new Qcm($tab_question_qcm3);

$tab_apprec = [];
$tab_apprec["seuil"] = 0;
$tab_apprec2["seuil"] = 25;
$tab_apprec3["seuil"] = 50;
$tab_apprec4["seuil"] = 75;

$tab_apprec["apprec"] = "Il faut travailler";
$tab_apprec2["apprec"] = "Il faut réviser un peu plus";
$tab_apprec3["apprec"] = "C'est Bien";
$tab_apprec4["apprec"] = "Félicitations";

$qcm3->ajoute_appreciation($tab_apprec);
$qcm3->ajoute_appreciation($tab_apprec2);
$qcm3->ajoute_appreciation($tab_apprec3);
$qcm3->ajoute_appreciation($tab_apprec4);

$tab_qcm["Géographie"] = $qcm3;

///////////////////////////////////////////////////questionnaire 4////////////////////////////////////////////

$question1 = new Question(" Combien de temps dure un mandat présidentiel français ?");
$question1->ajouteReponse(new Reponse("7 ans"));
$question1->ajouteReponse(new Reponse("5 ans"));
$question1->ajouteReponse(new Reponse("4 ans"));

$question1->setBonne_reponse(2);

$question2 = new Question("Quel âge minimum doit-on avoir pour être sénateur français ?");
$question2->ajouteReponse(new Reponse("35"));
$question2->ajouteReponse(new Reponse("18"));
$question2->ajouteReponse(new Reponse("25"));

$question2->setBonne_reponse(1);

$question3 = new Question("Les écoles primaires relèvent de la compétence de :");
$question3->ajouteReponse(new Reponse("La commune"));
$question3->ajouteReponse(new Reponse("La région"));
$question3->ajouteReponse(new Reponse("Le département"));

$question3->setBonne_reponse(1);

$question4 = new Question("Quel jour férié représente la fête du travail");
$question4->ajouteReponse(new Reponse("14 Juillet"));
$question4->ajouteReponse(new Reponse("8 Mai"));
$question4->ajouteReponse(new Reponse("1 Mai"));

$question4->setBonne_reponse(3);

$tab_question_qcm4 = [];
array_push($tab_question_qcm4, $question1);
array_push($tab_question_qcm4, $question2);
array_push($tab_question_qcm4, $question3);
array_push($tab_question_qcm4, $question4);

$qcm4 = new Qcm($tab_question_qcm3);

$tab_apprec = [];
$tab_apprec["seuil"] = 0;
$tab_apprec2["seuil"] = 25;
$tab_apprec3["seuil"] = 50;
$tab_apprec4["seuil"] = 75;

$tab_apprec["apprec"] = "Il faut travailler";
$tab_apprec2["apprec"] = "Il faut réviser un peu plus";
$tab_apprec3["apprec"] = "C'est Bien";
$tab_apprec4["apprec"] = "Félicitations";

$qcm4->ajoute_appreciation($tab_apprec);
$qcm4->ajoute_appreciation($tab_apprec2);
$qcm4->ajoute_appreciation($tab_apprec3);
$qcm4->ajoute_appreciation($tab_apprec4);

$tab_qcm["ESC"] = $qcm3;

?>