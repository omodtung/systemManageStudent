<?php


session_start();


if(isset($_SESSION['admin_id']) && isset($_SESSION['role']))
{
    if ($_SESSION['role']=='admin')
    {
        include "../DB_connection/php";
        include "data/subject.php";
        include "data/grade.php";
        $subjects = getAllSubjects($conn);
// $grades=
    }
}

?>