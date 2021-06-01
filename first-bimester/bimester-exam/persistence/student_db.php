<?php  
    class StudentDB{
        private $connection;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function sanatize($var){
            $clean =  mysqli_real_escape_string($this->connection, $var);
            return $clean;
        }

        public function create_student($id_student, $name, $lastname, $email, $phone, $registration_date, $update_date){
            $sql = "INSERT INTO student (idstudent, name, lastname, email, phone, registration_date, update_date) VALUES ('$id_student', '$name', '$lastname', '$email', '$phone', '$registration_date', '$update_date')";
            $result = mysqli_query($this->connection, $sql);
            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function search_student_by_id($id_student){
            $sql = "SELECT * FROM student WHERE idstudent = $id_student";
            $result = mysqli_query($this->connection, $sql);
            return $result;
        }

        public function update_student($id_student, $name, $lastname, $email, $phone, $update_date){
            $sql = "UPDATE student SET idstudent = '$id_student', name = '$name', lastname = '$lastname', email = '$email', phone = '$phone', update_date = '$update_date' WHERE idstudent = {$id_student}";
            $result = mysqli_query($this->connection, $sql);
            if($result){
                return true;
            }else{
                return false;
            }
        }
        
        public function delete_student($id_student){
            $sql = "DELETE FROM student WHERE idstudent = $id_student";
            $result = mysqli_query($this->connection, $sql);
            
            if($result){
                return true;
            }else{
                return false;
            }
        }
    }
?>