<?php
include "./back/connexionBdd.php";

/**
 * @return vols un tableau contenant l'ensemble des objets vols de la base de donnée
 */
function bddGetVols($depart, $arrivee, $dateDepart)
{
    $bdd = bdd_connect();

    $sql = "SELECT V.numeroVol, V.dateHeureLocaleDepart AS 'dateHeureDepart', V.dateHeureLocaleArrivee AS 'dateHeureArrivee', V.dureeVol, V.modeleAvion, V.prixStandard, D.acronyme AS 'iataDepart', D.ville AS 'villeDepart', D.pays AS 'paysDepart', D.nom AS 'nomDepart', A.acronyme AS 'iataArrivee', A.ville AS 'villeArrivee', A.pays AS 'paysArrivee', A.nom AS 'nomArrivee' FROM fly_book_eseo.Vol V, fly_book_eseo.Aeroport D, fly_book_eseo.Aeroport A WHERE V.depart = D.acronyme AND V.arrivee = A.acronyme AND V.depart = '$depart' AND V.arrivee = '$arrivee' AND V.dateHeureLocaleDepart > '$dateDepart' ORDER BY dateHeureLocaleDepart;";

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

function getIata($aeroport)
{
    $index = strpos($aeroport, "(");
    return substr($aeroport, $index + 1, 3);
}

function bddGetAvionCarac($numeroVol)
{
    $bdd = bdd_connect();

    $sql = "SELECT M.nbColonne, M.nbPassager, M.nbPremiereClasse FROM fly_book_eseo.ModeleAvion M, fly_book_eseo.Vol V
        WHERE M.modele = V.modeleAvion 
        AND V.numeroVol = '$numeroVol' 
    ";

    $result = $bdd->query($sql);

    $nbPlace = array();

    if ($result->num_rows > 0) {
        // Traiter les résultats
        while ($row = $result->fetch_assoc()) {
            $nbPlace = $row;
        }
    } else {
        echo "Aucun résultat trouvé.";
    }

    $bdd->close();
    return $nbPlace;
}

function bddGetInfoClient($id)
{
    $bdd = bdd_connect();

    $sql = "SELECT C.email, C.nom, C.prenom, C.dateNaissance FROM fly_book_eseo.Client C WHERE id='$id';";

    $result = $bdd->query($sql);

    $infoClient = array();

    if ($result->num_rows > 0) {
        // Traiter les résultats
        while ($row = $result->fetch_assoc()) {
            $infoClient = $row;
        }
    } else {
        echo "Aucun résultat trouvé.";
    }

    $bdd->close();
    return $infoClient;
}

function bddGetPlacesOccupees($numeroVol)
{
    $bdd = bdd_connect();

    $sql = "SELECT B.place FROM fly_book_eseo.Billet B, fly_book_eseo.Vol V WHERE B.numeroVol = V.numeroVol 
        AND V.numeroVol = '$numeroVol' 
        AND B.place IS NOT NULL;
    ";

    $result = $bdd->query($sql);

    $places = array();

    if ($result->num_rows > 0) {
        // Traiter les résultats
        while ($row = $result->fetch_assoc()) {
            array_push($places, $row['place']);
        }
    } else {
        
    }

    $bdd->close();
    return $places;
}

