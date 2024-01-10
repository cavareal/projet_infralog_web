<?php

    class Aeroport {
        public $pays;
        public $ville;
        public $iata;
        public $nom;

        function __construct($pays, $ville, $iata, $nom){
            $this->pays = $pays;
            $this->ville = $ville;
            $this->iata = $iata;
            $this->nom = $nom;
        }
    }

    $aeroports = [
        new Aeroport("Allemagne", "Berlin", "BER", "Willy Brandt"),
        new Aeroport("Allemagne", "Francfort", "FRA", "Francfort-sur-le-Main"),
        new Aeroport("Allemagne", "Munich", "MUC", "Franz Josef Strauss"),
        new Aeroport("Belgique", "Buxelle", "BRU", "Brussels Airport"),
        new Aeroport("France", "Paris", "CDG", "Paris-Charles-De-Gaulle"),
        new Aeroport("Italie", "Rome", "FCO", "Rome-Fuimicino"),
        new Aeroport("Royaume-Uni", "London", "LHR", "Heathrow Airport"),
        new Aeroport("Luxembourg", "Luxembourg", "LUX", "Luxembourg"),
        new Aeroport("Autriche", "Vienne", "VIE", "Schwechat"),
        new Aeroport("Pologne", "Varsovie", "WAW", "Frédéric Chopin"),
        new Aeroport("Croatie", "Zagreb", "ZAG", "Franjo Tudman"),
        new Aeroport("Suisse", "Zurich", "ZRH", "Zurich Airport")
    ];

    $SITE_TITRE = "FlyBook'ESEO";
?>