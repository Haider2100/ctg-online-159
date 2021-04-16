<?php

class MyName {
  // ------------------------Properties
  public $name;


// --------------------------Methods  general

function __construct($na) {
    $this->name = $na;
  }


  function Nic_name() {
    return $this->name;
  }

  function full_name($fn,$ln) {
  
    	$this->name = $fn ." " .$ln;
    	
		return $this->name;	
  }
 
  // ------------------------Methods get
  function set_name($fname,$lname) {
    
 	  $this->name = $fname ." " .$lname;
  }
 // ------------------------Methods get
  function get_name() {
    return $this->name;
  }

}

?>