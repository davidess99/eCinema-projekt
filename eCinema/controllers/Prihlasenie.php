<?php 

class Prihlasenie extends Controller {

    public static function crudActions($viewName, $page_name, $action_details) {

        // Add new
        if($action_details == 'verify') {

            if (isset($_POST['pouzivatel']) && isset($_POST['email']) && isset($_POST['heslo'])) {

                $email = $_POST['email'];
                $stm = "";
                $name_id = "";

                if($_POST['pouzivatel'] == 'zamestnanec') {
                    $stm = self::getDBConnection()->prepare('SELECT * FROM zamestnanci WHERE email = :email');
                    $name_id = "id_zamestnanca";
                } else if($_POST['pouzivatel'] == 'zákazník') {
                    $stm = self::getDBConnection()->prepare('SELECT * FROM zakaznici WHERE email = :email');
                    $name_id = "id_zakaznika";
                }

                $stm->bindValue(':email', $email);
                $success = $stm->execute();
                $user = $stm->fetch(PDO::FETCH_ASSOC);

                $login_error = '';

                // Check password
                if (hash_equals(md5($_POST['heslo']), $user['heslo'])) {
                    $_SESSION['auth'] = true;
                    $_SESSION['user_id'] = $user[$name_id];
                    $_SESSION['user_name'] = $user['meno']." ".$user['priezvisko'];
                    header('Location: /');
                    exit();
                } else {
                    $login_error = '<div class="alert alert-danger alert-dismissible fade show container">
                                        <strong>Chyba!</strong> Neplatné prihlasovacie údaje!
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    </div>';
                }

            }

        }

        // Get specific "view" according url request
        require_once("./views/$viewName.php");
    }
    
}