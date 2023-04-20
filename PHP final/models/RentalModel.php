<?php

    class RentalModel {

        private static $_table = "rentals";
        
        public static function findAll () {
            $table = self::$_table;
            $sql = "SELECT * FROM {$table}";

            $conn = get_connection();
            $rentals = $conn->query ($sql) ->fetchAll(PDO::FETCH_OBJ);
            $conn = null;
            return $rentals;
        }
        public static function find ($id) {
            $table = self::$_table;
            $sql = "SELECT * FROM {$table} WHERE id = :id";
            $conn = get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id",$id, PDO::PARAM_INT);
            $stmt->execute();
            $rentals = $stmt->fetch(PDO::FETCH_OBJ);
            $conn = null;
            return $rentals;
        }

        public static function create ($package) {
        $table = self::$_table;
            $sql = "INSERT INTO {$table} (
                owner_name
                address
                contact_email
                contact_phone_number
                city_id
            ) VALUES (
                :owner_name
                :address
                :contact_email
                :contact_phone_number
                :city_id
            )";
            $conn = get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":owner_name",$package["owner_name"], PDO::PARAM_STR);
            $stmt->bindParam(":address",$package["address"], PDO::PARAM_STR);
            $stmt->bindParam(":contact_email",$package["contact_email"], PDO::PARAM_STR);
            $stmt->bindParam(":contact_phone_number",$package["contact_phone_number"], PDO::PARAM_INT);
            $stmt->bindParam(":city_id",$package["city_id"], PDO::PARAM_INT);
            $stmt->execute();
            $conn = null;
        }
        public static function update ($package) {
            $table = self::$_table;
            $sql = "UPDATE {$table} SET 
                owner_name = :owner_name
                address = :address
                contact_email= :contact_email
                contact_phone_number = :contact_phone_number
                city_id =:city_id
            WHERE id = id";

            $conn = get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id",$package["id"], PDO::PARAM_INT);
            $stmt->bindParam(":owner_name",$package["owner_name"], PDO::PARAM_STR);
            $stmt->bindParam(":address",$package["address"], PDO::PARAM_STR);
            $stmt->bindParam(":contact_email",$package["contact_email"], PDO::PARAM_STR);
            $stmt->bindParam(":contact_phone_number",$package["contact_phone_number"], PDO::PARAM_INT);
            $stmt->bindParam(":city_id",$package["city_id"], PDO::PARAM_INT);
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
