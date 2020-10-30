<?php
session_start();
$title = "Accueil";
$page_title = "Accueil";

require_once "./template/header.php" 

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
            <div class="ligne"></div>
            <p>Bienvenue sur notre projet de CMS Bibliothèque</p>

<a href="index.php?name=<?= rawurldecode('Aurelien Walter')?>"> Faire coucou à Aurélien</a>
            
            <?php if( isset($_GET['name']) && !empty(trim($_GET['name']))): ?>
                <p>Hello <?= htmlentities($_GET['name']) ?></p>
            <?php endif; ?>

<a href="index.php?name=<?= rawurldecode('Aurelien Walter')?>"> Faire coucou à Aurélien</a>
            
            <?php if( isset($_GET['id']) && !empty(trim($_GET['id']))): ?>
            </p><p> is_int($_GET['id']) ?'true': 'false' <?= is_int($_GET['id']) ?'true': 'false' ?></p>
            <p>is_int(intval($_GET['id'])) ? <?= is_int(intval($_GET['id'])) ? 'true' : 'false' ?></p>
            <?php endif; ?>
        
            <!-- REQUETE DELETE DYNAMIQUE -->

        </main>
    </body>
<?php require_once "./template/footer.php" ?>