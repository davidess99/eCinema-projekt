<?php 

class ModelHerciFilmu {

    private $id_film_herca;
    private $filmy_id_filmu;
    private $herci_id_herca;

    public function __construct($film_herec_data = []) {
        if (isset($film_herec_data['id_film_herca'])) {
            $this->id_film_herca = $film_herec_data['id_film_herca'];
            $this->filmy_id_filmu = @$film_herec_data['filmy_id_filmu'];
            $this->herci_id_herca = @$film_herec_data['herci_id_herca'];
        }
    }

    public function getIdFilmHerca() {
        return $this->id_film_herca;
    }

    public function setIdFilmHerca($id_film_herca) {
        $this->id_film_herca = $id_film_herca;
    }


    public function getIdFilmu() {
        return $this->filmy_id_filmu;
    }

    public function setIdFilmu($filmy_id_filmu) {
        $this->filmy_id_filmu = $filmy_id_filmu;
    }

    public function getIdHerca() {
        return $this->herci_id_herca;
    }

    public function setIdHerca($herci_id_herca) {
        $this->herci_id_herca = $herci_id_herca;
    }

    public function toArray () {
        return [
            "id_film_herca" => $this->getIdFilmHerca(),
            "filmy_id_filmu" => $this->getIdFilmu(),
            "herci_id_herca" => $this->getIdHerca()
        ];
    }

}