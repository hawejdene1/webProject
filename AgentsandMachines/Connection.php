<?php

class Connection{
    private static $db = null;

    private function __construct(){
        try{
            self::$db = new PDO("mysql:host=localhost;dbname=highway","root","");
        }catch (PDOException $e){
            die('Erreur de connexion : '.$e->getMessage());
        }
    }

    public static function getInstance(){
        if (!self::$db){
          new Connection();

          $req=self::$db->query('CREATE TABLE agent ( `cin` INT(8) NOT NULL , `l_name` VARCHAR(20) NOT NULL , `f_name` VARCHAR(20) NOT NULL , `id_station` INT(8) NOT NULL )');
          $req=self::$db->query('CREATE TABLE computer ( `id` INT(8) NOT NULL AUTO_INCREMENT , `id_station` INT(8) NOT NULL , PRIMARY KEY (`id`))');
        }

        return (self::$db);
    }
}
