<?php 

class Filmy extends Controller {

    public static function crudActions($viewName, $page_name, $action_details) {

         // If it's action empty get all records from specific table
         if($action_details == '') {
            //$readAll = Database::readAll($page_name);
            $readAll = Database::readSQL("SELECT * FROM filmy f INNER JOIN rozlisenie r ON (r.id_rozlisenia = f.rozlisenie_id_rozlisenia) INNER JOIN dabing d ON (d.id_dabingu = f.dabing_id_dabingu) INNER JOIN titulky t ON (t.id_titulky = f.titulky_id_titulky)");
        }

        // Add new
        if($action_details == 'add-new') {
            if (isset($_POST['nazov']) && isset($_POST['rozlisenie_id_rozlisenia']) && isset($_POST['dabing_id_dabingu']) && isset($_POST['dlzka_filmu_min'])) {

                $plagat = "";
                if(isset($_FILES["file"]["type"])) {
                    $plagat = self::uploadPoster($_FILES);
                }

                $film = new ModelFilmy();
                $film->setNazov($_POST['nazov']);               
                $film->setPlagat($plagat);      
                $film->setIdRozlisenia($_POST['rozlisenie_id_rozlisenia']);               
                $film->setIdDabingu($_POST['dabing_id_dabingu']);               
                $film->setIdTitulky($_POST['titulky_id_titulky']);               
                $film->setVhodneOd($_POST['vhodne_od']);               
                $film->setPremiera($_POST['premiera']);               
                $film->setDlzkaFilmuMin($_POST['dlzka_filmu_min']);               
                $film->setRokVyroby($_POST['rok_vyroby']);               
                $film->setLinkTrailer($_POST['link_trailer']);      
                
                self::createFilm($film);
                header('Location: /filmy');
            }

            if (empty($_POST)) {
                $readRozlisenie = Database::readAll('rozlisenie');
                $readDabing = Database::readAll('dabing');
                $readTitulky = Database::readAll('titulky');
            }
        }

        // Edit existing one
        if($action_details == 'edit') {
            
            if (!empty($_POST)) {
                if (isset($_GET['id']) && isset($_POST['nazov']) && isset($_POST['rozlisenie_id_rozlisenia']) && isset($_POST['dabing_id_dabingu']) && isset($_POST['dlzka_filmu_min'])) {
                    $film = new ModelFilmy();
                    $film->setIdFilmu($_GET['id']);
                    $film->setNazov($_POST['nazov']);

                    // when we're not replace current db poster record
                    if($_FILES["file"]["type"] == '' && isset($_POST['plagat'])) {
                        $film->setPlagat($_POST['plagat']);
                    } else if($_FILES["file"]["type"] != '') {
                        $plagat = "";
                        if(isset($_FILES["file"]["type"])) {
                            $plagat = self::uploadPoster($_FILES);
                        }
                        $film->setPlagat($plagat);
                    }

                    $film->setIdRozlisenia($_POST['rozlisenie_id_rozlisenia']);
                    $film->setIdDabingu($_POST['dabing_id_dabingu']);
                    $film->setIdTitulky($_POST['titulky_id_titulky']);
                    $film->setVhodneOd($_POST['vhodne_od']);
                    $film->setPremiera($_POST['premiera']);
                    $film->setDlzkaFilmuMin($_POST['dlzka_filmu_min']);
                    $film->setRokVyroby($_POST['rok_vyroby']);
                    $film->setLinkTrailer($_POST['link_trailer']);

                    self::updateFilm($film);
                    header('Location: /filmy');
                }
            }


            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $edit_film_data = Database::getById('filmy', $id, 'id_filmu');
                $readRozlisenie = Database::readAll('rozlisenie');
                $readDabing = Database::readAll('dabing');
                $readTitulky = Database::readAll('titulky');
            }
        }

        // Delete an existing element
        if($action_details == 'delete') {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                Database::delete('filmy',$id,'id_filmu');
                header('Location: /filmy');
            }
        }
        
        // Get specific "view" according url request
        require_once("./views/$viewName.php");
    }

    public function createFilm(ModelFilmy $film) {
        return Database::create('filmy', $film->toArray());
    }

    public function updateFilm(ModelFilmy $film) {
        return Database::update('filmy', $film->getIdFilmu(), 'id_filmu', $film->toArray());
    }

    public function uploadPoster($files) {
        $validextensions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $files["file"]["name"]);
        $file_extension = end($temporary);

            if ((($files["file"]["type"] == "image/png") || ($files["file"]["type"] == "image/jpg") || ($files["file"]["type"] == "image/jpeg")) 
                && ($files["file"]["size"] < 999999)
                && in_array($file_extension, $validextensions)) { 
                        if ($files["file"]["error"] > 0) {
                                echo "Return Code: " . $files["file"]["error"] . "<br/><br/>";
                        } else {
                            if (file_exists("upload/" . $files["file"]["name"])) {

                                // Get file/image name (with extension)
                                $file_name_complete = $files["file"]["name"];
                                
                                // Extract file extension
                                $extension = pathinfo($file_name_complete, PATHINFO_EXTENSION);

                                // Extract file name without extension
                                $file_name = pathinfo($file_name_complete, PATHINFO_FILENAME);

                                // Temp file location
                                $file_temp_location = $files['file']['tmp_name'];

                                // Save an original file name variable to track while renaming if file already exists
                                $file_name_original = $file_name;

                                // Increment file name by 1
                                $num = 1;

                                /**
                                 * Check if the same file name already exists in the upload folder,
                                 * append increment number to the original filename
                                 **/
                                while (file_exists("upload/" . $file_name . "." . $extension)) {
                                    $file_name = (string) $file_name_original . $num;
                                    $file_name_complete = $file_name . "." . $extension;
                                    $num++;
                                }

                                // Upload file in upload folder
                                $file_target_location = "upload/" . $file_name_complete;
                                $file_upload_status = move_uploaded_file($file_temp_location, $file_target_location);

                                if ($file_upload_status == true) {
                                    return $file_name_complete;
                                }

                            } else {
                                $sourcePath = $files['file']['tmp_name']; // Storing source path of the file in a variable
                                
                                $targetPath = "upload/".$files['file']['name']; // Target path where file is to be stored
                                move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
                                return $files["file"]["name"];
                            }   
                        }
                } else {
                    return "Neplatná veľkosť alebo typ súboru";
                }
    }

}