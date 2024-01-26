<?php

// Initialisation de la variable de session
session_start();

function bdd_connect() {
    // Informations de connexion à la bdd
    $host = 'localhost';
    $user = 'root';
    $dbPwd = 'root';
    $dbName = 'fly_book_eseo';

    // Connection à la bdd
    $bdd = mysqli_connect($host, $user, $dbPwd, $dbName); 

    if ($bdd->connect_error) {
        die("Échec de la connexion : " . $bdd->connect_error);
    }

    return $bdd;
}

?>
