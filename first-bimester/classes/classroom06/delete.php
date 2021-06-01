<?php
    if(isset($_GET['id'])){
        include ("database.php");
        $customer = new DataBase();
        $id = intval($_GET['id']);
        $result = $customer->delete($id);

        if($result){
            header("Location:../index.php");
        }else{
            echo "Error al eliminar el registro";
        }
    }
?>