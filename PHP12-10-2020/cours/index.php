<?php



 //   Les boucles :

    // for -
    // foreach => permet de boucler sur un tableau ( => un tableau est un itérable, c'est un ensemble de valeur qui commence à l'id 0)
    // while =>
    // do while

    // if
    // switch

    

// Les types de variables
/**
 *  Primitive :
 *  String
 *  int 
 *  float
 *  boolean
 *  char
 * 
 *  Référence :
 *  array
 *  objet
 */


$name = "Aurélien"; // Initialisation de la variable => ne pas déclarer de valeur est une mauvaise pratique car on ne sait pas quel type de valeur il va y'avoir dedans
$boolean = true; // false
$int = 10; // entier

// Les opérateurs conditionnels
/** >, >=, <, <=
 *  ==, ===, !==, !===
 *  ! -> not
 */

// if (conditions (boolean)) { }
$poids = 1000;
$prix = 500;

// ternaire (conditions) ? si vrai : si faux;

$num = 0;

// Les opérateurs logiques
/**
 *  || or (Si la premiere est vrai retourne vrai OU si la seconde est vrai retourne vrai)
 *  && and (les 2 conditions doivent etre vrais)
 *  xor (soit l'un soit l'autre est vrai, si les deux sont vrais alors la condition est fausse)
 */

$date = date('N');

// $a = 10;
// $a = $a + 1;
// $a += 1;

$user = ['User #1', 'User #2', 'User #3', 'User #4']; // php 5.4 [] ou array() sinon array() 
?>

<?php require_once("./header.php"); ?>
<title>Php</title>
</head>
<body>
    <main class="container border-left border-right">
    <h1><?= "Hello World, my name is : ". $name ?></h1>
    <p>
        <?php if($boolean){
        echo "Le boolean est vrai!";
        } ?>
    </p>

    <p> <h5>Conditions if :</h5>
        <?php if($poids>1000 || $prix > 500){
            echo("Frais de ports offert");
        }else
        {
            echo("Dans le cul, lulu");
        } ?>
    </p>
    <p> <h5>Ternaire :</h5>
        <?=
            ($poids >=1000 || $prix >= 500) ? "Frais de port offert" : "Frais de port non-offert";
        ?>
    </p>
    <p> <h5>Conditions if, else if, else :</h5>
        <?php
            if($num > 0){
                echo("La valeur est positive");
            }elseif($num <0)
            {
                echo("La valeur est négative");
            }else
            {
                echo("La valeur est égale à 0");
            }
        ?>
    </p>
    <p> <h5>Utilisation du switch et date :</h5>
        <?php
            switch($date){
                case 1:
                    echo("Nous sommes lundi");
                break;
                case 2:
                    echo("Nous somme mardi");
                break;
                case 3:
                    echo("Nous somme mercredi");
                break;
                case 4:
                    echo("Nous somme jeudi");
                break;
                case 5:
                    echo("Nous somme vendredi");
                break;
                case 6:
                case 7:
                    echo("WEEK END!");
                break;
                default:
                    echo("Impossible!");
            }
        ?>
    </p>
    <p> <h5>La boucle for</h5>
            <?php
                for($i = 0; $i <10 ; $i++)
                {
                    // Concaténation = addition de chaine de caractère
                    echo("$i = ". $i. " - ");
                    echo('$i = '.$i."<br />");
                }
            ?>
    </p>
    <p> <h5>La boucle While</h5>
            <?php
                $w = 10;
                while( $w > 0)
                {
                    echo ('$w = ' .$w. " -> ");
                    $w--;
                }
            ?>
    </p>
    <p> <h5>Les tableaux</h5>
            <?php
                echo($user[0]."<br />");
                echo count($user);

                // Ajout d'une valeur dans le tableau
                $user[] = 'User #5';
                echo("<br />");
                echo (count($user));
                $user[0] = 'User #0';
                echo("<br />");

                foreach ($user as $name)
                {
                    echo ("Bonjour ".$name."<br />");
                };

                echo("<br />");

                foreach($user as $key => $value)
                {
                    echo $key."  ".$value."<br />";
                }
            ?>
    </p>
    <p>
        <h5>Les dictionnaires</h5>
        <?php
            $person = [
                        'name' => 'Doe',
                        'firstname' => 'John',
                        'age' => 30
            ];

            echo($person['firstname'].'  '.$person['name'].'  '.$person['age'] );

            echo("<br />");
            // Parcourir le tableau avec le foreach
            foreach($person as $key => $value)
            {
                echo ucfirst($key)." = ".$value."<br />";
            }

            // retourne uniquement les ids
            print_r(array_keys($person)); // r siginifie récursive
            echo("<br />");
            print_r(array_values($person));
            

            
        ?>
    </p>
    <p>
        <h5>Les fonctions</h5>
        <?php 
            //fonction -> return
            //void -> (/) 
    
            function addition(int $a, int $b = 0): int {
                return $a + $b;
            }

            echo("10 + 0 = ". addition(10));
            echo"<br />";
            echo("10 + 20 = ".addition(10,20));
        ?>
    </p>
    </main>

</body>
<?php require_once("./footer.php"); ?>
</html>