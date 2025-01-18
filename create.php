<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
    if (!$stmt) {
        die("Error en la consulta preparada: " . $conn->error);
    }

    $stmt->bind_param("ss", $name, $email);

    if ($stmt->execute()) {
        header('Location: index.php');
        exit;
    } else {
        echo "Error al insertar el usuario: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
</head>
<body>
    <h1>Crear Usuario</h1>
    <form method="POST">
        <input type="text" name="name" placeholder="Nombre" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
