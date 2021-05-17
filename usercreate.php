<?php

include 'datafunction.php';
$db =  new datafunction();


session_start();
    $username=$_SESSION['user_name'];
    $id=$_SESSION['id'];
    $usertype=$_SESSION['user_type'];  

if(isset($_POST['update']))
{


$user_name=$_POST['user_name'];
$password=md5($_POST['password']);   
$full_name=$_POST['full_name']; 
$Email=$_POST['Email']; 
$sql="Insert Into users (user_name,password,full_name,Email) Value (:user_name,:password,:full_name,:Email)";

$query = $db->conn ->prepare($sql);
$query->bindParam(':user_name',$user_name,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':full_name',$full_name,PDO::PARAM_STR);
$query->bindParam(':Email',$Email,PDO::PARAM_STR);


$query->execute();

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

  <h2>Create New User</h2>
     
        
        <table id="example" class="display responsive-table ">
             <tr>
                <th> </th>
                <th> </th>
            </tr>                                 
   
            <tr>
                <td>User Name</td>
                <td><input id="user_name" name="user_name" type="text" autocomplete="off" required size="25"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input id="password" name="password" type="password" autocomplete="off" required size="25"></td>
            </tr>
            <tr>
                <td>Full Name</td>
                <td><input id="full_name" name="full_name"  type="text" autocomplete="off" required size="50"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input id="Email" name="Email" type="text"  maxlength="30" autocomplete="off" required size="50"></td>
            </tr>                      
            <tr>
                <td> </td>
                <td><button class="btn btn-Success" type="submit" name="update"  id="update" >Update</button> <a class="btn btn-danger" href="dashboard.php" >Back</a></td>
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