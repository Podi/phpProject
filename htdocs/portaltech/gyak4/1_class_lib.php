
    <?php
    
    /* Osztály létrehozása */
    class Szemely {
        public $nev;
        public $szul_ev;
        public $szul_honap;
        public $szul_nap;
        function __construct($nev, $szul_ev, $szul_honap, $szul_nap) {
            $this->nev = $nev;
            $this->szul_ev = $szul_ev;
            $this->szul_honap = $szul_honap;
            $this->szul_nap = $szul_nap;
        }
        function set_nev($uj_nev){
            $this->nev = $uj_nev;
        }
        function set_szul_ev($uj_szul_ev){
            $this->szul_ev = $uj_szul_ev;
        }
        function set_szul_honap($uj_szul_honap){
            $this->szul_honap = $uj_szul_honap;
        }
        function set_szul_nap($uj_szul_nap){
            $this->szul_nap = $uj_szul_nap;
        }
        function get_nev(){
            return $this->nev;
        }
        function get_szul_ev(){
            return $this->szul_ev;
        }
        function get_szul_honap(){
            return $this->szul_honap;
        }
        function get_szul_nap(){
            return $this->szul_ev;
        }
      }

      


    
    ?>
