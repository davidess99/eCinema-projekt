<?php 

class ModelRozlisenie {

    private $id_rozlisenia;
    private $rozlisenie;

    public function __construct($rozlisenie_data = []) {
        if (isset($rozlisenie_data['id_rozlisenia'])) {
            $this->id_rozlisenia = $rozlisenie_data['id_rozlisenia'];
            $this->rozlisenie = @$rozlisenie_data['rozlisenie'];
        }
    }

    public function getIdRozlisenia() {
        return $this->id_rozlisenia;
    }

    public function setIdRozlisenia($id_rozlisenia) {
        $this->id_rozlisenia = $id_rozlisenia;
    }


    public function getRozlisenie() {
        return $this->rozlisenie;
    }

    public function setRozlisenie($rozlisenie) {
        $this->rozlisenie = $rozlisenie;
    }


    public function toArray () {
        return [
            "id_rozlisenia" => $this->getIdRozlisenia(),
            "rozlisenie" => $this->getRozlisenie()
        ];
    }

}