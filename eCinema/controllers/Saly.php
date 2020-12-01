<?php 

class Saly extends Controller {

    public static function crudActions($viewName, $page_name, $action_details) {
            // If it's action empty get all records from specific table
            if($action_details == '') {
                $readAll = Database::readAll($page_name);
            }

            // Add new
            if($action_details == 'add-new') {
                if (isset($_POST['oznacenie'])) {
                    $sala = new ModelSaly();
                    $sala->setOznacenie($_POST['oznacenie']);
                    $sala->setPctMiest($_POST['pct_miest']);
                    self::createSala($sala);
                    header('Location: /saly');
                }
            }

            // Edit existing one
            if($action_details == 'edit') {
                
                //
                if (!empty($_POST)) {
                    if (isset($_GET['id']) && isset($_POST['oznacenie'])) {
                        $sala = new ModelSaly();
                        $sala->setIdSaly($_GET['id']);
                        $sala->setOznacenie($_POST['oznacenie']);
                        $sala->setPctMiest($_POST['pct_miest']);
                        self::updateSala($sala);
                        header('Location: /saly');
                    }
                }


                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $edit_sala_data = Database::getById('saly', $id, 'id_saly');
                }
            }

            // Delete an existing element
            if($action_details == 'delete') {
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    Database::delete('saly',$id,'id_saly');
                    header('Location: /saly');
                }
            }


        // Get specific "view" according url request
        require_once("./views/$viewName.php");
    }

    public function createSala(ModelSaly $sala) {
        return Database::create('saly', $sala->toArray());
    }

    public function updateSala(ModelSaly $sala) {
        return Database::update('saly', $sala->getIdSaly(), 'id_saly', $sala->toArray());
    }
    
}