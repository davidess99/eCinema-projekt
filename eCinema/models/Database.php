<?php

    class Database {

        public static $host = "localhost";
        public static $db_name = "ecinema";
        public static $username = "root";
        public static $password = "root";

        private static function connect() {
            $pdo = new PDO('mysql:host='.self::$host.';dbname='.self::$db_name.';charset=utf8', self::$username, self::$password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }

        public static function query($query, $params = array()) {
            $statement = self::connect()->prepare($query);
            $statement->execute($params);

            // if (explode(' ', $query)[0] == 'SELECT') {
            //     $data = $statement->fetchAll();
            //     return $data;
            // }

            $data = $statement->fetchAll();
            return $data;
        }

        public static function getConnection() {
            return self::connect();
        }


        // CRUD operations

        // C - Create
        public function create($table, $data) {
            $columns = array_keys($data);
            $columnSql = implode(',', $columns);
            $bindingSql = ':'.implode(',:', $columns);
            $sql = "INSERT INTO $table ($columnSql) VALUES ($bindingSql)";
            $stm = self::connect()->prepare($sql);
            foreach ($data as $key => $value) {
                $stm->bindValue(':'.$key, $value);
            }
            $status = $stm->execute();
            //return ($status) ? $this->pdo->lastInsertId() : false;
            return $status;
        }

        // R - Read 
        // all from table
        public function readAll($table) {
            $stm = self::connect()->prepare('SELECT * FROM '.$table);
            $success = $stm->execute();
            $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
            return ($success) ? $rows: [];
        }

        // specific record
        public function getById($table, $id, $id_name){
            $stm = self::connect()->prepare('SELECT * FROM '.$table.' WHERE '.$id_name.' = :id');
            $stm->bindValue(':id', $id);
            $success = $stm->execute();
            $row = $stm->fetch(PDO::FETCH_ASSOC);
            return ($success) ? $row: [];
        }

        // read by specific query
        public function readSQL($sql_query) {
            $stm = self::connect()->prepare($sql_query);
            $success = $stm->execute();
            $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
            return ($success) ? $rows: [];
        }

        // U - Update
        public function update($table, $id, $id_name, $data) {
            if (isset($data['id']))
                unset($data['id']);
            $columns = array_keys($data);
            $columns = array_map(function($item){
                return $item.'=:'.$item;
            }, $columns);
            $bindingSql = implode(',', $columns);
            $sql = "UPDATE $table SET $bindingSql WHERE ".$id_name." = :id";
            $stm = self::connect()->prepare($sql);
            $data['id'] = $id;
            foreach ($data as $key => $value){
                $stm->bindValue(':'.$key, $value);
            }
            $status = $stm->execute();
            return $status;
        }

        // D - Delete
        public function delete($table, $id, $id_name) {
            $stm = self::connect()->prepare('DELETE FROM '.$table.' WHERE '.$id_name.' = :id');
            $stm->bindParam(':id', $id);
            $success = $stm->execute();
            return ($success);
        }




    }