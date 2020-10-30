<?php
    // On démarre la session qui utilise la super globale $_SESSION
    session_start();


    if( !isset($_SESSION['id']) || empty($_SESSION['id']))
    {
        header('Location: ./authentication.php');
        exit();
    }

    // J'ouvre la connexion à la BDD
    require_once("../config/bbd.php");



    // Je ferme la connexion de la BDD
    mysqli_close($link);


    $title = "Authentification";
    $page_title = "Mon compte";

    require_once("../template/header.php");
?>

    <body>
        <main class="container">
            <div class="ligne bg-info"></div>
            <p> Bienvenue sur la partie administrative de notre bibliothèque</p>
            <p> Bonjour <?php echo $_SESSION['fullname']; ?></p>  <a href="deconnexion.php">Déconnexion</a>
        </main>
    </body>

    <?php require_once("../template/footer.php"); ?>