<?php


session_start();

if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'Admin') {

        if (
            isset($_POST['fname']) &&
            isset($_POST['lname']) &&
            isset($_POST['uname']) &&
            isset($_POST['pass']) &&
            isset($_POST['subjects']) &&
            isset($_POST['grades']))
            {
            include '../../DB_connection.php';
            include "../data/teacherAd.php";

            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $uname = $_POST['uname'];
            $pass = $_POST['pass'];

            $grades = "";
            foreach ($_POST['grades'] as $grade) {
                $grades .= $grade;
            }
            // $lopChuNhiem = '';

            $subjects = "";
            foreach ($_POST['subjects'] as $subject) {
                $subjects .= $subject;
            }
           $data = 'uname=' . $uname . '&fname=' . $fname . '&lname=' . $lname;
            if (empty($fname)) {
                $thongBao = " first Name is require";
                header("Location: ../siteTeacherAdd.php?error=$thongBao&$data");
                exit;
            } else if (empty($lname)) {
                $thongBao = " last Name is require";
                header("Location: ../siteTeacherAdd.php?error=$thongBao&$data");
                exit;
            } else if (!findNameDocNhat($uname, $conn)) {
                $thongBao = " Username Da Ton Tai Su Dung Username Khac";
                header("Location: ../siteTeacherAdd.php?error=$thongBao&$data");
                exit;
            } else if (empty($pass)) {
                $thongBao = " pass is require";
                header("Location: ../siteTeacherAdd.php?error=$thongBao&$data");
                exit;
            } else {
                //chuyen doi hashing pass 
               $pass = password_hash($pass, PASSWORD_DEFAULT);


                $sql = "INSERT INTO teachers(username,password,fname, lname,subjects,grade) VALUES(?,?,?,?,?,?)";

            
                $stmt = $conn->prepare($sql);
                $stmt->execute([$uname, $pass, $fname, $lname, $subjects, $grades]);





                $thongBao = " Tao Thanh Cong";
                header("Location: ../siteTeacherAdd.php?success=$thongBao");
               exit;
           }
        } else {
            $thongBao = " xay Ra loi 144442232324";
            header("Location: ../siteTeacherAdd.php?error=$thongBao");
            exit;
        }
    } else {
        header("Location: ../../logout.php");
        exit;
        
    }
}

else {

    header("Location: ../../loguot.php");
    exit;
   
}

?>