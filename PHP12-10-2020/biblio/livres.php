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
        $livre['auteurs'][] = $auteur;
        $livres[] = $livre;
    }
    else
    {
        $livres[$key]['auteurs'][] = $auteur;
    }
}

mysqli_close($link);

$title = "Livres";
$page_title = "Bibliothèque";

require_once("./template/header.php"); 

?>

<body>
    <main class="container">
        <?php
        if(!empty($_SESSION['message']))
        {
            echo '<div class="alert alert-success" role="alert">
                                '.$_SESSION['message'].'
                        </div>';
            $_SESSION['message'] = "";
        }
        if(!empty($_SESSION['erreur']))
        {
            echo '<div class="alert alert-danger" role="alert">
                                '.$_SESSION['erreur'].'
                        </div>';
            $_SESSION['erreur'] = "";
        }
        ?>
        <div class="ligne bg-info"></div>
        <h1>Liste des livres disponibles</h1>
        <div class="ligne"></div>
            <table class="table table-dark table-bordered table-striped">
            <?php if(count($livres) > 0): ?>
                <thead>
                    <tr class="text-warning">
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Genre</th>
                        <th>Parution</th>
                        <th>Auteur</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($livres as $livre): ?>
                    <tr>
                        <td><a href="./livre.php?id=<?php echo $livre['id']; ?>">
                            <?php echo($livre['id']); ?>
                        </td>
                        <td><?php echo($livre['titre']); ?></td>
                        <td><?php echo($livre['description']) ?? " Non défini"; ?></td>
                        <td><?php

                            echo ($livre['genre']) ?? 'Non défini';

                            ?></td>
                        <td><?php echo($livre['publication']); ?></td>
                        <td>
                            <?php foreach($livre['auteurs'] as $key => $auteur){
                                echo($auteur['prenom'].' '.$auteur['nom']);
                                echo(count($livre['auteurs'])-1 != $key)? ", ": "";
                            }?>
                        </td>
                        <td class="d-flex"><a href="./edit.php?id=<?php echo($livre['id']) ?>" class="btn btn-info mr-1">Modifier</a><a href='./delete.php?id=<?php echo($livre['id']) ?>'" class="btn btn-danger">Supprimer</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            <?php else: ?>
            <p>Aucun livres disponibles pour le moment</p>
            <?php endif; ?>
            </table>

            <a href="index.php" class="btn btn-secondary">Retour</a>
            <a href='./add.php' class="btn btn-success">Ajouter</a>
            <div class="ligne bg-info"></div>
    </main>
</body>

<?php require_once("./template/footer.php"); ?>