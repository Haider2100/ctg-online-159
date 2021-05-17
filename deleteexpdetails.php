
<?php
    
    include 'datafunction.php';
    $db =  new datafunction();
    $exdid=$_GET['exdid'];
    $exhid=$_GET['exhid'];
    $res = $db->deleteExpenseDetails($exdid);
   

     header("location:expensedetailslist.php?exhid=$exhid");       
 
?>
