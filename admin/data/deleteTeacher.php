<?php
session_start();

if (!isset($_SESSION['teachers'])) {
    die('You must be log-in to view this page');
}

include 'db.php';

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


