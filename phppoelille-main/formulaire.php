<?php ini_set('display_errors', true); ?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Les Formulaires</title>
    <style>
        [type=text]{ width: 80%; }
    </style>
</head>
<body>
    <h1>Les formulaires</h1>
    <hr />
    <!--pre><?php print_r($_SERVER); ?></pre-->
    <?php // phpinfo(); ?>

    <?php
        /*
         * injection sql
         * xss -> cross site scripting
         * csrf -> cross site request forgery
         */
        /*
         * CMS => Content Management System
         *  -> Génération de page à la volée
         */
        define('_DS_', DIRECTORY_SEPARATOR);
        define('IMG_DIR', __DIR__._DS_."images"._DS_);

        $message = null;
        $file_errors = [
            1 => 'Le poids du fichier est trop important',
            2 => 'Le poids du fichier est trop important',
            3 => 'Erreur de téléchargement',
            4 => 'L\’image est obligatoire'
        ];
        $mimes = ['image/jpeg', 'image/png', 'image/gif'];
        $extensions = ['jpeg', 'png', 'gif', 'jpg'];

        if( isset( $_POST['submit'] ) ) {

            // isset = est affecté
            $nom = trim($_POST['nom']) ?? null;
            $prenom = trim($_POST['prenom']) ?? null;
            $photo = $_FILES['photo'] ?? null;
            $ext = pathinfo($photo['name'], PATHINFO_EXTENSION);

            if( $nom == null ){
                $message = "Le nom est obligatoire";
            } elseif( null == $prenom ){ // yoda code
                $message = "Le prénom est obligatoire";
            } elseif( 0 != $photo['error'] ) {
                $message = $file_errors[ $photo['error'] ];
            } elseif( !in_array($photo['type'], $mimes) && !in_array($ext, $extensions)) {
                $message = "Le format du fichier n'est pas autorisé";
            } else {
                $message = "Enregistrement terminé: Merci ".
                    htmlentities($prenom)." ".htmlentities($nom);
                unset($nom, $prenom);

                move_uploaded_file($photo['tmp_name'], IMG_DIR.time().$photo['name']);
            }
        }
    ?>

    <?php if( $message != null ): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="post" action="" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
        <p>
            <label for="nom">Nom: </label>
            <input type="text" id="nom" name="nom" value="<?php echo $nom ?? ""; ?>" />
        </p>
        <p>
            <label for="prenom">Prénom: </label>
            <input type="text" id="prenom" name="prenom" value="<?php echo $prenom ?? ""; ?>" />
        </p>
        <p>
            <label for="photo">Photo: </label>
            <input type="file" id="photo" name="photo" accept="<?php echo implode(',', $mimes); ?>" /><br />
            <small>Extensions autorisées: <strong>( <?php echo implode(', ', $extensions); ?>)</strong></small>
        </p>
        <p>
            <input type="submit" name="submit" value="Envoyer" />
        </p>
    </form>

</body>
</html>
