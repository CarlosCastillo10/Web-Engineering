<?php
    class DataBase{
        private $connection;
        private $dbhost = "localhost";
        private $dbuser = "root";
        private $dbpass = "";
        private $dbname = "workshopsdb"; 

        function __construct(){
            $this->connect_db();
        }
    
        public function connect_db(){
            $this->connection = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
            if(mysqli_connect_error())
            die("Conexión Falló".mysqli_connect_error().mysqli_connect_errno());
        }
    
        public function get_connection(){
            return $this->connection;
        }
    }
?>