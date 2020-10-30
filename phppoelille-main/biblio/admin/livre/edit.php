<?php
session_start();

ini_set('display_errors', true);

if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    header('Location: ../authentication.php');
    exit();
}

require_once dirname(__DIR__, 2) . '/config/bdd.php';

if ( isset($_GET['id']) && $_GET['id'] != null ) {
    $id = (int) $_GET['id'];

    $sql = "select id, titre, resume, publication from livre where id = ".mysqli_real_escape_string($link, $id);
    $result = mysqli_query($link, $sql);

    if( mysqli_num_rows($result) == 1 ){
        list($id, $titre, $resume, $publication) = mysqli_fetch_row($result);
    } else {
        exit('404');
        // header('Location: 404.php');
    }
}

$errors = [];
$isSubmit = false;
$isValid = true;
$message = null;

$action = (isset($id) && $id > 0) ? "Modifier": "Ajouter";

if( !empty($_POST) ){

    $isSubmit = true;

    $titre = htmlentities(trim($_POST['titre']));
    $publication = htmlentities(trim($_POST['publication']));
    $resume = htmlentities(trim($_POST['resume']));

    if( $titre == null ){
        $errors[] = "Le titre est obligatoire";
    }

    if( count($errors) > 0 ){
        $isValid = false;
    } else {
        $titre = mysqli_real_escape_string($link, $titre);
        $publication = mysqli_real_escape_string($link, $publication);
        $resume = mysqli_real_escape_string($link, $resume);

        if( isset($id) && $id > 0 ) {
            // update
            $sql = "update livre set titre='".$titre."', resume = '".$resume."', publication = '".$publication."' where id = ".$id;

            if( !mysqli_query($link, $sql) ){
                $isValid = false;
                $errors[] = "Erreur d'insertion: ".mysqli_error($link);
            } else {
                $message = "Modification terminée";
            }

        } else {
            // insert
            $sql = "insert into livre (titre, resume, publication) value ('".$titre."', '".$resume."', '".$publication."')";

            if( mysqli_query($link, $sql) ){
                header('Location: ./');
            } else {
                $isValid = false;
                $errors[] = "Erreur d'insertion: ".mysqli_error($link);
            }
        }

    }

}

mysqli_close($link);

require_once '../template/header.php';
?>

<h2>Liste des livres</h2>
<p>
    <a href="./livre/">Retour</a>
</p>

<?php if ( $isSubmit && !$isValid ): ?>
    <ul>
        <?php foreach($errors as $error): ?>
            <li><?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if ($message != null): ?>
    <p><?php echo $message; ?></p>
<?php endif; ?>

<form method="post" action="">
    <p>
        <label for="titre">Titre:</label>
        <input type="text" id="titre" name="titre" value="<?php echo $titre ?? null; ?>" />
    </p>
    <p>
        <label for="publication">Date de publication:</label>
        <input type="date" id="publication" name="publication" value="<?php echo $publication ?? date('Y-m-d'); ?>" />
    </p>
    <p>
        <label for="resume">Résumé:</label>
        <textarea name="resume" id="resume"><?php echo $resume ?? null; ?></textarea>
    </p>
    <p>
        <!--input type="submit" name="envoyer[]" value="<?php echo $action; ?> et rester" />
        <input type="submit" name="envoyer[]" value="<?php echo $action; ?> et sortir" /-->
        <input type="submit" name="envoyer" value="<?php echo $action; ?>" />
    </p>
</form>

<?php require_once '../template/footer.php'; ?>

