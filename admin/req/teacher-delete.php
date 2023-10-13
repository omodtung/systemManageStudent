<?php
session_start();

include "../../DB_connection.php";

function deleteTeacher($teacherId, $conn){
    $sql = "UPDATE teachers SET active='0' WHERE id =:teacherId;";
    // UPDATE test.teachers SET active='0' WHERE id =:teacherId;

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':teacherId', $teacherId, PDO::PARAM_INT);
    try {
        $stmt->execute();
        return true; // Teacher deleted successfully
    } catch (PDOException $e) {
        return false; // Failed to delete teacher
    }
}

if ($_SESSION['role'] !== 'Admin') {
    die('Permission denied');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['teachers'])) {
    $teacherId = $_POST['teachers'];


    if (deleteTeacher($teacherId, $conn)) {
        echo 'Teacher deleted successfully';
    } else {
        echo 'Failed to delete teacher';
    }
}
?>


