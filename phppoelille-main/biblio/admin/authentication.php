<?php
session_start();

ini_set('display_errors', true);
require_once '../config/bdd.php';

$errors = [];
$isSubmit = false;
$isValid = true;


if( isset($_POST['connexion'])) {
    $isSubmit = true;

    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;

    if( null == $username ){
        $errors[] = "L'identifiant est obligatoire";
        $isValid = false;
    }

    if( null == $password ){
        $errors[] = "Le mot de passe est obligatoire";
        $isValid = false;
    }

    if($isValid) {
        $username = mysqli_real_escape_string($link, $username);

        $sql = "select id, password, fullname from utilisateur where username = '" . $username . "'";
        $result = mysqli_query($link, $sql);
        $user = mysqli_fetch_assoc($result);

        if (!$user) {
            $errors[] = "Erreur d'authentification";
            $isValid = false;
        } else {
            if (!password_verify($_POST['password'], $user['password'])) {
                $errors[] = "Erreur d'authentification";
                $isValid = false;
            }
        }
    }

    if($isValid) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['fullname'] = $user['fullname'];
        header('Location: ./');
    }
}

mysqli_close($link);

require_once './template/header.php';
?>

<h2>Connexion</h2>

<?php // echo password_hash('admin', PASSWORD_ARGON2I); ?>

<?php if(!$isValid && $isSubmit): ?>
<ul>
    <?php foreach ($errors as $error): ?>
        <li><?php echo $error; ?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>

<form method="post" action="">
    <p>
        <label for="username">Identifiant: </label>
        <input type="text" id="username" name="username" value="" placeholder="admin" />
    </p>
    <p>
        <label for="password">Mot de passe: </label>
        <input type="password" id="password" name="password" value="" placeholder="admin" />
    </p>
    <p>
        <input type="submit" name="connexion" value="Connexion" />
    </p>
</form>


<?php require_once './template/footer.php'; ?>

