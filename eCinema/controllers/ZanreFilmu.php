<?php 

class ZanreFilmu extends Controller {

    public static function crudActions($viewName, $page_name, $action_details) {

         // If it's action empty get all records from specific table
         if($action_details == '') {
            $readAll = Database::readSQL("SELECT * FROM filmy_zanre fz INNER JOIN filmy f ON (f.id_filmu = fz.filmy_id_filmu) INNER JOIN zanre z ON (z.id_zanru = fz.zanre_filmu_id_zanru)");
        }

        // Add new
        if($action_details == 'add-new') {
            if (isset($_POST['filmy_id_filmu']) && isset($_POST['zanre_filmu_id_zanru'])) {
                $film_zaner = new ModelZanreFilmu();
                $film_zaner->setIdFilmu($_POST['filmy_id_filmu']);             
                $film_zaner->setIdZanru($_POST['zanre_filmu_id_zanru']);                
                self::createFilmZaner($film_zaner);

                header('Location: /filmy_zanre');
            }

            if (empty($_POST)) {
                $readFilmy = Database::readAll('filmy');
                $readZanre = Database::readAll('zanre');
            }
        }

        // Edit existing one
        if($action_details == 'edit') {
            
            if (!empty($_POST)) {
                if (isset($_GET['id']) && isset($_POST['filmy_id_filmu']) && isset($_POST['zanre_filmu_id_zanru'])) {
                    $film_zaner = new ModelZanreFilmu();
                    $film_zaner->setIdFilmZanru($_GET['id']);
                    $film_zaner->setIdFilmu($_POST['filmy_id_filmu']);
                    $film_zaner->setIdZanru($_POST['zanre_filmu_id_zanru']);
                    self::updateFilmZaner($film_zaner);
                    header('Location: /filmy_zanre');
                }
            }


            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $edit_film_zaner_data = Database::getById('filmy_zanre', $id, 'id_film_zanru');
                $readFilmy = Database::readAll('filmy');
                $readZanre = Database::readAll('zanre');
            }
        }

        // Delete an existing element
        if($action_details == 'delete') {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                Database::delete('filmy_zanre',$id,'id_film_zanru');
                header('Location: /filmy_zanre');
            }
        }
        
        // Get specific "view" according url request
        require_once("./views/$viewName.php");
    }

    public function createFilmZaner(ModelZanreFilmu $film_zaner) {
        return Database::create('filmy_zanre', $film_zaner->toArray());
    }

    public function updateFilmZaner(ModelZanreFilmu $film_zaner) {
        return Database::update('filmy_zanre', $film_zaner->getIdFilmZanru(), 'id_film_zanru', $film_zaner->toArray());
    }

}