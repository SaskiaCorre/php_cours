<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les classes</title>
</head>
<body>
    <h1>Les classes en php</h1>
    <p>Ici, Ennemi est l'enfant de Joueur.</p>
    <p>La classe du parent est déclarée "protect", tandis que celle des enfants est "public"</p>
</body>
</html>

<?php
    class Joueur {
        protected $vie;
        protected function getVie() {
            $this->vie = 100;
            echo "Pts de vie Joueur : " . $this->vie . "\n";
        }

        public const NB_INVENTAIRE_MAX = 10;
    }

    class Ennemi extends Joueur {
        public function getVie() {
            parent::getVie(); // Cette ligne permet d'appeler la même méthode du parent
            $this->vie = 120;
            echo "<p>Pts de vie Ennemi : " . $this->vie."</p>";
        }

        public const NB_INVENTAIRE_MAX = 5;
        public function getNbInventaireMax() {
            echo "</br>Inv max ennemi: " . self::NB_INVENTAIRE_MAX . "<br/>";
            echo "Inv max joueur: " . parent::NB_INVENTAIRE_MAX;
        }
    }
    
    echo "<h3>Parents-Enfants</h3>
    <p>Lorsqu’on redéfinit une méthode (non privée) ou une propriété (non privée) dans une classe enfant, on dit qu’on “surcharge” la méthode/propriété de la classe mère.
    <br>Ainsi, les objets créés à partir de la classe enfant utiliseront les méthodes/propriétés de la classe fille au lieu de celle de la classe parent.
    <br>NB : Le double (:) symbolise l’opérateur de résolution de portée.
    <br>Il existe 3 mots-clés pour accéder à différents éléments d’une classe: parent, self, static.</p>";
    $ennemi = new Ennemi();
    var_dump($ennemi->getVie());
    
    echo "<h3>Les constantes</h3>
    <p>Les constantes sont des conteneurs qui ne peuvent recevoir qu’une seule et unique valeur durant la durée de l’exécution d’un script. 
    Leur valeur n’est donc pas modifiable.
    </br>Pour définir une constante de classe, on utilise le mot-clé const suivi du nom de la constante sans le sigle $. Les constantes peuvent depuis peu avoir un niveau de visibilité (public, protected, private).
    </br> NB : Si aucune visibilité n’est précisée, la valeur sera publique par défaut.</p>";
    echo($ennemi->getNbInventaireMax()."</br>Valeur joueur : ".Joueur::NB_INVENTAIRE_MAX."
    </br>Valeur ennemi : ".Ennemi::NB_INVENTAIRE_MAX);

    echo "<h3>Les classes static</h3>
    <p>Les propriétés/méthodes statiques ne vont pas appartenir à une instance de classe ou à un objet mais à la classe dans laquelle elles ont été définies.
    </br>Ces propriétés/méthodes vont donc partager leurs définitions et leurs valeurs entre les instances et seront accessibles sans avoir à instancier notre classe.
    Pour définir une méthode/propriété comme statique, on utilisera le mot-clé static.
    </br>Vu qu’une propriété/méthode ne peut être accédée depuis un objet, nous ne pourrons pas utiliser l’opérateur objet (->), nous utiliserons l’opérateur de résolution de portée (::).
    </br>NB : attention propriété statique est différente de constante de classe</p>";
    class Test {
        public static $counter = 0;
    }
    $test1 = new Test();
    echo "<p>Résultat test1 : ".Test::$counter."</p>";
    Test::$counter++;
    $test2 = new Test();
    echo "<p>Résultat test2 : ".Test::$counter."</p>";

    echo "<h3>Les classes abstraites</h3>
    <p>Une classe abstraite ne peut pas être instanciée directement.    
    </br>Dans une classe abstraite, seule la signature (le nom et les paramètres) peut être déclarée sans implémentation.
    </br>Pour la définir, nous utilisons le mot-clé abstract.
    </br>NB : Si une classe possède une méthode abstraite, elle devra aussi être définie comme abstraite.</p>";

    abstract class Vehicule {
        abstract function demarrer();
    }
    class Citadine extends Vehicule {
        public function demarrer() {
            echo "<p>Fonction demarrer() de la classe enfant \"citadine\", instance de la classe parent \"véhicule\" : Vroom</p>";
        }
    }
    class SuperSportive extends Vehicule {
        public function demarrer() {
            echo "<p>Fontion demarrer de la SuperSportive : Vroooooooooooom!!</p>";
        }
    }
    $citadine = new Citadine();
    $citadine->demarrer();
    $super = new SuperSportive();
    $super->demarrer();
        
    echo "<h4>Avec polymorphisme, les classes ont bien défini la méthode \"bouger\".</h4>
    <p>Il faut définir la/les fonction/s provenant d’une interface, contrairement à une classe abstraite.</p>";
    interface Sport2{
        public function bouger2();
    }
    class Nager2 implements Sport2 {
        public function bouger2(){
            return'Il nage';
        }
    }
    class Marcher2 implements Sport2 {
        public function bouger2(){
            return 'Il marche';
        }
    }

    echo "<h3>Le polymorphisme</h3>
    <p>Le polymorphisme décrit un modèle dans la POO dans lequel les classes ont des fonctionnalités différentes tout en partageant une interface commune.
    Celui-ci permet de ne pas faire de méthodes avec des multiples conditions qui peuvent faire désordre.
    </br>On crée un objet qu’on implémente et on définit son comportement.</p>
    <h4>Exemple sans polymorphisme (ça ne marche pas) : ici , les classes n’ont pas défini \"bouger\", une erreur survient.</h4>";

    interface Sport{
        public function bouger();
    }
    class Nager implements Sport {
    }
    class Marcher implements Sport {
    }
?>