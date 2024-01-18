<?php 
include "./back/connexionBdd.php";

/**
 * @return vols un tableau contenant l'ensemble des objets vols de la base de donnée
 */
function getVols(){
    $bdd = bdd_connect();

    $sql = "SELECT V.numeroVol, V.dateHeureLocaleDepart AS 'dateHeureDepart', V.dateHeureLocaleArrivee AS 'dateHeureArrivee', V.dureeVol, V.modeleAvion, D.acronyme AS 'iataDepart', D.ville AS 'villeDepart', D.pays AS 'paysDepart', D.nom AS 'nomDepart', A.acronyme AS 'iataArrivee', A.ville AS 'villeArrivee', A.pays AS 'paysArrivee', A.nom AS 'nomArrivee' FROM Vol V, Aeroport D, Aeroport A WHERE V.depart = D.acronyme AND V.arrivee = A.acronyme;";

    $result = $bdd->query($sql);

    $vols = array();
    
    if ($result->num_rows > 0) {
        // Traiter les résultats
        while ($row = $result->fetch_assoc()) {
           array_push($vols, $row);
        }

    } else {
        echo "Aucun résultat trouvé.";
    }

    return $vols;
}

//echo json_encode(getVols());
//die;

?>