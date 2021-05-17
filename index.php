<?php
    include 'datafunction.php';
    $Con =  new datafunction();

    if(isset($_POST['Register'])){
        $user_name = $_POST['username'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        echo $Con->newUser($user_name ,$fullname,$email,$password);
    }  


    //USER HIT LOGIN BUTTON
    if(isset($_POST['submit'])){
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        
        echo $Con->loginCheck($user_name,$password);
    }

  

?>

<!DOCTYPE html>
<html>
<head>
<title>EMS | Login</title>
<link rel="stylesheet" href="css/login.css">
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script>
        function getPage(url){
            $('#content').hide(1000,function(){
            $('#content').load(url);
            $('#content').show(1000,function(){});
            });
        }

    </script>
</head>
<body>
<div id="wrap">
<div id="header">
<div id="logo">
    <h1 style="text-align: center;">EMS | <span style="color:green">Login</span></h1>  
</div>
</div>

<div id="content" >
	
   <form name="Myform" id="Myform" action="" method="POST" class="form-group">
   <div id="error" style="color:red; font-size:16px; font-weight:bold; padding:5px" ></div>
    <table style="width:100px; margin-left:2em;">
        <thead></thead>
        <tbody>
            <tr>
                <td style="text-align: right;font-size: 20px">Username</td>
                <td style="font-size: 20px"><input type="text" name="user_name" id="fname" onkeydown="HideError()" size="20px;" value="Haider2100" required /></td>
            </tr>
            <tr >
                <td style="text-align: right;font-size: 20px">Password</td>
                <td style="font-size: 20px"><input type="password" name="password" id="password" onkeydown="HideError()" size="20px;" value="haider" required /></td>
            </tr>
            
            <tr>
                <td style="color:#F8F8FF;"></td>
                <td><input type="submit" name="submit" value="Login" /></td>
            </tr>
            <tr>
                <td style="color:#F8F8FF;"></td>
                <td style="color:green;"><a href="#" onclick="getPage('forgetPassword.php')"><i>forget your password..!</i></a></td>
            </tr>
        
        </tbody>
    </table>
</form>

</div>

<div class= "clear"></div>

<div id="footer">
New user Register <a href="#" onclick="getPage('registration.php')"><i> Here..!</i>
</div>
</div>
</body>
</html>