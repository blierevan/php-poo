<?php
// Présence du mot-clé class suivi du nom de la classe.


Class Personnage {

    //déclration des attributs et méthodes ici.
    private $_id=0;
    private $nom= 'Inconnu';         //son nom par défaut
    private $_force= 50;              //La force su personnage
    private $_experience= 1;           //Son experience
    private $_degats= 0;         
    private $_niveau=0;       //Ses dégats

    const FORCE_PETITE=20;
    const FORCE_MOYENNE=50;
    const FORCE_GRANDE=80;

    private static $_textADire='La partie est démarré BASSSTONNN <br/>';
    private static $_nbreJoueurs=0;
    
    public function __construct(array $ligne)
    {
        $this->hydrate($ligne);
        self::$_nbreJoueurs++;
        print("<br/> Le personnage ".$ligne['nom']." est créé.");
    }   
    public function hydrate(array $ligne)
    {
        $this->setNom($ligne['nom']);
        $this->setNiveau($ligne['niveau']);
        $this->setForce($ligne['force']);
        $this->setDegats($ligne['degats']);
        $this->setExperience(1);
    
    }
    public function __toString():string
    {
        return $this->getNom();
    }
    public function setNiveau(int $niveau):Personnage
    {
        if (!is_string($niveau))//s'il ne s'agit pas d'un texte
        {
            trigger_error('Le niveau d\'un personnage doit être un entier',E_USER_ERROR);
            return $this;
        }
        $this->_niveau=$niveau;
        return $this;
    }
    public function setId (int $id):Personnage
    {
        if (!is_string($id))//s'il ne s'agit pas d'un texte
        {
            trigger_error('Le nom d\'un personnage doit être un texte',E_USER_ERROR);
            return $this;
        }
        $this->_id=$id;
        return $this;
    }
    public function setNom($nom):Personnage
    {
        if (!is_string($nom))//s'il ne s'agit pas d'un texte
        {
            trigger_error('Le nom d\'un personnage doit être un texte',E_USER_ERROR);
            return $this;
        }
        $this->_nom=$nom;
        return $this;
    }
    public function getNiveau():int
    {
        return $this->_niveau;
    }
    public function getId():int
    {
        return $this->_id;
    }
    public function getNom():string
    {
        return $this->_nom;
    }
    public function setForce(int $force):string
    {
        if (!is_int($force))//s'il ne s'agit pas d'un texte
        {
            trigger_error('Le force d\'un personnage doit être un nombre entier',E_USER_ERROR);
            return $this;
        }
        if ($force>100)//s'il ne s'agit pas d'un texte
        {
            trigger_error('Le force d\'un personnage ne peut pas dépasser 100',E_USER_ERROR);
            return $this;
        }
        if (in_array($force,array(self::FORCE_PETITE, self::FORCE_MOYENNE, self::FORCE_GRANDE)))
        {
            $this->_force=$force;
        }
        else {
            trigger_error('Le force n\'est pas correcte',E_USER_WARNING);
            return $this;
        }
        return $this;
    }
    public function getForce():int
    {
        return $this->_force;
    }
    public function setDegats(int $degats):Personnage
    {
        if (!is_int($degats))//s'il ne s'agit pas d'un texte
        {
            trigger_error('Les dégat d\'un personnage doit être un nombre entier',E_USER_ERROR);
            return $this;
        }
        if ($degats>100)//s'il ne s'agit pas d'un texte
        {
            trigger_error('Les dégats d\'un personnage ne peut pas dépasser 100',E_USER_ERROR);
            return $this;
        }
        $this->_degats=$degats;
        return $this;
    }

    public function getDegats():int
    {
        return $this->_degats;
    }
    
    public function setExperience(int $experience):Personnage
    {
        if (!is_int($experience))//s'il ne s'agit pas d'un texte
        {
            trigger_error('L\'experience d\'un personnage doit être un nombre entier',E_USER_ERROR);
            return $this;
        }
        if ($experience>100)//s'il ne s'agit pas d'un texte
        {
            trigger_error('L\'experience d\'un personnage ne peut pas dépasser 100',E_USER_ERROR);
            return $this;
        }
        $this->_experience=$experience;
        return $this;
    }
    public function getExperience():int
     {
        return $this->_experience;
     }

    public static function parler()
    {
        print("<br/>Je suis le personnage n°" . self::$_nbreJoueur . self::$_textADire);
    }

    //une méthode qui frappera un personnage selon ça force
     public function frapper(Personnage $adversaire):Personnage
     {
         
        $adversaire->_degats += $this->_force;
        $this->gagnerExperience();  
        print('<br/>'.$adversaire->getNom() .' a été frappé par '.$this->__toString(). '<br/> -> Dégats de '.$adversaire->__toString().' = '.$adversaire->getDegats());
        print('<br/>'.$this->getNom().' a reçu'. $this->getExperience().' point d\'expérience !<br/>');
        return $this;
     }

     //Une methode qui augmente l'experience du personnage
     public function gagnerExperience():Personnage
     {
        $this->_experience++;
        return $this;
     }
     


     

     
}


?>