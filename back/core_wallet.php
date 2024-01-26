<?php
include("back/connexionBdd.php");

//Confirmation d'annulation du vol
function annulation()
{
    if (isset($_POST["annulation"])) {

        $conn = bdd_connect();
        //Place annulé pour créer une annulation
        $idBilletAnnuler = $_POST['idBilletAnnuler'];

        $sql = "UPDATE fly_book_eseo.Billet SET place=NULL WHERE numeroReservation='" . $idBilletAnnuler . "'";
        $conn->query($sql);
        $conn->close();

        //Message de confirmation d'annulation pour le client
        echo '<div class="alert alert-success">
        <strong>Succès !</strong> Nous avons pris votre demande d\'annulation en compte. Vous serez remboursez dans les prochaines 48 heures. Dans le cas contraire,
        veuillez contacter notre agence.
        </div>';
    }
}

//Création de ticket pour les réservations
function reservation()
{
    $conn = bdd_connect();

    //Cherche les billets de vols à venir d'un client précis
    $sql = "SELECT B.numeroReservation, B.bagages, B.nomPassager, B.prenomPassager,
    V.dateHeureLocaleDepart AS 'dateHeureDepart', V.dateHeureLocaleArrivee AS 'dateHeureArrivee',
    D.acronyme AS 'iataDepart', D.ville AS 'villeDepart', D.pays AS 'paysDepart', D.nom 
    AS 'nomDepart', A.acronyme AS 'iataArrivee', A.ville AS 'villeArrivee', A.pays AS 'paysArrivee', A.nom AS 'nomArrivee' 
    FROM fly_book_eseo.Vol V, fly_book_eseo.Aeroport D, fly_book_eseo.Aeroport A, fly_book_eseo.Billet B
    WHERE B.idClient = " . $_SESSION['pseudo'] . " AND B.numeroVol=V.numeroVol AND V.depart = D.acronyme AND V.arrivee = A.acronyme AND V.dateHeureLocaleDepart >= NOW() AND B.place IS NOT NULL AND B.place <> ''";


    $result = $conn->query($sql);

    $billets = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($billets, $row);
        }
    }

    $conn->close();
    return $billets;
}



//Création de ticket pour l'historique
function historique()
{
    $conn = bdd_connect();

    //Cherche les billets déjà utilisés par le client
    $sql = "SELECT B.numeroReservation, B.bagages, B.nomPassager, B.prenomPassager, B.place,
    V.dateHeureLocaleDepart AS 'dateHeureDepart', V.dateHeureLocaleArrivee AS 'dateHeureArrivee',
    D.acronyme AS 'iataDepart', D.ville AS 'villeDepart', D.pays AS 'paysDepart', D.nom 
    AS 'nomDepart', A.acronyme AS 'iataArrivee', A.ville AS 'villeArrivee', A.pays AS 'paysArrivee', A.nom AS 'nomArrivee' 
    FROM fly_book_eseo.Vol V, fly_book_eseo.Aeroport D, fly_book_eseo.Aeroport A, fly_book_eseo.Billet B
    WHERE B.idClient = " . $_SESSION['pseudo'] . " AND B.numeroVol=V.numeroVol AND V.depart = D.acronyme AND V.arrivee = A.acronyme AND (V.dateHeureLocaleDepart < NOW() OR (B.place IS NULL))
    ORDER BY V.dateHeureLocaleArrivee DESC";

    $result = $conn->query($sql);

    $histo_billets = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($histo_billets, $row);
        }
    }

    $conn->close();
    return $histo_billets;
}

?>