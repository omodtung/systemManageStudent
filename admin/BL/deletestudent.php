<?php

session_start();


if(isset($_SESSION['admin_id']) && isset($_SESSION['role']))
{
    if ($_SESSION['role']=='Admin')
    {
        include("../req/deletestudent.php");
        header("Location: ../studentUI.php");
        exit;
    }
}

?>