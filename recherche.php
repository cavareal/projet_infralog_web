<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link href="./css/style.css" rel="stylesheet">

    <title><?php echo $SITE_TITRE ?> - Recherche</title>

    <?php
        include "./donnees/donnees.php";
        include "./back/core_recherche.php";
    ?>
</head>

<body>
    <?php include "header.php" ?>

    <?php 
        $vols = getVols(); 
    ?>

    <nav class="shadow bg-white p-2 border">
        <ul class="nav nav-tabs nav-justified">
            <li class="nav-item">
                <a class="nav-link" href="./">Recherche</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">Vol aller</a>
            </li>

            <?php if($_GET['volRetour']) { ?>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Vol retour</a>
                </li>
            <?php } ?>

            <li class="nav-item">
                <a class="nav-link disabled" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Link</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid mt-4 mb-5">
        <h1><b><?php echo explode(" ",$_GET['depart'])[0] . ' - ' . explode(" ",$_GET['arrivee'])[0] ?></b></h1>
    </div>

    <div class="container-fluid bg-white shadow">
        <h3>#Filtres#</h3>
    </div>

    <!-- Il n'y a pas d'erreur sur cette ligne -->
    <h4><b>Résultats (<?php echo count($vols) ?>):</b></h4>

    <div class="container bg-white border mt-5 mb-5" style="border-radius: 5px;">

        <?php
            foreach ($vols as $vol) {
        ?>

            <div class="card my-2">
                <div class="card-header text-white bg-flyBook">
                    <i class="fa fa-ticket"></i>
                    <b> Départ : <?php echo $vol['villeArrivee'] ?> / Arrivée : <?php echo $vol['villeDepart'] ?></b>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <p>
                                Date de départ: <?php echo str_replace("-", "/", $vol['dateHeureDepart']) ?>
                                <br>
                                Lieu: <?php echo $vol['nomDepart'] . ', ' . $vol['villeDepart'] . ', ' . strtoupper($vol['paysDepart']) ?>
                            </p>

                            <p>
                                Date d'arrivée: <?php echo str_replace("-", "/", $vol['dateHeureArrivee']) ?>
                                <br>
                                Lieu: <?php echo $vol['nomArrivee'] . ', ' . $vol['villeArrivee'] . ', ' . strtoupper($vol['paysArrivee']) ?>
                            </p>
                        </div>
                        <div class="col-sm-4">
                            <div class="row d-grid">
                                <button class="btn btn-lg bg-flyBook text-white">Réserver</button>
                            </div>
                            <div class="row d-grid">
                                <button class="btn btn-lg bg-flyBook text-white">Réserver</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

    </div>

    <?php include "footer.php" ?>
</body>
</html>