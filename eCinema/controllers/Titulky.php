<?php 

class Titulky extends Controller {

    public static function crudActions($viewName, $page_name, $action_details) {

         // If it's action empty get all records from specific table
         if($action_details == '') {
            $readAll = Database::readAll($page_name);
        }

        // Add new
        if($action_details == 'add-new') {
            if (isset($_POST['oznacenie_titulky']) && isset($_POST['nazov_titulky'])) {
                $titulky = new ModelTitulky();
                $titulky->setOznacenieTitulky($_POST['oznacenie_titulky']);
                $titulky->setNazovTitulky($_POST['nazov_titulky']);
                self::createTitulky($titulky);
                header('Location: /titulky');
            }
        }

        // Edit existing one
        if($action_details == 'edit') {
            
            if (!empty($_POST)) {
                if (isset($_GET['id']) && isset($_POST['oznacenie_titulky']) && isset($_POST['nazov_titulky'])) {
                    $titulky = new ModelTitulky();
                    $titulky->setIdTitulky($_GET['id']);
                    $titulky->setOznacenieTitulky($_POST['oznacenie_titulky']);
                    $titulky->setNazovTitulky($_POST['nazov_titulky']);
                    self::updateTitulky($titulky);
                    header('Location: /titulky');
                }
            }


            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $edit_titulky_data = Database::getById('titulky', $id, 'id_titulky');
            }
        }

        // Delete an existing element
        if($action_details == 'delete') {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                Database::delete('titulky',$id,'id_titulky');
                header('Location: /titulky');
            }
        }
        
        // Get specific "view" according url request
        require_once("./views/$viewName.php");
    }

    public function createTitulky(ModelTitulky $titulky) {
        return Database::create('titulky', $titulky->toArray());
    }

    public function updateTitulky(ModelTitulky $titulky) {
        return Database::update('titulky', $titulky->getIdTitulky(), 'id_titulky', $titulky->toArray());
    }

}