<?php    
    class InstructorDB{
        private $connection;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function search_instructor_by_id($id_instructor){
            $sql = "SELECT * FROM instructor WHERE idinstructor = $id_instructor";
            $result = mysqli_query($this->connection, $sql);
            return $result;
        }
    }
?>