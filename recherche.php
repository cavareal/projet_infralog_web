<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <?php
    include "./donnees/donnees.php";
    include "./back/core_recherche.php";
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./js/test.js"></script>

    <title>
        <?php echo $SITE_TITRE ?> - Recherche
    </title>
</head>

<body>
    <!-- Ajout du header du site -->
    <?php include "header.php" ?>

    <!-- Css à charger après le header -->
    <link href="./css/style.css" rel="stylesheet">
    <link href="./css/style_seat_selector.css" rel="stylesheet">

    <?php
    // Redirection s'il n'y a pas de recherche en cours
    if (empty($_GET['depart'])) {
        header("location:./");
    }

    $depart = getIata($_GET['depart']);
    $arrivee = getIata($_GET['arrivee']);
    $dateDepart = $_GET['dateDepart'];

    // Récuppération des vols correspondant à la recherche
    $vols = bddGetVols($depart, $arrivee, $dateDepart);
    ?>

    <!-- Barre de navigation de la recherche -->
    <nav class="shadow bg-white p-2 border">
        <ul class="nav nav-tabs nav-justified">
            <li class="nav-item">
                <a class="nav-link" href="./">Recherche</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">Vol aller</a>
            </li>

            <li class="nav-item">
                <a class="nav-link disabled" href="#">Informations voyageur</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Paiement</a>
            </li>
        </ul>
    </nav>

    <!-- Titre de la recherche -->
    <div class="container-fluid bg-white shadow mt-4 mb-5">
        <div class="row">
            <h1><b>Vols
                    <?php echo explode(" ", $_GET['depart'])[0] . ' - ' . explode(" ", $_GET['arrivee'])[0] . " à partir du " . date("d/m/Y", strtotime($dateDepart)) ?>
                </b></h1>
        </div>

        <div class="row">
            <h4>
                <!-- Il n'y a pas d'erreur sur cette ligne ($vols est bien un array) -->
                <b>Résultats (<?php echo count($vols) ?>):</b>
            </h4>
        </div>
    </div>

    <div class="container mt-5 mb-5" style="border-radius: 5px;">

        <?php
        // Il n'y a pas d'erreur sur cette ligne non plus ($vols est bien un array)
        for ($i = 0; $i < count($vols); $i++) {
            $vol = $vols[$i];
        ?>

            <div class="card my-2">
                <form action="./informations.php">
                    <div class="card-header text-white bg-flyBook">
                        <i class="fa fa-ticket"></i>
                        <b> Départ :
                            <?php echo $vol['villeDepart'] ?> / Arrivée :
                            <?php echo $vol['villeArrivee'] ?>
                        </b>
                    </div>

                    <div class="card-body">
                        <!-- Départ -->
                        <div class="row">
                            <div class="col-sm-1 d-flex align-items-center">
                                <i class="fa fa-plane-departure fa-2x" id="dep_icone"></i>
                            </div>
                            <div class="col-sm-7">
                                <p class="mb-0">
                                    <strong>Date de départ:</strong>
                                    <?php echo date('d/m/Y H:i', strtotime($vol['dateHeureDepart'])); ?>
                                </p>
                                <p class="mb-0">
                                    <strong>Lieu:</strong>
                                    <?php echo $vol['nomDepart'] . ', ' . $vol['villeDepart'] . ', ' . strtoupper($vol['paysDepart']); ?>
                                </p>
                            </div>
                            <div class="col-sm-4 d-flex align-items-center justify-content-center">
                                <img src="./images/logo_nom.png" alt="Logo-favicon.png" class="img-fluid" style="max-width: 200px; max-height: 200px;">
                            </div>
                        </div>

                        <!-- Arrivée -->
                        <div class="row">
                            <div class="col-sm-1 d-flex align-items-center">
                                <i class="fa fa-plane-arrival fa-2x"></i>
                            </div>
                            <div class="col-sm-7"><br>
                                <p class="mb-0">
                                    <strong>Date d'arrivée:</strong>
                                    <?php echo date('d/m/Y H:i', strtotime($vol['dateHeureArrivee'])); ?>
                                </p>
                                <p class="mb-0">
                                    <strong>Lieu:</strong>
                                    <?php echo $vol['nomArrivee'] . ', ' . $vol['villeArrivee'] . ', ' . strtoupper($vol['paysArrivee']); ?>
                                </p>
                            </div>

                            <div style="display: none;">
                                <input type="text" name="numeroVol" value="<?php echo $vol['numeroVol'] ?>">
                                <input type="text" name="depart" value="<?php echo $vol['depart'] ?>">
                                <input type="text" name="arrivee" value="<?php echo $vol['arrivee'] ?>">
                                <input type="text" name="dateDepart" value="<?php echo $vol['dateDepart'] ?>">
                            </div>

                            <div class="col-sm-4 d-flex align-items-center justify-content-center">
                                <button type="submit" class="btn btn-lg bg-flyBook text-white w-75">
                                    À partir de <br> <b>
                                        <?php echo $vol['prixStandard'] ?> €
                                    </b>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        <?php } ?>

    </div>

    <!-- Ajout du footer du site -->
    <?php include "footer.php" ?>
</body>

</html>