<?php
    include("../persistence/database.php");
    include("../persistence/workshop_student_db.php");
    include("../persistence/workshop_db.php");
    include("../persistence/student_db.php");
    if(isset($_GET)){
        $database = new DataBase();
        $connection = $database->get_connection();
        $workshop_student_db = new WorkshopStudentDB($connection);
        $workshop_db = new WorkshopDB($connection);
        $student_db = new StudentDB($connection);
        
        $id_workshop = intval($_GET['id_workshop']);
        $name_workshop = $_GET['name_workshop'];
        $avatar_workshop = $_GET['avatar_workshop'];
        $places_offered = intval($_GET['places_offered']);

        $id_student = $_GET['id_student'];

        $result_workshop_student = $workshop_student_db->delete_workshop_student( $id_student);
        $result_student = $student_db->delete_student($id_student);
        $result_workshop = $workshop_db->update_places_offered($id_workshop, ($places_offered + 1));
        
        if($result_student && $result_workshop_student && $result_workshop){
            header("location:../workshop_student.php?id_workshop=$id_workshop&name_workshop=$name_workshop&avatar_workshop=$avatar_workshop&places_offered=$places_offered");
        }else{
            echo "Error al eliminar el registro";
        }
    }
?>