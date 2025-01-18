<?php
include 'db.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID no proporcionado");
}

$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header('Location: index.php');
    exit; // Detener la ejecución después de header()
} else {
    echo "Error al eliminar el usuario: " . $stmt->error;
}

$stmt->close();
?>
