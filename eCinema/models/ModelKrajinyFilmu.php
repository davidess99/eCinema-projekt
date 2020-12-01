<?php 

class ModelKrajinyFilmu {

    private $id_film_krajiny;
    private $filmy_id_filmu;
    private $krajiny_povodu_id_krajiny;

    public function __construct($film_krajina_data = []) {
        if (isset($film_krajina_data['id_film_krajiny'])) {
            $this->id_film_krajiny = $film_krajina_data['id_film_krajiny'];
            $this->filmy_id_filmu = @$film_krajina_data['filmy_id_filmu'];
            $this->krajiny_povodu_id_krajiny = @$film_krajina_data['krajiny_povodu_id_krajiny'];
        }
    }

    public function getIdFilmKrajiny() {
        return $this->id_film_krajiny;
    }

    public function setIdFilmKrajiny($id_film_krajiny) {
        $this->id_film_krajiny = $id_film_krajiny;
    }


    public function getIdFilmu() {
        return $this->filmy_id_filmu;
    }

    public function setIdFilmu($filmy_id_filmu) {
        $this->filmy_id_filmu = $filmy_id_filmu;
    }

    public function getIdKrajiny() {
        return $this->krajiny_povodu_id_krajiny;
    }

    public function setIdKrajiny($krajiny_povodu_id_krajiny) {
        $this->krajiny_povodu_id_krajiny = $krajiny_povodu_id_krajiny;
    }

    public function toArray () {
        return [
            "id_film_krajiny" => $this->getIdFilmKrajiny(),
            "filmy_id_filmu" => $this->getIdFilmu(),
            "krajiny_povodu_id_krajiny" => $this->getIdKrajiny()
        ];
    }

}