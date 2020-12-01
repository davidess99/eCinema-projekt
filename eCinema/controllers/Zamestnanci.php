<?php 

class Zamestnanci extends Controller {

    public static function crudActions($viewName, $page_name, $action_details) {

         // If it's action empty get all records from specific table
         if($action_details == '') {
            //$readAll = Database::readAll($page_name);
            $readAll = Database::readSQL("SELECT * FROM zamestnanci AS z INNER JOIN roly_zamestnancov AS r ON (z.roly_zamestnancov_id_roly = r.id_roly)");
        }

        // Add new
        if($action_details == 'add-new') {
            if (isset($_POST['meno']) && isset($_POST['priezvisko']) && isset($_POST['email']) && isset($_POST['roly_zamestnancov_id_roly'])) {
                $zamestnanec = new ModelZamestnanci();
                $zamestnanec->setMeno($_POST['meno']);
                $zamestnanec->setPriezvisko($_POST['priezvisko']);
                $zamestnanec->setDatumNarodenia($_POST['datum_narodenia']);
                $zamestnanec->setPohlavie($_POST['pohlavie']);
                $zamestnanec->setEmail($_POST['email']);

                // encode given password to md5
                $md5_heslo = md5($_POST['heslo']);
                $zamestnanec->setHeslo($md5_heslo);

                $zamestnanec->setTelCislo($_POST['tel_cislo']);
                $zamestnanec->setIdRoly($_POST['roly_zamestnancov_id_roly']);                
                self::createZamestnanec($zamestnanec);

                header('Location: /zamestnanci');
            }

            if (empty($_POST)) {
                $readAll = Database::readAll('roly_zamestnancov');
            }
        }

        // Edit existing one
        if($action_details == 'edit') {
            
            if (!empty($_POST)) {
                if (isset($_GET['id']) && isset($_POST['meno']) && isset($_POST['priezvisko']) && isset($_POST['email']) && isset($_POST['roly_zamestnancov_id_roly'])) {
                    $zamestnanec = new ModelZamestnanci();
                    $zamestnanec->setIdZamestnanca($_GET['id']);
                    $zamestnanec->setMeno($_POST['meno']);
                    $zamestnanec->setPriezvisko($_POST['priezvisko']);
                    $zamestnanec->setDatumNarodenia($_POST['datum_narodenia']);
                    $zamestnanec->setPohlavie($_POST['pohlavie']);
                    $zamestnanec->setEmail($_POST['email']);
                    $zamestnanec->setHeslo($_POST['heslo']);
                    $zamestnanec->setTelCislo($_POST['tel_cislo']);
                    $zamestnanec->setIdRoly($_POST['roly_zamestnancov_id_roly']);
                    self::updateZamestnanec($zamestnanec);
                    header('Location: /zamestnanci');
                }
            }


            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $edit_zamestnanec_data = Database::getById('zamestnanci', $id, 'id_zamestnanca');
                $readAll = Database::readAll('roly_zamestnancov');
            }
        }

        // Delete an existing element
        if($action_details == 'delete') {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                Database::delete('zamestnanci',$id,'id_zamestnanca');
                header('Location: /zamestnanci');
            }
        }
        
        // Get specific "view" according url request
        require_once("./views/$viewName.php");
    }

    public function createZamestnanec(ModelZamestnanci $zamestnanec) {
        return Database::create('zamestnanci', $zamestnanec->toArray());
    }

    public function updateZamestnanec(ModelZamestnanci $zamestnanec) {
        return Database::update('zamestnanci', $zamestnanec->getIdZamestnanca(), 'id_zamestnanca', $zamestnanec->toArray());
    }

}