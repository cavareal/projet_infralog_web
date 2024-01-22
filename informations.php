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
    if (empty($_SESSION['pseudo']) || ($_SESSION['pseudo'] == '')) {
        $_SESSION['urlRetour'] = $_SERVER['PHP_SELF'];
        header('location: ./connection.php');
    } else {
        include "./header.php";
    ?>

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
                    <a class="nav-link disabled" href="#">Récapitulatif</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Paiement</a>
                </li>
            </ul>
        </nav>

        <form method="post" class="needs-validation" action="./recapitulatif.php">
            <div class="container my-3">
                <h3>Informations personnelles du voyageur</h3>
                <div class="form-floating mb-3 mt-3">
                    <input class="form-control" type="text" id="prenom" name="prenom" placeholder="Prénom" required>
                    <label for="prenom">Prénom :</label>
                </div>
                <div class="form-floating mb-3 mt-3">
                    <input class="form-control" type="text" id="nom" name="nom" placeholder="Nom" required>
                    <label for="nom">Nom :</label>
                </div>

                <div class="form-floating mb-3 mt-3">
                    <input class="form-control" type="date" id="datenaissance" name="datenaissance" placeholder="Date de naissance" required>
                    <label for="datenaisssance">Date de naissance :</label>
                </div>
                <div class="form-floating mb-3 mt-3">
                    <input class="form-control" type="text" id="email" name="email" placeholder="Email" required>
                    <label for="email">Email :</label>
                </div>

                <div class="d-grid" style="justify-content: center;">
                    <button type="submit" class="btn btn-lg btn-block bg-flyBook text-white">Valider</button>
                </div>
            </div>
        </form>

        <div id="index-footer" class="container-fluid">
        <?php
        include "./footer.php";
    }
        ?>
        </div>
</body>

</html>