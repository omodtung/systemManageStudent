<?php


session_start();


if(isset($_SESSION['admin_id']) && isset($_SESSION['role']))
{
    if ($_SESSION['role']=='Admin')
    {
        include "../../DB_connection.php";
        
        include "../data/grade.php";
        $id = $_GET['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $uname = $_POST['uname'];
        $brthday = $_POST['birthdate'];
        $gender = $_POST['genderbtn'];
        $hanhkiem = $_POST['hanhkiem'];
        $hocluc = $_POST['hocluc'];
        
        
        $grades = "";
        $brthday = date("Y-m-d", strtotime($brthday));


        if(!isset($_POST['fname']) || empty($fname)){
            header("Location: ../student-edit.php?idteach=$id&error=Name is Empty!");
        }
        else if(!isset($_POST['lname']) || empty($lname)){
            header("Location: ../student-edit.php?idteach=$id&error=Name is Empty!");
        }
        else if(!isset($_POST['uname']) || empty($uname)){
            header("Location: ../student-edit.php?idteach=$id&error=Username is Empty!");
        }
        else if(!isset($_POST['hanhkiem']) || empty($_POST['hanhkiem'])){
            header("Location: ../student-edit.php?idteach=$id&error=Hanh Kiem is Empty!");
        }
        else if(!isset($_POST['hocluc']) || empty($_POST['hocluc'])){
            header("Location: ../student-edit.php?idteach=$id&error=Hoc Luc is Empty!");
        }

        else{
        
        $grades = implode(",", $_POST['grades']);
        $sql = "UPDATE students SET fname='$fname',lname='$lname',username='$uname',grade='$grades',NgaySinh='$brthday',Gender='$gender' WHERE id = $id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        //header("Location: ../student-edit.php?idteach=$id&success=student Updated");
        //$_SESSION['sucsess'] = $id;
        header("Location: ../studentUI.php?sucsess=$id");
        }
    }
}

?>