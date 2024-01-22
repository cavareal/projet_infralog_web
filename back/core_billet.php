<?php

session_start();

function bddInsertBillet($numeroReservation, $idClient, $numeroVol, $bagages, $prix, $garantie, $place, $nomPassager, $prenomPassager, $agePassager, $premiereClasse)
{
    $bdd = bdd_connect();

    $sql = "INSERT INTO Billet (numeroReservation, idClient, numeroVol, bagages, prix, garantie, place, nomPassager, prenomPassager, agePassager, premiereClasse) VALUES 
    ('$numeroReservation', $idClient, '$numeroVol', $bagages, $prix, $garantie, '$place', '$nomPassager', '$prenomPassager', $agePassager, $premiereClasse);";

    $result = $bdd->query($sql);

    $bdd->close();
}

bddInsertBillet(substr(strtoupper(hash('sha256',$_POST["numeroVol"])),5,10), $_SESSION['pseudo'], $_POST['numeroVol'], $_POST["bagages"], 145, $_POST['garantie'], $_POST['place'],$_POST['nom'], $_POST['prenom'], 99, $_POST['premiere']);

header('location: ../wallet.php');
?>