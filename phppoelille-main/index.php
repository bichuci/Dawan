<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

echo "<h1>Hello World</h1>"; // print()

// variable
/*
 * Primitive
 * String
 * int
 * float
 * boolean
 *
 * Référence
 * array
 * object
 */
$name = "Stéphane"; // initialisation = déclaration + affectation
$boolean = true; // false
$int = 10;

// IF

/*
 * Opérateurs conditionnels
 *
 * >
 * <
 * <=
 * >=
 * ==
 * !=
 * ===
 * !==
 * ! -> not
 */

/*
 * || or
 * && and
 * xor
 */

var_dump( 1 == 1 );

// if( conditions (boolean) ) { }

if ($boolean) {
    echo "boolean est vrai";
}

$poids = 1000;
$prix = 500;

if( $poids > 1000 || $prix > 500 ) {
    echo "Frais de ports offert";
}

// ternaire ( conditions ) ? si vrai : si faux ;

$num = 0;

if ( $num > 0 ){
    echo "la valeur est positive";
} else if( $num < 0 ){
    echo "la valeur est négative";
} else {
    echo "la valeur est égale à 0";
}

echo "\r\n";
echo "\r\n";

$date = date('N');

switch ($date) {
    case 1:
        echo "nous sommes lundi";
        break;
    case 2:
        echo "nous sommes mardi";
        break;
    case 3:
        echo "nous sommes mercredi";
        break;
    case 4:
        echo "nous sommes jeudi";
        break;
    case 5:
        echo "nous sommes vendredi";
        break;
    case 6:
    case 7:
        echo "WEEK EEEENNNNDDDD !!!!!";
        break;
    default:
        echo "Impossible !";
}

// $a = 10;
// $a = $a + 1;
// $a += 1;

echo "<br />";
// concaténation = addition de chaine de caractère .
for($i = 0; $i < 10; $i++){
    echo "$i = ".$i." ";
    echo '$i = '.$i."<br />";
}

$w = 10;
while( $w > 0 ){
    echo '$w = '.$w;
    $w--;
}

// php 5.4 [] ou array() sinon array()
// indexé (comme à 0)
$user = ['User #1', 'User #2', 'User #3', 'User #4'];

echo "<br />";
echo "Les tableaux";
echo "<br />";
echo $user[0];
echo "<br />";
echo count($user);

$user[] = 'User #5';
echo "<br />";
echo count($user);
$user[0] = 'User #0';

foreach ($user as $name) {
    echo "Bonjour ".$name. "<br />";
}

echo "<br />";
echo sprintf("Bonjour %s, comment allez vous ce %s ? %d",
    $name, "jour", 10.5);
echo "<br />";

echo "<br />Les Dictionnaires<br />";

$person = [
    'name' => 'Doe',
    'firstname' => 'John',
    'age' => 30
];

echo "<br />";
echo $person['firstname'].' '.$person['name'];
echo "<br />";

foreach ($person as $key => $value){
    echo ucfirst($key)." = ".$value."<br />";
}

print_r($person);
echo "<br />";
print_r( array_keys($person) );
echo "<br />";
print_r( array_values($person) );

// function -> return
// void -> (/)
function addition(int $a, int $b = 0): int {
    return $a + $b;
}
echo "<br /><br />";
// echo "10 + 0 = " . addition(10);

$resultat = addition(10);
echo "10 + 0 = ".$resultat;

echo "<br />";
echo "10 + 20 = " . addition(10.5, 20);






