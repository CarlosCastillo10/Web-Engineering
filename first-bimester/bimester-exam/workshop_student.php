<?php
    include("persistence/database.php");
    include("persistence/workshop_student_db.php");
    include("persistence/student_db.php");
    if(isset($_GET)){
        $id_workshop = intval($_GET['id_workshop']);
        $name_workshop = $_GET['name_workshop'];
        $avatar_workshop = $_GET['avatar_workshop'];
        $places_offered = intval($_GET['places_offered']);
        
        $database = new DataBase();
        $connection = $database->get_connection();
        $workshop_student_db = new WorkshopStudentDB($connection);
        $student_db = new StudentDB($connection);

        $list_workshop_student = $workshop_student_db->read_workshop_student($id_workshop);
    }
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
        <title>Estudiantes Matriculados</title>
    </head>
    <header class="d-flex align-items-center">
        <section class="container d-flex align-items-center justify-content-between">
            <h1 class="logo"><a href="#">La Dolorosa</a></h1>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="#home">Inicio</a></li>
                    <li><a href="#mission">Misión</a></li>
                    <li><a href="#view">Visión</a></li>
                    <li><a href="#services">Servicios</a></li>
                    <li><a class="active" href="#workshops">Talleres</a></li>
                    <li><a href="#contac">Contacto</a></li>
                </ul>
            </nav>
            <a href="report.php" class="report-btn">Reporte</a>
        </section>
    </header>
    <body>
        <main>
            <div class="container mt-5">
                <div class="workshop-title mb-5">
                    <img
                        src="<?php echo $avatar_workshop; ?>"
                        alt="<?php echo $name_workshop; ?>"/>
                    <h1><?php echo $name_workshop; ?></h1>
                </div>
                <div class="table-wrapper">
                    <div class="title-table title-section">
                        <h2>Estudiantes matriculados</h2>
                        <a class="new-student-btn" href="index.php" data-bs-toggle="modal" data-bs-target="#resgisterModal">Nuevo estudiante<i class="bi bi-arrow-up-right-circle"></i></a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="workshop-table" class="table table-bordered table-hover">
                        <caption><?php echo "Número de estudiantes: ".$list_workshop_student->num_rows; ?></caption>
                        <thead class="thead-dark">
                            <tr>
                                <th>Cédula</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Correo</th>
                                <th>Teléfono</th>
                                <th>Fecha de creación</th>
                                <th>Fecha de actualización</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($row = mysqli_fetch_object($list_workshop_student)){
                                    $id_student = $row->idstudent;
                                    $student_result = $student_db->search_student_by_id($id_student);
                                    $student = mysqli_fetch_array($student_result, MYSQLI_ASSOC);
                            ?>
                            <tr>
                                <td><?php echo $student['idstudent'] ?></td>
                                <td><?php echo $student['name'] ?></td>
                                <td><?php echo $student['lastname'] ?></td>
                                <td><?php echo $student['email'] ?></td>
                                <td><?php echo $student['phone'] ?></td>
                                <td><?php echo $student['registration_date'] ?></td>
                                <td><?php echo $student['update_date'] ?></td>
                                <td class="actions">
                                    <a class="edit" title="Editar" data-bs-toggle="modal" data-bs-target="#editModal-<?php echo $student['idstudent'] ?>"><i class="bi bi-pencil-square"></i></a>
                                    <a class="delete" title="Eliminar" href="logic/delete_student.php?id_workshop=<?php echo $id_workshop; ?>&name_workshop=<?php echo $name_workshop; ?>&avatar_workshop=<?php echo $avatar_workshop; ?>&places_offered=<?php echo $places_offered; ?>&id_student=<?php echo $student['idstudent']; ?>"><i class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
                            <div class="modal fade" id="editModal-<?php echo $student['idstudent'] ?>" tabindex="-1" aria-labelledby="editModal-<?php echo $student['idstudent'] ?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header d-flex flex-column justify-content-center">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            <h2 class="modal-title" id="editModalLabel">Actualización de datos</h2>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="logic/update_student.php?id_workshop=<?php echo $id_workshop; ?>&name_workshop=<?php echo $name_workshop; ?>&avatar_workshop=<?php echo $avatar_workshop; ?>">
                                                <div class="form-group row mb-3">
                                                    <label for="id_student" class="col-sm-2 col-form-label">Cédula:</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" name="id_student" id="id_student" value="<?php echo $student['idstudent'] ?>" required readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="name" class="col-sm-2 col-form-label">Nombres:</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $student['name'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="lastname" class="col-sm-2 col-form-label">Apellidos:</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $student['lastname'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="email" class="col-sm-2 col-form-label">Email:</label>
                                                    <div class="col-sm-8">
                                                        <input type="email" class="form-control" name="email" id="email" value="<?php echo $student['email'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-5">
                                                    <label for="email" class="col-sm-2 col-form-label">Teléfono:</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $student['phone'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer d-flex justify-content-center mt-5">
                                                    <button type="submit" class="btn new-student-btn">Actualizar<i class="bi bi-arrow-clockwise"></i></button>
                                                    <button type="button" class="btn btn-danger cancel-btn" data-bs-dismiss="modal">Cancelar<i class="bi bi-x-circle-fill"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            ?>                        
                        </tbody>
                    </table>
                    <div class="modal fade" id="resgisterModal" tabindex="-1" aria-labelledby="resgisterModal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header d-flex flex-column justify-content-center">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <h2 class="modal-title" id="resgisterModalLabel">Registro de estudiantes</h2>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="logic/create_student.php?id_workshop=<?php echo $id_workshop; ?>&name_workshop=<?php echo $name_workshop; ?>&avatar_workshop=<?php echo $avatar_workshop; ?>&places_offered=<?php echo $places_offered; ?>">
                                        <div class="form-group row mb-3">
                                            <label for="id_student" class="col-sm-2 col-form-label">Cédula:</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="id_student" id="id_student" maxlength="10" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label for="name" class="col-sm-2 col-form-label">Nombres:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name" id="name" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label for="lastname" class="col-sm-2 col-form-label">Apellidos:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="lastname" id="lastname" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label for="email" class="col-sm-2 col-form-label">Email:</label>
                                            <div class="col-sm-8">
                                                <input type="email" class="form-control" name="email" id="email" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-5">
                                            <label for="email" class="col-sm-2 col-form-label">Teléfono:</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="phone" id="phone" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center mt-5">
                                            <button type="submit" class="btn new-student-btn">Guardar<i class="bi bi-journal-arrow-up"></i></button>
                                            <button type="button" class="btn btn-danger cancel-btn" data-bs-dismiss="modal">Cancelar<i class="bi bi-x-circle-fill"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer id="footer">
                <div class="container">
                    <h3>La Dolorosa</h3>
                    <p>Pretendemos que los estudiantes no sólo aprendan a pensar y a hacer, sino que aprendan también a ser, a convivir  y a compartir</p>
                    <div class="credits">
                        Diseñado por <a href="https://www.linkedin.com/in/carlos-castillo-10/">Carlos Castillo</a>
                    </div>
                </div>
            </footer>     
            <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-circle-fill"></i></a>
        </body>
        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</html>