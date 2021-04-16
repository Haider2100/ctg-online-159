    
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
<h1> ASSIGNMENT 1 TASK 01</h1> 

<?php  
echo "<font color='Blue' font size='4px' face='Tohma'>";            
print_r("<div>Task 1 : Make a Class Named 'MyName', print out your name by calling method and pass by method parameters.</div><br>");
print_r ("<div> ================================================================================= </div><br>");
echo "<font color='Black' font size='4px' face='Tohma'>";   



////----------------------Solutions of Task 1------------------------------------------------------

include 'MyName.php';

$name = new MyName("Haider");

echo "<div>My Nick Name : " . $name->Nic_name()."</div><br>";

echo "<div>My Full Name : " . $name->full_name('A H M','Kamruzzaman')."</div><br>";

?> 
<br>
<br> 
<div><a href="Task01.txt" target="_blank"> CodeText File</a></div> 
<br>
<br>    
<div><a href="index.php" target="_self"> BACK</a></div>
</body> 
</html> 