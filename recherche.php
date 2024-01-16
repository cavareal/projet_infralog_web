<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php include "header.php" ?>

    <nav class="shadow bg-white p-2 border">
        <ul class="nav nav-tabs nav-justified">
            <li class="nav-item">
                <a class="nav-link" href="./">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">Active</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Link</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid mt-4 mb-5">
        <h1><b>#Ville de depart# - #Ville d'arrivee#</b></h1>
    </div>

    <div class="container-fluid bg-white shadow">
        <h3>#Filtres#</h3>
    </div>

    <h3><b>Résultats (#nbResultats#):</b></h3>

    <div class="container bg-white border"></div>

    <div class="container bg-white border"></div>

    <div class="container bg-white border"></div>

    <?php include "footer.php" ?>
</body>
</html>