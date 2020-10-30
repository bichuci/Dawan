<?php
    require_once("./config/bbd.php");

    $id = mysqli_real_escape_string($link, $_GET['id']);


    $sql = "SELECT `titre`, `publication`, `description` FROM `livres` WHERE `id` = ".$id;
    $result = mysqli_query($link, $sql);
    // MYSQLI_ASSOC est un tableau associatif
    $livre = mysqli_fetch_assoc($result);

    // JE ferme la connexion
    mysqli_close($link);

    $title = "Détails";
    $page_title = "Bibliothèque";

    require_once("./template/header.php");


?>
<body>
    <main class="container">
        <h2>Détail</h2>
        <div class="ligne bg-info"></div>
        <dl class="list">
            <?php foreach($livre as $key => $value):?>

                <dt><?php echo ucfirst($key); ?></dt>
                <?php if("publication" === $key && $value != null):
                    $date = date_create($value);

                    ?>
                    <dd><?php echo date_format($date, "d/m/Y"); ?></dd>
                <?php else: ?>
                    <dd><?php echo $value; ?></dd>
                <?php endif; ?>
            <?php endforeach; ?>
        </dl>
        <a href="index.php" class="btn btn-secondary mr-1 mb-1">Retour</a>
        <a href="./edit.php" class="btn btn-info mr-1 mb-1">Modifier</a>
        <a href='./delete.php' class="btn btn-danger mb-1">Supprimer</a>
    </main>
</body>







<?php require_once("./template/footer.php"); ?>
