<?php
session_start();

if($_POST)
{

    // Je vérifie si les champs du formulaire sont bien remplis
    if( isset($_POST['id'])&& !empty($_POST['id']) &&
        isset($_POST['titre'])&& !empty($_POST['titre']) &&
        isset($_POST['publication'])&& !empty($_POST['publication'])&&
        isset($_POST['description'])&& !empty($_POST['description']))
    {

        // On se connecte a la bdd une fois les tests effectués
        require_once("./config/bddTryCatch.php");
        $id = strip_tags($_POST['id']);
        $titre = strip_tags($_POST['titre']);
        $publication = strip_tags($_POST['publication']);
        $description = strip_tags($_POST['description']);

        // On crée la requête SQL
        $sql ="UPDATE `livres` SET `titre` = :titre, `publication` = :publication, `description` = :description WHERE `id` = :id";


        $query = $link->prepare($sql);

        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':titre', $titre, PDO::PARAM_STR);
        $query->bindValue(':publication', $publication, PDO::PARAM_STR);
        $query->bindValue(':description', $description, PDO::PARAM_STR);

        $query->execute();

        // Un message pour dire que produit ajouté
        $_SESSION['message'] = "Produit modifié avec succés";

        // Je ferme l'accès a la base de données
        mysqli_close($link);
        header("Location: ./livres.php");
    }
    else
    {
        $_SESSION['erreur'] = 'Le formulaire est incomplet';
        header("Location: ./index.php");
    }
}

if(isset($_GET['id']) && !empty($_GET['id']))
{
    // JE me connecte a la BDD
    require_once('./config/bddTryCatch.php');

    // On nettoie l'id envoyé contre injection sql
    $id = strip_tags($_GET['id']);

    $sql ='SELECT * FROM `livres` WHERE `id` = :id;';

    // On prepare requete
    $query = $link->prepare($sql);

    // On "accroche" les paramètres (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    //On execute la requete
    $query->execute();

    // on recupere le produit
    $livre = $query->fetch();

    // on verifie si le produit existe
    if(!$livre)
    {
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header("Location: index.php");
    }
}
// SI il n'existe pas ou il n'y en a pas dans la bbd ALORS on redirige vers l'acceuil + alert ( produit inconnu )
else
{
    $_SESSION['erreur'] = "URL invalide";
    header("Location: index.php");
}

$title = "Modifier";
$page_title = "Modifier";

require_once("./template/header.php");
?>
<body>
<main class="container">
    <?php
    if(!empty($_SESSION['erreur']))
    {
        echo '<div class="alert alert-danger" role="alert">
                                '.$_SESSION['erreur'].'
                        </div>';
        $_SESSION['erreur'] = "";
    }
    ?>
    <h2>Modifier un produit dans la bibliothèque</h2>
    <div class="ligne bg-info"></div>
    <form class="form" method="post">
        <div class="form-group">
            <label class="mt-1" for="titre">Entrer le titre :</label>
            <input class="form-control" type="text" name="titre" id="titre" value="<?php echo ($livre['titre'])?>">
        </div>
        <div class="form-group">
            <label class="mt-1" for="publication">Entrer la date de publication :</label>
            <input class="form-control" type="date" name="publication" id="publication" value="<?php echo($livre['publication'])?>">
        </div>

        <label class="mt-1" for="description">Entrer la description :</label>
        <textarea class="form-control" type="text" name="description" id="description"><?php echo($livre['description'])?></textarea>
        <!-- NE SURTOUT PAS OUBLIER DE METTRE UN INPUT HIDDEN POUR AJOUTER L'ID, SINON BUG -->
        <input type="hidden" value="<?php echo($livre['id'])?>" name="id">
        <a href="livres.php" class="btn btn-secondary mt-2">Retour</a>
        <button class="btn btn-success mt-2">Modifier</button>
    </form>
</main>
</body>
}