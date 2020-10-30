<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?? $page_title ?? null; ?> :: Bibliothèque</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<header>
    <h1><?php echo $page_title ?? null; ?></h1>
    <hr />
</header>
<nav>
    <ul class="navigation">
        <li><a href="./">Accueil</a></li>
        <li><a href="./livres.php">Les livres</a></li>
    </ul>
</nav>
<section>