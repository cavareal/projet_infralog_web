<?php

    class Aeroport {
        public $ville;
        public $iata;
        public $nom;

        function __construct($ville, $iata, $nom){
            $this->ville = $ville;
            $this->iata = $iata;
            $this->nom = $nom;
        }
    }

    $aeroports = [
        new Aeroport("Berlin","BER","Willy Brandt"),
        new Aeroport("Francfort","FRA","Francfort-sur-le-Main"),
        new Aeroport("Munich","MUC","Franz Josef Strauss"),
        new Aeroport("Buxelle","BRU","Brussels Airport"),
        new Aeroport("Paris","CDG","Paris-Charles-De-Gaulle"),
        new Aeroport("Rome","FCO","Rome-Fuimicino"),
        new Aeroport("London","LHR","Heathrow Airport"),
        new Aeroport("Luxembourg","LUX","Luxembourg"),
        new Aeroport("Vienne","VIE","Schwechat"),
        new Aeroport("Varsovie","WAW","Frédéric Chopin"),
        new Aeroport("Zagreb","ZAG","Franjo Tudman"),
        new Aeroport("Zurich","ZRH","Zurich Airport")
    ];

?>