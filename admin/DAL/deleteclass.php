<?php




        $sql = "DELETE FROM class WHERE classname = ".$_GET["id"];
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        header("Location: ../classUI.php");
        exit;
?>