<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administration Bibliothèque</title>
    <link rel="stylesheet" href="/phppoelille/biblio/css/style.css" />
    <base href="/phppoelille/biblio/admin/" />
</head>
<body>
<header>
    <h1>Administration</h1>
    <hr />
</header>
<?php if (isset($_SESSION['id']) && !empty($_SESSION['id'])) : ?>
<nav>
    <ul class="navigation">
        <li><a href="">Accueil</a></li>
        <li><a href="livre/">Les livres</a></li>
        <li><a href="deconnexion.php">Déconnexion</a></li>
    </ul>
</nav>
<?php endif; ?>
<section>