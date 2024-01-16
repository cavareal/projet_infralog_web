<?php 
include "./connexionBdd.php";

/**
 * @return vols un tableau contenant l'ensemble des objets vols de la base de donnée
 */
function getVols($bdd){
    $sql = "SELECT V.numeroVol, V.date, V.heureDepartLocale, V.heureArriveeLocale, V.modeleAvion, D.acronyme AS 'iata départ', D.ville AS 'ville départ', A.acronyme AS 'iata arrivée', A.ville AS 'ville arrivée' FROM Vol V, Aeroport D, Aeroport A WHERE V.depart = D.acronyme AND V.arrivee = A.acronyme;";

    $bdd->query($sql);

    $vols = [];

    $bdd;

    return $vols;
}

?>