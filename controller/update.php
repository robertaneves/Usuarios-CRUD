<?php
require_once "../model/config.php";
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
    $stmt-> bind_param("i", $id);
    $stmt-> execute();

    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();

    $stmt->close();
    $conn->close();
?>