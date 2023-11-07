<?php

session_start();



        $sql = "UPDATE teachers SET status = 0 WHERE id = $id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    
?>