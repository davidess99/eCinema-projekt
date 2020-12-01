<?php 

class ModelZakaznici {

    private $id_zakaznika;
    private $meno;
    private $priezvisko;
    private $datum_narodenia;
    private $pohlavie;
    private $email;
    private $heslo;
    private $tel_cislo;


    public function __construct($zakaznik_data = []) {
        if (isset($zakaznik_data['id_zakaznika'])) {
            $this->id_zakaznika = $zakaznik_data['id_zakaznika'];
            $this->meno = @$zakaznik_data['meno'];
            $this->priezvisko = @$zakaznik_data['priezvisko'];
            $this->datum_narodenia = @$zakaznik_data['datum_narodenia'];
            $this->pohlavie = @$zakaznik_data['pohlavie'];
            $this->email = @$zakaznik_data['email'];
            $this->heslo = @$zakaznik_data['heslo'];
            $this->tel_cislo = @$zakaznik_data['tel_cislo'];
        }
    }

    public function getIdZakaznika() {
        return $this->id_zakaznika;
    }

    public function setIdZakaznika($id_zakaznika) {
        $this->id_zakaznika = $id_zakaznika;
    }

    public function getMeno() {
        return $this->meno;
    }

    public function setMeno($meno) {
        $this->meno = $meno;
    }

    public function getPriezvisko() {
        return $this->priezvisko;
    }

    public function setPriezvisko($priezvisko) {
        $this->priezvisko = $priezvisko;
    }

    public function getDatumNarodenia() {
        return $this->datum_narodenia;
    }

    public function setDatumNarodenia($datum_narodenia) {
        $this->datum_narodenia = $datum_narodenia;
    }

    public function getPohlavie() {
        return $this->pohlavie;
    }

    public function setPohlavie($pohlavie) {
        $this->pohlavie = $pohlavie;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getHeslo() {
        return $this->heslo;
    }

    public function setHeslo($heslo) {
        $this->heslo = $heslo;
    }

    public function getTelCislo() {
        return $this->tel_cislo;
    }

    public function setTelCislo($tel_cislo) {
        $this->tel_cislo = $tel_cislo;
    }

    public function toArray () {
        return [
            "id_zakaznika" => $this->getIdZakaznika(),
            "meno" => $this->getMeno(),
            "priezvisko" => $this->getPriezvisko(),
            "datum_narodenia" => $this->getDatumNarodenia(),
            "pohlavie" => $this->getPohlavie(),
            "email" => $this->getEmail(),
            "heslo" => $this->getHeslo(),
            "tel_cislo" => $this->getTelCislo(),
        ];
    }

}