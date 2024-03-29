<!-- Cette page permet la création de compte et la connexion de l'utilisateur-->
<!DOCTYPE html>
<?php
include("./back/core_profile.php"); ?>
<html>

<head>
    <?php include "./donnees/donnees.php" ?>
    <title>
        <?php echo $SITE_TITRE ?> - Informations personnelles
    </title>
    <!-- Latest bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest bootstrap 5 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php if ($_SESSION['pseudo'] == !'') { ?>
        
        <!--Insertion du header-->
        <?php include("header.php") ?>

        <?php
        //Affichage erreurs de connexion
        if (isset($_GET['erreur'])) {
            echo '<div class="alert alert-danger">
            <strong>Impossible de vous connecter !</strong> ' . $messageErreur . '
            </div>';
        }
        ?>

        <!--Accéder au portefeuille et à l'historique des vols-->
        <div class="container my-4">
            <a href="./wallet.php" class="btn btn-primary">Accéder au portefeuille</a>
        </div>

        <!--Récapitulatif des informations personnelles du compte-->
        <?php

        //Variable qui permet de modifier les champs
        $readOnly = ' readonly="readonly"';

        //Modifie le formulaire pour effectuer les changements d'informations
        if (isset($_POST['modifier'])) {
            $readOnly = " ";
        }
        ?>

        <!--Récapitulatif de toutes les informations de l'utilisateur 
        //(si appuie sur le bouton "Modifier" alors changement des données possible)-->
        <form method="post" action="">
            <div class="container my-3">
                <h3>Mes informations personnelles</h3>
                <div class="form-floating mb-3 mt-3">
                    <input class="form-control" type="text" id="prenom" name="prenom" value='<?php echo $prenom; ?>'
                        placeholder="Prénom" <?php echo $readOnly; ?>>
                    <label for="prenom">Prénom :</label>
                </div>
                <div class="form-floating mb-3 mt-3">
                    <input class="form-control" type="text" id="nom" name="nom" value='<?php echo $nom; ?>'
                        placeholder="Nom" <?php echo $readOnly; ?>>
                    <label for="nom">Nom :</label>
                </div>

                <div class="form-floating mb-3 mt-3">
                    <input class="form-control" type="date" id="datenaissance" name="datenaissance"
                        value='<?php echo $datedenaissance; ?>' placeholder="Date de naissance" <?php echo $readOnly; ?>>
                    <label for="datenaisssance">Date de naissance :</label>
                </div>
                <div class="form-floating mb-3 mt-3">
                    <input class="form-control" type="text" id="email" name="email" value='<?php echo $email; ?>'
                        placeholder="Email" <?php echo $readOnly; ?>>
                    <label for="email">Email :</label>
                </div>

                <?php modif_sauv($conn); ?>

            </div>
        </form>

        <div id="index-footer" class="container-fluid">
            <?php
            include "./footer.php";
            ?>
        </div>
    <?php } else {
        header("Location: index.php");
    } ?>

</body>

</html>