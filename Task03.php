    
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
<h1> ASSIGNMENT 1 TASK 03</h1> 

<?php  
echo "<font color='Blue' font size='4px' face='Tohma'>";            
print_r("<div>Task 3 : Make a Class SuperPower. There will be many kind of super power methods in the class. Like Flying , LaserEye , etc. Now Make the classes like IronMan, CaptainAmerica, Thor . Inherit the SuperPower Class by the following classes. Now print the proper power method from the Superhero class.</div><br><br>");
print_r ("<div> ============================================================================================= </div><br>");
echo "<font color='Black' font size='4px' face='Tohma'>";  

////----------------------Solutions of Task 3----------------------------------------------

include 'SuperHero.php';
$Hero = new SuperHero();

?>

<!--Start -- Set Combo Box Info-->
<div>
<form method="post">
  <label for="Heros">Choose a Super Hero:</label>
  <select name="Heros" id="Heros">
  	<option value="none" selected disabled hidden>Select an Option</option>
    <optgroup label="Male Supper Hero">
      <option value="Iron Man">Iron Man</option>
      <option value="Captain America">Captain America</option>
      <option value="Spiderman">Spiderman</option>
      <option value="Thor">Thor</option>
      <option value="Krish">Krish</option>
    </optgroup>
    <optgroup label="Female Super Heroine">
      <option value="Wonder Woman">Wonder Woman</option>
      <option value="Captain Marvel">Captain Marvel</option>
      <option value="Cat Woman">Cat Woman</option> 
    </optgroup>
  </select>
  <input type="submit" name="selecthero" value="Show">
</form>


</div>
<!--End-- Set Combo Box Info-->

<br>

<!--Start -- Set Table Info-->
<table>
<caption><h2>
<?php 
echo " Super Hero ";
if(isset($_POST['selecthero'])){

$Hero->set_name($_POST['Heros']);	
echo $Hero->Name;	
}

?> 

<h2></caption>
<tr>
<th style="text-align: center;height: 40px;width:300px;">Picture</th>
<th style="text-align: center;">Personal Iformation</th> 
</tr>

<tr>
<td rowspan=3>
<?php 
if(isset($_POST['selecthero'])){

	Switch ($_POST['Heros']){
		Case 'Iron Man':
			$url = 'images/ironman.png';
			break;
		Case 'Captain America':
			$url = 'images/CaptiainAmerica.jpg';
			break;
		Case 'Thor':
			$url = 'images/Thor.jpg';
			break;
		Case 'Wonder Woman':
			$url = 'images/wonderwoman.jpg';
			break;
		Case 'Spiderman':
			$url = 'images/Spiderman.png';
			break;
		Case 'Krish':
			$url = 'images/Krish.jpg';
			break;	
		Case 'Cat Woman':
			$url = 'images/catwoman.png';
			break;
		Case 'Captain Marvel':
			$url = 'images/CaptainMarvel.jpg';
			break;
		default:
			$url = 'images/AllHero.jpg';
			break;
	}

//$image = base64_encode(file_get_contents($url));
}
else
{
$url = 'images/AllHero.jpg';
}
$image = base64_encode(file_get_contents($url));
?>	
<img src="data:image/x-icon;base64,<?= $image ?>" width=300 height=400>

</td>

<td>
<?php 
if(isset($_POST['selecthero'])){

	$Hero->ShowInfo($_POST['Heros']);	// Calling Superhero class for peronal information from calling listofsuperhero class

}
?>		
</td>
</tr>

<tr>
<td style="text-align: center;height: 40px ;font-weight:bold;">Super Power Characteristic</td>
</tr>

<tr>
<td>
<?php 
if(isset($_POST['selecthero'])){
	SuperPower();							// Calling Superhero class inherrit SuperPower class for super power information
}
?>	
</td>
</tr>

<tr>
<td  style="text-align: center";> <a href="index.php" target="_self">Back</a> </td>
<td  style="text-align: center";> <a href="Task03.txt" target="_blank">Code Text File</a> </td>
</tr>

</table>


<?php
											// Function to calling inherrit SuperPower class from super hero class
function SuperPower(){
	$Hero = new SuperHero();
	echo "01. ".$Hero->costume()."<br><br>";
	echo "02. ".$Hero->Flying()."<br><br>";
	echo "03. ".$Hero->fightingskills($_POST['Heros'])."<br><br>";
	echo "04. ".$Hero->senseofhumour($_POST['Heros'])."<br><br>";
	echo "05. ".$Hero->honesty($_POST['Heros'])."<br><br>";
	echo "06. ".$Hero->mission()."<br><br>";	
}



?>      


</body> 
</html> 