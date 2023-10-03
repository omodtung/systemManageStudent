<?php
    include("../../DB_connection.php");
    $id = $_GET['idteach'];
    $pass = password_hash("123456789",PASSWORD_BCRYPT);
    $sql = "UPDATE teachers SET password='$pass' WHERE id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    echo("123456789");
?>