<?php

include("Personnage.php");

print("<h1>Jeu de combat</h1>");

$perso1 = new Personnage("Bool");
//$perso1->definirForce(20);
$perso1->setExperience(15);

$perso2 = new Personnage("Bile",60,0);
//$perso2->definirForce(60);
$perso2->setExperience(1);

//Les personnages se frappe
$perso1->frapper($perso2);
$perso2->frapper($perso1);

print("<br/>Dégats du joueur n°1 = ".$perso1->getDegats());
print("<br/>Dégats du joueur n°2 = ".$perso2->getDegats());