<!-- Cette page permet de stocker les billets récemment achetés et de voir son historique de vol-->
<!DOCTYPE html>
<?php include("back/core_wallet.php");
?>
<html>

<head>
    <?php include "./donnees/donnees.php" ?>
    <title>
        <?php echo $SITE_TITRE ?> - Mes réservations
    </title>

    <!-- Latest bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Latest bootstrap 5 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!--Intégration page css-->
    <link rel="stylesheet" href="css/style_wallet.css">

</head>

<body>
    <?php if ($_SESSION['pseudo'] == !'') { ?>
        <!--Insertion du header-->
        <?php include("header.php") ?>

        <!--Message d'annulation-->
        <?php annulation(); ?>

        <?php $billets = reservation();
        $histo_billets = historique();
        ?>

        <!--Prochains tickets d'avion à utiliser-->
        <div class="container my-5">
            <div class="row">
                <div class="col-sm-6 pd-3">
                    <h3>Mes réservations <i class="fa fa-ticket"></i></h3>
                    <!--Exemple ticket d'avion (à répéter selon le nombre de vol)-->

                    <?php if ($billets) { ?>
                        <?php
                        foreach ($billets as $billet) {
                            ?>

                            <div class="card my-5">
                                <div class="card-header text-white" id="couleur-logo"><i class="fa fa-exchange"
                                        aria-hidden="true"></i> Départ :
                                    <?php echo $billet['villeDepart'] ?> / Arrivée :
                                    <?php echo $billet['villeArrivee'] ?>
                                </div>
                                <div class="card-body">Date de départ:
                                    <?php echo str_replace("-", "/", $billet['dateHeureDepart']) ?> <br> Lieu:
                                    <?php echo $billet['nomDepart'] . ', ' . $billet['villeDepart'] . ', ' . $billet['iataDepart'] ?>
                                    <br><br> Date d'arrivée:
                                    <?php echo str_replace("-", "/", $billet['dateHeureArrivee']) ?> <br> Lieu:
                                    <?php echo $billet['nomArrivee'] . ', ' . $billet['villeArrivee'] . ', ' . $billet['iataArrivee'] ?>
                                </div>
                                <div class="card-footer text-white" id="couleur-logo">
                                    <form method="post">
                                        <input type="hidden" name="idBilletAnnuler"
                                            value="<?php echo $billet['numeroReservation']; ?>">
                                        <button type="button" class="btn text-white" id="couleur-logo" data-bs-toggle="modal"
                                            data-bs-target="#myModal"> Annuler la réservation </button>
                                        <!--S'assure que le client est certain de vouloir annuler son billet-->
                                        <div class="modal" id="myModal">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <h4 class="modal-title text-dark">Annulation de billet</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <div class="modal-body text-dark">
                                                        <p> Êtes-vous certain de vouloir annuler votre billet ? Toute confirmation
                                                            d'annulation de vol est définitive. </p>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger" name="annulation"
                                                            data-bs-dismiss="modal">Confirmer mon annulation</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php } ?>
                        <!--Texte de remplacement quand il n'y a pas de réservation-->
                    <?php } else { ?>
                        <div class="card my-5">
                            <div class="card-header text-white" id="couleur-logo"></br></div>
                            <div class="card-body"></br>
                                <h4 class="text-center"> Vous n'avez pas de réservation</h4></br>
                            </div>
                            <div class="card-footer text-white" id="couleur-logo"></br></div>
                        </div>
                    <?php } ?>
                </div>

                <!--Historique des vols-->
                <div class="col-sm-6">
                    <h3>Mon historique <i class="fa fa-history"></i></h3>
                    <?php if ($histo_billets) { ?>
                        <?php
                        foreach ($histo_billets as $histo_billet) {
                            ?>
                            <!--Si la place est vide c'est que le billet a été annulé -->
                            <?php if ($histo_billet['place'] == !'') { ?>
                                <div class="card my-5 ">
                                    <div class="card-header text-white bg-success"><i class="fa fa-exchange" aria-hidden="true"></i>
                                        Départ :
                                        <?php echo $histo_billet['villeDepart'] ?>/ Arrivée :
                                        <?php echo $histo_billet['villeArrivee'] ?>
                                    </div>
                                    <div class="card-body">Date de départ:
                                        <?php echo str_replace("-", "/", $histo_billet['dateHeureDepart']) ?> <br> Lieu:
                                        <?php echo $histo_billet['nomDepart'] . ', ' . $histo_billet['villeDepart'] . ', ' . $histo_billet['iataDepart'] ?>
                                        <br><br> Date d'arrivée:
                                        <?php echo str_replace("-", "/", $histo_billet['dateHeureArrivee']) ?> <br> Lieu:
                                        <?php echo $histo_billet['nomArrivee'] . ', ' . $histo_billet['villeArrivee'] . ', ' . $histo_billet['iataArrivee'] ?>
                                    </div>
                                </div>

                            <?php } else { ?>
                                <div class="card my-5 ">
                                    <div class="card-header text-white bg-danger"><i class="fa fa-exchange" aria-hidden="true"></i>
                                        Départ :
                                        <?php echo $histo_billet['villeDepart'] ?>/ Arrivée :
                                        <?php echo $histo_billet['villeArrivee'] ?> (ANNULATION)
                                    </div>
                                    <div class="card-body">Date de départ:
                                        <?php echo str_replace("-", "/", $histo_billet['dateHeureDepart']) ?> <br> Lieu:
                                        <?php echo $histo_billet['nomDepart'] . ', ' . $histo_billet['villeDepart'] . ', ' . $histo_billet['iataDepart'] ?>
                                        <br><br> Date d'arrivée:
                                        <?php echo str_replace("-", "/", $histo_billet['dateHeureArrivee']) ?> <br> Lieu:
                                        <?php echo $histo_billet['nomArrivee'] . ', ' . $histo_billet['villeArrivee'] . ', ' . $histo_billet['iataArrivee'] ?>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                        <!--Texte de remplacement quand il n'y a pas d'historique'-->
                    <?php } else { ?>
                        <div class="card my-5">
                            <div class="card-header text-white" id="couleur-logo"></br></div>
                            <div class="card-body"></br>
                                <h4 class="text-center"> Vous n'avez jamais voyagé avec nous ...</h4></br>
                            </div>
                            <div class="card-footer text-white" id="couleur-logo"></br></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php include("footer.php") ?>
    <?php } else {
        header("Location: index.php");
    } ?>
</body>

</html>