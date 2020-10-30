<?php
session_start();

    // On vérifie si le formulaire est bien envoyé
    if($_POST)
    {
        // Je vérifie si les champs du formulaire sont bien remplis
        if( isset($_POST['titre'])&& !empty($_POST['titre']) &&
            isset($_POST['publication'])&& !empty($_POST['publication'])&&
            isset($_POST['description'])&& !empty($_POST['description']))
        {
            // On se connecte a la bdd une fois les tests effectués
            require_once("./config/bddTryCatch.php");
            $titre = htmlentities(trim($_POST['titre']));
            $publication = htmlentities(trim($_POST['publication']));
            $description = htmlentities(trim($_POST['description']));




            // On crée la requête SQL
            $sql ="INSERT INTO `livres` (`titre`, `publication`, `description`) VALUES (:titre, :publication, :description)";


            $query = $link->prepare($sql);

            $query->bindValue(':titre', $titre, PDO::PARAM_STR);
            $query->bindValue(':publication', $publication, PDO::PARAM_STR);
            $query->bindValue(':description', $description, PDO::PARAM_STR);

            $query->execute();

            // Un message pour dire que produit ajouté
            $_SESSION['message'] = "Livre ajouté avec succés";


            // Je ferme l'accès a la base de données
            mysqli_close($link);
            header("Location: ./livres.php");
        }
        else
        {
            $_SESSION['erreur'] = 'Le formulaire est incomplet';
        }
    }

    $title = "Ajouter";
    $page_title = "Ajouter";

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
        <h2>Ajouter un produit dans la bibliothèque</h2>
        <div class="ligne bg-info"></div>
        <form class="form" method="post">
            <div class="form-group">
                <label class="mt-1" for="titre">Entrer le titre :</label>
                <input class="form-control" type="text" name="titre" id="titre" value="">
            </div>
            <div class="form-group">
                <label class="mt-1" for="publication">Entrer la date de publication :</label>
                <input class="form-control" type="date" name="publication" id="publication" value="">
            </div>
            <div class="form-group">
                <label class="mt-1" for="description">Entrer la description :</label>
                <textarea class="form-control" type="text" name="description" id="description" value=""></textarea>
            </div>

            <a href="livres.php" class="btn btn-secondary mt-2">Retour</a>
            <button class="btn btn-success mt-2">Ajouter</button>
        </form>
    </main>
</body>

