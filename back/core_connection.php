<?php

include "connexionBdd.php";

global $conn;

$conn=bdd_connect();

//Vérification de la connexion
if(isset($_POST['email'])&&isset($_POST['motdepasse'])){

    $email=htmlspecialchars($_POST['email']);
    $mdp=htmlspecialchars($_POST['motdepasse']);

    //On vérifie que les champs soient remplis
    if(!empty($email) && !empty($mdp)){
         // Utilisation de requête préparée pour éviter les injections SQL
         $stmt = $conn->prepare('SELECT id FROM client WHERE email=? AND motDePasse=?');
         $stmt->bind_param('ss', $email, $mdp);
         $stmt->execute();
         $resultat = $stmt->get_result();
 
        if($resultat->num_rows > 0){
            // Stocker l'ID de l'utilisateur dans la session
            $row = $resultat->fetch_assoc();
            $_SESSION['pseudo'] = $row['id'];
            header('Location: index.php'); //Connexion réussie retour à la page des vols ?
        }else{
            header('Location: connection.php?erreur=1');
        }
    }else{
        header('Location: connection.php?erreur=2');
    }

}

//Vérification de l'inscription
if(isset($_POST['email_inscri'])&&isset($_POST['motdepasse_inscri'])){

    $email_inscri=htmlspecialchars($_POST['email_inscri']);
    $mdp_inscri=htmlspecialchars($_POST['motdepasse_inscri']);

    if(!empty($email_inscri) && !empty($mdp_inscri)){
        //Vérifie si le mail est conforme
        if(strpos($email_inscri,'@reseau.eseo.fr') || strpos($email_inscri,'@eseo.fr')){
            //Vérifie si le mail existe
            $stmt = $conn->prepare('SELECT * FROM Client WHERE email=?');
            $stmt->bind_param('s', $email_inscri);
            $stmt->execute();
            $resultat = $stmt->get_result();
    
            if($resultat->num_rows == 0){
                //Vérification mot de passe
                if(verification_mdp($mdp_inscri)){
                    //Entrer dans la base de donnée
                    $sql="INSERT INTO client (email, nom, prenom, dateNaissance, motDePasse) VALUES ('".$email_inscri."', '".$_POST['nom_inscri']."', '".$_POST['prenom_inscri']."', '".$_POST['datenaissance']."', '".$_POST['motdepasse_inscri']."')";
                    $conn->query($sql);
                    $_SESSION['pseudo']=$email_inscri;
                    header('Location: index.php');
                }else{
                    header('Location: connection.php?erreur=3');
                }
            }else{
                header('Location: connection.php?erreur=4');
            }
        }else{
            header('Location: connection.php?erreur=5');
        }
    }else{
        header('Location: connection.php?erreur=6');
    }
}

//Permet de vérifier si le mdp respecte l'architecture prévu
function verification_mdp($mdp){
    // Vérification de la longueur minimale du mot de passe
    if(strlen($mdp) < 8){
        return false;
    }

    // Vérification de la présence d'une majuscule, d'une minuscule, d'un chiffre et d'un caractère spécial
    if (!preg_match('/[A-Z]/', $mdp)) {
        return false; // Vérifie s'il y a au moins une majuscule
    }
    if (!preg_match('/[a-z]/', $mdp)) {
        return false; // Vérifie s'il y a au moins une minuscule
    }
    if (!preg_match('/[0-9]/', $mdp)) {
        return false; // Vérifie s'il y a au moins un chiffre
    }

    return true; // Si toutes les conditions sont remplies, le mot de passe est valide
}
    

?>