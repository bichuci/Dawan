<?php
require_once './config/bdd.php';

$id = mysqli_real_escape_string($link, $_GET['id']);

$sql = "select titre, publication, resume from livre where id = ".$id;
$result = mysqli_query($link, $sql);
$livre = mysqli_fetch_assoc($result);

mysqli_close($link);

$page_title = "Détail";
require_once './template/header.php';
?>

    <h2>Détail</h2>
    <dl>
        <?php foreach ($livre as $key => $value): ?>
            <dt><b><?php echo ucfirst($key); ?></b></dt>
            <?php if ( "publication" == $key && $value != null ):
                $date = date_create($value);
            ?>
                <dd><?php echo date_format($date, 'd/m/Y'); ?></dd>
            <?php else: ?>
                <dd><?php echo $value; ?></dd>
            <?php endif; ?>
        <?php endforeach; ?>
    </dl>


<?php require_once './template/footer.php'; ?>
