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
            // isset($_POST['birthDate']) &&
            isset($_POST['grades']))
            {
            include '../../DB_connection.php';
            include "../data/teacherAd.php";

            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $uname = $_POST['uname'];
            $birthdate = $_POST['birthdate'];
            $pass = $_POST['pass'];
            $gender = $_POST['gender'];
            
            $target_dir = "uploads/"; 
            $file_name = uniqid("teacher_").'.'.pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
            $target_file = $target_dir . $file_name;

            move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file);
        
            $grades = "";
            foreach ($_POST['grades'] as $grade) {
                $grades .= $grade;
            }
            // $lopChuNhiem = '';

            $subjects = "";
            foreach ($_POST['subjects'] as $subject) {
                $subjects .= $subject;
            }
           $data = 'uname=' . $uname . '&fname=' . $fname . '&lname=' . $lname. '&birthdate'. $birthdate ;
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
            // } else if (empty($birthdate)) {
            //     $thongBao = " birthdate is require";
            //     header("Location: ../siteTeacherAdd.php?error=$thongBao&$data");
            //     exit;
            } else {
                //chuyen doi hashing pass 
               $pass = password_hash($pass, PASSWORD_DEFAULT);


                $sql = "INSERT INTO teachers(username,password,fname, lname,subjects,grade, birthdate, gender, image) VALUES(?,?,?,?,?,?,?,?,?)";

            
                $stmt = $conn->prepare($sql);
                $stmt->execute([$uname, $pass, $fname, $lname, $subjects, $grades, $birthdate, $gender, $target_file]);



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