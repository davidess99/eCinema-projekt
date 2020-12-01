<?php 

class RolyZamestnancov extends Controller {

    public static function crudActions($viewName, $page_name, $action_details) {


         // If it's action empty get all records from specific table
         if($action_details == '') {
            $readAll = Database::readAll($page_name);
        }



        // Add new
        if($action_details == 'add-new') {
            if (isset($_POST['rola'])) {
                $rola_zamestnanca = new ModelRolyZamestnancov();
                $rola_zamestnanca->setRola($_POST['rola']);
                self::createRolaZamestnanca($rola_zamestnanca);
                header('Location: /roly_zamestnancov');
            }
        }

        // Edit existing one
        if($action_details == 'edit') {
            
            if (!empty($_POST)) {
                if (isset($_GET['id']) && isset($_POST['rola'])) {
                    $rola_zamestnanca = new ModelRolyZamestnancov();
                    $rola_zamestnanca->setIdRoly($_GET['id']);
                    $rola_zamestnanca->setRola($_POST['rola']);
                    self::updateRolaZamestnanca($rola_zamestnanca);
                    header('Location: /roly_zamestnancov');
                }
            }


            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $edit_rola_data = Database::getById('roly_zamestnancov', $id, 'id_roly');
            }
        }

        // Delete an existing element
        if($action_details == 'delete') {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                Database::delete('roly_zamestnancov',$id,'id_roly');
                header('Location: /roly_zamestnancov');
            }
        }
        
        // Get specific "view" according url request
        require_once("./views/$viewName.php");
    }

    public function createRolaZamestnanca(ModelRolyZamestnancov $rola_zamestnanca) {
        return Database::create('roly_zamestnancov', $rola_zamestnanca->toArray());
    }

    public function updateRolaZamestnanca(ModelRolyZamestnancov $rola_zamestnanca) {
        return Database::update('roly_zamestnancov', $rola_zamestnanca->getIdRoly(), 'id_roly', $rola_zamestnanca->toArray());
    }

}