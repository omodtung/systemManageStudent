<?php


session_start();

if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {
        if ($_SESSION['role'] == 'Admin') {

if (isset($_POST['fname']) &&
isset($_POST['lname']) &&
isset($_POST['username']) &&
isset($_POST['pass']) &&
isset($_POST['subjects']) &&
isset($_POST['grades'])) {
    include '../../DB_connection.php';
    include "../data/teacher.php";

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['username'];
    $pass = $_POST['pass'];

    $grades = "";
    foreach ($_POST['grades'] as $grade) {
    	$grades .=$grade;
    }

    $subjects = "";
    foreach ($_POST['subjects'] as $subject) {
    	$subjects .=$subject;
    }
    $data = 'uname='.$uname.'&fname='.$fname.'&lname='.$lname;
    

?>