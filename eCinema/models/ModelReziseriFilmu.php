<?php 

class ModelReziseriFilmu {

    private $id_film_rezisera;
    private $filmy_id_filmu;
    private $reziseri_id_rezisera;

    public function __construct($film_reziser_data = []) {
        if (isset($film_reziser_data['id_film_rezisera'])) {
            $this->id_film_rezisera = $film_reziser_data['id_film_rezisera'];
            $this->filmy_id_filmu = @$film_reziser_data['filmy_id_filmu'];
            $this->reziseri_id_rezisera = @$film_reziser_data['reziseri_id_rezisera'];
        }
    }

    public function getIdFilmRezisera() {
        return $this->id_film_rezisera;
    }

    public function setIdFilmRezisera($id_film_rezisera) {
        $this->id_film_rezisera = $id_film_rezisera;
    }


    public function getIdFilmu() {
        return $this->filmy_id_filmu;
    }

    public function setIdFilmu($filmy_id_filmu) {
        $this->filmy_id_filmu = $filmy_id_filmu;
    }

    public function getIdRezisera() {
        return $this->reziseri_id_rezisera;
    }

    public function setIdRezisera($reziseri_id_rezisera) {
        $this->reziseri_id_rezisera = $reziseri_id_rezisera;
    }

    public function toArray () {
        return [
            "id_film_rezisera" => $this->getIdFilmRezisera(),
            "filmy_id_filmu" => $this->getIdFilmu(),
            "reziseri_id_rezisera" => $this->getIdRezisera()
        ];
    }

}