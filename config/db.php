<?php
    class Database{
        public static function connect(){
            $db = new mysqli('localhost','root','','ecosat');
            $db->query("SET NAMES 'utf8'");
            return $db;
        }
    }
?>