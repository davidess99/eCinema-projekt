<?php 

class PlatobneUdaje extends Controller {

    public static function crudActions($viewName, $page_name, $action_details) {

         // If it's action empty get all records from specific table
         if($action_details == '') {
            //$readAll = Database::readAll($page_name);
            $readAll = Database::readSQL("SELECT * FROM platobne_udaje AS u INNER JOIN zakaznici AS z ON (u.zakaznici_id_zakaznika = z.id_zakaznika) ORDER BY u.id_plat_udaja");
        }

        // Add new
        if($action_details == 'add-new') {
            if (isset($_POST['zakaznici_id_zakaznika']) && isset($_POST['cislo_karty']) && isset($_POST['platnost_karty']) && isset($_POST['cvv_kod'])) {
                $plat_udaj = new ModelPlatobneUdaje();
                $plat_udaj->setIdZakaznika($_POST['zakaznici_id_zakaznika']);             
                $plat_udaj->setCisloKarty($_POST['cislo_karty']);             
                $plat_udaj->setPlatnostKarty($_POST['platnost_karty']);             
                $plat_udaj->setCvvKod($_POST['cvv_kod']);             
                self::createPlatUdaj($plat_udaj);

                header('Location: /platobne_udaje');
            }

            if (empty($_POST)) {
                $readAll = Database::readAll('zakaznici');
            }
        }

        // Edit existing one
        if($action_details == 'edit') {
            
            if (!empty($_POST)) {
                if (isset($_GET['id']) && isset($_POST['zakaznici_id_zakaznika']) && isset($_POST['cislo_karty']) && isset($_POST['platnost_karty']) && isset($_POST['cvv_kod'])) {
                    $plat_udaj = new ModelPlatobneUdaje();
                    $plat_udaj->setIdPlatUdaja($_GET['id']);
                    $plat_udaj->setIdZakaznika($_POST['zakaznici_id_zakaznika']);
                    $plat_udaj->setCisloKarty($_POST['cislo_karty']);
                    $plat_udaj->setPlatnostKarty($_POST['platnost_karty']);
                    $plat_udaj->setCvvKod($_POST['cvv_kod']);
                    self::updatePlatUdaj($plat_udaj);
                    header('Location: /platobne_udaje');
                }
            }


            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $edit_plat_udaj_data = Database::getById('platobne_udaje', $id, 'id_plat_udaja');
                $readAll = Database::readAll('zakaznici');
            }
        }

        // Delete an existing element
        if($action_details == 'delete') {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                Database::delete('platobne_udaje',$id,'id_plat_udaja');
                header('Location: /platobne_udaje');
            }
        }
        
        // Get specific "view" according url request
        require_once("./views/$viewName.php");
    }

    public function createPlatUdaj(ModelPlatobneUdaje $plat_udaj) {
        return Database::create('platobne_udaje', $plat_udaj->toArray());
    }

    public function updatePlatUdaj(ModelPlatobneUdaje $plat_udaj) {
        return Database::update('platobne_udaje', $plat_udaj->getIdPlatUdaja(), 'id_plat_udaja', $plat_udaj->toArray());
    }

}