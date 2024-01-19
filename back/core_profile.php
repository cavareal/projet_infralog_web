<?php
include("back/connexionBdd.php");

global $conn;
$conn = bdd_connect();

//Prend toutes les données de l'utilisateurs pour les entrer dans la page profil
//récupération email, nom, prenom et date de naissance
$sql = "SELECT * FROM fly_book_eseo.Client WHERE id='" . $_SESSION['pseudo'] . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Traiter les résultats
    while ($row = $result->fetch_assoc()) {
        $prenom = $row['prenom'];
        $nom = $row['nom'];
        $datedenaissance = $row['dateNaissance'];
        $email = $row['email'];
    }
}

//A la confirmation des changements d'informations personnelles, la table est modifiée
if (isset($_POST['sauvegarder'])) {
    $nouveauPrenom = $_POST['prenom'];
    $nouveauNom = $_POST['nom'];
    $nouvelleDateNaissance = $_POST['datenaissance'];
    $nouvelEmail = $_POST['email'];

    // Exécution de la requête
    $sqli = "UPDATE fly_book_eseo.Client SET prenom='$nouveauPrenom', nom='$nouveauNom', dateNaissance='$nouvelleDateNaissance', email='$nouvelEmail' WHERE id='" . $_SESSION['pseudo'] . "'";
    $conn->query($sqli);
    header("Refresh:0");
}

//Changement du bouton modifier en bouton de sauvegarde
function modif_sauv($conn)
{
    if (isset($_POST['modifier'])) {
        echo ('<input class="btn btn-primary" type="submit" name="sauvegarder" value="Sauvegarder les modifications">');
    } else {
        echo ('<input class="btn btn-primary" type="submit" name="modifier" value="Modifier">');
    }
}

?>