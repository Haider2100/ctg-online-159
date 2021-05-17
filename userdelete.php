
<?php
    
    include 'datafunction.php';
    $db =  new datafunction();
    $eid=$_GET['id'];
    
  
$sql="Delete from users where id=:eid";

$query = $db->conn ->prepare($sql);

$query->bindParam(':eid',$eid,PDO::PARAM_STR);

$query->execute();

 header("location:showuserlist.php");       
 
?>
