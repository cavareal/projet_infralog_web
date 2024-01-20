<?php
include "./back/connexionBdd.php";

/**
 * @return vols un tableau contenant l'ensemble des objets vols de la base de donnée
 */
function bddGetVols($depart, $arrivee, $dateDepart)
{
    $bdd = bdd_connect();

    $sql = "SELECT V.numeroVol, V.dateHeureLocaleDepart AS 'dateHeureDepart', V.dateHeureLocaleArrivee AS 'dateHeureArrivee', V.dureeVol, V.modeleAvion, V.prixStandard, D.acronyme AS 'iataDepart', D.ville AS 'villeDepart', D.pays AS 'paysDepart', D.nom AS 'nomDepart', A.acronyme AS 'iataArrivee', A.ville AS 'villeArrivee', A.pays AS 'paysArrivee', A.nom AS 'nomArrivee' FROM fly_book_eseo.Vol V, fly_book_eseo.Aeroport D, fly_book_eseo.Aeroport A WHERE V.depart = D.acronyme AND V.arrivee = A.acronyme AND V.depart = '$depart' AND V.arrivee = '$arrivee' AND V.dateHeureLocaleDepart > '$dateDepart';";

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

    $bdd->close();
    return $vols;
}

function bddGetAeroport()
{
    $bdd = bdd_connect();

    $sql = "SELECT * FROM fly_book_eseo.Aeroport;";

    $result = $bdd->query($sql);

    $aeroports = array();

    if ($result->num_rows > 0) {
        // Traiter les résultats
        while ($row = $result->fetch_assoc()) {
            array_push($aeroports, $row);
        }
    } else {
        echo "Aucun résultat trouvé.";
    }

    $bdd->close();
    return $aeroports;
}

function getIata($aeroports)
{
    $index = strpos($aeroports, "(");
    return substr($aeroports, $index + 1, 3);
}
