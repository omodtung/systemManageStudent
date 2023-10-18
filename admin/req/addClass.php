<?php


session_start();




if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])
) {
    if ($_SESSION['role'] == 'Admin') {

        if (
            isset($_POST['nameClass'])





        ) {
            include '../../DB_connection.php';
            include "../data/teacherAd.php";

            // print_r($_POST);
            // die();

            include "../data/class.php";

            
            // print_r($_POST);
            // die();


            $nameClasses = $_POST['nameClass'];



            // }
            $data =  '&nameClasses=' . $nameClasses;
            if (empty($nameClasses)) {
                $thongBao = " NameClass is require";
                header("Location: ../addClassSite.php?error=$thongBao&$data");
                exit;
            
            } else {
               


                $sql = "INSERT INTO class ( `classname`)  VALUES(?)";


                $stmt = $conn->prepare($sql);
                $stmt->execute([$nameClasses]);





                $thongBao = " Tao Thanh Cong";
                header("Location: ../addClassSite.php?success=$thongBao");
                exit;
            }
        } else {
            $thongBao = " xay Ra loi 144442232324";
            header("Location: ../addClassSite.php?error=$thongBao");

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
