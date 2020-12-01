<?php 

class ReziseriFilmu extends Controller {

    public static function crudActions($viewName, $page_name, $action_details) {

         // If it's action empty get all records from specific table
         if($action_details == '') {
            $readAll = Database::readSQL("SELECT * FROM filmy_reziseri fr INNER JOIN filmy f ON (f.id_filmu = fr.filmy_id_filmu) INNER JOIN reziseri r ON (r.id_rezisera = fr.reziseri_id_rezisera)");
        }

        // Add new
        if($action_details == 'add-new') {
            if (isset($_POST['filmy_id_filmu']) && isset($_POST['reziseri_id_rezisera'])) {
                $film_reziser = new ModelReziseriFilmu();
                $film_reziser->setIdFilmu($_POST['filmy_id_filmu']);             
                $film_reziser->setIdRezisera($_POST['reziseri_id_rezisera']);                
                self::createFilmReziser($film_reziser);

                header('Location: /filmy_reziseri');
            }

            if (empty($_POST)) {
                $readFilmy = Database::readAll('filmy');
                $readReziseri = Database::readAll('reziseri');
            }
        }

        // Edit existing one
        if($action_details == 'edit') {
            
            if (!empty($_POST)) {
                if (isset($_GET['id']) && isset($_POST['filmy_id_filmu']) && isset($_POST['reziseri_id_rezisera'])) {
                    $film_reziser = new ModelReziseriFilmu();
                    $film_reziser->setIdFilmRezisera($_GET['id']);
                    $film_reziser->setIdFilmu($_POST['filmy_id_filmu']);
                    $film_reziser->setIdRezisera($_POST['reziseri_id_rezisera']);
                    self::updateFilmReziser($film_reziser);
                    header('Location: /filmy_reziseri');
                }
            }


            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $edit_film_reziser_data = Database::getById('filmy_reziseri', $id, 'id_film_rezisera');
                $readFilmy = Database::readAll('filmy');
                $readReziseri = Database::readAll('reziseri');
            }
        }

        // Delete an existing element
        if($action_details == 'delete') {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                Database::delete('filmy_reziseri',$id,'id_film_rezisera');
                header('Location: /filmy_reziseri');
            }
        }
        
        // Get specific "view" according url request
        require_once("./views/$viewName.php");
    }

    public function createFilmReziser(ModelReziseriFilmu $film_reziser) {
        return Database::create('filmy_reziseri', $film_reziser->toArray());
    }

    public function updateFilmReziser(ModelReziseriFilmu $film_reziser) {
        return Database::update('filmy_reziseri', $film_reziser->getIdFilmRezisera(), 'id_film_rezisera', $film_reziser->toArray());
    }

}