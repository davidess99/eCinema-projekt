<?php 

class Dabing extends Controller {

    public static function crudActions($viewName, $page_name, $action_details) {

         // If it's action empty get all records from specific table
         if($action_details == '') {
            $readAll = Database::readAll($page_name);
        }

        // Add new
        if($action_details == 'add-new') {
            if (isset($_POST['oznacenie_dabingu']) && isset($_POST['nazov_dabingu'])) {
                $dabing = new ModelDabing();
                $dabing->setOznacenieDabingu($_POST['oznacenie_dabingu']);
                $dabing->setNazovDabingu($_POST['nazov_dabingu']);
                self::createDabing($dabing);
                header('Location: /dabing');
            }
        }

        // Edit existing one
        if($action_details == 'edit') {
            
            if (!empty($_POST)) {
                if (isset($_GET['id']) && isset($_POST['oznacenie_dabingu']) && isset($_POST['nazov_dabingu'])) {
                    $dabing = new ModelDabing();
                    $dabing->setIdDabingu($_GET['id']);
                    $dabing->setOznacenieDabingu($_POST['oznacenie_dabingu']);
                    $dabing->setNazovDabingu($_POST['nazov_dabingu']);
                    self::updateDabing($dabing);
                    header('Location: /dabing');
                }
            }


            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $edit_dabing_data = Database::getById('dabing', $id, 'id_dabingu');
            }
        }

        // Delete an existing element
        if($action_details == 'delete') {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                Database::delete('dabing',$id,'id_dabingu');
                header('Location: /dabing');
            }
        }
        
        // Get specific "view" according url request
        require_once("./views/$viewName.php");
    }

    public function createDabing(ModelDabing $dabing) {
        return Database::create('dabing', $dabing->toArray());
    }

    public function updateDabing(ModelDabing $dabing) {
        return Database::update('dabing', $dabing->getIdDabingu(), 'id_dabingu', $dabing->toArray());
    }

}