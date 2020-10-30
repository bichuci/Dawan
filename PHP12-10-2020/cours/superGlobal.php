
<?php require_once("./header.php"); ?>
<title>Les formulaires</title>
</head>
<body>
    <main class="container">
        <h1> Les formulaires </h1>
            <?php // echo($_SERVER['DOCUMENT_ROOT'].'  '.$_SERVER['SERVER_NAME']);
            ?>
        
            
            <?php 
            /**LES FAILLES DE SECURITE
             * 
             *  injection sql
             *  xss -> cross site scripting
             *  csrf -> cross site request forgery
             * /

            /** 
             *  CMS => Content Management System
             *  -> Génération de page à la volée
             */

            define('_DS_', DIRECTORY_SEPARATOR);
            // dirname permet de revenir au parent, si on lui attribue en seconde valeur un nombre permet de remonter le nombre de parent désiré
            define('IMG_DIR', dirname(__DIR__)._DS_."images"._DS_);

            $message = null;
            $file_errors = [
                1 => 'Le poids du fichier est trop important',
                2 => 'Le poids du fichier est trop important',
                3 => 'Erreur de téléchargement',
                4 => 'L\'image est obligatoire'
            ];

            $mimes = ['image/jpeg', 'image/png', 'image/gif'];
            $extensions = ['jpeg', 'png', 'gif', 'jpg'];
            

            if(isset($_POST['submit']))
            {
                // Utiliser le trim pour empecher de bypass les tests de l'input avec un espace au début
                // Si utilisation de htmlentities => penser a utiliser html_entity_decode à l'affichage des données
                $nom =  trim($_POST['nom'] ?? null);
                $prenom = trim($_POST['prenom'] ?? null);
                $photo = $_FILES['photo'] ?? null;
                $ext = pathinfo($photo['name'], PATHINFO_EXTENSION);

                if( $nom == null )
                {
                    $message = "Le nom est obligatoire";
                }else if( null == $prenom) //yoda code
                {
                    $message = "Le prénom est obligatoire";
                }else if( 0 != $photo['error'])
                {
                    $message = $file_errors[ $photo['error']];
                }
                else if(  !in_array( $photo['type'], $mimes) && !in_array($ext, $extensions))
                {
                    $message = "Le format n'est pas autorisé";
                }
                else
                {
                    // htmlentities -> supprime les caractères sensible
                    // strip_tags -> supprime les balises html
                    // trim -> supprime les espaces inutiles et pouvant bypass les tests d'input
                    $message = "Enregistrement terminé !".htmlentities($prenom)." ".htmlentities($nom);
                    unset($nom, $prenom);

                    // On transfere l'image dans le répertoire choisi une fois l'enregistrement terminé
                    move_uploaded_file($photo['tmp_name'], IMG_DIR.time().$photo['name']);
                }
            }

            ?>

            <?php if($message != null): ?>
                <p><?php echo $message; ?>
            <?php endif; ?>
            <form method="post" class="form" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                <p>
                    <label for="nom">Nom : </label>
                    <!-- Les super globales sont des tableaux( dictionnaires ), le name sera la clé et la valeur sera initié dans l'input par l'utilisateur -->
                    <input class="form-control" type="text" name="nom" id="nom" value="<?= $nom ?? "" ?>" />
                </p>
                <p>
                    <label for="prenom">Prénom : </label>
                    <input class="form-control" type="text" name="prenom" id="prenom" value="<?= $prenom ?? "" ?>" />
                </p>
                <p>
                    <label for="photo">Photo :</label>
                    <input type="file" id ="photo" name ="photo"  accept="<?= implode(',', $mimes);?>">
                    <!-- implode() permet de séparer chaque valeur d'un tableau-->
                    <p><span>Extensions autorisées : <small>(<?= implode(', ', $extensions);?>)</small></span></p>
                </p>
                <input  type="submit"  value="envoyer" class="btn btn-info" name ="submit">
            </form>
    </main>
</body>
</html>

<?php require_once("./footer.php"); ?>