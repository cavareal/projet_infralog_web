<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "./donnees/donnees.php";
    include "./back/core_recherche.php";
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>
        <?php echo $SITE_TITRE ?> - Paiement
    </title>
</head>

<body>
    <!-- Ajout du header du site -->
    <?php include "header.php" ?>
    <div class="container " style="border-radius: 5px; margin-top: 100px;">

        <div class="card my-2">
            <div class="card-header text-white bg-flyBook">
                <h4>Formulaire de Paiement</h4>
            </div>
            <div class="card-body">
                <br>
                <div class="row">
                    <div class="col-sm-1">
                    </div>
                    <div class="col-sm-7">
                        <form action="traitement_paiement.php" method="post">
                            <!-- Informations de la carte -->
                            <div class="form-group">
                                <label for="card_number">Numéro de carte :</label>
                                <input type="text" class="form-control" name="card_number" id="card_number" placeholder="Numéro de carte" required>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="expiration_date">Date d'expiration :</label>
                                    <input type="text" class="form-control" name="expiration_date" id="expiration_date" placeholder="MM/YY" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="cvv">CVV :</label>
                                    <input type="text" class="form-control" name="cvv" id="cvv" placeholder="CVV" required>
                                </div>
                            </div>

                            <!-- Informations du titulaire de la carte -->
                            <div class="form-group">
                                <label for="card_holder_name">Titulaire de la carte :</label>
                                <input type="text" class="form-control" name="card_holder_name" id="card_holder_name" placeholder="Nom du titulaire" required>
                            </div>

                            <!-- Montant à payer -->
                            <div class="form-group">
                                <label for="amount">Montant à payer :</label>
                                <input type="text" class="form-control" name="amount" id="amount" placeholder="Montant en euros" required>
                            </div>

                            <!-- Bouton de soumission -->
                            <button type="submit" class="btn btn-primary">Payer</button>

                        </form>
                        <br>
                    </div>
                    <div class="col-sm-4 d-flex align-items-center justify-content-center"><img src="images/carte_logo.jpg" style="max-width: 300px; max-height: 300px;" class="img-fluid"></div>
                </div>
                <p><em>* Vous n'êtes pas vraiment obligés de rentrer vos coordonnées bancaires pour vos tests. Mais si vous vous sentez d'humeur charitable le groupe 7 sera heureux d'accepter toute donation.</em></p>
            </div>
        </div>
    </div>

    <?php
    include "./footer.php";
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>