<?php 

class KrajinyFilmu extends Controller {

    public static function crudActions($viewName, $page_name, $action_details) {

         // If it's action empty get all records from specific table
         if($action_details == '') {
            $readAll = Database::readSQL("SELECT * FROM filmy_krajiny fk INNER JOIN filmy f ON (f.id_filmu = fk.filmy_id_filmu) INNER JOIN krajiny k ON (k.id_krajiny = fk.krajiny_povodu_id_krajiny)");
        }

        // Add new
        if($action_details == 'add-new') {
            if (isset($_POST['filmy_id_filmu']) && isset($_POST['krajiny_povodu_id_krajiny'])) {
                $film_krajina = new ModelKrajinyFilmu();
                $film_krajina->setIdFilmu($_POST['filmy_id_filmu']);             
                $film_krajina->setIdKrajiny($_POST['krajiny_povodu_id_krajiny']);                
                self::createFilmKrajina($film_krajina);

                header('Location: /filmy_krajiny');
            }

            if (empty($_POST)) {
                $readFilmy = Database::readAll('filmy');
                $readKrajiny = Database::readAll('krajiny');
            }
        }

        // Edit existing one
        if($action_details == 'edit') {
            
            if (!empty($_POST)) {
                if (isset($_GET['id']) && isset($_POST['filmy_id_filmu']) && isset($_POST['krajiny_povodu_id_krajiny'])) {
                    $film_krajina = new ModelKrajinyFilmu();
                    $film_krajina->setIdFilmKrajiny($_GET['id']);
                    $film_krajina->setIdFilmu($_POST['filmy_id_filmu']);
                    $film_krajina->setIdKrajiny($_POST['krajiny_povodu_id_krajiny']);
                    self::updateFilmKrajina($film_krajina);
                    header('Location: /filmy_krajiny');
                }
            }


            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $edit_film_krajina_data = Database::getById('filmy_krajiny', $id, 'id_film_krajiny');
                $readFilmy = Database::readAll('filmy');
                $readKrajiny = Database::readAll('krajiny');
            }
        }

        // Delete an existing element
        if($action_details == 'delete') {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                Database::delete('filmy_krajiny',$id,'id_film_krajiny');
                header('Location: /filmy_krajiny');
            }
        }
        
        // Get specific "view" according url request
        require_once("./views/$viewName.php");
    }

    public function createFilmKrajina(ModelKrajinyFilmu $film_krajina) {
        return Database::create('filmy_krajiny', $film_krajina->toArray());
    }

    public function updateFilmKrajina(ModelKrajinyFilmu $film_krajina) {
        return Database::update('filmy_krajiny', $film_krajina->getIdFilmKrajiny(), 'id_film_krajiny', $film_krajina->toArray());
    }

}