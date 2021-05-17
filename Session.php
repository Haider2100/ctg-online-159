<?php
    session_start();
    if($_SESSION['user_type']!='Admin')
    {
        header('location:login.php');
        exit();
    }
    //include 'connection.php'
?>
