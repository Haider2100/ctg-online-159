<?php

class Assignment {
  // ------------------------Properties
  public $Caption;
  public $words=array();

// --------------------------Methods  general

function __construct() {
    $this->Caption = "ADVANCED WEB APPLICATION DEVELOPMENT";
    $this->words = explode(' ', $this->Caption);
  }


  function CountWordNumber() {
    
    return str_word_count($this->Caption);
  }

  function CountCharNumber() {
    
    return strlen(str_replace(" ","",$this->Caption));
  }


  function Lowestword() {
    $f_num=strlen($this->words[0]);  
    $Shortword=$this->words[0];
    
    foreach ($this->words as $fword){
      if ($f_num>strlen($fword)){
          $f_num=strlen($fword);
          $ShortLen=$fword;
      }

    }
   	
		return $ShortLen;	
  }
 
  
  function Highestword() {
   $f_num=strlen($this->words[0]);  
    $Bigword=$this->words[0];
    
    foreach ($this->words as $fword){
      if ($f_num<strlen($fword)){
          $f_num=strlen($fword);
          $Bigword=$fword;
      }

    }
    
    return $Bigword; 
  }
  
 
  function Replaceword() {
    return str_replace("APPLICATION", "SITE", $this->Caption);
  }

}
?>