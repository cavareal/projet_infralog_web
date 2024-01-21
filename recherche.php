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

    <title><?php echo $SITE_TITRE ?> - Recherche</title>
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

    // Récuppération des vols correspondant à la recherche
    $vols = bddGetVols(getIata($_GET['depart']), getIata($_GET['arrivee']), $_GET['dateDepart']);
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

            <!-- Dans le cas d'un aller simple, il n'y a pas de vol retour -->
            <?php if ($_GET['volRetour'] == 'aller-retour') { ?>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Vol retour</a>
                </li>
            <?php } ?>

            <li class="nav-item">
                <a class="nav-link disabled" href="#">Récapitulatif</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Paiement</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid bg-white shadow mt-4 mb-5">
        <div class="row">
            <h1><b>Vols <?php echo explode(" ", $_GET['depart'])[0] . ' - ' . explode(" ", $_GET['arrivee'])[0] . " à partir du " . date("d/m/Y", strtotime($_GET['dateDepart'])) ?></b></h1>
        </div>

        <div class="row">
            <h4><b>Résultats (<?php echo count($vols) //Il n'y a pas d'erreur sur cette ligne ($vols est bien un array) 
                                ?>):</b></h4>
        </div>
    </div>

    <div class="container bg-white border mt-5 mb-5" style="border-radius: 5px;">

        <?php
        // Il n'y a pas d'erreur sur cette ligne non plus ($vols est bien un array)
        for ($i = 0; $i < count($vols); $i++) {
            $vol = $vols[$i];
        ?>

            <div class="card my-2">
                <div class="card-header text-white bg-flyBook">
                    <i class="fa fa-ticket"></i>
                    <b> Départ : <?php echo $vol['villeDepart'] ?> / Arrivée : <?php echo $vol['villeArrivee'] ?></b>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <p>
                                Date de départ: <?php echo str_replace("-", "/", $vol['dateHeureDepart']) ?>
                                <br>
                                Lieu: <?php echo $vol['nomDepart'] . ', ' . $vol['villeDepart'] . ', ' . strtoupper($vol['paysDepart']) ?>
                            </p>
                        </div>

                        <div class="col-sm-4"><!-- style="display: flex; justify-content:center; align-items:center;"> -->
                            <div class="d-grid my-2">
                                <button class="btn btn-lg bg-flyBook text-white" data-bs-toggle="modal" data-bs-target="#myModal">À partir de <br> <b><?php echo $vol['prixStandard'] ?> €</b></button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8">
                            <p>
                                Date d'arrivée: <?php echo str_replace("-", "/", $vol['dateHeureArrivee']) ?>
                                <br>
                                Lieu: <?php echo $vol['nomArrivee'] . ', ' . $vol['villeArrivee'] . ', ' . strtoupper($vol['paysArrivee']) ?>
                            </p>
                        </div>

                        <div class="col-sm-4"><!-- style="display: flex; justify-content:center; align-items:center;"> -->
                            <div class="d-grid my-2">
                                <button class="btn btn-lg bg-flyBook text-white" data-bs-toggle="modal" data-bs-target="#myModal">À partir de <br> <b><?php echo $vol['prixStandard'] ?> €</b></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header text-white bg-flyBook">
                    <h4 class="modal-title">Options de vol</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form class="needs-validation">
                    <!-- Modal body -->
                    <div class="modal-body">

                        <!-- Sélection de la classe -->
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="card">
                                    <img class="card-img-top" src="./images/cabine.jpg" alt="Card image">
                                    <div class="card-body">
                                        <h4 class="card-title">Classe standard</h4>
                                        <ul class="list-group">
                                            <li class="list-group-item">Une place standard</li>
                                            <li class="list-group-item">Un bagage cabine</li>
                                            <li class="list-group-item barre">Un bagage en soute</li>
                                        </ul>
                                        <div class="d-grid">
                                            <input type="radio" name="classe" id="classe-1" class="radio-btn">
                                            <label for="classe-1">Sélectionner</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="card">
                                    <img class="card-img-top" src="./images/cabine.jpg" alt="Card image">
                                    <div class="card-body">
                                        <h4 class="card-title">Classe standard + bagage</h4>
                                        <ul class="list-group">
                                            <li class="list-group-item">Une place standard</li>
                                            <li class="list-group-item">Un bagage cabine</li>
                                            <li class="list-group-item">Un bagage en soute</li>
                                        </ul>
                                        <div class="d-grid">
                                            <input type="radio" name="classe" id="classe-2" class="radio-btn">
                                            <label for="classe-2">Sélectionner</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="card">
                                    <img class="card-img-top" src="./images/cabine.jpg" alt="Card image">
                                    <div class="card-body">
                                        <h4 class="card-title">Première classe</h4>
                                        <ul class="list-group">
                                            <li class="list-group-item">Une place première classe</li>
                                            <li class="list-group-item">Un bagage cabine</li>
                                            <li class="list-group-item barre">Un bagage en soute</li>
                                        </ul>
                                        <div class="d-grid">
                                            <input type="radio" name="classe" id="classe-3" class="radio-btn">
                                            <label for="classe-3">Sélectionner</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="card">
                                    <img class="card-img-top" src="./images/cabine.jpg" alt="Card image">
                                    <div class="card-body">
                                        <h4 class="card-title">Première classe + bagage</h4>
                                        <ul class="list-group">
                                            <li class="list-group-item">Une place première classe</li>
                                            <li class="list-group-item">Un bagage cabine</li>
                                            <li class="list-group-item">Un bagage en soute</li>
                                        </ul>
                                        <div class="d-grid">
                                            <input type="radio" name="classe" id="classe-4" class="radio-btn">
                                            <label for="classe-4">Sélectionner</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Séparateur -->
                        <div class="row">
                            <hr class="my-3">
                        </div>

                        <!-- Sélection de la garantie -->
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-5">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="mySwitch" name="garantie" value="oui">
                                    <label class="form-check-label" for="mySwitch">Garantie</label>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <p>
                                    #CONDITIONS DE GARANTIE#
                                </p>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>

                        <!-- Séparateur -->
                        <div class="row">
                            <hr class="my-3">
                        </div>

                        <!-- Sélection du siège -->
                        <div>
                            <?php
                            $nbPlace = 120;
                            $nbPremiere = 24;
                            $nbColone = 6;
                            $nbLignePremiere = intdiv($nbPremiere, $nbColone);
                            $nbLigne = intdiv($nbPlace, $nbColone);
                            $colones = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
                            ?>


                            <div class="plane fuselage" style="background-color: whitesmoke;">

                                <div class="container-fluid">

                                    <?php for ($i = $nbColone - 1; $i > -1; $i--) { ?>
                                        <div class="row colone-<?php echo $colones[$i] ?>" style="flex-wrap: nowrap;">
                                            <?php
                                            if (($i == 0 || $i == $nbColone - 1)) {
                                                echo '<div class="col p-3 exit"></div>';
                                            } else {
                                                echo '<div class="col p-3"></div>';
                                            }
                                            ?>
                                            <?php for ($p = 1; $p < $nbLignePremiere; $p++) { ?>
                                                <div class="col">
                                                    <li class="seat premiere">
                                                        <input type="radio" name="siege" id="<?php echo $p . $colones[$i] ?>" disabled />
                                                        <label for="<?php echo $p . $colones[$i] ?>"><?php echo $p . $colones[$i] ?></label>
                                                    </li>
                                                </div>
                                            <?php } ?>

                                            <div class="col px-3">
                                                <div style="width:3px; height:100%; background-color:#d8d8d8;"></div>
                                            </div>

                                            <?php for ($y = $nbLignePremiere + 1; $y < $nbLigne + 1; $y++) { ?>
                                                <div class="col">
                                                    <li class="seat">
                                                        <input type="radio" name="siege" id="<?php echo $y . $colones[$i] ?>" />
                                                        <label for="<?php echo $y . $colones[$i] ?>"><?php echo $y . $colones[$i] ?></label>
                                                    </li>
                                                </div>

                                            <?php
                                                if (($i == 0 || $i == $nbColone - 1) && ($y % 10 == 0)) {
                                                    echo '<div class="col p-3 exit"></div>';
                                                } else if ($y % 10 == 0) {
                                                    echo '<div class="col p-3"></div>';
                                                }
                                            }
                                            ?>

                                        </div>
                                    <?php
                                        if ($i == 3) {
                                            echo '<div class="row allee-centrale p-3"></div>';
                                        }
                                    }
                                    ?>
                                </div>

                            </div>

                            <!-- Légende de la sélection du siège -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-6"><span class="leg-">XXX</span> : Légende</div>
                                    <div class="col-6"></div>
                                </div>
                            </div>

                        </div>
                        <!-- Fien de sélection de siège -->

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-block bg-flyBook text-white">Valider</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                        </div>

                    </div>




                </form>
            </div>
        </div>
    </div>

    <!-- Ajout du footer du site -->
    <?php include "footer.php" ?>
</body>

</html>