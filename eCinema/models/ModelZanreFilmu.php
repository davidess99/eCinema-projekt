<?php 

class ModelZanreFilmu {

    private $id_film_zanru;
    private $filmy_id_filmu;
    private $zanre_filmu_id_zanru;

    public function __construct($film_zaner_data = []) {
        if (isset($film_zaner_data['id_film_zanru'])) {
            $this->id_film_zanru = $film_zaner_data['id_film_zanru'];
            $this->filmy_id_filmu = @$film_zaner_data['filmy_id_filmu'];
            $this->zanre_filmu_id_zanru = @$film_zaner_data['zanre_filmu_id_zanru'];
        }
    }

    public function getIdFilmZanru() {
        return $this->id_film_zanru;
    }

    public function setIdFilmZanru($id_film_zanru) {
        $this->id_film_zanru = $id_film_zanru;
    }


    public function getIdFilmu() {
        return $this->filmy_id_filmu;
    }

    public function setIdFilmu($filmy_id_filmu) {
        $this->filmy_id_filmu = $filmy_id_filmu;
    }

    public function getIdZanru() {
        return $this->zanre_filmu_id_zanru;
    }

    public function setIdZanru($zanre_filmu_id_zanru) {
        $this->zanre_filmu_id_zanru = $zanre_filmu_id_zanru;
    }

    public function toArray () {
        return [
            "id_film_zanru" => $this->getIdFilmZanru(),
            "filmy_id_filmu" => $this->getIdFilmu(),
            "zanre_filmu_id_zanru" => $this->getIdZanru()
        ];
    }

}