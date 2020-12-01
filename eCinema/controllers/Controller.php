<?php

    class Controller extends Database {

        public static function CreateView($viewName) {

            // get current page name
            $page_name = $_GET['url'];
            // get value from action parameter
            $action_details = (filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS));


            static::crudActions($viewName, $page_name, $action_details);
        }

        public function getDBConnection() {
            return Database::getConnection();
        }

    }