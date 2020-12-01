<?php 

class Premietanie extends Controller {

    public static function crudActions($viewName, $page_name, $action_details) {

         // If it's action empty get all records from specific table
         if($action_details == '') {
            //$readAll = Database::readAll($page_name);
            $readAll = Database::readSQL("SELECT * FROM premietanie p INNER JOIN filmy f ON (f.id_filmu = p.filmy_id_filmu) INNER JOIN saly s ON (s.id_saly = p.saly_id_saly)");
        }

        // Add new
        if($action_details == 'add-new') {
            if (isset($_POST['filmy_id_filmu']) && isset($_POST['saly_id_saly']) && isset($_POST['datum_cas']) && isset($_POST['cena']) && isset($_POST['cena_zlava'])) {
                $premietanie = new ModelPremietanie();
                $premietanie->setIdFilmu($_POST['filmy_id_filmu']);             
                $premietanie->setIdSaly($_POST['saly_id_saly']);             
                $premietanie->setDatumCas($_POST['datum_cas']);             
                $premietanie->setCena($_POST['cena']);             
                $premietanie->setCenaZlava($_POST['cena_zlava']);             
                self::createPremietanie($premietanie);

                header('Location: /premietanie');
            }

            if (empty($_POST)) {
                $readFilmy = Database::readAll('filmy');
                $readSaly = Database::readAll('saly');
            }
        }

        // Edit existing one
        if($action_details == 'edit') {
            
            if (!empty($_POST)) {
                if (isset($_GET['id']) && isset($_POST['filmy_id_filmu']) && isset($_POST['saly_id_saly']) && isset($_POST['datum_cas']) && isset($_POST['cena']) && isset($_POST['cena_zlava'])) {
                    $premietanie = new ModelPremietanie();
                    $premietanie->setIdPremietania($_GET['id']);
                    $premietanie->setIdFilmu($_POST['filmy_id_filmu']);
                    $premietanie->setIdSaly($_POST['saly_id_saly']);
                    $premietanie->setDatumCas($_POST['datum_cas']);
                    $premietanie->setCena($_POST['cena']);
                    $premietanie->setCenaZlava($_POST['cena_zlava']);
                    self::updatePremietanie($premietanie);
                    header('Location: /premietanie');
                }
            }


            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $edit_premietanie_data = Database::getById('premietanie', $id, 'id_premietania');
                $readFilmy = Database::readAll('filmy');
                $readSaly = Database::readAll('saly');
            }
        }

        // Delete an existing element
        if($action_details == 'delete') {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                Database::delete('premietanie',$id,'id_premietania');
                header('Location: /premietanie');
            }
        }
        
        // Get specific "view" according url request
        require_once("./views/$viewName.php");
    }

    public function createPremietanie(ModelPremietanie $premietanie) {
        return Database::create('premietanie', $premietanie->toArray());
    }

    public function updatePremietanie(ModelPremietanie $premietanie) {
        return Database::update('premietanie', $premietanie->getIdPremietania(), 'id_premietania', $premietanie->toArray());
    }

}