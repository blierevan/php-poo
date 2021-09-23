<?php
// Présence du mot-clé class suivi du nom de la classe.
class Personnage
{
    // Déclaration des attributs et méthodes ici.
    private $_id = 0;
    private $_nom = 'Inconnu'; // Son nom, par défaut 'Inconnu'.
    private $_force = 50; // La force du personnage, par défaut à 50.
    private $_experience = 1; // Son expérience, par défaut à 1.
    private $_degats = 0; // Ses dégats par défaut
    private $_niveau = 0;
    // Déclarations des constantes en rapport avec la force.
    const FORCE_PETITE = 20;
    const FORCE_MOYENNE = 50;
    const FORCE_GRANDE = 80;
    // Variable statique PRIVÉE.
    private static $_texteADire = 'La partie est démarrée. Qui veut se battre !';
    private static $_nbreJoueurs = 0;
    public function __construct(array $ligne)
    {
        $this->hydrate($ligne);
        self::$_nbreJoueurs++;
        print('<br/> Le personnage "' . $this->getNom() . '" est créé !'); // Message s'affichant une fois que tout objet est créé.
    }
    

    // Un tableau de données doit être passé à la fonction (d'où le préfixe "array").
    public function hydrate(array $ligne)
    {
        $this->setNom($ligne['nom']); // Initialisation du nom du personnage
        $this->setForce((int) $ligne['force']); // Initialisation de la force.
        $this->setDegats($ligne['degats']); // Initialisation des dégâts.
        $this->setNiveau($ligne['niveau']); // Initialisation des dégâts.
        $this->setExperience(1); // Initialisation de l'expérience à 1.
        foreach ($ligne as $key => $value) {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function __toString(): string
    {
        return '<br/>Joueur ' . $this->getNom() . ' : Force = '
        . $this->getForce() . ' / Dégats = '
        . $this->getDegats() . ' / Expérience = '
        . $this->getexperience();
    }
    public function setId(int $id): Personnage
    {
        if (!is_int($id)) // S'il ne s'agit pas d'un texte.
        {
            trigger_error('L\'id d\'un personnage doit être un entier', E_USER_ERROR);
            return $this;
        }
        $this->_id = $id;
        return $this;
    }
    public function getId(): int
    {
        return $this->_id;
    }
    public function setNiveau(int $niveau): Personnage
    {
        if (!is_int($niveau)) // S'il ne s'agit pas d'un texte.
        {
            trigger_error('Le niveau d\'un personnage doit être un entier', E_USER_ERROR);
            return $this;
        }
        $this->_niveau = $niveau;
        return $this;
    }
    public function getNiveau(): int
    {
        return $this->_niveau;
    }
    public function setNom(string $nom): Personnage
    {
        if (!is_string($nom)) // S'il ne s'agit pas d'un texte.
        {
            trigger_error('Le nom d\'un personnage doit être un texte', E_USER_ERROR);
            return $this;
        }
        $this->_nom = $nom;
        return $this;
    }
    public function getNom(): string
    {
        return $this->_nom;
    }
    public function setForce(int $force): Personnage
    {
        if (!is_int($force)) // S'il ne s'agit pas d'un nombre entier.
        {
            trigger_error('La force d\'un personnage doit être un nombre entier', E_USER_WARNING);
            return $this;
        }
        if ($force > 100) // On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
        {
            trigger_error('La force d\'un personnage ne peut dépasser 100', E_USER_WARNING);
            return $this;
        }
        // On vérifie qu'on nous donne bien soit une "FORCE_PETITE", soit une "FORCE_MOYENNE", soit une "FORCE_GRANDE".
        if (in_array($force, array(self::FORCE_PETITE, self::FORCE_MOYENNE, self::FORCE_GRANDE))) {
            $this->_force = $force;
        } else {
            trigger_error('La force n\'est pas correcte', E_USER_ERROR);
            return $this;
        }
        return $this;
    }
    public function getForce(): int
    {
        return $this->_force;
    }
    public function setDegats(int $degats): Personnage
    {
        if (!is_int($degats)) // S'il ne s'agit pas d'un nombre entier.
        {
            trigger_error('Les degats d\'un personnage doit être un nombre entier', E_USER_WARNING);
            return $this;
        }
        $this->_degats = $degats;
        return $this;
    }
    public function getDegats(): int
    {
        return $this->_degats;
    }
    public function setExperience(int $experience): Personnage
    {
        if (!is_int($experience)) // S'il ne s'agit pas d'un nombre entier.
        {
            trigger_error('L\'expérience d\'un personnage doit être un nombre entier', E_USER_WARNING);
            return $this;
        }
        if ($experience > 100) // On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
        {
            trigger_error('L\'expérience d\'un personnage ne peut dépasser 100', E_USER_WARNING);
            return $this;
        }
        $this->_experience = $experience;
        return $this;
    }
    public function getExperience(): int
    {
        return $this->_experience;
    }
    // Une méthode augmentant l'attribut $experience du personnage.
    public function gagnerExperience(): Personnage
    {
        $this->_experience++;
        return $this;
    }
    public static function parler()
    { // Nous déclarons une méthode dont le seul but est d'afficher un texte.
        print('<br/><br/>Je suis le personnage n°' . self::$_nbreJoueurs . ' <br/>' . self::$_texteADire . '<br/>');
    }
    // Une méthode qui frappera un personnage (suivant la force qu'il a).
    public function frapper(Personnage $persoAFrapper): Personnage
    {
        $persoAFrapper->_degats += $this->_force;
        $this->gagnerExperience();
        print('<br/> ' . $persoAFrapper->getNom() . ' a été frappé par ' . $this->getNom());
        return $this;
    }
}