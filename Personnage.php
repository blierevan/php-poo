<?php
// Présence du mot-clé class suivi du nom de la classe.


Class Personnage {

    //déclration des attributs et méthodes ici.

    private $nom= 'Inconnu';         //son nom par défaut
    private $_force= 50;              //La force su personnage
    private $_experience= 1;           //Son experience
    private $_degats= 0;                //Ses dégats

    public function __construct($nom, $force=50, $degats=0)
    {
        $this->setnom($nom);
        $this->setforce( $force);
        $this->setdegats($degats);
        $this->setexperience(1);
        print("<br/> Le personnage ".$nom." est créé.");
    }
    public function __toString()
    {
        return $this->getNom(). " (" .$this->getDegats() . ") ";
    }
    public function setNom($nom)
    {
        if (!is_string($nom))//s'il ne s'agit pas d'un texte
        {
            trigger_error('Le nom d\'un personnage doit être un texte',E_USER_ERROR);
            return;
        }
        $this->_nom=$nom;
    }
    public function getNom()
    {
        return $this->_nom;
    }
    public function setForce($force)
    {
        if (!is_int($force))//s'il ne s'agit pas d'un texte
        {
            trigger_error('Le force d\'un personnage doit être un nombre entier',E_USER_ERROR);
            return;
        }
        if ($force>100)//s'il ne s'agit pas d'un texte
        {
            trigger_error('Le force d\'un personnage ne peut pas dépasser 100',E_USER_ERROR);
            return;
        }
        $this->_force=$force;
    }
    public function getForce()
    {
        return $this->_force;
    }
    public function setDegats($degats)
    {
        if (!is_int($degats))//s'il ne s'agit pas d'un texte
        {
            trigger_error('Les dégat d\'un personnage doit être un nombre entier',E_USER_ERROR);
            return;
        }
        if ($degats>100)//s'il ne s'agit pas d'un texte
        {
            trigger_error('Les dégats d\'un personnage ne peut pas dépasser 100',E_USER_ERROR);
            return;
        }
        $this->_degats=$degats;
    }

    public function getDegats()
    {
        return $this->_degats;
    }
    
    public function setExperience($experience)
    {
        if (!is_int($experience))//s'il ne s'agit pas d'un texte
        {
            trigger_error('L\'experience d\'un personnage doit être un nombre entier',E_USER_ERROR);
            return;
        }
        if ($experience>100)//s'il ne s'agit pas d'un texte
        {
            trigger_error('L\'experience d\'un personnage ne peut pas dépasser 100',E_USER_ERROR);
            return;
        }
        $this->_experience=$experience;
    }
    public function getExperience()
     {
        return $this->_experience;
     }

    public function parler()
    {
        print("Je suis un personnage");
    }

    //une méthode qui frappera un personnage selon ça force
     public function frapper(Personnage $adversaire)
     {
        $adversaire->_degats += $this->_force;
        $this->gagnerExperience();  
        print('<br/>'.$adversaire->getNom() .' a été frappé par '.$this. ' -> Dégats de'.$adversaire.' = '.$adversaire->getDegats());
     }

     //Une methode qui augmente l'experience du personnage
     public function gagnerExperience()
     {
        $this->_experience++;
     }


     

     
}


?>