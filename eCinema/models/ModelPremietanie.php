<?php 

class ModelPremietanie {

    private $id_premietania;
    private $filmy_id_filmu;
    private $saly_id_saly;
    private $datum_cas;
    private $cena;
    private $cena_zlava;

    public function __construct($premietanie_data = []) {
        if (isset($premietanie_data['id_premietania'])) {
            $this->id_premietania = $premietanie_data['id_premietania'];
            $this->filmy_id_filmu = @$premietanie_data['filmy_id_filmu'];
            $this->saly_id_saly = @$premietanie_data['saly_id_saly'];
            $this->datum_cas = @$premietanie_data['datum_cas'];
            $this->cena = @$premietanie_data['cena'];
            $this->cena_zlava = @$premietanie_data['cena_zlava'];
        }
    }

    public function getIdPremietania() {
        return $this->id_premietania;
    }

    public function setIdPremietania($id_premietania) {
        $this->id_premietania = $id_premietania;
    }

    public function getIdFilmu() {
        return $this->filmy_id_filmu;
    }

    public function setIdFilmu($filmy_id_filmu) {
        $this->filmy_id_filmu = $filmy_id_filmu;
    }

    public function getIdSaly() {
        return $this->saly_id_saly;
    }

    public function setIdSaly($saly_id_saly) {
        $this->saly_id_saly = $saly_id_saly;
    }

    public function getDatumCas() {
        return $this->datum_cas;
    }

    public function setDatumCas($datum_cas) {
        $this->datum_cas = $datum_cas;
    }

    public function getCena() {
        return $this->cena;
    }

    public function setCena($cena) {
        $this->cena = $cena;
    }

    public function getCenaZlava() {
        return $this->cena_zlava;
    }

    public function setCenaZlava($cena_zlava) {
        $this->cena_zlava = $cena_zlava;
    }



    public function toArray () {
        return [
            "id_premietania" => $this->getIdPremietania(),
            "filmy_id_filmu" => $this->getIdFilmu(),
            "saly_id_saly" => $this->getIdSaly(),
            "datum_cas" => $this->getDatumCas(),
            "cena" => $this->getCena(),
            "cena_zlava" => $this->getCenaZlava()
        ];
    }

}