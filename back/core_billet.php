<?php

function bddInsertBillet($numeroReservation, $idClient, $numeroVol, $bagages, $prix, $garantie, $place, $nomPassager, $prenomPassager, $agePassager, $premiereClasse)
{
    $bdd = bdd_connect();

    $sql = "INSERT INTO Billet (numeroReservation, idClient, numeroVol, bagages, prix, garantie, place, nomPassager, prenomPassager, agePassager, premiereClasse) VALUES 
    ('$numeroReservation', $idClient, '$numeroVol', $bagages, $prix, $garantie, '$place', '$nomPassager', '$prenomPassager', $agePassager, $premiereClasse);";

    $result = $bdd->query($sql);

    $bdd->close();
}

bddInsertBillet(substr(strtoupper(hash('sha256',$_GET["numeroVol"])),5,10), $_SESSION['pseudo'], $_GET['numeroVol'], $_GET["bagages"], 145, $_GET['garantie'], $_GET['place'],$_GET['nom'], $_GET['prenom'], 99, $_GET['premiere']);

header('location: ../wallet.php');
?>