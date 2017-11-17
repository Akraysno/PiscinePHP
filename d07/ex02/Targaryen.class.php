<?php

class Targaryen{
	
	function __construct() {
		
	}
	
	public function resistsFire() {
		return false;
	}
	
	function getBurned() {
		if ($this->resistsFire() === True)
			return ("emerges naked but unharmed");
		else
			return ("burns alive");
	}
}
?>