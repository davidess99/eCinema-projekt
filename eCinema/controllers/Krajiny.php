<?php 

class Krajiny extends Controller {

    public static function crudActions($viewName, $page_name, $action_details) {

         // If it's action empty get all records from specific table
         if($action_details == '') {
            $readAll = Database::readAll($page_name);
        }

        // Add new
        if($action_details == 'add-new') {
            if (isset($_POST['krajina'])) {
                $krajina = new ModelKrajiny();
                $krajina->setKrajina($_POST['krajina']);
                self::createKrajina($krajina);
                header('Location: /krajiny');
            }
        }

        // Edit existing one
        if($action_details == 'edit') {
            
            if (!empty($_POST)) {
                if (isset($_GET['id']) && isset($_POST['krajina'])) {
                    $krajina = new ModelKrajiny();
                    $krajina->setIdKrajiny($_GET['id']);
                    $krajina->setKrajina($_POST['krajina']);
                    self::updateKrajina($krajina);
                    header('Location: /krajiny');
                }
            }


            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $edit_krajina_data = Database::getById('krajiny', $id, 'id_krajiny');
            }
        }

        // Delete an existing element
        if($action_details == 'delete') {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                Database::delete('krajiny',$id,'id_krajiny');
                header('Location: /krajiny');
            }
        }
        
        // Get specific "view" according url request
        require_once("./views/$viewName.php");
    }

    public function createKrajina(ModelKrajiny $krajina) {
        return Database::create('krajiny', $krajina->toArray());
    }

    public function updateKrajina(ModelKrajiny $krajina) {
        return Database::update('krajiny', $krajina->getIdKrajiny(), 'id_krajiny', $krajina->toArray());
    }

}