<?php 

class Rozlisenie extends Controller {

    public static function crudActions($viewName, $page_name, $action_details) {

         // If it's action empty get all records from specific table
         if($action_details == '') {
            $readAll = Database::readAll($page_name);
        }

        // Add new
        if($action_details == 'add-new') {
            if (isset($_POST['rozlisenie'])) {
                $rozlisenie = new ModelRozlisenie();
                $rozlisenie->setRozlisenie($_POST['rozlisenie']);
                self::createRozlisenie($rozlisenie);
                header('Location: /rozlisenie');
            }
        }

        // Edit existing one
        if($action_details == 'edit') {
            
            //
            if (!empty($_POST)) {
                if (isset($_GET['id']) && isset($_POST['rozlisenie'])) {
                    $rozlisenie = new ModelRozlisenie();
                    $rozlisenie->setIdRozlisenia($_GET['id']);
                    $rozlisenie->setRozlisenie($_POST['rozlisenie']);
                    self::updateRozlisenie($rozlisenie);
                    header('Location: /rozlisenie');
                }
            }


            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $edit_rozlisenie_data = Database::getById('rozlisenie', $id, 'id_rozlisenia');
            }
        }

        // Delete an existing element
        if($action_details == 'delete') {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                Database::delete('rozlisenie',$id,'id_rozlisenia');
                header('Location: /rozlisenie');
            }
        }
        
        // Get specific "view" according url request
        require_once("./views/$viewName.php");
    }

    public function createRozlisenie(ModelRozlisenie $rozlisenie) {
        return Database::create('rozlisenie', $rozlisenie->toArray());
    }

    public function updateRozlisenie(ModelRozlisenie $rozlisenie) {
        return Database::update('rozlisenie', $rozlisenie->getIdRozlisenia(), 'id_rozlisenia', $rozlisenie->toArray());
    }

}