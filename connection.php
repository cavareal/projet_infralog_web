
<!-- Cette page permet la création de compte et la connexion de l'utilisateur-->
<!DOCTYPE html>
<?php //include ("core_connection.php"); ?>
</html>
    <head>
        <title> Authentification </title>

        <!-- Latest bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Latest bootstrap 5 JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>
    <div class="container mt-3">
        <div class="row">
    <!--Demande les informations de connexion (pour utilisateurs déjà inscrit)-->
            <div class="col-md">
                <h3>Connexion</h3>
                <form class="conn" action="core.php" method="POST">
                    <i class="fas fa-user"></i>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="mail" name="email" placeholder="Email">
                    </div>
                    <i class="fas fa-lock"></i>
                    <div class="form-floating mb-3 mt-3">
                        <input type="password" class="mdp" name="motdepasse" placeholder="Mot de passe">
                    </div>
                    <input type="submit" class="connexion" name="Se connecter">
                </form>
            </div>

    <!--Demande les informations pour l'inscription (pour utilisateurs pas encore inscrit)-->
            <div class="col-md">
                <h3>Inscription</h3>
                <form class="inscription" action="core.php" method="POST">
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="mail" name="email_inscri" placeholder="Email">
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="password" class="mdp" name="motdepasse_inscri" placeholder="Mot de passe">
                    </div>
                    <input type="submit" class="inscription" name="S'inscrire">
                </form>
            </div>
        </div>
    </div>
    </body>
</html>

<!--Gestion des erreurs-->
<?php
if(isset($_GET['erreur'])){
    $err=$_GET['erreur'];
    if($err==1||$err==2){
        echo"<p style='color:red' > Email ou mot de passe incorect</p>";
    }
    if($err==3){
        echo"<p style='color:red' > Le mot de passe n'est pas conforme, il doit contenir au moins : 1 majuscule, 1 minuscule, 1 chiffre et 1 caractère spécial</p>";
    }
    if($err==4){
        echo"<p style='color:red' > Email déjà enregistré</p>";
    }
    if($err==5){
        echo"<p style='color:red' > Email non conforme</p>";
    }
    if($err==6){
        echo"<p style='color:red' > Veuillez rentrer des valeurs</p>";
    }
}
?>