<?php 

class ModelHerci {

    private $id_herca;
    private $meno;
    private $priezvisko;

    public function __construct($herec_data = []) {
        if (isset($herec_data['id_herca'])) {
            $this->id_herca = $herec_data['id_herca'];
            $this->meno = @$herec_data['meno'];
            $this->priezvisko = @$herec_data['priezvisko'];
        }
    }

    public function getIdHerca() {
        return $this->id_herca;
    }

    public function setIdHerca($id_herca) {
        $this->id_herca = $id_herca;
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
            "id_herca" => $this->getIdHerca(),
            "meno" => $this->getMeno(),
            "priezvisko" => $this->getPriezvisko()
        ];
    }

}