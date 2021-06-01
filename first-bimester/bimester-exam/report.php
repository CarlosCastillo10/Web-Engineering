<?php
    include("persistence/database.php");
    include("persistence/workshop_student_db.php");
    include("persistence/workshop_db.php");
    include("persistence/instructor_db.php");
    include("persistence/student_db.php");
    $database = new DataBase();
    $connection = $database->get_connection();
    
    $workshop_student_db = new WorkshopStudentDB($connection);
    $workshop_db = new WorkshopDB($connection);
    $instructor_db = new InstructorDB($connection);
    $student_db = new StudentDB($connection);
    $list_workshop_student = $workshop_student_db->read_all();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/workshop_student.css">
        <link rel="stylesheet" href="css/report.css">
        <title>Reporte de estudiantes</title>
    </head>
<body>
    <header class="d-flex align-items-center">
        <section class="container d-flex align-items-center justify-content-between">
            <h1 class="logo"><a href="index.php">La Dolorosa</a></h1>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="#mission">Misión</a></li>
                    <li><a href="#view">Visión</a></li>
                    <li><a href="#services">Servicios</a></li>
                    <li><a class="active" href="#workshops">Talleres</a></li>
                    <li><a href="#contac">Contacto</a></li>
                </ul>
            </nav>
        </section>
    </header>
    <main>
        <div class="container mt-5">
            <div class="table-wrapper">
                <div class="title-table title-section">
                    <h2>Reporte de estudiantes</h2>
                    <a class="new-student-btn" href="index.php">Regresar<i class="bi bi-arrow-up-left-circle"></i></a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table id="workshop-table" class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Cédula</th>
                        <th>Estudiante</th>
                        <th>Taller</th>
                        <th>Instructor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row = mysqli_fetch_object($list_workshop_student)){
                            $id_student = $row->idstudent;
                            $id_workshop = $row->idworkshop;
                            $student_result = $student_db->search_student_by_id($id_student);
                            $workshop_result = $workshop_db->search_workshop_by_id($id_workshop);
                            $workshop = mysqli_fetch_array($workshop_result, MYSQLI_ASSOC);

                            $instructor_result = $instructor_db->search_instructor_by_id($workshop['idinstructor']);
                            $student = mysqli_fetch_array($student_result, MYSQLI_ASSOC);
                            $instructor = mysqli_fetch_array($instructor_result, MYSQLI_ASSOC);
                    ?>
                    <tr>
                        <td><?php echo $student['idstudent'] ?></td>
                        <td><?php echo $student['name']." ".$student['lastname'] ?></td>
                        <td><?php echo $workshop['name'] ?></td>
                        <td><?php echo $instructor['name']." ".$instructor['lastname'] ?></td>
                    </tr>
                    <?php
                        }
                    ?>  
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>