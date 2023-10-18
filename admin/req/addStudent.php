<?php


session_start();




if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])
) {
    if ($_SESSION['role'] == 'Admin') {

        if (
            isset($_POST['fname']) &&
            isset($_POST['lname']) &&
            isset($_POST['uname'])

            



        ) {
            include '../../DB_connection.php';
            include "../data/teacherAd.php";

            // print_r($_POST);
            // die();

            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $uname = $_POST['uname'];
            $pass = $_POST['pass'];

            $birthdate = $_POST['birthdate'];

            $hanhkiem = $_POST['hanhkiem'];
            $hocluc = $_POST['hocluc'];
            $gender =   $_POST['genderbtn'];
            $grades = $_POST['grades'];



            // foreach ($_POST['grades'] as $grade) {
            //     $grades .= $grade;
            // }
            // $lopChuNhiem = '';

            $classes = $_POST['classes'];
            // foreach ($_POST['classesArray'] as $class)
            // {
            //     $classes .= $class;

            // }
            $data = 'uname=' . $uname . '&fname=' . $fname . '&lname=' . $lname;
            if (empty($fname)) {
                $thongBao = " first Name is require";
                header("Location: ../siteAddStudent.php?error=$thongBao&$data");
                exit;
            } else if (empty($lname)) {
                $thongBao = " last Name is require";
                header("Location: ../siteAddStudent.php?error=$thongBao&$data");
                exit;
            } else if (!findNameDocNhat($uname, $conn)) {
                $thongBao = " Username Da Ton Tai Su Dung Username Khac";
                header("Location: ../siteAddStudent.php?error=$thongBao&$data");
                exit;
            } else if (empty($pass)) {
                $thongBao = " pass is require";
                header("Location: ../siteAddStudent.php?error=$thongBao&$data");
                exit;



            } 
            
            else if(empty($birthdate))
            {
                $thongbao= " BirthDate is required";
                header("Location: ../siteAddStudent.php?error=$thongBao&$data");
                exit;

            }

            else if (empty($hanhkiem))
            {
                $thongbao= " hanhkiem is required";
                header("Location: ../siteAddStudent.php?error=$thongBao&$data");
                exit;
            }
            else if (empty($gender))
            {
                $thongbao= "gender is required";
                header("Location: ../siteAddStudent.php?error=$thongBao&$data");
                exit;
            }
            else if (empty($grades))
            {
                $thongbao= " grades is required";
                header("Location: ../siteAddStudent.php?error=$thongBao&$data");
                exit;
            }

            else if (empty($classes))
            {
                $thongbao= " classes is required";
                header("Location: ../siteAddStudent.php?error=$thongBao&$data");
                exit;
            }
            else {
                //chuyen doi hashing pass 
                $pass = password_hash($pass, PASSWORD_DEFAULT);


                $sql = "INSERT INTO students (`username`, `password`, `fname`, `lname`, `HanhKiem`, `HocLuc`, `NgaySinh`, `Gender`, `grade_id`, `ID_CLASS`)  VALUES(?,?,?,?,?,?,?,?,?,?)";


                $stmt = $conn->prepare($sql);
                $stmt->execute([$uname, $pass, $fname, $lname, $hanhkiem, $hocluc, $birthdate, $gender, $grades, $classes]);





                $thongBao = " Tao Thanh Cong";
                header("Location: ../siteAddStudent.php?success=$thongBao");
                exit;
            }
        } else {
            $thongBao = " xay Ra loi 144442232324";
              header("Location: ../siteAddStudent.php?error=$thongBao");
           
            exit;
        }
    } else {
        header("Location: ../../logout.php");
        exit;
    }
} else {

    header("Location: ../../loguot.php");
    exit;
}
