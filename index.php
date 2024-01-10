<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include "./donnees/donnees.php" ?>

    <title><?php echo $SITE_TITRE ?> - Acceuil</title>
</head>

<body>
    <?php
        include "./header.php";
    ?>

    <div class="card img-fluid">
        <img class="card-img-top" src="./background.jpg" alt="background" style="width:100%">
        
        <div class="card-img-overlay" id="card-content">
            <div class="shadow" id="recherche">
                <form class="was-validated">
                    <div class="row" style="margin-bottom: 12px;">

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" id="depart" class="form-control" list="departOptions" placeholder="Départ" name="depart" required>
                                <label for="depart" class="form-label">Départ</label>
                                <datalist id="departOptions">
                                    <?php
                                        foreach ($aeroports as $a){
                                            echo "<option value= '".$a->ville." - ".$a->nom." ".$a->pays." (".$a->iata.")'>" ;
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
                                        foreach ($aeroports as $a){
                                            echo "<option value= '".$a->ville." - ".$a->nom." ".$a->pays." (".$a->iata.")'>" ;
                                        }
                                    ?>
                                </datalist>
                            </div>
                        </div>

                    </div>

                    <div class="row" style="margin-bottom: 12px;">
                        <div class="col-md-6" style="display: flex; align-items: center;">
                            <select class="form-select" style="height: 100%;" required>
                                <option value="simple" selected>Aller simple</option>
                                <option value="aller-retour">Aller-retour</option>
                            </select>
                        </div>

                        <div class="col-md-3" >
                            <div class="form-floating">
                                <input type="date" id="dateDepart" class="form-control" name="dateDepart" required>
                                <label for="dateDepart">Date de départ</label>
                            </div>
                        </div>

                        <div class="col-md-3" >
                            <div class="form-floating">
                                <input type="date" id="dateArrivee" class="form-control" name="dateArrivee" required>
                                <label for="dateArrivee">Date d'arrivée</label>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="padding-left: 12px; padding-right: 12px;">
                        <button type="submit" class="btn btn-block btn-light">Rechercher</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
        include "./footer.php";
    ?>
</body>

</html>