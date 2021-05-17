<?php
    
    $imgpath=($_COOKIE['un']);
    
    unlink($imgpath);
   

     header("location:showuserlist.php");       
 
?>