<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    include "./back/core_recherche.php";
    include "./donnees/donnees.php"
    ?>

    <title><?php echo $SITE_TITRE ?> - Accueil</title>
</head>

<body>
    <?php
    $aeroports = bddGetAeroport();
    include "./header.php";
    ?>

    <div class="card img-fluid">
        <img class="card-img-top" src="./images/background.jpg" alt="background">

        <div class="card-img-overlay" id="card-content">
            <div class="shadow" id="recherche">
                <form action="./recherche.php" class="needs-validation">
                    <div class="row form-row">

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" id="depart" class="form-control" list="departOptions" placeholder="Départ" name="depart" required>
                                <label for="depart" class="form-label">Départ</label>
                                <datalist id="departOptions">
                                    <?php
                                    foreach ($aeroports as $a) {
                                        echo "<option value= '" . $a['ville'] . " - " . $a['nom'] . " " . $a['pays'] . " (" . $a['acronyme'] . ")'>";
                                    }
                                    ?>
                                </datalist>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" id="arrivee" class="form-control" list="arriveeOptions" placeholder="Arrivée" name="arrivee" required>
                                <label for="arrivee">Arrivée</label>
                                <datalist id="arriveeOptions">
                                    <?php
                                    foreach ($aeroports as $a) {
                                        echo "<option value= '" . $a['ville'] . " - " . $a['nom'] . " " . $a['pays'] . " (" . $a['acronyme'] . ")'>";
                                    }
                                    ?>
                                </datalist>
                            </div>
                        </div>

                    </div>

                    <div class="row form-row">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="date" id="dateDepart" class="form-control" name="dateDepart" required>
                                <label for="dateDepart">Date de départ</label>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="search-button">
                        <button type="submit" class="btn btn-block btn-light">Rechercher</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="index-footer" class="container-fluid">
        <?php
        include "./footer.php";
        ?>
    </div>
</body>

</html>