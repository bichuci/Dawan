<?php
    session_start();

    require_once("../config/bbd.php");

    // Permet de réinitialiser le tableau
    $errors = [];
    $isSubmit = false;
    $isValid = true;

    if(isset($_POST['connexion']))
    {
        $isSubmit = true;
        $username = $_POST['username']?? null;
        $password = $_POST['password']?? null;
        if(null == $username)
        {
            $errors[] = "L'identifiant est obligatoire";
            $isValid = false;
        }

        if(null == $password)
        {
            $errors[] = "Le mot de passe est obligatoire";
            $isValid = false;
        }

        if($isValid)
        {
            $username = mysqli_real_escape_string($link, $username);

            $sql = "SELECT `id`, `password`, `fullname` FROM `utilisateur` WHERE `username` = '".$username."'";
            $result = mysqli_query($link, $sql);
            $user = mysqli_fetch_assoc($result);

            if(!$user)
            {
                $errors = "Erreur d'authentification";
                $isValid = false;
            }
            else
            {
                if( !password_verify($_POST['password'], $user['password']))
                {
                    $errors[] = "Erreur d'authentification";
                    $isValid = false;
                }
            }
        }
        if($isValid)
        {
            $_SESSION['id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];
            header('Location:./');        }
    }

    // JE ferme la connexion
    mysqli_close($link);


    $title = "Authentification";
    $page_title = "Bibliothèque";

    require_once("../template/header.php");
?>
<body>
    <main class="container">
        <h2>Connexion</h2>

        <?php if(!$isValid && $isSubmit): ?>
            <ul>
                <?php foreach($errors as $error): ?>
                <li>
                    <?php echo($error)  ?>
                </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <form class="form" method="post" action="">
            <label for="username">Identifiant : </label>
            <input class="form-control" type="text" name="username" id="username" value="">

            <label for="password">Mot de passe : </label>
            <input class="form-control" type="password" name="password" id="password" value="">

            <input type="submit" class="btn btn-primary mt-2 mb-2" value="Connexion" name="connexion">
        </form>
    </main>
</body>

<?php require_once("../template/footer.php"); ?>