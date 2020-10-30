<?php

session_start();


    if (isset($_GET['id']) && !empty($_GET['id'])) {

        require_once("./config/bddTryCatch.php");

        // On nettoie l'id
        $id = strip_tags($_GET['id']);

        // JE crée la requête sql
        $sql = "SELECT * FROM `livres` WHERE `id`=:id";

        //On prépare la requête SQL
        $query = $link->prepare($sql);

        // On accroche les paramètres
        $query->bindValue(':id', $id, PDO::PARAM_INT);

        // On éxecute la requête
        $query->execute();

        $livre = $query->fetch();

        if (!$livre) {
            $_SESSION['erreur'] = "Cet id n'existe pas";
            header("Location: index.php");
            exit();
        }

        // Je crée la requete de suppression
        $sql = "DELETE FROM `livres` WHERE `id` = :id;";

        $query = $link->prepare($sql);

        $query->bindValue(':id', $id, PDO::PARAM_INT);

        $query->execute();

        $_SESSION['message'] = "Produit supprimé";
        header("Location: ./livres.php");
    } else {
        $_SESSION['erreur'] = "URL invalide";
        header("Location: index.php");
    }
