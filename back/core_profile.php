<?php

//Prend toutes les données de l'utilisateurs pour les entrer dans la page profil
function recup_info()
{
    //récupération email, nom, prenom et date de naissance
    $sql = "SELECT * FROM Client";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Traiter les résultats
        while ($row = $result->fetch_assoc()) {
            $prenom = $row['prenom'];
            $nom = $row['nom'];
            $datedenaissance = $row['dateNaissance'];
            $email = $row['email'];
        }
    } else {
        echo "Aucun résultat trouvé.";
    }

    // Fermer la connexion
    $conn->close();
}


//A la confirmation des changements d'informations personnelles, la table est modifiée
function modif_info()
{
    if (isset($_POST['sauvegarder'])) {
        $nouveauPrenom = $_POST['prenom'];
        $nouveauNom = $_POST['nom'];
        $nouvelleDateNaissance = $_POST['datenaissance'];
        $nouvelEmail = $_POST['email'];

        // Préparer et exécuter la requête SQL UPDATE
        $sql = "UPDATE Client SET prenom='$nouveauPrenom', nom='$nouveauNom', dateNaissance='$nouvelleDateNaissance', email='$nouvelEmail'";
        
        $conn->query($sql)
    }
}

?>