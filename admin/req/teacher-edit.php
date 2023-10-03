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
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $uname = $_POST['uname'];
        $subjects = "";
        $grades = "";
        foreach ($_POST['subjects'] as $Subject) {
            $subjects .= $Subject;
        }


        if(!isset($_POST['fname']) || empty($fname)){
            header("Location: ../teacher-edit.php?idteach=$id&error=Name is Empty!");
        }
        else if(!isset($_POST['lname']) || empty($lname)){
            header("Location: ../teacher-edit.php?idteach=$id&error=Name is Empty!");
        }
        else if(!isset($_POST['uname']) || empty($uname)){
            header("Location: ../teacher-edit.php?idteach=$id&error=Username is Empty!");
        }

        else{
        $sql = "UPDATE teachers SET fname='$fname',lname='$lname',username='$uname', WHERE id = $id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        header("Location: ../teacher-edit.php?idteach=$id&success=Teacher Updated");
        }
    }
}

?>