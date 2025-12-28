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
        $data = $data->create_database();
    ?>
    <div class="container mt-2">
        <a href="/registro.php"><button class="btn btn-success">Registro</button></a>
        <a href="/noticias.php"><button class="btn btn-success">Noticias</button></a>
        <a href="/citas.php"><button class="btn btn-success">Citas</button></a>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>