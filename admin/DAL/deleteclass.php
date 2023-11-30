<?php



        $id = $_GET['id'];
        $sql = "DELETE FROM class WHERE classname = '$id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        header("Location: ../classUI.php");
        exit;
?>