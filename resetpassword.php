
<?php
    
    include 'datafunction.php';
    $db =  new datafunction();
    $eid=$_GET['id'];
    $password=md5(1234);
  
  $sql="update users set password=:password where id=:eid";
$query = $db->conn ->prepare($sql);

$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);

$query->execute();

  header("location:showuserlist.php");       
 
?>
