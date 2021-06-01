<?php  
    class WorkshopDB{
        private $connection;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function read_workshop(){
            $sql = "SELECT * FROM workshop";
            $result = mysqli_query($this->connection, $sql);
            return $result;
        }

        public function search_workshop_by_id($id_workshop){
            $sql = "SELECT * FROM workshop WHERE idworkshop = $id_workshop";
            $result = mysqli_query($this->connection, $sql);
            return $result;
        }

        public function update_places_offered($id_workshop, $places_offered){
            $sql = "UPDATE workshop SET places_offered = '$places_offered' WHERE idworkshop = {$id_workshop}";
            $result = mysqli_query($this->connection, $sql);
            if($result){
                return true;
            }else{
                return false;
            }
        }
    }
?>