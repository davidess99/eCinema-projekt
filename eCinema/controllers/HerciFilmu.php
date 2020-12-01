<?php 

class HerciFilmu extends Controller {

    public static function crudActions($viewName, $page_name, $action_details) {

         // If it's action empty get all records from specific table
         if($action_details == '') {
            $readAll = Database::readSQL("SELECT * FROM filmy_herci fh INNER JOIN filmy f ON (f.id_filmu = fh.filmy_id_filmu) INNER JOIN herci h ON (h.id_herca = fh.herci_id_herca)");
        }

        // Add new
        if($action_details == 'add-new') {
            if (isset($_POST['filmy_id_filmu']) && isset($_POST['herci_id_herca'])) {
                $film_herec = new ModelHerciFilmu();
                $film_herec->setIdFilmu($_POST['filmy_id_filmu']);             
                $film_herec->setIdHerca($_POST['herci_id_herca']);                
                self::createFilmHerec($film_herec);

                header('Location: /filmy_herci');
            }

            if (empty($_POST)) {
                $readFilmy = Database::readAll('filmy');
                $readHerci = Database::readAll('herci');
            }
        }

        // Edit existing one
        if($action_details == 'edit') {
            
            if (!empty($_POST)) {
                if (isset($_GET['id']) && isset($_POST['filmy_id_filmu']) && isset($_POST['herci_id_herca'])) {
                    $film_herec = new ModelHerciFilmu();
                    $film_herec->setIdFilmHerca($_GET['id']);
                    $film_herec->setIdFilmu($_POST['filmy_id_filmu']);
                    $film_herec->setIdHerca($_POST['herci_id_herca']);
                    self::updateFilmHerec($film_herec);
                    header('Location: /filmy_herci');
                }
            }


            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $edit_film_herec_data = Database::getById('filmy_herci', $id, 'id_film_herca');
                $readFilmy = Database::readAll('filmy');
                $readHerci = Database::readAll('herci');
            }
        }

        // Delete an existing element
        if($action_details == 'delete') {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                Database::delete('filmy_herci',$id,'id_film_herca');
                header('Location: /filmy_herci');
            }
        }
        
        // Get specific "view" according url request
        require_once("./views/$viewName.php");
    }

    public function createFilmHerec(ModelHerciFilmu $film_herec) {
        return Database::create('filmy_herci', $film_herec->toArray());
    }

    public function updateFilmHerec(ModelHerciFilmu $film_herec) {
        return Database::update('filmy_herci', $film_herec->getIdFilmHerca(), 'id_film_herca', $film_herec->toArray());
    }

}