<?php

    include "../../DB_connection.php";
    $sql = "SELEcT id,password FROM teachers";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if($stmt->rowCount() >= 1){
        $teachers = $stmt->fetchAll();
    }
    //print_r($teachers);
    
    function password_is_hash($password)
    {
        return password_get_info($password)['algoName'] !== 'unknown';
    }

    $count = 0;
    foreach ($teachers as $key=> $id){
        //echo $key . " " . $id['password'] . "<br>";
        if(!password_is_hash($id['password'])){
            $id['password'] = password_hash($id['password'],PASSWORD_BCRYPT);
            $count++;
            //echo $key . " " . $id['password'] . "<br>";
        }
        //echo $key . " " . $id['password'] . "<br>";
        $pass = $id['password'];
        $id_teacher = $id['id'];
        $sql = "UPDATE teachers SET password='$pass' WHERE id = $id_teacher";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    //echo $teachers[18][1]. "<br>";
    echo "Encrypted " . $count . " Password(s)";
    
?>