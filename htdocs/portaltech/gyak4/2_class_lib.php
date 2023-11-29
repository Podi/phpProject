
    <?php
        class Termek {
            public $id;
            public $nev;
            public $netto_ear;
            public $brutto_ear;
            public $afa_kulcs;

            function __construct($azonosito, $nev, $afa_kulcs){
                $this->id = $azonosito;
                $this->nev = $nev;
                $this->afa_kulcs = $afa_kulcs;
            }

            function set_afa_kulcs($uj_afa_kulcs){
                $this->afa_kulcs = $uj_afa_kulcs;
                $this->BruttoEarSzamit();
            }
            function set_nev($uj_nev){
                $this->nev= $uj_nev;
            }
            function set_netto_ear($uj_netto_ear){
                $this->netto_ear= $uj_netto_ear;
                $this->BruttoEarSzamit();
            }
            function set_brutto_ear($uj_brutto_ear){
                $this->brutto_ear= $uj_brutto_ear;
                $this->NettoEarSzamit();
            }
            function get_brutto_ear(){
                return $this->brutto_ear;
            }
            function get_netto_ear(){
                return $this->netto_ear;
            }
            function get_afa_kulcs(){
                return $this->afa_kulcs;
            }
            function get_nev(){
                return $this->nev;
            }

            function NettoEarSzamit(){
                $this->netto_ear = $this->brutto_ear/(1+$this->afa_kulcs/100);
            }

            function BruttoEarSzamit(){
                $this->brutto_ear = $this->netto_ear*(1+$this->afa_kulcs/100);
            }

        }
    ?>
