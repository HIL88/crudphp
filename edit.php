<?php
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM users WHERE id = $id");
$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    $sql = "UPDATE users SET nombre='$nombre', edad='$edad', telefono='$telefono', direccion='$direccion' WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        
        <h1 class="text-center mb-4">Editar Cliente</h1>

        <form method="POST" action="">
            <div class="form-group col-3">
                <label for="nombre">Nombre:</label><br>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $user['nombre'] ?>" required>
            </div>
            <div class="form-group col-3">
                <label for="edad">Edad:</label><br>
                <input type="number" class="form-control" id="edad" name="edad" value="<?= $user['edad']?>" required>
            </div>
            <div class="form-group col-3">
                <label for="telefono">Teléfono:</label><br>
                <input type="text" class="form-control" id="telefono" name="telefono" value="<?= $user['telefono']?>" required>
            </div>
            <div class="form-group col-3">
                <label for="direccion">Dirección:</label><br>
                <textarea class="form-control" id="direccion" name="direccion" required><?= $user['direccion']?></textarea><br>
            </div>
            <div class="row align-items-center col-3">
                <div class="col-8">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div><br>
                <div class="col-2">
                        <a href="index.php" class="btn btn-secondary">Cancelar</a>
                </div> 
            </div> 
            
        </form>
    </div>
</body>
</html>
