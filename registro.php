<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Index</title>
</head>
<body>
    <!-- CREAR BASE DE DATOS -->
    <?php
        require "conexion.php";
        $data = new database();
        $data = $data->db();

        try {
            $nombre = $_POST["nombre"];
            $apellidos = $_POST["apellidos"];
            $email = $_POST["email"];
            $telefono = $_POST["telefono"];
            $fecha_nacimiento = $_POST["fecha_nacimiento"];
            $direccion = $_POST["direccion"];
            $sexo = $_POST["sexo"];
            $sql = "insert into users_data(nombre, apellidos, email, telefono, fecha_nacimiento, direccion, sexo)values('$nombre','$apellidos','$email','$telefono','$fecha_nacimiento','$direccion','$sexo');";
            $data->exec($sql);
        } catch (\Throwable $th) {
            print json_encode($th->getMessage());
        }
    ?>
    <form action="" method="post">
        <div class="container">
            <div class="col-12">
                <div class="m-2">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre">
                </div>
                <div class="m-2">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" name="apellidos" id="apellidos">
                </div>
                <div class="m-2">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email">
                </div>
                <div class="m-2">
                    <label for="telefono">Telefono:</label>
                    <input type="tel" name="telefono" id="telefono">
                </div>
                <div class="m-2">
                    <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento">
                </div>
                <div class="m-2">
                    <label for="direccion">Dirección: </label>
                    <input type="text" name="direccion" id="direccion">
                </div>
                <div class="m-2 col">
                    Masculino: <input type="radio" name="sexo" id="sexo" value="M">
                    Femenino: <input type="radio" name="sexo" id="sexo" value="F">
                </div>
                <div class="m-2">
                    <button class="btn btn-success">Agregar</button>
                </div>
            </div>
        </div>
    </form>
    <div class="m-4">
        <a href="/login.php"><button class="btn btn-primary">Loggin</button></a>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>