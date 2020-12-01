<?php 

class Herci extends Controller {

    public static function crudActions($viewName, $page_name, $action_details) {

         // If it's action empty get all records from specific table
         if($action_details == '') {
            $readAll = Database::readAll($page_name);
        }

        // Add new
        if($action_details == 'add-new') {
            if (isset($_POST['meno']) && isset($_POST['priezvisko'])) {
                $herec = new ModelHerci();
                $herec->setMeno($_POST['meno']);
                $herec->setPriezvisko($_POST['priezvisko']);
                self::createHerec($herec);
                header('Location: /herci');
            }
        }

        // Edit existing one
        if($action_details == 'edit') {
            
            if (!empty($_POST)) {
                if (isset($_GET['id']) && isset($_POST['meno']) && isset($_POST['priezvisko'])) {
                    $herec = new ModelHerci();
                    $herec->setIdHerca($_GET['id']);
                    $herec->setMeno($_POST['meno']);
                    $herec->setPriezvisko($_POST['priezvisko']);
                    self::updateHerec($herec);
                    header('Location: /herci');
                }
            }


            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $edit_herec_data = Database::getById('herci', $id, 'id_herca');
            }
        }

        // Delete an existing element
        if($action_details == 'delete') {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                Database::delete('herci',$id,'id_herca');
                header('Location: /herci');
            }
        }
        
        // Get specific "view" according url request
        require_once("./views/$viewName.php");
    }

    public function createHerec(ModelHerci $herec) {
        return Database::create('herci', $herec->toArray());
    }

    public function updateHerec(ModelHerci $herec) {
        return Database::update('herci', $herec->getIdHerca(), 'id_herca', $herec->toArray());
    }

}