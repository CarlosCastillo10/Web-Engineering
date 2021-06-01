<?php
    include("persistence/database.php");
    include("persistence/workshop_db.php");
    include("persistence/instructor_db.php");
    $database = new DataBase();
    $connection = $database->get_connection();
    
    $workshop_db = new WorkshopDB($connection);
    $instructor_db = new InstructorDB($connection);
    $list_workshop = $workshop_db->read_workshop();
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
        <title>Exámen Bimestral</title>
        </head>
    <body>
        <section id="home-section" class="d-flex flex-column justify-content-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <h1>Unidad Educativa Fiscomisional</h1>
                        <h1><em>"La Dolorosa"</em></h1>
                        <h2>Por una educación de calidad, de la que nadie quede excluido.</h2>
                    </div>
                </div>
            </div>
        </section>
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
        <main>
            <section id="workshops" class="workshops">
                <div class="container">
                    <div class="title-section">
                        <h2>Talleres</h2>
                        <p>
                            Los talleres prácticos son importantes para que un alumno pueda desarrollar sus habilidades y actitudes
                            frente a un trabajo, mostrando todo lo que sabe y aprendiendo al mismo tiempo sobre su sector profesional.
                            Los talleres estarán guiados y supervisados por un tutor y por personal profesional especializado en la
                            materia a impartir, de esta forma, al final de las mismas el tutor podrá evaluar la implicación del alumno
                            en estos, así como lo aprendido y su valía como futuro profesional de ese sector concreto.
                        </p>
                    </div>
                    <div class="row">
                        <?php
                            while($row = mysqli_fetch_object($list_workshop)){
                                $id_workshop = $row->idworkshop;
                                $name_workshop = $row->name;
                                $avatar_workshop = $row->avatar_url;
                                $places_offered = $row->places_offered;
                                $start_date = $row->start_date;
                                $end_date = $row->end_date;
                                $start_time = $row->start_time;
                                $end_time = $row->end_time;
                                $duration = $row->duration;
                                $id_instructor = $row->idinstructor;
                                $instructor_result = $instructor_db->search_instructor_by_id($id_instructor);
                                $instructor = mysqli_fetch_array($instructor_result, MYSQLI_ASSOC);

                        ?>
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-5">
                            <div class="workshop-card">
                                <div class="workshop-title">
                                    <img
                                        src="<?php echo $avatar_workshop; ?>"
                                        alt="<?php echo $name_workshop; ?>" />
                                    <h1><?php echo $name_workshop; ?></h1>
                                </div>
                                <div class="workshop-detail">
                                    <div class="instructor-details mb-4">
                                        <img class="avatar-instructor" src="<?php echo $instructor['avatar_url']?>" />
                                        <div class="instructor-name">
                                            <h5><?php echo $instructor['name']." ".$instructor['lastname']; ?></h5>
                                            <h6><em>Instructor</em></h6>
                                        </div>
                                    </div>
                                    <div class="details">
                                        <div class="item">
                                            <div class="icon"><i class="bi bi-calendar"></i></div>
                                            <p><?php echo $start_date." to ".$end_date; ?></p>
                                        </div>
                                        <div class="item">
                                            <div class="icon"><i class="bi bi-clock"></i></div>
                                            <p><?php echo $start_time." - ".$end_time; ?></p>
                                        </div>
                                        <div class="item">
                                            <div class="icon"><i class="bi bi-hourglass-split"></i></div>
                                            <p><?php echo $duration; ?></p>
                                        </div>
                                        <div class="item">
                                            <div class="icon"><i class="bi bi-people"></i></div>
                                            <p><?php echo $places_offered; ?> cupos disponibles</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="register"><a class="register-btn" href="workshop_student.php?id_workshop=<?php echo $id_workshop; ?>&name_workshop=<?php echo $name_workshop; ?>&avatar_workshop=<?php echo $avatar_workshop; ?>&places_offered=<?php echo $places_offered; ?>">Inscribirse</a></div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </section>
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