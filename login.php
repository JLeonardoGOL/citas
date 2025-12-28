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
            $usuario = $_POST["usuario"];
            $password = $_POST["contrasena"];
            $sql = $data->prepare("select * from users_login where usuario = '$usuario' and password_hash = '$password';");
            $sql->execute();
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($data)) {
                session_start();
                foreach ($data as $key => $value) {
                    $_SESSION["rol"] = $value["rol"];
                    if ($_SESSION["rol"] === "administrador") {
                        $_SESSION["rol"] = "administrador";
                        header("location: admin.php");
                    } else {
                        $_SESSION["rol"] = "usuario";
                        header("location: usuario.php");
                    }
                }
            }
        } catch (\Throwable $th) {
            // exit();
        }
    ?>
    <form action="" method="post">
        <div class="container">
            <div class="col-12">
                <div class="m-2">
                    <label for="usuario">Usuario:</label>
                    <input type="email" name="usuario" id="usuario">
                </div>
                <div class="m-2">
                    <label for="contrasena">Contraseña:</label>
                    <input type="password" name="contrasena" id="contrasena">
                </div>
                <div class="m-2">
                    <button class="btn btn-success">Agregar</button>
                </div>
            </div>
        </div>
    </form>
    <div class="m-4">
        <a href="/registro.php"><button class="btn btn-primary">Registro</button></a>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>