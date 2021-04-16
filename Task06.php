    
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
<h1> ASSIGNMENT 1 TASK 06</h1> 

<?php  
echo "<font color='Blue' font size='4px' face='Tohma'>";            
print_r("<div>Task 6 : Make a Class MyName, use constructor to set your name in the name variable.(use this). Now print that name with welcome by calling method.<br><br>");
print_r (" ============================================================================================= <br>");
echo "<font color='Black' font size='4px' face='Tohma'>";  

////----------------------Solutions of Task 6----------------------------------------------
include 'MyName.php';
$MName=new MyName("A H M Kamruzzaman");

echo "Welcome ".$MName->name."<br>";
echo "--------------------------------------------------</div><br>";
////-----------------------End of Task 6------------------------------------
?>      
<br>
<br> 
<br>
<br> 
<br> 
<div><a href="Task06.txt" target="_blank"> CodeText File</a></div> 
<br>
<br>    
<div><a href="index.php" target="_self"> BACK</a></div>
</body> 
</html> 