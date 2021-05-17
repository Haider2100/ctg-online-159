
<?php
    
    include 'datafunction.php';
    $db =  new datafunction();
    $eid=$_GET['id'];
    
    $usertype=$_GET['utype'];
  
  	if ($usertype=='No'){
  		header("location:showuserlist.php"); 
  }
	else{
		$sql="update users set user_type=:usertype where id=:eid";
		$query = $db->conn ->prepare($sql);


		$query->bindParam(':usertype',$usertype,PDO::PARAM_STR);
		$query->bindParam(':eid',$eid,PDO::PARAM_STR);

		$query->execute();

		 header("location:showuserlist.php");       
 }
?>
