<!-- Cette page permet la création de compte et la connexion de l'utilisateur-->
<!DOCTYPE html>
<html>

<head>
    <title>Informations personnelles</title>
    <!-- Latest bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest bootstrap 5 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!--Insertion du header-->
    <?php include("header.php") ?>

    <!--Récapitulatif des miles-->
    
    <!--Accéder au portefeuille et à l'historique des vols-->
    <div class="container my-4">
        <a href="./wallet.php" class="btn btn-primary">Accéder au portefeuille</a>
    </div>

    <!--Récapitulatif des informations personnelles du compte-->
    <?php

    //Variable qui permet de modifier les champs
    $readOnly=' readonly="readonly"';

    //Valeur de base (pour test)
    $prenom="Alexis";
    $nom="Bajolle";
    $datedenaissance="2002-04-11";
    $email="alexis.bajolle@reseau.eseo.fr";

    if(isset($_POST['sauvegarder'])){
        $prenom=$_POST['prenom'];
        $nom=$_POST['nom'];
        $datedenaissance=$_POST['datenaissance'];
        $email=$_POST['email'];
    }

    //Modifie le formulaire pour effectuer les changements d'informations
    if(isset($_POST['modifier'])){
        $readOnly=" ";
    }

    //Récapitulatif de toutes les informations de l'utilisateur 
    //(si appuie sur le bouton "Modifier" alors changement des données possible)
    echo ('<form method="post" action="">
    <div class="container my-3">
        <h3>Mes informations personnelles</h3>
        <div class="form-floating mb-3 mt-3">
            <input class="form-control" type="text" id="prenom" name="prenom" value='.$prenom.' placeholder="Prénom"'. $readOnly .'>
            <label for="prenom">Prénom :</label>
        </div>
        <div class="form-floating mb-3 mt-3">
            <input class="form-control" type="text" id="nom" name="nom" value='.$nom.' placeholder="Nom" '. $readOnly .'>
            <label for="nom">Nom :</label>
        </div>

        <div class="form-floating mb-3 mt-3">
            <input class="form-control" type="date" id="datenaissance" name="datenaissance" value='.$datedenaissance.' placeholder="Date de naissance" '. $readOnly .'>
            <label for="datenaisssance">Date de naissance :</label>
        </div>
        <div class="form-floating mb-3 mt-3">
            <input class="form-control" type="text" id="email" name="email" value='.$email.' placeholder="Email" '. $readOnly .'>
            <label for="email">Email :</label>
        </div>');
    

    //Changement du bouton modifier en bouton de sauvegarde
    if(isset($_POST['modifier'])){
        echo('<input class="btn btn-primary" type="submit" name="sauvegarder" value="Sauvegarder les modifications">');
    } else {
        echo('<input class="btn btn-primary" type="submit" name="modifier" value="Modifier">');
    }
    
    echo('</div>
    </form>');
    ?>
 <?php include("footer.php") ?>
</body>

</html>