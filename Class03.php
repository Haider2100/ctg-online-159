<html>   
<head>       
<title> CTG-ONLINE-159 (CLASS 03) </title>   
</head>  
<link rel="stylesheet" type="text/css" href="ctgstyle.css">

<style> 
body{ 
background-image: url('image/bg01.png') ;
background-repeat: no-repeat;
background-attachment: fixed;  
background-size: 100% 100% 

}
</style>     
<html>   
<head>       
<title> CTG-ONLINE-159 (CLASS 03) </title>   
</head>  
<link rel="stylesheet" type="text/css" href="ctgstyle.css">

<style> 
body{ 
background-image: url('image/bg01.png') ;
background-repeat: no-repeat;
background-attachment: fixed;  
background-size: 100% 100% 

}
</style>      
<body>           
<h1>  CTG-ONLINE-159 (CLASS 03)</h1> 

<h3>Submitted By A H M Kamruzzaman </h3>

<?php              


echo "<font color='Blue' font size='4px' face='Tohma'>";


echo "<div>==================================================================== </div><br>";  
print_r("<div>Task 1 : Pass first name and last name with parameter and print out the names together in one string..</div><br>");
print_r ("<div> ==================================================================== </div><br>");


////Solutions of Task 1------------------------------------------------------------------------

$F_Name="A H M"; 
$L_Name="Kamruzzaman";

echo "<font color='black' font size='4px' face='Tohma'>";
echo "<div>First Name :  <font color=yellow>" .$F_Name ."</div><br>" ;
echo "<div><font color=black> Last Name : <font color=Red>" .$L_Name ."</div><br>";

echo "<div><font color=black>Full Name : ". FullName($F_Name,$L_Name)."</div>";

function FullName($FName,$LName){

	Return "<font color=yellow>".$FName ." <font color=Red>". $LName;

}
//----------------------------------------------------------------------------------------------
echo"<br>";
echo "<font color='Blue' font size='4px' face='Tohma'>";
?>
<br>

<?php 


echo "<div>================================================================================================== </div><br>";  
print_r("<div>Task 2 : Make 3 functions with 2 parameters each. Pass two numbers and print out SUM, MULTIPLICATION, SUBTRACTION by 3 separate functions.</div><br>");
print_r ("<div>================================================================================================== </div><br>");
echo "<font color='black' font size='4px' face='Tohma'>";


//Solution of Task 2----------------------------------------
$num1=12; 
$num2=30;
echo "<div>The two numbers are ".$num1 ."," .$num2 ."</div><br>";
echo "<div>***************************************************** </div><br>";  

echo "<div>The Sum of two numbers=".fsum($num1,$num2)."</div><br>";
echo "<div>The Multiplication of two numbers=".fMultiplication($num1,$num2)."</div><br>";
echo "<div>The Subtraction of two numbers=".fSubtraction($num1,$num2)."</div><br>";

function fSum($n1,$n2){

	Return $n1+$n2;

}
function fMultiplication($n1,$n2){

	Return $n1*$n2;

}
function fSubtraction($n1,$n2){

	Return $n1-$n2;

}

//-----------------------------------------------------


echo"<br>";
echo "<font color='Blue' font size='4px' face='Tohma'>";



echo "<div>================================================== </div><br>";  
print_r("<div>Task 3 : Print 20 to 10 reversely by for loop.</div><br>");
print_r ("<div> ================================================== </div><br>");
echo "<font color='black' font size='4px' face='Tohma'>";
$num1="";

//Solutions of Task 3----------------------------------------------------------

for ($i=20;$i>=10;$i--){

	 $num1=$num1." ,".$i;

}

echo "<div>". substr($num1,2)."</div>";

//-----------------------------------------------------------------------------
echo"<br>";
echo "<font color='Blue' font size='4px' face='Tohma'>";


echo "<div>==================================================</div> <br>";  
print_r("<div>Task 4 : sum 1,2,3,4 using loop. Means 1+2+3+4 = ?</div><br>");
print_r ("<div> ================================================== </div><br>");
echo "<font color='black' font size='4px' face='Tohma'>";
 
//Solutions of Task 4----------------------------------------------------------------
$num1="";
$num2=0;
$i=0;
while ($i<4){
$i++;
	$num1=$num1."+".$i;         //(for show 1+2+3+4)

	$num2=$num2+$i;            //Sumation
}

echo "<div>The summation of <b>".substr($num1,1)."=".$num2."</b></div>";
//--------------------------------------------------------------------------------------

echo"<br>";
echo "<font color='Blue' font size='4px' face='Tohma'>";


echo "<div>================================================</div> <br>";  
print_r("<div>Task 5 : Make multiplication table (নামাতা) for 40 to 45 using nested loop.</div><br>");
print_r ("<div> ================================================ </div><br>");
echo "<font color='black' font size='4px' face='Tohma'>";

//Solutions of Task 5------------------------------------------------------------------------------
$j=0;

for ($i=40;$i<46;$i++){

	echo "<div>***************   The Table of ".$i."     ****************</div> <br>"; 
	
	for ($j=1;$j<6;$j++){

	echo "<div>".$i ." X ".$j." = ".$i*$j.".................................". $i ." X ".($j+5)." = ".$i*($j+5). "</div><br>";

}
}

//----------------------------------------------------------------------------------------------------------------

echo"<br>";
echo "<font color='Blue' font size='4px' face='Tohma'>";

echo "<div>=========================================================================================================================</div> <br>";  
print_r("<div>Task 6 : (Special) Make this sum 1+2+3+4+5 = ? by recursion function.</div><br>");
print_r ("<div> ========================================================================================================================= </div><br>");
echo "<font color='black' font size='4px' face='Tohma'>";

//Solutions of Tsk 6-------------------------------------------------------------

$i=0;

function rfSum(){
global $res,$resStr,$i;
$i++;
$res=$res+$i;                         //Sumation

$resStr=$resStr." + ".$i;             //for show String
	
	if ($i<5 ){                       //call again
		rfsum($i);
	}
	
return $res	;
}

$result=rfsum();                      //run recursive function

echo "<div>The Sum of ".substr($resStr,3) ." = ".$result ."</div>";


//---------------------------------------------------------------------------



echo"<br>";
echo "<font color='Blue' font size='4px' face='Tohma'>";

echo "<div>=========================================================================================================================</div> <br>";  
print_r("<div>Task 7 : Make an array of numbers 1-10. Find the odd numbers from the list using loop.</div><br>");
print_r ("<div> ========================================================================================================================= </div><br>");
echo "<font color='black' font size='4px' face='Tohma'>";

//Solutions of Tsk 7-------------------------------------------------------------

$arNum = array(100,375,37,256,707,1000,801,157,658,59 );
$t_num="";
$o_num="";

for ($i=0;$i<10;$i++){
if ($arNum[$i] % 2==1){
	$o_num =$o_num.", ".$arNum[$i];

}
}


foreach ($arNum as $a_num){

	$t_num =$t_num.", ".$a_num;
}

echo "<div>The numbers are <b>".substr($t_num,1) ."</b></div><br>";

echo "<div>The Odd numbers are <b>".substr($o_num,1)."</b></div><br>";

//---------------------------------------------------------------------------

echo"<br>";
echo "<font color='Blue' font size='4px' face='Tohma'>";

echo "<div>=========================================================================================================================</div> <br>";  
print_r("<div>Task 8 : Suppose you want to arrange a party at your house. You have 10 friends on your list. (Take random 10 names in the array). Due to money shortage, you want to invite only those friends who's name has not more than 5 Characters. So write a program to sort out those friends' names from the array and print them using loop.</div><br>");
print_r ("<div> ========================================================================================================================= </div><br>");
echo "<font color='black' font size='4px' face='Tohma'>";

//Solutions of Tsk 8-------------------------------------------------------------


$arNum = array("Babar","Humayan","Akbar","Salim","Shahjahan","Aurogajeb","Jahangir","Tipu","Amin","Iqbal" );
$t_num="";
$o_num="";
$i=0;$j=1;
//---------------For loop--------------------------------
//for ($i=0;$i<10 && $j<5;$i++){

//if (strlen($arNum[$i]) <6){
//	$j++;
//	$o_num =$o_num.", ".$arNum[$i];

//}
//}
//-----------------Do while loop-----------------

//Do {

//if (strlen($arNum[$i]) <=5 ){
//	$j++;
//	$o_num =$o_num.", ".$arNum[$i];
//}
//$i++;
//}
//while($i<10 && $j<=5);
//------------------While loop -------------------------------

while($i<10 && $j<=5){

if (strlen($arNum[$i]) <=5 ){
	$j++;
	$o_num =$o_num.", ".$arNum[$i];
}
$i++;
}

foreach ($arNum as $a_num){

	$t_num =$t_num.", ".$a_num;
}

echo "<div>The Names are <b>".substr($t_num,1) ."</b></div><br>";

echo "<div>The Invited Names will be <b>".substr($o_num,1)."</b></div><br>";

//---------------------------------------------------------------------------


?>      
    



</body> 
</html> 