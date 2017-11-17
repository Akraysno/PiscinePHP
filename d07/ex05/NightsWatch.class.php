<?php

class NightsWatch implements IFighter {
	private $_speech = array();
	
	function recruit( $v ) {
		$this->_speech[] = $v;
	}
	
	function fight() {
		foreach ($this->_speech as $line)
			if(method_exists(get_class($line), 'fight'))
				$line->fight();
	}
}

?>