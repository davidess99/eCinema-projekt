<?php 

class Index extends Controller {

    public static function crudActions($viewName, $page_name, $action_details) {

        // If it's action empty get all records from specific table
        if($action_details == '') {
           $readAll = Database::readSQL("SELECT * FROM filmy f INNER JOIN rozlisenie r ON (f.rozlisenie_id_rozlisenia = r.id_rozlisenia) INNER JOIN dabing d ON (f.dabing_id_dabingu = d.id_dabingu) INNER JOIN titulky t ON (f.titulky_id_titulky = t.id_titulky)");
       }
       
       // Get specific "view" according url request
       require_once("./views/$viewName.php");
   }
    
}