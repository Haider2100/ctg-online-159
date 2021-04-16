    
<html>   
<head>       
<title> CTG-ONLINE-159 (CLASS 04) </title>   
</head>  
<link rel="stylesheet" type="text/css" href="ctgstyle.css">

<style> 
body{ 
background-image: url('images/bg01.png') ;
background-repeat: no-repeat;
background-attachment: fixed;  
background-size: 100% 100% 

}
</style>      
<body>           
<h1> ASSIGNMENT 1 TASK 02</h1> 

<?php  
echo "<font color='Blue' font size='4px' face='Tohma'>";            
print_r("<div>Task 2 : Take a variable named 'key', now set the key value by passing setter and print it via getter method.</div><br>");
print_r ("<div> ============================================================================================= </div><br>");
echo "<font color='Black' font size='4px' face='Tohma'>";  



////----------------------Solutions of Task 2----------------------------------------------
include 'MyName.php';

$key = new MyName("");

$key->set_name('A H M','Kamruzzaman');

echo "<div>Full Name : " . $key->get_name()."</div><br>";

?>      
<br>
<br> 
<div><a href="Task02.txt" target="_blank"> CodeText File</a></div> 
<br>
<br>    
<div><a href="index.php" target="_self"> BACK</a></div>

</body> 
</html> 