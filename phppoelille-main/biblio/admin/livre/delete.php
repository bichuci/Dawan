<?php
require_once dirname(__DIR__, 2) . '/config/bdd.php';

if ( isset($_GET['id']) && $_GET['id'] != null ) {
    $id = intval($_GET['id']);

    $sql = "delete from livre where id = ".mysqli_real_escape_string($link, $id);

    mysqli_query($link, $sql);
}

mysqli_close($link);



header('Location: ./');