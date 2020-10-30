<?php

$link = mysqli_connect('localhost', 'root', 'root', 'biblio');

if (!$link) {
    echo "Erreur de connexion à la base de données";
    exit();
}

mysqli_query($link, 'SET NAMES utf8');