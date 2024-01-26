<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    include "./donnees/donnees.php";
    include "./back/core_recherche.php";
    ?>

    <title><?php echo $SITE_TITRE ?> - Recherche</title>
</head>

<body>
    <?php
    if (!isset($_SESSION['pseudo']) || ($_SESSION['pseudo'] == '')) {
        $_SESSION['urlRetour'] = $_SERVER['PHP_SELF'] . '?numeroVol=' . $_GET['numeroVol'];
        header('location: ./connection.php');
    } else {
        include "./header.php";
        $infos = bddGetInfoClient($_SESSION['pseudo']);
        $numeroVol = $_GET['numeroVol'];

    ?>

        <link href="./css/style_seat_selector.css" rel="stylesheet">

        <!-- Barre de navigation de la recherche -->
        <nav class="shadow bg-white p-2 border">
            <ul class="nav nav-tabs nav-justified">
                <li class="nav-item">
                    <a class="nav-link" href="./">Recherche</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./recherche.php">Vol aller</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Informations voyageur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Paiement</a>
                </li>
            </ul>
        </nav>

        <form method="post" class="needs-validation" action="./payment.php">
            <div class="card" style="word-wrap:normal;">

                <div class="card-header">
                    <h3>Informations personnelles du voyageur</h3>
                </div>
                <div class="card-body my-3">

                    <div class="form-floating mb-3 mt-3">
                        <input class="form-control" type="text" id="prenom" name="prenom" placeholder="Prénom" value="<?php echo $infos['prenom'] ?>" required>
                        <label for="prenom">Prénom :</label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input class="form-control" type="text" id="nom" name="nom" placeholder="Nom" value="<?php echo $infos['nom'] ?>" required>
                        <label for="nom">Nom :</label>
                    </div>

                    <div class="form-floating mb-3 mt-3">
                        <input class="form-control" type="date" id="datenaissance" name="datenaissance" placeholder="Date de naissance" value="<?php echo $infos['dateNaissance'] ?>" required>
                        <label for="datenaisssance">Date de naissance :</label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input class="form-control" type="text" id="email" name="email" placeholder="Email" value="<?php echo $infos['email'] ?>" required>
                        <label for="email">Email :</label>
                    </div>
                </div>

                <!-- Séparateur -->
                <div class="row">
                    <hr class="my-3">
                </div>

                <!-- Sélection du siège -->

                <?php
                $placesOccupees = bddGetPlacesOccupees($numeroVol);
                $carac = bddGetAvionCarac($numeroVol);
                $nbColonne = $carac['nbColonne'];
                $nbLignePremiere = intdiv($carac['nbPremiereClasse'], $nbColonne);
                $nbLigne = intdiv($carac['nbPassager'], $nbColonne);
                $colones = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
                ?>
                <div class="container my-3">
                    <h3>Choix de la place</h3>
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
                                                <input type="radio" name="siege" id="<?php echo $place ?>" value="<?php echo $place ?>" <?php echo $desactive ?> />
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
                                                <input type="radio" name="siege" id="<?php echo $place ?>" value="<?php echo $place ?>" <?php echo $desactive ?> />
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
                            <div class="col-1">
                                <li class="seat legende">
                                    <input type="radio" id="siegeLibrePremiereLegende" disabled />
                                    <label for="siegeLibrePremiereLegende">XXX</label>
                                </li>
                            </div>

                            <div class="col-2" style="align-items: center; display: flex;">
                                Sièges première classe libres
                            </div>

                            <div class="col-1">
                                <li class="seat legende">
                                    <input type="radio" id="siegeLibreLegende" disabled />
                                    <label for="siegeLibreLegende">XXX</label>
                                </li>
                            </div>

                            <div class="col-2" style="align-items: center; display: flex;">
                                Sièges standards libres
                            </div>

                            <div class="col-1">
                                <li class="seat legende">
                                    <input type="radio" id="siegeReserveLegende" disabled />
                                    <label for="siegeReserveLegende">XXX</label>
                                </li>
                            </div>

                            <div class="col-2" style="align-items: center; display: flex;">
                                Sièges réservés
                            </div>

                            <div class="col-1">
                                <li class="seat legende">
                                    <input type="radio" id="siegeSelectioneLegende" disabled />
                                    <label for="siegeSelectioneLegende">XXX</label>
                                </li>
                            </div>

                            <div class="col-2" style="align-items: center; display: flex;">
                                Siège sélectionné
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fin de sélection de siège -->

                <!-- Séparateur -->
                <div class="row">
                    <hr class="my-3">
                </div>

                <!-- Sélection de la garantie -->

                <div class="container my-3">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-2">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="mySwitch" name="garantie" value="oui" >
                            <label class="form-check-label" for="mySwitch">Assurance annulation</label>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <br>
                        <p style="text-align: justify;">
                            Le remboursement des frais liés à l'annulation d'un vol est soumis aux conditions suivantes. Tout passager ayant souscrit à l'assurance annulation en option au moment de l'achat du billet pourra prétendre à un remboursement intégral des frais en cas d'annulation. Pour être éligible, l'annulation doit être notifiée à notre service client au moins 48 heures avant l'heure de départ initialement prévue. Les passagers n'ayant pas choisi l'assurance annulation en option ne pourront prétendre à aucun remboursement en cas d'annulation, sauf en cas de circonstances exceptionnelles clairement définies dans nos conditions générales. Les demandes de remboursement doivent être accompagnées des documents justificatifs nécessaires. Il est important de noter que l'assurance annulation en option n'est pas remboursable une fois souscrite, même en cas d'annulation du vol. Nous recommandons à tous nos passagers de lire attentivement les termes et conditions de l'assurance avant de prendre une décision
                        </p>
                    </div>
                </div>


                <!-- Séparateur -->
                <div class="row">
                    <hr class="my-3">
                </div>

                <!-- Sélection de bagage en soute -->

                <div class="container my-3">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-2">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="monSwitch" name="bagage" value="oui" >
                            <label class="form-check-label" for="monSwitch">Bagage en soute</label>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <br>
                        <p style="text-justify:auto;">
                            En sélectionnant cette option vous payerez <?php echo $PRIX_BAGAGE_SOUTE ?>€ en plus.
                        </p>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" style="display: none;" name="numeroVol" value="<?php echo $_GET['numeroVol'] ?>">
                        <input type="submit" class="btn bg-flyBook text-white w-15" value="Valider">
                    </div>
                </div>
            </div>

        </form>

    <?php
        include "./footer.php";
    }
    ?>

</body>

</html>