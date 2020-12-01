<?php 

class ModelSaly {

    private $id_saly;
    private $oznacenie;
    private $pct_miest;

    public function __construct($sala_data = []) {
        if (isset($sala_data['id_saly'])) {
            $this->id_saly = $sala_data['id_saly'];
            $this->oznacenie = @$sala_data['oznacenie'];
            $this->pct_miest = @$sala_data['pct_miest'];
        }
    }

    public function getIdSaly() {
        return $this->id_saly;
    }

    public function setIdSaly($id_saly) {
        $this->id_saly = $id_saly;
    }


    public function getOznacenie() {
        return $this->oznacenie;
    }

    public function setOznacenie($oznacenie) {
        $this->oznacenie = $oznacenie;
    }


    public function getPctMiest() {
        return $this->pct_miest;
    }

    public function setPctMiest($pct_miest) {
        $this->pct_miest = $pct_miest;
    }


    public function toArray () {
        return [
            "id_saly" => $this->getIdSaly(),
            "oznacenie" => $this->getOznacenie(),
            "pct_miest" => $this->getPctMiest()
        ];
    }

}