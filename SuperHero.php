<?php
include "SuperPower.php";
//include "IronMan.php";

class SuperHero extends SuperPower{
  // ------------------------Properties
 
  public $Name;
  

  // ------------------------Methods get
  function ShowInfo($na) {
 	include_once "ListofHero.php";
   	$suphero=new ListofHero();    
	
Switch ($na){
	Case 'Iron Man':
		$suphero->IronMan();
		break;
	Case 'Captain America':
		$suphero->CaptainAmerica();
		break;

	Case 'Thor':
		$suphero->Thor();
		break;

	Case 'Wonder Woman':
		$suphero->WonderWoman();
		break;
	Case 'Spiderman':
		$suphero->SpiderMan();
		break;

	Case 'Krish':
		$suphero->Krish();
		break;
	
	Case 'Cat Woman':
		$suphero->CatWoman();
		break;

	Case 'Captain Marvel':
		$suphero->CaptainMarvel();
		break;
}
	
	 
}
 
function set_name($na) {
$this->Name =$na ;
}

function get_name() {
return $this->Name ;
}

function __destruct() {
    $suphero=null; 
  }

}

?>