<?php
// Présence du mot-clé class suivi du nom de la classe.


Class Personnage {

    //déclration des attributs et méthodes ici.

    private $_nom= 'Inconnu';         //son nom par défaut
    private $_force= 50;              //La force su personnage
    private $_experience= 1;           //Son experience
    private $_degats= 0;                //Ses dégats

    public function definirForce($force)
    {
        $this->_force=$force;
    }

    public function definirDegats($degats)
    {
        $this->_degats=$degats;
    }

    public function afficherDegats()
    {
        return $this->_degats;
    }
    
    public function definirExperience($experience)
    {
        $this->_experience=$experience;
    }

    public function parler()
    {
        print("Je suis un personnage");
    }

    //une méthode qui frappera un personnage selon ça force
     public function frapper($adversaire)
     {
        $adversaire->_degats += $this->_force;
        $this->gagnerExperience();
     }

     //Une methode qui augmente l'experience du personnage
     public function gagnerExperience()
     {
        $this->_experience++;
     }

     public function afficherExperience()
     {
        return $this->_experience;
     }

     
}


?>