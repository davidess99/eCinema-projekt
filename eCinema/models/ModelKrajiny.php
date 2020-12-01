<?php 

class ModelKrajiny {

    private $id_krajiny;
    private $krajina;

    public function __construct($krajina_data = []) {
        if (isset($krajina_data['id_krajiny'])) {
            $this->id_krajiny = $krajina_data['id_krajiny'];
            $this->krajina = @$krajina_data['krajina'];
        }
    }

    public function getIdKrajiny() {
        return $this->id_krajiny;
    }

    public function setIdKrajiny($id_krajiny) {
        $this->id_krajiny = $id_krajiny;
    }


    public function getKrajina() {
        return $this->krajina;
    }

    public function setKrajina($krajina) {
        $this->krajina = $krajina;
    }


    public function toArray () {
        return [
            "id_krajiny" => $this->getIdKrajiny(),
            "krajina" => $this->getKrajina()
        ];
    }

}