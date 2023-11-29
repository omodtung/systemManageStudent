<?php


session_start();



            include_once '../../DB_connection.php';
            
            $id = $_GET['id'];
            
            $classname = $_POST['nameClass'];

            $makhoi  = $_POST['makhoi'];
            $manamhoc = $_POST['manamhoc'];
            
            


                $sql = "UPDATE `class` SET makhoi = '$makhoi',StartTime = '$manamhoc' WHERE classname = $classname";

                $stmt = $conn->prepare($sql);
                $stmt->execute();





                
                $_SESSION['sucsess'] = $id;
                header("Location: ../schedule.php");
                exit;