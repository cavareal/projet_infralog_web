<!-- Cette page permet de stocker les billets récemment achetés et de voir son historique de vol-->
<!DOCTYPE html>
<?php include("back/connexionBdd.php");
?>
<html>

<head>
    <?php include "./donnees/donnees.php" ?>
    <title>
        <?php echo $SITE_TITRE ?> - Nous contacter
    </title>

    <!-- Latest bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Latest bootstrap 5 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!--Intégration page css-->
    <link rel="stylesheet" href="css/style_connexion.css">

</head>

<body>
    <!--Insertion du header-->
    <?php include("header.php") ?>



    <div class="card img-fluid">
        <img class="card-img-top" src="images/avion_contact.jpg" alt="avion_connexion">
        <div class="card-img-overlay">
            <div class="container mt-3 d-flex align-items-center justify-content-center">
                <!-- Ajout de d-flex, align-items-center et justify-content-center -->
                <div class="card my-5" id="carteContact">
                    <div class="card-header text-white text-center" id="couleur_logo"></br>
                        <h5>Besoin d'un conseil ? Contactez-nous</h5> </br>
                    </div>
                    <div class="card-body">
                        </br>
                        <p><i class="fas fa-map-marker-alt"></i><strong> Adresse :</strong> 10 Bd Jeanneteau,
                            CS 90717,
                            49107 ANGERS CEDEX 2</p>
                        <p><i class="fas fa-phone"></i><strong> Téléphone :</strong> +33 (0)2 41 86 67 67</p>
                        <p><i class="far fa-envelope"></i><strong> E-mail :</strong> flybookeseo@reseau.eseo.fr</p>
                        <p><i class="far fa-clock"></i><strong> Heures de Contact :</strong></br> Du lundi au vendredi :
                            9h00 - 17h00 </br> Samedi : 9h00 - 12h00</p></br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("footer.php") ?>

</body>

</html>