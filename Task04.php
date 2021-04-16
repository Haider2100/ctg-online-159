    
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
<h1> ASSIGNMENT 1 TASK 04</h1> 

<?php  
echo "<font color='Blue' font size='4px' face='Tohma'>";            
print_r("<div>Task 4 : Make a Car class. Take EngineStatus,BodyPart property for Car class. Take another class named Audi. Take property color, Seats . then Print all of them EngineStatus,BodyPart,property color by inherit Car Class. You can use Getter Setter if you want.</div><br><br>");
print_r ("<div> ============================================================================================= </div><br>");
echo "<font color='Black' font size='4px' face='Tohma'>";  

////----------------------Solutions of Task 4----------------------------------------------

include 'Audi.php';

$CarInfo = new Audi();

//-----------call system------------------
echo "<div>";
echo "Color : ". $CarInfo->color."<br>";
echo "Seat : ".$CarInfo->seat."<br>";
echo "Engine Status : ".$CarInfo->EngineStatus."<br>";
echo "BodyPart : ".$CarInfo->BodyPart."<br>";

echo "<br>";
echo "<br>";
echo "--------------------Setter Getter system---------------</div><br>";

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
//----------set get system----------
$CarInfo->set_info("Black","Forward-facing with harness","Good Condition","WindSheild, 4 Door with Child Lock");
echo $CarInfo->get_info();

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<div>--------------------------------------------------</div><br>";


////-----------------------End of Task 4------------------------------------

?>      
<br>
<br> 
<div><a href="Task04.txt" target="_blank"> CodeText File</a></div> 
<br>
<br>    
<div><a href="index.php" target="_self"> BACK</a></div>
</body> 
</html> 