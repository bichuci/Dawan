<?php
session_start();

ini_set('display_errors', true);

if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    header('Location: ../authentication.php');
    exit();
}

require_once dirname(__DIR__, 2) . '/config/bdd.php';

$sql = "select id, titre, publication from livre";
$result = mysqli_query($link, $sql);
$livres = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($link);

require_once '../template/header.php';
?>

<h2>Liste des livres</h2>
<p>
    <a href="./livre/edit.php">Ajouter un livre</a>
</p>

<table border="1" cellpadding="10" cellspacing="0" style="width:100%">
    <thead>
    <tr>
        <td style="width:5%">ID</td>
        <td>Titre</td>
        <td style="width:10%">Parution</td>
        <td style="width:15%"></td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($livres as $livre): ?>
        <tr>
            <td><?php echo $livre['id']; ?></td>
            <td><?php echo $livre['titre']; ?></td>
            <td><?php echo date_format(date_create($livre['publication']), 'd/m/Y'); ?></td>
            <td style="text-align: center">
                <a href="./livre/edit.php?id=<?php echo $livre['id']; ?>">Modifier</a> |
                <a href="./livre/delete.php?id=<?php echo $livre['id']; ?>">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


<?php require_once '../template/footer.php'; ?>

