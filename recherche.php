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
            <h1><b>Vols
                    <?php echo explode(" ", $_GET['depart'])[0] . ' - ' . explode(" ", $_GET['arrivee'])[0] . " à partir du " . date("d/m/Y", strtotime($_GET['dateDepart'])) ?>
                </b></h1>
        </div>

        <div class="row">
            <h4><b>Résultats (<?php echo count($vols) //Il n'y a pas d'erreur sur cette ligne ($vols est bien un array) 
                                ?>):
                </b></h4>
        </div>
    </div>

    <div class="container mt-5 mb-5" style="border-radius: 5px;">

        <?php
        // Il n'y a pas d'erreur sur cette ligne non plus ($vols est bien un array)
        for ($i = 0; $i < count($vols); $i++) {
            $vol = $vols[$i];
        ?>

            <div class="card my-2">
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
                        <div class="col-sm-4 d-flex align-items-center justify-content-center">
                            <button class="btn btn-lg bg-flyBook text-white w-75 " id="reservation_btn" data-bs-toggle="modal" data-bs-target="#myModal">
                                À partir de <br> <b>
                                    <?php echo $vol['prixStandard'] ?> €
                                </b>
                            </button>
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
                                        <h4 class="card-title">Classe standard<br>
                                            <pre> </pre>
                                        </h4>
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
                                        <h4 class="card-title">Première classe<br>
                                            <pre> </pre>
                                        </h4>
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
                            <div class="col-sm-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="mySwitch" name="garantie" value="oui">
                                    <label class="form-check-label" for="mySwitch">Assurance annulation</label>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <p>
                                    Le remboursement des frais liés à l'annulation d'un vol est soumis aux conditions suivantes. Tout passager ayant souscrit à l'assurance annulation en option au moment de l'achat du billet pourra prétendre à un remboursement intégral des frais en cas d'annulation. Pour être éligible, l'annulation doit être notifiée à notre service client au moins 48 heures avant l'heure de départ initialement prévue. Les passagers n'ayant pas choisi l'assurance annulation en option ne pourront prétendre à aucun remboursement en cas d'annulation, sauf en cas de circonstances exceptionnelles clairement définies dans nos conditions générales. Les demandes de remboursement doivent être accompagnées des documents justificatifs nécessaires. Il est important de noter que l'assurance annulation en option n'est pas remboursable une fois souscrite, même en cas d'annulation du vol. Nous recommandons à tous nos passagers de lire attentivement les termes et conditions de l'assurance avant de prendre une décision
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
                            $placesOccupees = bddGetPlacesOccupees('B737000', 'LHR', 'CDG', '2024/04/06 12:34');
                            $carac = bddGetAvionCarac('B737000', 'LHR', 'CDG', '2024/04/06 12:34');
                            $nbColonne = $carac['nbColonne'];
                            $nbLignePremiere = intdiv($carac['nbPremiereClasse'], $nbColonne);
                            $nbLigne = intdiv($carac['nbPassager'], $nbColonne);
                            $colones = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
                            ?>
                            
                            <div class="plane fuselage" style="background-color: whitesmoke;">

                                <div class="container-fluid">

                                    <?php for ($i = $nbColonne - 1; $i > -1; $i--) { ?>
                                        <div class="row colone-<?php echo $colones[$i] ?>" style="flex-wrap: nowrap;">
                                            <?php
                                            if (($i == 0 || $i == $nbColonne - 1)) {
                                                echo '<div class="col p-3 exit"></div>';
                                            } else {
                                                echo '<div class="col p-3"></div>';
                                            }
                                            ?>
                                            <?php for ($p = 1; $p < $nbLignePremiere; $p++) {
                                                $place = $p . $colones[$i];
                                                if (in_array($place, $placesOccupees)) {
                                                    $desactive = "disabled";
                                                } else {
                                                    $desactive = '';
                                                }
                                            ?>

                                                <div class="col">
                                                    <li class="seat premiere">
                                                        <input type="radio" name="siege" id="<?php echo $place ?>" <?php echo $desactive ?> />
                                                        <label for="<?php echo $place ?>"><?php echo $place ?></label>
                                                    </li>
                                                </div>
                                            <?php } ?>

                                            <div class="col px-3">
                                                <div style="width:3px; height:100%; background-color:#d8d8d8;"></div>
                                            </div>

                                            <?php for ($y = $nbLignePremiere + 1; $y < $nbLigne + 1; $y++) {
                                                $place = $y . $colones[$i];
                                                if (in_array($place, $placesOccupees)) {
                                                    $desactive = "disabled";
                                                } else {
                                                    $desactive = '';
                                                }
                                            ?>
                                                <div class="col">
                                                    <li class="seat">
                                                        <input type="radio" name="siege" id="<?php echo $place ?>" <?php echo $desactive ?> />
                                                        <label for="<?php echo $place ?>"><?php echo $place ?></label>
                                                    </li>
                                                </div>

                                            <?php
                                                if (($i == 0 || $i == $nbColonne - 1) && ($y % 10 == 0)) {
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
                                    <div class="col-1"></div>

                                    <div class="col-1">
                                        <li class="seat legende">
                                            <input type="radio" id="siegeLibreLegende" checked />
                                            <label for="siegeLibreLegende">XXX</label>
                                        </li>
                                    </div>

                                    <div class="col-2" style="align-items: center; display: flex;">
                                        Places libres
                                    </div>

                                    <div class="col-1">
                                        <li class="seat legende">
                                            <input type="radio" id="siegeReserveLegende" disabled />
                                            <label for="siegeReserveLegende">XXX</label>
                                        </li>
                                    </div>

                                    <div class="col-2" style="align-items: center; display: flex;">
                                        Places déjà réservées
                                    </div>

                                    <div class="col-1">
                                        <li class="seat legende">
                                            <input type="radio" id="siegeSelectioneeLegende" checked readonly />
                                            <label for="siegeSelectioneeLegende">XXX</label>
                                        </li>
                                    </div>

                                    <div class="col-2" style="align-items: center; display: flex;">
                                        Place sélectionnée
                                    </div>
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