<?php

include("Personnage.php");

print("<h1>Jeu de combat</h1>");

$perso1 = new Personnage();
$perso1->definirForce(20);
$perso1->definirExperience(15);

$perso2 = new Personnage();
$perso2->definirForce(60);
$perso2->definirExperience(1);

$perso1->frapper($perso2);
$perso2->frapper($perso1);

print("<br/>Dégats du joueur n°1 = ".$perso1->afficherDegats());
print("<br/>Dégats du joueur n°2 = ".$perso2->afficherDegats());