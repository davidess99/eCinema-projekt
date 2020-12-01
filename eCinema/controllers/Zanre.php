<?php 

class Zanre extends Controller {

    public static function crudActions($viewName, $page_name, $action_details) {

         // If it's action empty get all records from specific table
         if($action_details == '') {
            $readAll = Database::readAll($page_name);
        }

        // Add new
        if($action_details == 'add-new') {
            if (isset($_POST['zaner'])) {
                $zaner = new ModelZanre();
                $zaner->setZaner($_POST['zaner']);
                self::createZaner($zaner);
                header('Location: /zanre');
            }
        }

        // Edit existing one
        if($action_details == 'edit') {
            
            if (!empty($_POST)) {
                if (isset($_GET['id']) && isset($_POST['zaner'])) {
                    $zaner = new ModelZanre();
                    $zaner->setIdZanru($_GET['id']);
                    $zaner->setZaner($_POST['zaner']);
                    self::updateZaner($zaner);
                    header('Location: /zanre');
                }
            }


            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $edit_zaner_data = Database::getById('zanre', $id, 'id_zanru');
            }
        }

        // Delete an existing element
        if($action_details == 'delete') {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                Database::delete('zanre',$id,'id_zanru');
                header('Location: /zanre');
            }
        }
        
        // Get specific "view" according url request
        require_once("./views/$viewName.php");
    }

    public function createZaner(ModelZanre $zaner) {
        return Database::create('zanre', $zaner->toArray());
    }

    public function updateZaner(ModelZanre $zaner) {
        return Database::update('zanre', $zaner->getIdZanru(), 'id_zanru', $zaner->toArray());
    }

}