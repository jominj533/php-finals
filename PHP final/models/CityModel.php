<?php

    class CityModel {

        private static $_table = "cities";
        
        public static function findAll () {            $table = self::$_table;
            $sql = "SELECT * FROM {$table}";

            $conn = get_connection();
            $cities = $conn->query ($sql) ->fetchAll(PDO::FETCH_OBJ);
            $conn = null;
            return $cities;
        }

        public static function find ($id) {
            $table = self::$_table;
            $sql = "SELECT * FROM {$table} WHERE id = :id";
            $conn = get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id",$id, PDO::PARAM_INT);
            $stmt->execute();
            $cities = $stmt->fetch(PDO::FETCH_OBJ);
            $conn = null;
            return $cities;
        }

        public static function create ($package) {
            $table = self::$_table;
            $sql = "INSERT INTO {$table} (
                owner_name
            ) VALUES (
                :owner_name
            )";
            $conn = get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":owner_name",$package["owner_name"], PDO::PARAM_STR);
            $stmt->execute();
            $conn = null;
        }

        public static function update ($package) {
            $table = self::$_table;
            $sql = "UPDATE {$table} SET 
                owner_name = :owner_name
            WHERE id = id";

            $conn = get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id",$package["id"], PDO::PARAM_INT);
            $stmt->bindParam(":owner_name",$package["owner_name"], PDO::PARAM_STR);
            $stmt->execute();
            $conn = null;
        }

        public static function delete ($id) {
            $table = self::$_table;
            $sql = "DELETE {$table}  WHERE id = id";
            
            $conn = get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id",$id, PDO::PARAM_INT);
            $stmt->execute();

            $conn = null;
        }

    }

?>