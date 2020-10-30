<?php
session_start();

if( !isset($_SESSION['id']) || empty($_SESSION['id']) ){
    header('Location: ./authentication.php');
    exit();
}

require_once './template/header.php';
?>

<p>Bienvenue sur la partie administrative de notre bibliothèque</p>

<p>Bonjour <?php echo $_SESSION['fullname']; ?> - <a href="deconnexion.php">Déconnexion</a></p>


<?php require_once './template/footer.php'; ?>

