<?php 

class ModelZamestnanci {

    private $id_zamestnanca;
    private $meno;
    private $priezvisko;
    private $datum_narodenia;
    private $pohlavie;
    private $email;
    private $heslo;
    private $tel_cislo;
    private $roly_zamestnancov_id_roly;


    public function __construct($zamestnanec_data = []) {
        if (isset($zamestnanec_data['id_zamestnanca'])) {
            $this->id_zamestnanca = $zamestnanec_data['id_zamestnanca'];
            $this->meno = @$zamestnanec_data['meno'];
            $this->priezvisko = @$zamestnanec_data['priezvisko'];
            $this->datum_narodenia = @$zamestnanec_data['datum_narodenia'];
            $this->pohlavie = @$zamestnanec_data['pohlavie'];
            $this->email = @$zamestnanec_data['email'];
            $this->heslo = @$zamestnanec_data['heslo'];
            $this->tel_cislo = @$zamestnanec_data['tel_cislo'];
            $this->roly_zamestnancov_id_roly = @$zamestnanec_data['roly_zamestnancov_id_roly'];
        }
    }

    public function getIdZamestnanca() {
        return $this->id_zamestnanca;
    }

    public function setIdZamestnanca($id_zamestnanca) {
        $this->id_zamestnanca = $id_zamestnanca;
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

    public function getIdRoly() {
        return $this->roly_zamestnancov_id_roly;
    }

    public function setIdRoly($roly_zamestnancov_id_roly) {
        $this->roly_zamestnancov_id_roly = $roly_zamestnancov_id_roly;
    }

    public function toArray () {
        return [
            "id_zamestnanca" => $this->getIdZamestnanca(),
            "meno" => $this->getMeno(),
            "priezvisko" => $this->getPriezvisko(),
            "datum_narodenia" => $this->getDatumNarodenia(),
            "pohlavie" => $this->getPohlavie(),
            "email" => $this->getEmail(),
            "heslo" => $this->getHeslo(),
            "tel_cislo" => $this->getTelCislo(),
            "roly_zamestnancov_id_roly" => $this->getIdRoly()
        ];
    }

}