<?php

class UnholyFactory {
	private $_soldiers = array();
	
	function absorb( $soldier ) {
		if ($soldier instanceof Llama) {
			print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL );
		} else {
			if (($soldier instanceof Footsoldier) || ($soldier instanceof Archer) || ($soldier instanceof Assassin)) {
				if (!isset($this->_soldiers[$soldier->name])) {
					$this->_soldiers[$soldier->name] = 1;
				} else {
					$this->_soldiers[$soldier->name] = 2;
				}
			}
			if ($this->_soldiers[$soldier->name] === 1)
				print("(Factory absorbed a fighter of type " . $soldier->name . ")" . PHP_EOL );
			else if ($this->_soldiers[$soldier->name] === 2) {
				print("(Factory already absorbed a fighter of type " . $soldier->name . ")" . PHP_EOL );
			}
		}
	}
	
	function fabricate ( $soldier ) {
		if ($this->_soldiers[$soldier]) {
			print( "(Factory fabricates a fighter of type " . $soldier . ")" . PHP_EOL );
			if ($soldier === "foot soldier")
				return (new Footsoldier());
			if ($soldier === "llama")
				return (new Llama());
			if ($soldier === "archer")
				return (new Archer());
			if ($soldier === "assassin")
				return (new Assassin());
		}
		else
			print( "(Factory hasn't absorbed any fighter of type " . $soldier . ")" . PHP_EOL );
	}
}

?>