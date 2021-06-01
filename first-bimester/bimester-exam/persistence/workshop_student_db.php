<?php  
    class WorkshopStudentDB{
        private $connection;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function create_workshop_student($id_workshop, $id_student){
            $sql = "INSERT INTO workshop_student (idworkshop, idstudent) VALUES ('$id_workshop', '$id_student')";
            $result = mysqli_query($this->connection, $sql);
            echo $sql;
            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function read_all(){
            $sql = "SELECT * FROM workshop_student";
            $result = mysqli_query($this->connection, $sql);
            return $result;
        }

        public function read_workshop_student($id_workshop){
            $sql = "SELECT * FROM workshop_student WHERE idworkshop = $id_workshop";
            $result = mysqli_query($this->connection, $sql);
            return $result;
        }

        public function update_workshop_student($id_workshop, $id_student){
            $sql = "UPDATE workshop_student SET idworkshop = '$id_workshop', idstudent = '$id_student' WHERE idworkshop = {$id_workshop} AND idstudent = {$id_student}";
            $result = mysqli_query($this->connection, $sql);
            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function delete_workshop_student($id_student){
            $sql = "DELETE FROM workshop_student WHERE idstudent = $id_student";
            $result = mysqli_query($this->connection, $sql);
            
            if($result){
                return true;
            }else{
                return false;
            }
        }
    }
?>