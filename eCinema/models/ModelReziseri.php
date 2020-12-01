<?php 

class ModelReziseri {

    private $id_rezisera;
    private $meno;
    private $priezvisko;

    public function __construct($reziser_data = []) {
        if (isset($reziser_data['id_rezisera'])) {
            $this->id_rezisera = $reziser_data['id_rezisera'];
            $this->meno = @$reziser_data['meno'];
            $this->priezvisko = @$reziser_data['priezvisko'];
        }
    }

    public function getIdRezisera() {
        return $this->id_rezisera;
    }

    public function setIdRezisera($id_rezisera) {
        $this->id_rezisera = $id_rezisera;
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


    public function toArray () {
        return [
            "id_rezisera" => $this->getIdRezisera(),
            "meno" => $this->getMeno(),
            "priezvisko" => $this->getPriezvisko()
        ];
    }

}