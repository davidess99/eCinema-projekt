<?php 

class Reziseri extends Controller {

    public static function crudActions($viewName, $page_name, $action_details) {

         // If it's action empty get all records from specific table
         if($action_details == '') {
            $readAll = Database::readAll($page_name);
        }

        // Add new
        if($action_details == 'add-new') {
            if (isset($_POST['meno']) && isset($_POST['priezvisko'])) {
                $reziser = new ModelReziseri();
                $reziser->setMeno($_POST['meno']);
                $reziser->setPriezvisko($_POST['priezvisko']);
                self::createReziser($reziser);
                header('Location: /reziseri');
            }
        }

        // Edit existing one
        if($action_details == 'edit') {
            
            if (!empty($_POST)) {
                if (isset($_GET['id']) && isset($_POST['meno']) && isset($_POST['priezvisko'])) {
                    $reziser = new ModelReziseri();
                    $reziser->setIdRezisera($_GET['id']);
                    $reziser->setMeno($_POST['meno']);
                    $reziser->setPriezvisko($_POST['priezvisko']);
                    self::updateReziser($reziser);
                    header('Location: /reziseri');
                }
            }


            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $edit_reziser_data = Database::getById('reziseri', $id, 'id_rezisera');
            }
        }

        // Delete an existing element
        if($action_details == 'delete') {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                Database::delete('reziseri',$id,'id_rezisera');
                header('Location: /reziseri');
            }
        }
        
        // Get specific "view" according url request
        require_once("./views/$viewName.php");
    }

    public function createReziser(ModelReziseri $reziser) {
        return Database::create('reziseri', $reziser->toArray());
    }

    public function updateReziser(ModelReziseri $reziser) {
        return Database::update('reziseri', $reziser->getIdRezisera(), 'id_rezisera', $reziser->toArray());
    }

}