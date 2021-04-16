    
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
<h1> ASSIGNMENT 1 TASK 05</h1> 

<?php  
echo "<font color='Blue' font size='4px' face='Tohma'>";            
print_r("<div>Task 5 : Make a interface class named Gorib. Make another class called MyStatus. Implement Gorib class in MyStatus. Then implement lowMOney,Homeless method in MyStatus Class.</div><br><br>");
print_r ("<div> ============================================================================================= </div><br>");
echo "<font color='Black' font size='4px' face='Tohma'>";  

////----------------------Solutions of Task 5----------------------------------------------

include 'MyStatus.php';

$GoribStatus = new Mystatus();

//-----------call system------------------
echo "<div>";
echo "Income Status : ".$GoribStatus->lowMoney(5000)."<br>";
echo "Home Status :   ".$GoribStatus->Homeless("Yes")."<br>";
echo "Family Size :   ".$GoribStatus->Familysize(6)."<br>";

echo "--------------------------------------------------</div><br>";
echo "<br>";
echo "<br>";
echo "<br>";

////-----------------------End of Task 5------------------------------------;

?>      
<br>
<br> 
<div><a href="Task05.txt" target="_blank"> CodeText File</a></div> 
<br>
<br>    
<div><a href="index.php" target="_self"> BACK</a></div>
</body> 
</html> 