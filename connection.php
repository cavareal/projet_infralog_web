<!-- Cette page permet la création de compte et la connexion de l'utilisateur-->
<!DOCTYPE html>
<?php include("./back/core_connection.php");
?>

</html>

<head>
    <?php include "./donnees/donnees.php" ?>
    <title>
        <?php echo $SITE_TITRE ?> - Authentification
    </title>

    <!-- Latest bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest bootstrap 5 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!--Intégration page css-->
    <link rel="stylesheet" href="css/style_connexion.css">
</head>

<body>

    <!--Insertion du header-->
    <?php include("header.php") ?>

    <div class="card img-fluid">
        <img class="card-img-top" src="./images/avion_connexion.jpg" alt="avion_connexion">
        <div class="card-img-overlay">
            <?php
            //Affichage erreurs de connexion
            if (isset($_GET['erreur'])) {
                echo '<div class="alert alert-danger">
            <strong>Impossible de vous connecter !</strong> ' . $messageErreur . '
            </div>';
            }
            ?>
            <div class="container mt-3 d-flex align-items-center justify-content-center">
                <!--Permet de switcher entre la partie connexion et inscription-->
                <?php if (isset($_GET['form']) && $_GET['form'] == 'inscription') { ?>
                    <!--Demande les informations pour l'inscription (pour utilisateurs pas encore inscrit)-->
                    <div class="card my-5" id="carte">
                        <div class="card-header text-white" id="couleur_logo">Inscription</div>
                        <div class="card-body">
                            <form class="inscription" method="POST">
                                <div class="form-floating mb-3 mt-3">
                                    <input type="text" class="form-control" name="nom_inscri" placeholder="Nom" required>
                                    <label for="nom_inscri">Nom</label>
                                </div>
                                <div class="form-floating mb-3 mt-3">
                                    <input type="text" class="form-control" name="prenom_inscri" placeholder="Prenom"
                                        required>
                                    <label for="prenom_inscri">Prénom</label>
                                </div>
                                <div class="form-floating mb-3 mt-3">
                                    <input class="form-control" type="date" name="datenaissance"
                                        placeholder="Date de naissance" required>
                                    <label for="datenaisssance">Date de naissance :</label>
                                </div>
                                <div class="form-floating mb-3 mt-3">
                                    <input type="text" class="form-control" name="email_inscri" placeholder="Email"
                                        required>
                                    <label for="email_inscri">Email</label>
                                </div>
                                <div class="form-floating mb-3 mt-3">
                                    <input type="password" class="form-control" name="motdepasse_inscri"
                                        placeholder="Mot de passe" required>
                                    <label for="motdepasse_inscri">Mot de passe</label>
                                </div>
                                <div class="form-floating mb-3 mt-3">
                                    <input type="password" class="form-control" name="motdepasseconfirm"
                                        placeholder="Confirmation mot de passe">
                                    <label for="motdepasseconfirm">Confirmation mot de passe</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="condition" required>
                                    <label class="form-check-label" for="condition">En cochant cette case, j'accepte les
                                        conditions d'utilisation de FlyBook'ESEO</label>
                                    <div class="invalid-feedback">Vous devez cocher cette case pour continuer</div>
                                </div>
                                <input type="submit" class="btn text-white" id="couleur_logo" name="inscrire"
                                    value="S'inscrire">
                            </form>
                            <br>
                            <p> Vous avez déjà un compte ? <a href="?form=connexion"> Connectez-vous</a></p>
                        </div>
                    </div>
                <?php } else { ?>
                    <!--Demande les informations de connexion (pour utilisateurs déjà inscrit)-->
                    <div class="card my-5" id="carte">
                        <div class="card-header text-white" id="couleur_logo">Connexion</div>
                        <div class="card-body">
                            <form class="conn" method="POST">
                                <i class="fas fa-user"></i>
                                <div class="form-floating mb-3 mt-3">
                                    <input class="form-control" type="text" name="email" placeholder="Email">
                                    <label for="email">Email</label>
                                </div>
                                <i class="fas fa-lock"></i>
                                <div class="form-floating mb-3 mt-3">
                                    <input type="password" class="form-control" name="motdepasse"
                                        placeholder="Mot de passe">
                                    <label for="motdepasse">Mot de passe</label>
                                </div>
                                <input type="submit" class="btn text-white" id="couleur_logo" name="connecter"
                                    value="Se connecter">
                            </form>
                            <br>
                            <p> Vous n'êtes pas encore inscrit ? <a href="?form=inscription"> Créez-vous un compte </a></p>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>
    </div>
    </div>
    <?php include("footer.php") ?>

</body>

</html>