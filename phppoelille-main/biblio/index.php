<?php
    $page_title = "Accueil";

    require_once './template/header.php';
?>

<p>Bienvenue sur notre projet de CMS Bibliothèque.</p>
<p>Présentation de la super global $_GET</p>

<p>url params (queryparams): index.php?lang=fr&page=1</p>

<p>
    <a href="index.php?name=<?php echo rawurlencode('john doe') ?>">Faire coucou à john</a>
</p>

<?php if ( isset($_GET['name']) && !empty( trim($_GET['name']) ) ): ?>
    <p>Hello <?php echo htmlentities($_GET['name']); ?></p>
<?php endif; ?>

<p>
    <a href="index.php?id=1">ID = 1</a>
</p>

<?php if ( isset($_GET['id']) && !empty( trim($_GET['id']) ) ): ?>
    <?php var_dump($_GET['id']); ?>
    <p> is_int($_GET['id']) ? <?php echo (is_int($_GET['id'])) ? 'true': 'false'; ?></p>
    <p> is_int( intval($_GET['id']) ) ? <?php echo (is_int( intval($_GET['id']) )) ? 'true': 'false'; ?></p>
<?php endif; ?>

<?php require_once './template/footer.php'; ?>