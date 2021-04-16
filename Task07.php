    
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
<h1> ASSIGNMENT 1 TASK 07</h1> 

<?php  
echo "<font color='Blue' font size='4px' face='Tohma'>";            
print_r("<div>Task 7 : Make a class named 'Assignment'. Now take a variable and set 'ADVANCED WEB APPLICATION DEVELOPMENT' as the value by constructor. Now make 3 methods where you can do, 1. count number of word of the sentence and return the result, 2. Find the lowest number of word from the sentence and print it, 3. Find the 'Application' word from the sentence and replace the word with 'WEBSITE' and print the full Sentence again with the replaced word.<br><br>");
print_r (" ============================================================================================= <br>");
echo "<font color='Black' font size='4px' face='Tohma'>";  

////----------------------Solutions of Task 7----------------------------------------------
include 'Assignment.php';
$CapVal=new Assignment();

echo $CapVal->Caption."<br>";

echo "01. Total Word Count :".$CapVal->CountWordNumber()."<br>";
echo "02. Total Charecter Count :".$CapVal->CountCharNumber()."<br>";
echo "03. Total Small Word  :".$CapVal->Lowestword()."<br>";
echo "04. Total Longest Word :".$CapVal->Highestword()."<br>";
echo "05. Replace Word : ".$CapVal->Replaceword()."<br>";


echo "--------------------------------------------------</div><br>";
////-----------------------End of Task 7------------------------------------

?>      
<br>
<br> 
<br>
<br> 
<br>
<br> 
<br>
<br> 
<br>
<br> 
<br>
<br> 
<div><a href="Task07.txt" target="_blank"> CodeText File</a></div> 
<br>
<br>    
<div><a href="index.php" target="_self"> BACK</a></div>
</body> 
</html> 