<?php
    class DataBase {
        private $con;
        private $dbhost = "localhost";
        private $dbuser = "root";
        private $dbpass = "";
        private $dbname = "clientes";

        function __construct(){
            $this->connect_db();
        }

        public function connect_db(){
            $this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
            if(mysqli_connect_error())
            die("Conexión Falló".mysqli_connect_error().mysqli_connect_errno());
        }

        /* Limpieza de datos */

        public function sanatize($var){
            $clean =  mysqli_real_escape_string($this->con, $var);
            return $clean;
        }

        /* INSERTAR DATOS A LA DB */
        public function create($name, $lastname, $phone, $address, $email){
            $sql = "INSERT INTO clientes (nombres, apellidos, telefono, direccion, correo_electronico) VALUES ('$name', '$lastname', '$phone', '$address', '$email')";
            $result = mysqli_query($this->con, $sql);
            
            if($result){
                return true;
            }else{
                return false;
            }
        }
        /* LEER DATOS A LA DB */
        public function read(){
            $sql = "SELECT * FROM clientes";
            $result = mysqli_query($this->con, $sql);
            return $result;
        }

        /* BORRAR DATOS A LA DB */
        public function delete($id){
            $sql = "DELETE FROM clientes WHERE id = $id";
            $result = mysqli_query($this->con, $sql);
            
            if($result){
                return true;
            }else{
                return false;
            }
        }

        /* ACTUALIZAR DATOS A LA DB */
        public function update($id, $name, $lastname, $phone, $address, $email){
            $sql = "UPDATE clientes SET nombres = '$name', apellidos = '$lastname', telefono = '$phone', direccion = '$address', correo_electronico = '$email' WHERE id = {$id}";
            $result = mysqli_query($this->con, $sql);
            if($result){
                return true;
            }else{
                return false;
            }
        }
    }
?>