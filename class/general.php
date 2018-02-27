<?php 
class General {
     
  function __construct() {
  }

  public function checkEmpty($string) {
    if ($string == "") {
			return true; 
		}
		return false; 
  } 

}