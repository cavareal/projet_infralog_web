<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="./favicon.png">

<<<<<<< Updated upstream
    

=======
>>>>>>> Stashed changes
    <!-- Latest bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest bootstrap 5 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <link href="./css/style.css" rel="stylesheet">
<<<<<<< Updated upstream
</head>

<body>
  
=======

</head>

<body>

    <!--Permet la deconnexion-->
    <?php
    if (isset($_GET['deco'])) {
        $_SESSION['pseudo'] = '';
    }
    ?>

>>>>>>> Stashed changes
    <header>
        <nav class="navbar navbar-expand-md bg-white sticky-top shadow-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="./">
<<<<<<< Updated upstream
                    <img src="./images/favicon.png" alt="Logo-favicon.png" class="rounded-pill">
                    <img src="./images/logo_nom.png" alt="Logo-favicon.png">
=======
                    <img src="./favicon.png" alt="Logo-favicon.png" class="rounded-pill">
                    <img src="./logo_nom.png" alt="Logo-favicon.png">
>>>>>>> Stashed changes
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
<<<<<<< Updated upstream
                
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                    </ul>
                
                    <div class="d-flex">
                        <a href="./connection.php?form=connexion" class="btn border">Se connecter</a>
                        <a href="./connection.php" class="btn border">Créer mon compte</a>
                    </div>
=======

                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" <?php if (empty($_SESSION['pseudo'])) {
                                                    echo 'href="./connection.php?form=connexion"';
                                                } else {
                                                    echo 'href="./profile.php"';
                                                } ?>>Mon profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" <?php if (empty($_SESSION['pseudo'])) {
                                                    echo 'href="./connection.php?form=connexion"';
                                                } else {
                                                    echo 'href="./wallet.php"';
                                                } ?>>Mes réservations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contactez-nous</a>
                        </li>
                    </ul>

                    <?php if (empty($_SESSION['pseudo'])) { ?>
                        <div class="d-flex">
                            <a class="btn" href="./connection.php?form=connexion">Se connecter</a>
                            <a class="btn" href="./connection.php?form=inscription">Créer mon compte</a>
                        </div>
                    <?php } else { ?>
                        <div class="d-flex">
                            <form action="" method="GET">
                                <button class="btn" type="submit" name="deco" value="deco">Se déconnecter</button>
                            </form>
                            <img src="./default_picture.png" alt="default_picture.png" class="rounded-pill">
                        </div>
                    <?php } ?>
>>>>>>> Stashed changes
                </div>
            </div>
        </nav>
    </header>

</body>

</html>