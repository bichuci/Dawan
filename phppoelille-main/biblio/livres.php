<?php
    require_once './config/bdd.php';

    $sql = "select id, titre, publication from livre";
    $result = mysqli_query($link, $sql);
    $livres = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_close($link);

    $page_title = "Liste des livres";
    require_once './template/header.php';
?>

<h2>Liste des livres disponibles</h2>

<?php if(count($livres) > 0): ?>
    <ul class="list">
    <?php foreach ($livres as $livre): ?>
        <li>
            <a href="./livre.php?id=<?php echo $livre['id']; ?>">
                <?php echo $livre['titre']; ?>
            </a> -
            <small>Date de publication: <?php echo $livre['publication']; ?></small>
        </li>
    <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Aucun livres disponibles pour le moment</p>
<?php endif; ?>

<?php require_once './template/footer.php'; ?>
