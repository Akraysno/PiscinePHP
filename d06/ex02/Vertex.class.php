<?php

require_once('Color.class.php');

class Vertex {

	private $_x;
	private $_y;
	private $_z;
	private $_w = 1.0;
	private $_color;
	static $verbose = true;

	function __construct(array $vertex) {

		$this->_x = $vertex['x'];
		$this->_y = $vertex['y'];
		$this->_z = $vertex['z'];
		if (array_key_exists('w', $vertex)) {
			$this->_w = $vertex['w'];
		}
		if (array_key_exists('color', $vertex) && $vertex['color'] instanceof Color) {
			$this->_color = $vertex['color'];
		}
		else {
			$this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
		}
		if (self::$verbose) {
			printf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, Color( red: %3d, green: %3d, blue: %3d ) ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
		}
	}

	function __destruct() {
		if (self::$verbose) {
			printf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, Color( red: %3d, green: %3d, blue: %3d ) ) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
		}
	}

	function __toString() {
		if (self::$verbose) {
			return (vsprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, Color( red: %3d, green: %3d, blue: %3d ) )", array($this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue)));
		}
		return (vsprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )", array($this->_x, $this->_y, $this->_z, $this->_w)));
	}

	function getX() {
		return $this->_x;
	}

	function getY() {
		return $this->_y;
	}

	function getZ() {
		return $this->_z;
	}

	function getW() {
		return $this->_w;
	}

	function getColor() {
		return $this->_color;
	}

	function setX( $v ) {
		$this->_x = $v;
	}
	
	function setY( $v ) {
		$this->_y = $v;
	}
	
	function setZ( $v ) {
		$this->_z = $v;
	}
	
	function setW( $v ) {
		$this->_w = $v;
	}
	
	function setColor( $color ) {
		$this->_color = $color;
	}

	public static function doc() {
		$read = fopen("Vertex.doc.txt", 'r');
		echo "\n";
		while ($read && !feof($read))
			echo fgets($read);
		echo "\n";
}

}

?>