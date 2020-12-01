<?php 

class ModelTitulky {

    private $id_titulky;
    private $oznacenie_titulky;
    private $nazov_titulky;

    public function __construct($titulky_data = []) {
        if (isset($titulky_data['id_titulky'])) {
            $this->id_titulky = $titulky_data['id_titulky'];
            $this->oznacenie_titulky = @$titulky_data['oznacenie_titulky'];
            $this->nazov_titulky = @$titulky_data['nazov_titulky'];
        }
    }

    public function getIdTitulky() {
        return $this->id_titulky;
    }

    public function setIdTitulky($id_titulky) {
        $this->id_titulky = $id_titulky;
    }


    public function getOznacenieTitulky() {
        return $this->oznacenie_titulky;
    }

    public function setOznacenieTitulky($oznacenie_titulky) {
        $this->oznacenie_titulky = $oznacenie_titulky;
    }


    public function getNazovTitulky() {
        return $this->nazov_titulky;
    }

    public function setNazovTitulky($nazov_titulky) {
        $this->nazov_titulky = $nazov_titulky;
    }


    public function toArray () {
        return [
            "id_titulky" => $this->getIdTitulky(),
            "oznacenie_titulky" => $this->getOznacenieTitulky(),
            "nazov_titulky" => $this->getNazovTitulky()
        ];
    }

}