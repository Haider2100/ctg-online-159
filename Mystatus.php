<?php
include 'Gorib.php';

class Mystatus implements Gorib {
  
  // ------------------------Properties
  	public $Status;
	public $Home;
	public $FamilySize;

function lowMOney($income) {

	if ($income<10000) {
		$Status="Low Monthly Income";

}
	else if ($income<30000) {
		$Status="Medium Monthly Income";

}

	else {
		$Status="High Monthly Income";

}
	return $Status;
}

function Homeless($Y) {
	if ($Y="yes") {
		$Home="No Home";
}

	else {
		$Home="Have Home";
}
	return $Home;
}

function Familysize($Size){

	if ($Size<5) {
		$FamilySize="Small";
}

	else {
		$FamilySize="Big";
}
	return $FamilySize;
}
}
?>