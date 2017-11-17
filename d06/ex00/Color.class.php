<?php

class Color {

	public $red = 0;
	public $green = 0;
	public $blue = 0;
	static $verbose = false;
	
	function __construct(array $color) {
		if (array_key_exists('red', $color) && array_key_exists('green', $color) && array_key_exists('blue', $color)) {
			$this->red = $color['red'];
			$this->green = $color['green'];
			$this->blue = $color['blue'];
		} else if (array_key_exists('rgb', $color)) {
			$this->red = ($color['rgb'] / (256 * 256)) % 256;
			$this->green = ($color['rgb'] / 256) % 256;
			$this->blue = $color['rgb'] % 256;
		}
		if (self::$verbose) {
			printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->red, $this->green, $this->blue);
		}
	}
	
	function __destruct() {
		if (self::$verbose) {
			printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n", $this->red, $this->green, $this->blue);
		}
	}
	
	function __toString() {
		return (vsprintf("Color( red: %3d, green: %3d, blue: %3d )", array($this->red, $this->green, $this->blue)));
	}

	public static function doc() {
		$read = fopen("Color.doc.txt", 'r');
		echo "\n";
		while ($read && !feof($read))
			echo fgets($read);
		echo "\n";
	}
	
	function add(Color $color) {
		return (new Color(array('red' => $this->red + $color->red, 'green' => $this->green + $color->green, 'blue' => $this->blue + $color->blue)));
	}
	
	function sub(Color $color) {
		return (new Color(array('red' => $this->red - $color->red, 'green' => $this->green - $color->green, 'blue' => $this->blue - $color->blue)));
	}
	
	function mult($factor) {
		return (new Color(array('red' => $this->red * $factor, 'green' => $this->green * $factor, 'blue' => $this->blue * $factor)));
	}
}

?>