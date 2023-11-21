<?php


include("../../DB_connection.php");
        $id = $_GET["id"];
        $sql = "UPDATE teachers SET status = 0 WHERE id = $id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
?>