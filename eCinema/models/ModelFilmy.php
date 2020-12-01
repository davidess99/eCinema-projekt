<?php 

class ModelFilmy {

    private $id_filmu;
    private $nazov;
    private $plagat;
    private $rozlisenie_id_rozlisenia; 
    private $dabing_id_dabingu;  
    private $titulky_id_titulky;  
    private $vhodne_od;  
    private $premiera;  
    private $dlzka_filmu_min;  
    private $rok_vyroby;  
    private $link_trailer;  


    public function __construct($film_data = []) {
        if (isset($film_data['id_filmu'])) {
            $this->id_filmu = $film_data['id_filmu'];
            $this->nazov = @$film_data['nazov'];
            $this->plagat = @$film_data['plagat'];
            $this->rozlisenie_id_rozlisenia = @$film_data['rozlisenie_id_rozlisenia'];
            $this->dabing_id_dabingu = @$film_data['dabing_id_dabingu'];
            $this->titulky_id_titulky = @$film_data['titulky_id_titulky'];
            $this->vhodne_od = @$film_data['vhodne_od'];
            $this->premiera = @$film_data['premiera'];
            $this->dlzka_filmu_min = @$film_data['dlzka_filmu_min'];
            $this->rok_vyroby = @$film_data['rok_vyroby'];
            $this->link_trailer = @$film_data['link_trailer'];
        }
    }

    public function getIdFilmu() {
        return $this->id_filmu;
    }

    public function setIdFilmu($id_filmu) {
        $this->id_filmu = $id_filmu;
    }


    public function getNazov() {
        return $this->nazov;
    }

    public function setNazov($nazov) {
        $this->nazov = $nazov;
    }


    public function getPlagat() {
        return $this->plagat;
    }

    public function setPlagat($plagat) {
        $this->plagat = $plagat;
    }

    public function getIdRozlisenia() {
        return $this->rozlisenie_id_rozlisenia;
    }

    public function setIdRozlisenia($rozlisenie_id_rozlisenia) {
        $this->rozlisenie_id_rozlisenia = $rozlisenie_id_rozlisenia;
    }


    public function getIdDabingu() {
        return $this->dabing_id_dabingu;
    }

    public function setIdDabingu($dabing_id_dabingu) {
        $this->dabing_id_dabingu = $dabing_id_dabingu;
    }


    public function getIdTitulky() {
        return $this->titulky_id_titulky;
    }

    public function setIdTitulky($titulky_id_titulky) {
        $this->titulky_id_titulky = $titulky_id_titulky;
    }

    public function getVhodneOd() {
        return $this->vhodne_od;
    }

    public function setVhodneOd($vhodne_od) {
        $this->vhodne_od = $vhodne_od;
    }

    public function getPremiera() {
        return $this->premiera;
    }

    public function setPremiera($premiera) {
        $this->premiera = $premiera;
    }

    public function getDlzkaFilmuMin() {
        return $this->dlzka_filmu_min;
    }

    public function setDlzkaFilmuMin($dlzka_filmu_min) {
        $this->dlzka_filmu_min = $dlzka_filmu_min;
    }

    public function getRokVyroby() {
        return $this->rok_vyroby;
    }

    public function setRokVyroby($rok_vyroby) {
        $this->rok_vyroby = $rok_vyroby;
    }

    public function getLinkTrailer() {
        return $this->link_trailer;
    }

    public function setLinkTrailer($link_trailer) {
        $this->link_trailer = $link_trailer;
    }


    public function toArray () {
        return [
            "id_filmu" => $this->getIdFilmu(),
            "nazov" => $this->getNazov(),
            "plagat" => $this->getPlagat(),
            "rozlisenie_id_rozlisenia" => $this->getIdRozlisenia(),
            "dabing_id_dabingu" => $this->getIdDabingu(),
            "titulky_id_titulky" => $this->getIdTitulky(),
            "vhodne_od" => $this->getVhodneOd(),
            "premiera" => $this->getPremiera(),
            "dlzka_filmu_min" => $this->getDlzkaFilmuMin(),
            "rok_vyroby" => $this->getRokVyroby(),
            "link_trailer" => $this->getLinkTrailer()
        ];
    }

}