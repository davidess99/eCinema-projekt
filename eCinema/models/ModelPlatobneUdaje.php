<?php 

class ModelPlatobneUdaje {

    private $id_plat_udaja;
    private $zakaznici_id_zakaznika;
    private $cislo_karty;
    private $platnost_karty;
    private $cvv_kod;

    public function __construct($plat_udaj_data = []) {
        if (isset($plat_udaj_data['id_plat_udaja'])) {
            $this->id_plat_udaja = $plat_udaj_data['id_plat_udaja'];
            $this->zakaznici_id_zakaznika = @$plat_udaj_data['zakaznici_id_zakaznika'];
            $this->cislo_karty = @$plat_udaj_data['cislo_karty'];
            $this->platnost_karty = @$plat_udaj_data['platnost_karty'];
            $this->cvv_kod = @$plat_udaj_data['cvv_kod'];
        }
    }

    public function getIdPlatUdaja() {
        return $this->id_plat_udaja;
    }

    public function setIdPlatUdaja($id_plat_udaja) {
        $this->id_plat_udaja = $id_plat_udaja;
    }


    public function getIdZakaznika() {
        return $this->zakaznici_id_zakaznika;
    }

    public function setIdZakaznika($zakaznici_id_zakaznika) {
        $this->zakaznici_id_zakaznika = $zakaznici_id_zakaznika;
    }

    public function getCisloKarty() {
        return $this->cislo_karty;
    }

    public function setCisloKarty($cislo_karty) {
        $this->cislo_karty = $cislo_karty;
    }

    public function getPlatnostKarty() {
        return $this->platnost_karty;
    }

    public function setPlatnostKarty($platnost_karty) {
        $this->platnost_karty = $platnost_karty;
    }

    public function getCvvKod() {
        return $this->cvv_kod;
    }

    public function setCvvKod($cvv_kod) {
        $this->cvv_kod = $cvv_kod;
    }

    public function toArray () {
        return [
            "id_plat_udaja" => $this->getIdPlatUdaja(),
            "zakaznici_id_zakaznika" => $this->getIdZakaznika(),
            "cislo_karty" => $this->getCisloKarty(),
            "platnost_karty" => $this->getPlatnostKarty(),
            "cvv_kod" => $this->getCvvKod()
        ];
    }

}