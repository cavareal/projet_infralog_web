<?php
include "./connexionBdd.php";
include "./donnees/donnees.php";

function bddInsertBillet($numeroReservation, $idClient, $numeroVol, $bagages, $prix, $garantie, $place, $nomPassager, $prenomPassager, $agePassager, $premiereClasse)
{
    $bdd = bdd_connect();

    $sql = "INSERT INTO Billet (numeroReservation, idClient, numeroVol, bagages, prix, garantie, place, nomPassager, prenomPassager, agePassager, premiereClasse) VALUES 
    ('$numeroReservation', $idClient, '$numeroVol', $bagages, $prix, $garantie, '$place', '$nomPassager', '$prenomPassager', $agePassager, $premiereClasse);";

    $result = $bdd->query($sql);

    $bdd->close();
}



$prix = $_POST["prix"];

$numeroReservation = strtoupper(substr(hash('sha256', $_POST["numeroVol"]),rand(0, 5), 5) . substr(hash('sha256',$_SESSION["pseudo"]), rand(0, 5),5) . substr(hash('sha256',$_SESSION["pseudo"]), rand(0, 5),10));

bddInsertBillet($numeroReservation, $_SESSION['pseudo'], $_POST['numeroVol'], $_POST["bagage"], $prix, $_POST['garantie'], $_POST['place'],$_POST['nom'], $_POST['prenom'], 99, $_POST['premiere']);

header('location: ../wallet.php');
?>