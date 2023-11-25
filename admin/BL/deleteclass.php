<?php

session_start();


if(isset($_SESSION['admin_id']) && isset($_SESSION['role']))
{
    if ($_SESSION['role']=='Admin')
    {
        include '../../DB_connection.php';
        include("../req/deleteclass.php");
        header("Location: ../classUI.php");
        exit;
    }
}

?>