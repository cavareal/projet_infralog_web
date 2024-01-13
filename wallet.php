<!-- Cette page permet de stocker les billets récemment achetés et de voir son historique de vol-->
<!DOCTYPE html>
<html>

<head>
    <title>Portefeuille</title>

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
    <!--Insertion du header-->
    <?php include("header.php") ?>

    <?php
        //Confirmation d'annulation du vol
        if(isset($_POST["annulation"])) {
            echo '<div class="alert alert-success">
            <strong>Succès !</strong> Nous avons pris votre demande d\'annulation en compte. Vous serez remboursez dans les prochaines 48 heures. Dans le cas contraire,
            veuillez contacter notre agence.
            </div>';

            // Destinataire (adresse e-mail générique)
            $destinataire = "alexis.bajolle@gmail.com";

            $sujet = "Test d'envoi d'e-mail";
            $message = "Ceci est un test d'envoi d'e-mail depuis PHP.";
            $headers = "From: webmaster@example.com\r\n";
            $headers .= "Reply-To: webmaster@example.com\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
            
        }
    ?>

    <!--Prochains tickets d'avion à utiliser-->
    <div class="container my-5">
        <div class="row">
            <div class="col-sm-6 pd-3">
                <h3>Mes réservations  <i class="fa fa-ticket"></i></h3>
                <!--Exemple ticket d'avion (à répéter selon le nombre de vol)-->
                <div class="card my-5">
                    <div class="card-header text-white" id="couleur-logo"><i class="fa fa-exchange" aria-hidden="true"></i>  Départ : PARIS / Arrivée : NYC</div>
                    <div class="card-body">Date de départ: 12/01/2024 à 11:58 <br> Lieu: Paris-Charles de Gaulles, PARIS, FR
                        <br><br> Date d'arrivée: 12/01/2024 à 14h30 <br> Lieu: International JFK, NYC, USA </div>
                    <div class="card-footer text-white" id="couleur-logo">
                        <form method="post">
                            <button type="button" class="btn text-white" id="couleur-logo" data-bs-toggle="modal" data-bs-target="#myModal"> Annuler la réservation </button>
                            <!--S'assure que le client est certain de vouloir annuler son billet-->
                            <div class="modal" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                    <div class="modal-header">
                                        <h4 class="modal-title text-dark">Annulation de billet</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body text-dark">
                                        <p> Êtes-vous certain de vouloir annuler votre billet ? Toute confirmation d'annulation de vol est définitive. </p>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger" name="annulation" data-bs-dismiss="modal">Confirmer mon annulation</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--Historique des vols-->
            <div class="col-sm-6">
                <h3>Mon historique <i class="fa fa-history"></i></h3>
                <div class="timeline">
                    <article>
                        <h2>Paris/NYC</h2>
                        <ul>
                        <li><span>Départ</span> Paris</li>
                        <li><span>Date de départ</span> 01/04/2022, 11:58</li>
                        <li><span>Place</span>A5</li>
                        <li><span>Arrivée</span> NYC</li>
                        <li><span>Date d'arrivée</span> 1/04/2022, 14:50</li>
                        </ul>
                    </article>
                    <article>
                        <h2>NYC/Paris</h2>
                        <ul>
                        <li><span>Départ</span> NYC</li>
                        <li><span>Date de départ</span> 27/03/2022, 22:58</li>
                        <li><span>Place</span>B5</li>
                        <li><span>Arrivée</span> Paris</li>
                        <li><span>Date d'arrivée</span> 28/03/2022, 1:33</li>
                        </ul>
                    </article>
                    <article>
                        <h2>Paris/St Denis</h2>
                        <ul>
                        <li><span>Départ</span> Paris</li>
                        <li><span>Date de départ</span> 12/01/2022, 10:07</li>
                        <li><span>Place</span>D9</li>
                        <li><span>Arrivée</span> St Denis</li>
                        <li><span>Date d'arrivée</span> 12/01/2022, 17:50</li>
                        </ul>
                    </article>
                    </div>
            </div>
        </div>
    </div>

</body>

</html>


