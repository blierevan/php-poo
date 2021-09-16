<?php
function changerClass(string $classe)
{
    include $classe. '.php';   //on inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('changerClass');

include "conf.php";

try {
    $db= new PDO($dsn, $user, $password);
    //$db->setAttribut(PDO)::ATTR_EMULATE_PREPARES, false); 

if ($db){
    print('<br/>Lecture dans la base de données :');
    $request = $db->query('SELECT id, nom, `force`, degats, niveau, experience FROM personnages;');
    while ($ligne=$request->fetch(PDO::FETCH_ASSOC))
    {
        $perso= new Personnage($ligne);
        print('<br/>' . $perso->getNom() . ' a '.$perso->getForce() . ' de force, ' . $perso->getDegats().
        ' de degats '. $perso->getExperience(). ' d\'experience et est au niveau ' .$perso->getNiveau());
    }
    }
}
catch (PDOExeption $e){
    print('<br/>Erreur de connexion : ' . $e->getMessage());
}