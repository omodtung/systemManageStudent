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
            isset($_POST['grades'])
            && isset($_POST['birthdate']) && isset($_POST['genderbtn'])



        ) {
            include_once '../../DB_connection.php';
            include_once "../DAL/data/teacherAd.php";

            $flname = $_POST['flname'];
            $uname = $_POST['uname'];
            $birthdate = $_POST['birthdate'];
            $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            $gender = $_POST['genderbtn'];
            $idGV = $_POST['idGV'];
            $diaChi = $_POST['diaChi'];
            $grades = $_POST['grades'];
            $subjects = $_POST['subjects'];

            $imageContent = null;
            if(isset($_FILES['avatar']['tmp_name'])) {
                $imageContent = file_get_contents($_FILES['avatar']['tmp_name']);
            }

            $sql = "INSERT INTO teachers (magv, username, password, hoten, mamonhoc, makhoi, ngaysinh, gioitinh, diachi, status, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $idGV);
            $stmt->bindParam(2, $uname);
            $stmt->bindParam(3, $pass);
            $stmt->bindParam(4, $flname);
            $stmt->bindParam(5, $subjects);
            $stmt->bindParam(6, $grades);
            $stmt->bindParam(7, $birthdate);
            $stmt->bindParam(8, $gender);
            $stmt->bindParam(9, $diaChi);
            $active = 1;
            $stmt->bindParam(10, $active);
            $stmt->bindParam(11, $imageContent, PDO::PARAM_LOB);

            if ($stmt->execute()) {
                $thongBao = "Tao Thanh Cong";
                header("Location: ../siteTeacherAdd.php?success=$thongBao");
                exit;
            } else {
                $thongBao = "Database Error";
                header("Location: ../siteTeacherAdd.php?error=$thongBao");
                exit;
            }
        } else {
            $thongBao = "Invalid Request";
            header("Location: ../siteTeacherAdd.php?error=$thongBao");
            exit;
        }
    } else {
        header("Location: ../../logout.php");
        exit;
    }
} else {
    header("Location: ../../logout.php");
    exit;
}

?>
