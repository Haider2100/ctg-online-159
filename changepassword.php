<?php

include 'datafunction.php';
$db =  new datafunction();
$eid=$_GET['id'];

session_start();
    $username=$_SESSION['user_name'];
    $id=$_SESSION['id'];
    $usertype=$_SESSION['user_type'];  
// Code for change password 

include'header.php'
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>User | Change Password</title>
        <link rel="stylesheet" href="css/dsahboard.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <h2>Change Password</h2>
            
            <table id="main">
            
            <tr>
                <td>New Password </td>
                <td> : </td>
                <td><input id="password" type="password" name="newpassword" class="validate" autocomplete="off" required> </td> 
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td> : </td>
                <td><input id="password" type="password" name="confirmpassword" class="validate" autocomplete="off" required></td>

            </tr>
            <tr>
                <td sytle="text-align:right">Current Password</td>
                <td> : </td>
                <td><input id="password" type="password"  class="validate" autocomplete="off" name="password"  required></td>

            </tr>
            <tr>
                
                <th colspan=3><button type="submit" name="change" class="waves-effect waves-light btn indigo m-b-xs" onclick="return valid();">Change</button><a href="dashboard.php"><i><< Back</i></a></th>

            </tr>
        </table>

<?php 
if(isset($_POST['change']))
    {
$password=md5($_POST['password']);
$newpassword=md5($_POST['newpassword']);

$sql ="SELECT password FROM users WHERE user_name=:username and password=:password";
$query= $db->conn -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);

if($query -> rowCount() > 0)
{
$con="update users set password=:newpassword where user_name=:username";
$chngpwd1 = $db->conn->prepare($con);
$chngpwd1-> bindParam(':username', $username, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();

echo "<br><span style='color: green; font-size: 20px;'><b>Your Password Succesfully Changed</b> </span>"; 
;
}
else {
echo "<br><span style='color: red; font-size: 20px;'><b>Your current password is wrong</b> </span>";    
}
}
?>


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
