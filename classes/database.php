<?php

class Database{
    static function connection(){
      try {
         $db = new PDO("mysql:host=localhost;dbname=culturedev","root","");
        $db ->exec("set names utf8");
        $db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        return $db ;
        
      } catch (PDOException $e) {
        echo "rrrr".$e;
      }
      
    }
}

?>