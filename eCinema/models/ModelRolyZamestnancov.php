<?php 

class ModelRolyZamestnancov {

    private $id_roly;
    private $rola;

    public function __construct($roly_data = []) {
        if (isset($roly_data['id_roly'])) {
            $this->id_roly = $roly_data['id_roly'];
            $this->rola = @$roly_data['rola'];
        }
    }

    public function getIdRoly() {
        return $this->id_roly;
    }

    public function setIdRoly($id_roly) {
        $this->id_roly = $id_roly;
    }


    public function getRola() {
        return $this->rola;
    }

    public function setRola($rola) {
        $this->rola = $rola;
    }


    public function toArray () {
        return [
            "id_roly" => $this->getIdRoly(),
            "rola" => $this->getRola()
        ];
    }

}