<?php

    class CityModel {

        private static $_table = "cities";
        
        public static function findAll () {            
            $table = self::$_table;
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
                name
                country
                province
                population
            ) VALUES (
                :name
                :country
                :province
                :population
            )";
            $conn = get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":name",$package["name"], PDO::PARAM_STR);
            $stmt->bindParam(":country",$package["country"], PDO::PARAM_STR);
            $stmt->bindParam(":province",$package["province"], PDO::PARAM_STR);
            $stmt->bindParam(":population",$package["population"], PDO::PARAM_INT);
            $stmt->execute();
            $conn = null;
        }

        public static function update ($package) {
            $table = self::$_table;
            $sql = "UPDATE {$table} SET 
                name = :name
                country =:country
                province = :province
                population = :population
            WHERE id = id";

            $conn = get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":name",$package["name"], PDO::PARAM_STR);
            $stmt->bindParam(":country",$package["country"], PDO::PARAM_STR);
            $stmt->bindParam(":province",$package["province"], PDO::PARAM_STR);
            $stmt->bindParam(":population",$package["population"], PDO::PARAM_INT);
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
