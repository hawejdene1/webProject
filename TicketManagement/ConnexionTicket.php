<?php

/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 15/04/2018
 * Time: 17:45
 */



class ConnexionTicket


{
    private static $_dbname = "projetweb";
    private static $_user = "root";
    private static $_pwd = "";
    private static $_host = "localhost";
    private static $_bdd = null;


    private function __construct()
    {
        try {
            self::$_bdd = new PDO("mysql:host=" . self::$_host . ";dbname="
                . self::$_dbname, self::$_user, self::$_pwd);
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }


    public   static function getInstance()
    {
        if (!self::$_bdd) {
            new ConnexionTicket();
            return (self::$_bdd);
        }
        return (self::$_bdd);
    }

}
?>
