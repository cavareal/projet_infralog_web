<!-- Cette page permet la création de compte et la connexion de l'utilisateur-->
<!DOCTYPE html>
<html>

<head>
    <title>Informations personnelles</title>
    <!-- Latest bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest bootstrap 5 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!--Récapitulatif des miles-->
    <p> Miles obtenus : 250 </p>

    <!--Accéder au portefeuille et à l'historique des vols-->
    <input class="button" type="submit" name="portefeuille">

    <!--Récapitulatif des informations personnelles du compte-->
    <div class="col-md">
        <h3>Mes informations personnelles</h3>
        <div class="form-floating mb-3 mt-3">
            <input class="form-control" type="text" id="prenom" name="prenom" value="Bajolle" placeholder="Prénom" readOnly="readOnly">
            <label for="prenom">Prénom :</label>
        </div>
        <div class="form-floating mb-3 mt-3">
            <input class="form-control" type="text" id="nom" name="nom" value="Alexis" placeholder="Nom" readOnly="readOnly">
            <label for="nom">Nom :</label>
        </div>
        
        <!--Rentrer calendrier-->
        <div class="form-floating mb-3 mt-3">
            <input class="form-control" type="text" id="datenaissance" value="11/04/2002" placeholder="Date de naissance" readOnly="readOnly">
            <label for="datenaisssance">Date de naissance :</label>
        </div>
        <div class="form-floating mb-3 mt-3">
            <input class="form-control" type="text" id="email" value="alexis.bajolle@reseau.eseo.fr" placeholder="Email" readOnly="readOnly">
            <label for="email">Email :</label>
        </div>
    </div>

    <!--Permet la modification des informations-->
    <input class="button" type="submit" name="modifier">

</body>

</html>