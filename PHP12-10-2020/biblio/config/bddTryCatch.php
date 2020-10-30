<?php try
{
    //Connexion de la base
    // PDO est une extension pour communiquer avec la BDD
    $link = new PDO('mysql:host=localhost;dbname=biblio', 'root', '');
    // Si jamais utf8 non setup
    $link->exec('SET NAMES "UTF8"');
}
// On affiche une erreur si probleme de connection PDO EXECEPTION
catch (PDOException $erreur)
{
    echo 'Erreur : '. $erreur->getMessage();
    die();
}