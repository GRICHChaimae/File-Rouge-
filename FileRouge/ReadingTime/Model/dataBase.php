<?php
    class DB {
        static public function connect(){
            $host     = "localhost";   
            $user     = "root";	
            $pass     = "";
            $dbname   = "readingtime";

            try {
                $connection = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $connection;

            }catch(PDOException $e) {
                echo $e->getMessage();                         
            }
        }
    }
?>