<?php 

class ModelZanre {

    private $id_zanru;
    private $zaner;

    public function __construct($zaner_data = []) {
        if (isset($zaner_data['id_zanru'])) {
            $this->id_zanru = $zaner_data['id_zanru'];
            $this->zaner = @$zaner_data['zaner'];
        }
    }

    public function getIdZanru() {
        return $this->id_zanru;
    }

    public function setIdZanru($id_zanru) {
        $this->id_zanru = $id_zanru;
    }


    public function getZaner() {
        return $this->zaner;
    }

    public function setZaner($zaner) {
        $this->zaner = $zaner;
    }

    public function toArray () {
        return [
            "id_zanru" => $this->getIdZanru(),
            "zaner" => $this->getZaner()
        ];
    }

}