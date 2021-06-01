<?php
    include("../persistence/database.php");
    include("../persistence/workshop_student_db.php");
    include("../persistence/student_db.php");
    date_default_timezone_set("America/Guayaquil");
    
    if(isset($_POST)){
        $database = new DataBase();
        $connection = $database->get_connection();
        $workshop_student_db = new WorkshopStudentDB($connection);
        $student_db = new StudentDB($connection);
        
        $id_workshop = intval($_GET['id_workshop']);
        $name_workshop = $_GET['name_workshop'];
        $avatar_workshop = $_GET['avatar_workshop'];

        $id_student = $student_db->sanatize($_POST['id_student']);
        $name = $student_db->sanatize($_POST['name']);
        $lastname = $student_db->sanatize($_POST['lastname']);
        $email = $student_db->sanatize($_POST['email']);
        $phone = $student_db->sanatize($_POST['phone']);

        $result_workshop_student = $workshop_student_db->update_workshop_student($id_workshop, $id_student);
        
        $update_date = date('Y-m-d H:i:s');
        $result_student = $student_db->update_student($id_student, $name, $lastname, $email, $phone, $update_date);
        
        if($result_student && $result_workshop_student){
            header("location:../workshop_student.php?id_workshop=$id_workshop&name_workshop=$name_workshop&avatar_workshop=$avatar_workshop");
        }else{
            echo "Error al eliminar el registro";
        }
    }
?>