<?php




class Connection
{
    private static $_dbname = "webproject";
    private static $_user = "root";
    private static $_pwd = "";
    private static $_host = "localhost";
    private static $_bdd = null;
    private function __construct()
    {
        try {

            $pdo=new PDO("mysql:host=" . self::$_host . ";charset=utf8", self::$_user, self::$_pwd,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $req = $pdo->prepare("SELECT COUNT(*) FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?");
            $req->execute(array(self::$_dbname));
            $rep=$req->fetch();
            if ($rep[0]=="0"){
                $dbname = "`".str_replace("`","``",self::$_dbname)."`";
                $pdo->query("CREATE DATABASE $dbname");
                $pdo->query("use $dbname");
                $pdo->query("
                -- phpMyAdmin SQL Dump
                -- version 4.7.9
                -- https://www.phpmyadmin.net/
                --
                -- Hôte : 127.0.0.1
                -- Généré le :  ven. 04 mai 2018 à 19:06
                -- Version du serveur :  10.1.31-MariaDB
                -- Version de PHP :  7.0.28

                SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
                SET AUTOCOMMIT = 0;
                START TRANSACTION;
                SET time_zone = '+00:00';


                /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
                /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
                /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
                /*!40101 SET NAMES utf8mb4 */;

                --
                -- Base de données :  `webproject`
                --


                -- --------------------------------------------------------

                --
                -- Structure de la table `acceptmachines`
                --

                CREATE TABLE `acceptmachines` (
                  `id` varchar(6) NOT NULL,
                  `val` int(11) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

                --
                -- Déchargement des données de la table `acceptmachines`
                --

                INSERT INTO `acceptmachines` (`id`, `val`) VALUES
                ('id', 1);

                -- --------------------------------------------------------

                --
                -- Structure de la table `admin`
                --

                CREATE TABLE `admin` (
                  `username` varchar(50) NOT NULL,
                  `pass` varchar(50) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

                --
                -- Déchargement des données de la table `admin`
                --

                INSERT INTO `admin` (`username`, `pass`) VALUES
                ('root', '0000');

                -- --------------------------------------------------------

                --
                -- Structure de la table `agent`
                --

                CREATE TABLE `agent` (
                  `cin` int(11) NOT NULL,
                  `f_name` varchar(50) NOT NULL,
                  `l_name` varchar(50) NOT NULL,
                  `pass` varchar(50) NOT NULL,
                  `line` varchar(50) NOT NULL,
                  `station` varchar(50) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

                -- --------------------------------------------------------

                --
                -- Structure de la table `computer`
                --

                CREATE TABLE `computer` (
                  `id` varchar(50) NOT NULL,
                  `line` varchar(50) NOT NULL,
                  `station` varchar(50) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

                -- --------------------------------------------------------

                --
                -- Structure de la table `machinerequest`
                --

                CREATE TABLE `machinerequest` (
                  `machineID` varchar(50) NOT NULL,
                  `cin` varchar(11) NOT NULL,
                  `time` bigint(25) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

                -- --------------------------------------------------------

                --
                -- Structure de la table `stations`
                --

                CREATE TABLE `stations` (
                  `name` varchar(50) NOT NULL,
                  `linename` varchar(50) NOT NULL,
                  `dist` int(11) NOT NULL,
                  `pricecat1` int(11) NOT NULL,
                  `pricecat2` int(11) NOT NULL,
                  `pricecat3` int(11) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

                -- --------------------------------------------------------

                --
                -- Structure de la table `ticket`
                --

                CREATE TABLE `ticket` (
                  `num` int(11) NOT NULL,
                  `categorie` varchar(255) NOT NULL,
                  `payee` tinyint(1) NOT NULL,
                  `nomStationDepart` varchar(255) NOT NULL,
                  `dateEntree` datetime DEFAULT NULL,
                  `nomLigne` varchar(11) NOT NULL,
                  `dateSortie` datetime DEFAULT NULL,
                  `nomStationArrivee` varchar(255) DEFAULT NULL
                ) ENGINE=MyISAM DEFAULT CHARSET=latin1;

                --
                -- Index pour les tables déchargées
                --

                --
                -- Index pour la table `acceptmachines`
                --
                ALTER TABLE `acceptmachines`
                  ADD PRIMARY KEY (`id`);

                --
                -- Index pour la table `admin`
                --
                ALTER TABLE `admin`
                  ADD PRIMARY KEY (`username`);

                --
                -- Index pour la table `agent`
                --
                ALTER TABLE `agent`
                  ADD PRIMARY KEY (`cin`);

                --
                -- Index pour la table `computer`
                --
                ALTER TABLE `computer`
                  ADD PRIMARY KEY (`id`);

                --
                -- Index pour la table `machinerequest`
                --
                ALTER TABLE `machinerequest`
                  ADD PRIMARY KEY (`time`);

                --
                -- Index pour la table `stations`
                --
                ALTER TABLE `stations`
                  ADD PRIMARY KEY (`name`,`linename`);

                --
                -- Index pour la table `ticket`
                --
                ALTER TABLE `ticket`
                  ADD PRIMARY KEY (`num`);

                --
                -- AUTO_INCREMENT pour les tables déchargées
                --

                --
                -- AUTO_INCREMENT pour la table `ticket`
                --
                ALTER TABLE `ticket`
                  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
                COMMIT;

                /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
                /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
                /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
                ");
            }


            self::$_bdd = new PDO("mysql:host=" . self::$_host . ";dbname=" . self::$_dbname . ";charset=utf8", self::$_user, self::$_pwd , array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));

            self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    public static function getInstance()
    {
        if (!self::$_bdd){
            new Connection();
            return (self::$_bdd);
        }return (self::$_bdd);
    }
}



?>
