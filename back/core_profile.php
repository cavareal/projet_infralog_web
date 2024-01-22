<?php
include("./back/connexionBdd.php");

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

    if (verification_info($nouveauPrenom, $nouveauNom, $nouvelleDateNaissance, $nouvelEmail)) {
        // Exécution de la requête
        $sqli = "UPDATE fly_book_eseo.Client SET prenom='$nouveauPrenom', nom='$nouveauNom', dateNaissance='$nouvelleDateNaissance', email='$nouvelEmail' WHERE id='" . $_SESSION['pseudo'] . "'";
        $conn->query($sqli);
        header('Location: profile.php');
    }
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

function verification_info($nouveauPrenom, $nouveauNom, $nouvelleDateNaissance, $nouvelEmail)
{
    $conn = bdd_connect();

    // Vérifier que le prénom et le nom ne sont pas vides ou composés uniquement d'espaces
    if (empty($nouveauPrenom) || empty($nouveauNom) || ctype_space($nouveauPrenom) || ctype_space($nouveauNom)) {
        header('Location: profile.php?erreur=1');
        exit(); // Arrêter l'exécution du script
    }


    //Vérifie si le mail est conforme
    if (!empty($nouvelEmail) && strpos($nouvelEmail, '@') && (strlen($nouvelEmail) > 5)) {
        //Vérifie si le mail existe
        $stmt = $conn->prepare('SELECT * FROM fly_book_eseo.Client WHERE email=? AND id <> ?');
        $stmt->bind_param('si', $nouvelEmail, $_SESSION['pseudo']);
        $stmt->execute();
        $resultat = $stmt->get_result();

        if ($resultat->num_rows > 0) {
            header('Location: profile.php?erreur=2');
            exit(); // Arrêter l'exécution du script
        }
    } else {
        header('Location: profile.php?erreur=3');
        exit(); // Arrêter l'exécution du script
    }

    return true;
}

if (isset($_GET['erreur'])) {
    $err = $_GET['erreur'];
    if ($err == 1) {
        $messageErreur = "Le nom ou le prénom est mal renseigné.";
    }
    if ($err == 2) {
        $messageErreur = "L'adresse mail que vous souhaitez utiliser est déjà utilisée.";
    }
    if ($err == 3) {
        $messageErreur = "L'adresse mail que vous avez rentré n'existe pas.";
    }

}
?>