<?php
    error_reporting(E_ALL);
    require_once("config.php");

    class Db{
        private $dbhost = DBHOST;
        private $dbname = DBNAME;
        private $dbuser = DBUSERNAME;
        private $dbpassword = DBPASSWORD;

        protected $conn;

       

       protected function connect(){
            try{

                $dsn = "mysql:host=$this->dbhost;dbname=$this->dbname";
                $option=[PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION];
                $this->conn = new PDO($dsn, $this->dbuser, $this->dbpassword, $option);
                return $this->conn;

            }catch(PDOException $e){
                echo $e->getMessage();
                 return false;
            }
        }
    }

   


?>