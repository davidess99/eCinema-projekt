<?php 

class ModelDabing {

    private $id_dabingu;
    private $oznacenie_dabingu;
    private $nazov_dabingu;

    public function __construct($dabing_data = []) {
        if (isset($dabing_data['id_dabingu'])) {
            $this->id_dabingu = $dabing_data['id_dabingu'];
            $this->oznacenie_dabingu = @$dabing_data['oznacenie_dabingu'];
            $this->nazov_dabingu = @$dabing_data['nazov_dabingu'];
        }
    }

    public function getIdDabingu() {
        return $this->id_dabingu;
    }

    public function setIdDabingu($id_dabingu) {
        $this->id_dabingu = $id_dabingu;
    }


    public function getOznacenieDabingu() {
        return $this->oznacenie_dabingu;
    }

    public function setOznacenieDabingu($oznacenie_dabingu) {
        $this->oznacenie_dabingu = $oznacenie_dabingu;
    }


    public function getNazovDabingu() {
        return $this->nazov_dabingu;
    }

    public function setNazovDabingu($nazov_dabingu) {
        $this->nazov_dabingu = $nazov_dabingu;
    }


    public function toArray () {
        return [
            "id_dabingu" => $this->getIdDabingu(),
            "oznacenie_dabingu" => $this->getOznacenieDabingu(),
            "nazov_dabingu" => $this->getNazovDabingu()
        ];
    }

}