<?php
    include ("database.php"); // Llamar al archivo de persistencia
    $customer = new DataBase(); // Instaciar la clase

    // Llamar a la función de listar

    $list = $customer->read();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Listar clientes</title>
</head>
<body>
    <div class="container">
    <br><br>
        <h1 class="text-secondary text-center">Listado de Clientes</h1>
        <br><br>
        <div class="table-wrapper">
            <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Listado de <b>Clientes</b></h3>
                        </div>
                        <div class="col-sm-4"><a class="btn btn-info" href="insertar.php">Añadir cliente</a></div>
                    </div>
                </div>
            <br>
        </div>
        <div class="table-responsive">
            <table id="customer-table" class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row = mysqli_fetch_object($list)){
                            $id = $row->id;
                            $name = $row->nombres;
                            $lastname = $row->apellidos;
                            $phone = $row->telefono;
                            $address = $row->direccion;
                            $mail = $row->correo_electronico;  
                    ?>
                    <tr>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $lastname; ?></td>
                        <td><?php echo $phone; ?></td>
                        <td><?php echo $address; ?></td>
                        <td><?php echo $mail; ?></td>
                        <td>
                            <a class="btn btn-sm btn-warning" title="Editar" href="update.php?id=<?php echo $id; ?>&name=<?php echo $name; ?>&lastname=<?php echo $lastname; ?>&phone=<?php echo $phone; ?>&address=<?php echo $address; ?>&mail=<?php echo $mail; ?>"><i class="bi bi-pencil-fill"></i></a>
                            <a class="btn btn-sm btn-danger" title="Eliminar" href="delete.php?id=<?php echo $id; ?>"><i class="bi bi-x-circle-fill"></i></a>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                <tbody>
            </table>
        </div>
    </div>
</body>

</html>