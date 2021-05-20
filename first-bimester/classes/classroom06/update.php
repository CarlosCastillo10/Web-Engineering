<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Actualizar Clientes</title>
</head>
<body>
	<div class="container">
    	<br><br>
        <h1 class="text-secondary text-center">Registro de Clientes</h1>
        <br><br>
        <div class="table-wrapper">
            <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Actualizar <b>Cliente</b></h3></div>
                            <div class="col-sm-4"><a class="btn btn-info" href="index.php">Regresar</a></div>
                    </div>
                </div>
            <br>

            <?php
                include("database.php");
                $customers = new DataBase();
                if(isset($_GET)){
                    $id = intval($_GET['id']);
                    $name = $_GET['name'];
                    $lastname = $_GET['lastname'];
                    $phone = $_GET['phone'];
                    $address = $_GET['address'];
                    $email = $_GET['mail'];
                }
                if(isset($_POST) && !empty($_POST)){
                    $name = $customers->sanatize($_POST['name']);
                    $lastname = $customers->sanatize($_POST['lastname']);
                    $address = $customers->sanatize($_POST['address']);
                    $phone = $customers->sanatize($_POST['phone']);
                    $email = $customers->sanatize($_POST['email']);

                    $result = $customers->update($id, $name, $lastname, $phone, $address, $email);
                    if($result){
                        header("Location:index.php");
                    }else{
                        echo "Error al actualizar el registro";
                    }
                }  
            ?>

			<div class="row">
				<form method="post">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label class="font-weight-bold">Nombres:</label>
							<input type="text" name="name" id="name" class='form-control' value= "<?php echo $name; ?>" maxlength="100" required>
						</div>
						<div class="form-group col-md-6">
							<label class="font-weight-bold">Apellidos:</label>
							<input type="text" name="lastname" id="lastname" class='form-control' value= "<?php echo $lastname; ?>" maxlength="100" required>
						</div>
						<div class="form-group col-md-12">
							<label class="font-weight-bold">Dirección:</label>
							<textarea name="address" id="address" class='form-control' maxlength="255" required><?php echo $address; ?></textarea>
						</div>
						<div class="form-group col-md-6">
							<label class="font-weight-bold">Teléfono:</label>
							<input type="text" name="phone" id="phone" class='form-control' value= "<?php echo $phone; ?>" maxlength="15" required >
						</div>
						<div class="form-group col-md-6">
							<label class="font-weight-bold">Correo electrónico:</label>
							<input type="email" name="email" id="email" class='form-control' value= "<?php echo $email; ?>"maxlength="64" required>
						</div>
					
						<div class="form-group col-md-12">
							<hr>
							<button type="submit" class="btn btn-secondary">Actualizar</button>
						</div>
					</div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>