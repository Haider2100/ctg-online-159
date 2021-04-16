<?php
include "Car.php";

class Audi extends Car {
  // ------------------------Properties
  public $color="Purple Green";
  public $seat="Convertible seats (used rear facing)";

// --------------------------Methods  general

  
  // ------------------------Methods get
  function set_info($cr,$st,$en,$bp) {
    
 	  $this->color = $cr;
    $this->seat = $st;
    $this->EngineStatus = $en;
    $this->BodyPart = $bp;

  }
 // ------------------------Methods get
  function get_info() {
   $allinfo="<div>Color : " .$this->color  
   . "<br>Seat : " .$this->seat 
   . "<br>Engine Status : ".$this->EngineStatus 
   . "<br>BodyPart : " . $this->BodyPart."</div>";
    
    return $allinfo;
  }

}

?>