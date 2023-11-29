
    <?php
    
    /* Osztály létrehozása */
    class Szemely {
        public $nev;
        public $szul_ev;
        public $szul_honap;
        public $szul_nap;
        public $tomeg;
        public $magassag;

        function __construct($nev, $szul_ev, $szul_honap, $szul_nap, $tomeg, $magassag) {
            $this->nev = $nev;
            $this->szul_ev = $szul_ev;
            $this->szul_honap = $szul_honap;
            $this->szul_nap = $szul_nap;
            $this->tomeg = $tomeg;
            $this->magassag = $magassag;
        }
        function fogy($kg){
            $this->tomeg-=$kg;
        }
        function hizik($kg){
            $this->tomeg+=$kg;
        }
        function osszemegy($cm){
            $this->magassag-=$cm;
        }
        function no($cm){
            $this->magassag+=$cm;
        }
        function BMI(){
            return $this->tomeg/pow($this->magassag/100,2);
        }
        function BMIszoveg(){
            if ($this->BMI() <= 20) {
                return "sovány";
            } elseif ($this->BMI()  < 25) {
                return "normál";
            } elseif ($this->BMI()  < 30) {
                return "túlsúly";
            } elseif ($this->BMI()  < 35) {
                return "mérsékelten elhízott";
            } elseif ($this->BMI()  < 40) {
                return "súlyosan elhízott";
            } else {
                return "nagyon súlyosan elhízott ";
            }
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
        function get_tomeg(){
            return $this->tomeg;
        }
        function get_magassag(){
            return $this->magassag;
        }
      }

      


    
    ?>
