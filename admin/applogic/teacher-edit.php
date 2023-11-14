<?php


session_start();


if(isset($_SESSION['admin_id']) && isset($_SESSION['role']))
{
    if ($_SESSION['role']=='Admin')
    {
        include "../../DB_connection.php";
        include "../data/subject.php";
        include "../data/grade.php";
        $id = $_GET['id'];
        $hoten = $_POST['hoten'];
        //$lname = $_POST['lname'];
        $uname = $_POST['uname'];
        $brthday = $_POST['birthdate'];
        $gender = $_POST['genderbtn'];
        $subjects = "";
        
        $grades = "";
        $brthday = date("Y-m-d", strtotime($brthday));


        if(!isset($_POST['hoten']) || empty($hoten)){
            header("Location: ../teacherUI.php?idteach=$id&error=Name is Empty!");
        }
        // else if(!isset($_POST['lname']) || empty($lname)){
        //     header("Location: ../teacher-edit.php?idteach=$id&error=Name is Empty!");
        // }
        else if(!isset($_POST['uname']) || empty($uname)){
            header("Location: ../teacherUI.php?idteach=$id&error=Username is Empty!");
        }
        else if(!isset($_POST['subjects']) || empty($_POST['subjects'])){
            header("Location: ../teacherUI.php?idteach=$id&error=Subject(s) is Empty!");
        }
        else if(!isset($_POST['grades']) || empty($_POST['grades'])){
            header("Location: ../teacherUI.php?idteach=$id&error=Grade(s) is Empty!");
        }

        else{
        $subjects = implode(",", $_POST['subjects']);
        $grades = implode(",", $_POST['grades']);
        // include("../req/teacher-edit.php");
        // header("Location: ../teacherNewUI.php?sucsess=$id");
        header('HTTP/1.1 307 Temporary Redirect');
        header("Location: ../req/teacher-edit.php?id=$id");
        }
    }
}

?>