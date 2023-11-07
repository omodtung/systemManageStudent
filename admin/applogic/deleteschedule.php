<?php

session_start();


if(isset($_SESSION['admin_id']) && isset($_SESSION['role']))
{
    if ($_SESSION['role']=='Admin')
    {
        include '../../DB_connection.php';
        include("../req/deleteschedule.php");
        header("Location: ../schedule.php");
        exit;
    }
}

?>