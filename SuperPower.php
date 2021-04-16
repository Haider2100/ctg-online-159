<?php

class SuperPower {
  // ------------------------Properties
 Public $name;

// --------------------------Methods  general

  function costume() {
      return  "Have a Special Costume.";
  }

  function Flying() {
  
    	return  "Can flying in air with high speed.";
  }
 
 function fightingskills($hname) {
      if ($hname=="Cat Woman"){
        return "Not a Great Fighter";
      }
      else{
       return "Skilled Fighter";  
      }  

  }

  function senseofhumour($hname) {
      if ($hname=="Cat Woman"){
        return  "......";
      }
      else{
       return  "A great Sense of Humour.";
      }  
      
      
  }

function honesty($hname) {
    if ($hname=="Cat Woman"){
        return  "Cat woman is the Batman's antagonist/enemy .";
      }
      else{
       return  "Have great Honesty.";
      } 
      
  }

  function mission() {
  
      return  "There always have a mission. Because 'With Great Power comes Great Responsibility' .";
  }

}

?>