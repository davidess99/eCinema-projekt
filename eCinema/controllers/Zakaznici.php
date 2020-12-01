<?php 

class Zakaznici extends Controller {

    public static function crudActions($viewName, $page_name, $action_details) {

         // If it's action empty get all records from specific table
         if($action_details == '') {
            $readAll = Database::readAll($page_name);
        }

        // Add new
        if($action_details == 'add-new') {
            if (isset($_POST['meno']) && isset($_POST['priezvisko']) && isset($_POST['email'])) {
                $zakaznik = new ModelZakaznici();
                $zakaznik->setMeno($_POST['meno']);
                $zakaznik->setPriezvisko($_POST['priezvisko']);
                $zakaznik->setDatumNarodenia($_POST['datum_narodenia']);
                $zakaznik->setPohlavie($_POST['pohlavie']);
                $zakaznik->setEmail($_POST['email']);

                // encode given password to md5
                $md5_heslo = md5($_POST['heslo']);
                $zakaznik->setHeslo($md5_heslo);

                $zakaznik->setTelCislo($_POST['tel_cislo']);
                self::createZakaznik($zakaznik);
                header('Location: /zakaznici');
            }
        }

        // Edit existing one
        if($action_details == 'edit') {
            
            if (!empty($_POST)) {
                if (isset($_GET['id']) && isset($_POST['meno']) && isset($_POST['priezvisko']) && isset($_POST['email'])) {
                    $zakaznik = new ModelZakaznici();
                    $zakaznik->setIdZakaznika($_GET['id']);
                    $zakaznik->setMeno($_POST['meno']);
                    $zakaznik->setPriezvisko($_POST['priezvisko']);
                    $zakaznik->setDatumNarodenia($_POST['datum_narodenia']);
                    $zakaznik->setPohlavie($_POST['pohlavie']);
                    $zakaznik->setEmail($_POST['email']);
                    $zakaznik->setHeslo($_POST['heslo']);
                    $zakaznik->setTelCislo($_POST['tel_cislo']);
                    self::updateZakaznik($zakaznik);
                    header('Location: /zakaznici');
                }
            }


            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $edit_zakaznik_data = Database::getById('zakaznici', $id, 'id_zakaznika');
            }
        }

        // Delete an existing element
        if($action_details == 'delete') {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                Database::delete('zakaznici',$id,'id_zakaznika');
                header('Location: /zakaznici');
            }
        }
        
        // Get specific "view" according url request
        require_once("./views/$viewName.php");
    }

    public function createZakaznik(ModelZakaznici $zakaznik) {
        return Database::create('zakaznici', $zakaznik->toArray());
    }

    public function updateZakaznik(ModelZakaznici $zakaznik) {
        return Database::update('zakaznici', $zakaznik->getIdZakaznika(), 'id_zakaznika', $zakaznik->toArray());
    }

}