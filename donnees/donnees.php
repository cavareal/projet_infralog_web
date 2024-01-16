<?php
    class Client {
        public $id;
        public $email;
        public $nom;
        public $prenom;

        function __construct($id, $email, $nom, $prenom) {
            $this->id = $id;
            $this->email = $email;
            $this->nom = $nom;
            $this->prenom = $prenom;
        }
    }

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

    class ModeleAvion {
        public $modele;
        public $nbColonnes;
        public $nbPassagers;
        public $nbPremiereClasse;

        function __construct($modele, $nbColonnes, $nbPassagers, $nbPremiereClasse) {
            $this->modele = $modele;
            $this->nbColonnes = $nbColonnes;
            $this->nbPassagers = $nbPassagers;
            $this->nbPremiereClasse = $nbPremiereClasse;
        }
    }

    class Vol {
        public $numeroVol;
        public $depart;
        public $arrivee;
        public $date;
        public $heureDepart;
        public $heureArriveeLocale;
        public $modeleAvion;
        public $dureeVol;
        
        function __construct($numeroVol, $depart, $arrivee, $date, $heureDepart, $heureArriveeLocale, $modeleAvion, $dureeVol) {
            $this->numeroVol = $numeroVol;
            $this->depart = $depart;
            $this->arrivee = $arrivee;
            $this->date = $date;
            $this->heureDepart = $heureDepart;
            $this->heureArriveeLocale = $heureArriveeLocale;
            $this->modeleAvion = $modeleAvion;
            $this->dureeVol = $dureeVol;
        }
    }

    class Billet {
        public $numeroReservation;
        public $idClient;
        public $numeroVol;
        public $bagages;
        public $prix;
        public $garantie;
        public $place;

        function __construct($numeroReservation, $idClient, $numeroVol, $bagages, $prix, $garantie, $place) {
            $this->numeroReservation = $numeroReservation;
            $this->idClient = $idClient;
            $this->numeroVol = $numeroVol;
            $this->bagages = $bagages;
            $this->prix = $prix;
            $this->garantie = $garantie;
            $this->place = $place;
        }
    }

    $clients = [new Client(0, 'client@client.com', 'Client', 'Client')];

    $aeroports = [
        new Aeroport('Allemagne', 'Berlin', 'BER', 'Willy Brandt'),
        new Aeroport('Allemagne', 'Francfort', 'FRA', 'Francfort-sur-le-Main'),
        new Aeroport('Allemagne', 'Munich', 'MUC', 'Franz Josef Strauss'),
        new Aeroport('Belgique', 'Buxelle', 'BRU', 'Brussels Airport'),
        new Aeroport('France', 'Paris', 'CDG', 'Paris-Charles-De-Gaulle'),
        new Aeroport('Italie', 'Rome', 'FCO', 'Rome-Fuimicino'),
        new Aeroport('Royaume-Uni', 'London', 'LHR', 'Heathrow Airport'),
        new Aeroport('Luxembourg', 'Luxembourg', 'LUX', 'Luxembourg'),
        new Aeroport('Autriche', 'Vienne', 'VIE', 'Schwechat'),
        new Aeroport('Pologne', 'Varsovie', 'WAW', 'Frédéric Chopin'),
        new Aeroport('Croatie', 'Zagreb', 'ZAG', 'Franjo Tudman'),
        new Aeroport('Suisse', 'Zurich', 'ZRH', 'Zurich Airport')
    ];

    $modeles = [new ModeleAvion('Boeing 737-500', 6, 120, 24)];

    $vols = [
        new Vol('B737000', 'LHR', 'CDG', '04-04-2024', '12h34', '15h19', 'Boeing 737-500', '1h45'),
        new Vol('B737001', 'FRA', 'MUC', '01-02-2024', '12h34', '13h34', 'Boeing 737-500', '1h00'),
        new Vol('B737002', 'BRU', 'BER', '05-05-2024', '12h34', '14h34', 'Boeing 737-500', '2h00'),
        new Vol('B737003', 'FCO', 'LUX', '10-10-2024', '12h34', '14h04', 'Boeing 737-500', '1h30'),
        new Vol('B737004', 'VIE', 'WAW', '03-03-2024', '12h34', '13h49', 'Boeing 737-500', '1h15')
    ];

    $billets = [
        new Billet('CC0B737000', 0, 'B737000', true, 152, true, 'B14')
    ];

    $SITE_TITRE = 'FlyBook\'ESEO';
?>