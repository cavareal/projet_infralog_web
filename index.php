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
                <form>
                    <div class="row" style="margin-bottom: 12px;">
                        <div class="col-md-4" style="display: flex; align-items: center;">
                            <select class="form-select" style="height: 100%;">
                                <option value="simple" selected>Aller simple</option>
                                <option value="aller-retour">Aller-retour</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="depart" placeholder="Départ" name="depart">
                                <label for="depart">Départ</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="arrivee" placeholder="Arrivée" name="arrivee">
                                <label for="arrivee">Arrivée</label>
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

    <p>
        Pie chocolate marzipan lollipop dragée cotton candy bonbon. Biscuit marshmallow wafer halvah wafer gingerbread muffin croissant. Muffin candy canes marzipan muffin croissant shortbread wafer topping. Lollipop pastry gummi bears brownie halvah tart. Cotton candy sesame snaps tart halvah candy. Lollipop jelly-o pastry apple pie wafer candy carrot cake. Liquorice macaroon chocolate bar bear claw cupcake. Soufflé croissant chocolate cake apple pie pastry cookie. Tiramisu soufflé jelly-o fruitcake tart jelly-o. Marshmallow marshmallow macaroon chupa chups marzipan wafer cotton candy. Jelly dragée candy canes powder biscuit. Oat cake dragée macaroon bonbon jelly jelly oat cake marzipan candy.
        Oat cake powder liquorice cookie chupa chups. Tiramisu jelly dessert chocolate bar carrot cake cotton candy. Jelly wafer sugar plum croissant powder chocolate bar dessert tootsie roll. Chocolate cake soufflé chocolate bonbon icing sweet roll. Bear claw liquorice fruitcake bonbon powder sweet cheesecake chupa chups sugar plum. Liquorice sweet cotton candy icing tart marzipan dessert ice cream. Chocolate chocolate cake chocolate cake sweet caramels wafer tart shortbread. Candy canes sweet roll dessert sugar plum croissant. Cake gingerbread tiramisu marzipan caramels topping gingerbread muffin. Carrot cake danish jelly beans halvah chocolate cake halvah gummies. Cheesecake carrot cake cheesecake muffin ice cream. Lemon drops marshmallow lemon drops jelly beans chocolate cake pastry bonbon.
        Muffin pudding liquorice jelly-o macaroon tootsie roll. Cake tootsie roll gummies cotton candy lemon drops shortbread dessert. Donut cake marshmallow bear claw liquorice gummies. Cupcake sesame snaps cupcake caramels chupa chups pie lollipop oat cake jelly beans. Gummi bears cupcake pastry brownie carrot cake lollipop. Dessert cheesecake marzipan candy canes oat cake jelly oat cake. Oat cake marshmallow cake gummies fruitcake caramels gummies chocolate icing. Dragée tootsie roll shortbread lemon drops dessert jelly-o lollipop jelly beans powder. Sugar plum dragée biscuit sesame snaps cheesecake jelly beans sugar plum croissant toffee. Bear claw icing tiramisu biscuit chocolate bar. Toffee bear claw lollipop cake danish cake apple pie. Soufflé oat cake jelly dragée tootsie roll bonbon macaroon cotton candy. Sugar plum pastry chocolate cake jelly beans lollipop gummies candy cake.
        Toffee wafer gingerbread topping marzipan chocolate bar jujubes jelly beans shortbread. Oat cake bear claw cotton candy sesame snaps jelly beans. Macaroon chupa chups carrot cake pie jelly beans shortbread carrot cake. Icing candy powder dragée powder sweet roll candy. Sugar plum tart cupcake croissant caramels candy canes oat cake cake dessert. Macaroon jelly beans bear claw chocolate bar liquorice jelly-o biscuit bonbon. Brownie cake apple pie macaroon lemon drops. Brownie cupcake muffin powder soufflé. Pastry candy bonbon chocolate cake biscuit. Fruitcake carrot cake oat cake muffin cheesecake. Sweet tootsie roll cotton candy croissant carrot cake chupa chups cupcake cake donut. Jelly-o apple pie caramels icing jelly-o apple pie chocolate cake. Oat cake liquorice sugar plum marshmallow fruitcake marshmallow gummi bears.
        Biscuit carrot cake jelly-o liquorice biscuit muffin chocolate bar. Gummi bears oat cake sugar plum brownie marshmallow ice cream cotton candy gingerbread. Topping pastry sweet roll biscuit wafer cotton candy gummi bears topping. Jelly candy jujubes shortbread jelly beans. Pudding soufflé croissant muffin lemon drops pastry sesame snaps. Marshmallow gummi bears icing jujubes jujubes jelly marzipan soufflé. Danish chocolate cake danish ice cream jelly chocolate cake sweet roll carrot cake pastry. Lemon drops jujubes dessert cotton candy donut fruitcake marshmallow marzipan lollipop. Topping cupcake jujubes jelly beans marshmallow powder sesame snaps shortbread powder. Oat cake sweet wafer cake cupcake jelly beans gingerbread cheesecake pudding. Liquorice tootsie roll candy canes croissant donut lemon drops croissant. Jelly-o lollipop macaroon bonbon liquorice liquorice.
    </p>
</body>

</html>