<?php
session_start();
require_once("./config/bbd.php");

$sql = "SELECT `l`.`id`, `titre`,`l`.`description`, `publication`, `g`.`nom` AS `genre`, `auteur`.`nom`, `auteur`.`prenom` FROM `livres` AS `l` LEFT JOIN `genre` AS `g` ON `l`.`genre` = `g`.`id` JOIN `livres_auteur` AS `la`ON `l`.`id` = `la`.`livres` JOIN `auteur` ON `auteur`.`id` = `la`.`auteur`";
$result = mysqli_query($link, $sql);
// MYSQLI_ASSOC est un tableau associatif
$datas = mysqli_fetch_all($result, MYSQLI_ASSOC);

$livreModel = ['id', 'titre', 'description', 'publication', 'genre'];
$auteurModel = ['nom', 'prenom'];

$livres = [];

foreach($datas as $data)
{
    // array_intersect_key => Calcule l'intersection de deux tableaux en utilisant les clés de comparaison
    // array_intersect_key() => retourne un tableau contenant toutes les entrées du tableau array1 qui contiennent des clés présentes dans tous les tableaux passés en arguments.
    // -----------------------------------------------------------------------//
    // array_flip => Remplace les clés par les valeurs, et les valeurs par les clés
    // array_flip() retourne un tableau dont les clés sont les valeurs du précédent tableau array, et les valeurs sont les clés.
    $livre = array_intersect_key($data, array_flip($livreModel));
    $auteur = array_intersect_key($data, array_flip($auteurModel));

    $key = array_search($livre['id'], array_column($livres, 'id'));

    if($key == false)
    {
        // j'insere la valeur auteur dans le tableau $livres[]
        $livre['auteur'][] = $auteur;
        $livres[] = $livre;
    }
    else
    {
        $livres[$key]['auteur'][] = $auteur;
    }
}

var_dump($livres);




mysqli_close($link);

$title = "Jointures";
$page_title = "Bibliothèque";

require_once("./template/header.php");
