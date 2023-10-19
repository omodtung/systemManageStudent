<?php


session_start();

if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'Admin') {

        if (
            isset($_POST['flname']) &&
            isset($_POST['uname']) &&
            isset($_POST['pass']) &&
            isset($_POST['idGV']) &&
            isset($_POST['subjects']) &&
            isset($_POST['grades']) &&
            isset($_POST['diaChi']) &&
            isset($_POST['birthdate']) &&
            isset($_POST['genderbtn']))
            {
            include '../../DB_connection.php';
            include "../data/teacherAd.php";

            $flname = $_POST['flname'];
            $uname = $_POST['uname'];
            $birthdate = $_POST['birthdate'];
            $pass = $_POST['pass'];
            $gender = $_POST['genderbtn'];
            $idGV = $_POST['idGV'];
            $diaChi = $_POST['diaChi'];
            
            $target_dir = "uploads/"; 
            $file_name = uniqid("teacher_").'.'.pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
            $target_file = $target_dir . $file_name .'jpg';

            move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file);

            $grades = $_POST['grades'];
            $subjects = $_POST['subjects'];
            
            $data = 'uname=' . $uname . '&fname=' . $flname . '&birthdate'. $birthdate ;
            if (empty($flname)) {
                $thongBao = " first Name is require";
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


                $sql = "INSERT INTO teachers(magv,username,password,hoten,mamonhoc,makhoi,ngaysinh,gioitinh,diachi,active,image) VALUES(?,?,?,?,?,?,?,?,?,?,?)";

            
                $stmt = $conn->prepare($sql);
                $stmt->execute([$idGV, $uname, $pass, $flname, $subjects, $grades, $birthdate, $gender, $diaChi,1,$target_file]);

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