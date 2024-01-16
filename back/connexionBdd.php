<?php

// Initialisation de la variable de session
session_start();

function bdd_connect() {
    global $bdd;

    // Informations de connexion à la bdd
    $host = '192.168.56.90';
    $user = 'moodle_user';
    $dbPwd = 'network';
    $dbName = 'moodle';

    // Connection à la bdd
    $bdd = mysqli_connect($host, $user, $dbPwd, $dbName); 

    if ($bdd->connect_error) {
        die("Échec de la connexion : " . $bdd->connect_error);
    }
}

?>
