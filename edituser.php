<?php

include 'datafunction.php';
$db =  new datafunction();
$eid=$_GET['id'];

session_start();
    $username=$_SESSION['user_name'];
    $id=$_SESSION['id'];
    $usertype=$_SESSION['user_type'];  

if(isset($_POST['update']))
{


$user_name=$_POST['user_name'];   
$full_name=$_POST['full_name']; 
$Email=$_POST['Email']; 
$sql="update users set user_name=:user_name,full_name=:full_name,Email=:Email where id=:eid";

$query = $db->conn ->prepare($sql);
$query->bindParam(':user_name',$user_name,PDO::PARAM_STR);
$query->bindParam(':full_name',$full_name,PDO::PARAM_STR);
$query->bindParam(':Email',$Email,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);

$query->execute();
?>

<script> alert("User record updated Successfully");</script>
<?php
header("location:showuserlist.php");
}
include 'header.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Docs | Home Page</title>
        <link rel="stylesheet" href="css/dsahboard.css">       
        <style>
        img {
          display: block;
          margin-left: auto;
          margin-right: auto;
          border: 5px solid #555;
          border-radius: 15%;
        }
        </style> 
    </head>
    <body>
       <script type="text/javascript">
    
            myFunction('Hide');
            FuncChangePhoto('Hide');
        </script>     


            <div id="wrap">
                <div id="main">
  
                    <div id="content">
  

<form id="example-form" method="POST" name="updatexp">

  <h2>Edit User Information</h2>
 
<?php 

//$eid=$_GET['id'];
$sql = "SELECT * from  users where id=:eid";

$query = $db->conn -> prepare($sql);
$query -> bindParam(':eid',$eid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>      
        
        <table id="example" class="display responsive-table ">
             <tr>
                <th> </th>
                <th> </th>
            </tr>                                 
   
            <tr>
                <td>User Name</td>
                <td><input id="user_name" name="user_name" value="<?php echo htmlentities($result->user_name);?>" type="text" autocomplete="off" required size="50"></td>
            </tr>
            <tr>
                <td>Full Name</td>
                <td><input id="full_name" name="full_name" value="<?php echo htmlentities($result->full_name);?>" type="text" autocomplete="off" required size="50"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input id="Email" name="Email" type="text" value="<?php echo htmlentities($result->Email);?>" maxlength="30" autocomplete="off" required></td>
            </tr>            
 <?php }}?>           
            <tr>
                <td> </td>
                <td><button class="btn btn-Success" type="submit" name="update"  id="update" >Update</button> <a class="btn btn-danger" href="showuserlist.php" >Back</a></td>
            </tr>

</table>

</form>                                               

</div>
                <?php 
                
                if ($_SESSION['user_type']=='Admin')
                {
                    include 'sidebar-admin.php';;
                }
                else
                {
                    include 'sidebar.php';
                }
                ?>

        </div>
  
    </div>

      </body>
</html>