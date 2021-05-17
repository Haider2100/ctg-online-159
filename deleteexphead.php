
<?php
    
    include 'datafunction.php';
    $db =  new datafunction();
    $exhid=$_GET['exhid'];
    $res = $db->deleteExpense($exhid);
    

     header("location:expenselist.php");       
 
?>
