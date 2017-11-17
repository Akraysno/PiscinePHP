<?php

require_once 'Vertex.class.php';

class Vector {
	
	private $_x;
	private $_y;
	private $_z;
	private $_w = 0.0;
	static $verbose = false;

	function __construct(array $vector) {
		if (array_key_exists('dest', $vector) && $vector['dest'] instanceof Vertex) {
			if (array_key_exists('orig', $vector) && $vector['orig'] instanceof Vertex) {
				$orig = $vector['orig'];
			} else {
				$orig = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0, 'w' => 1));
			}
			$this->_x = $vector['dest']->getX() - $orig->getX();
			$this->_y = $vector['dest']->getY() - $orig->getY();
			$this->_z = $vector['dest']->getZ() - $orig->getZ();
			$this->_w = 0;
		}
		if (self::$verbose) {
			printf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
		}
	}

	function __destruct() {
		if (self::$verbose) {
			printf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f ) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
		}
	}

	function __toString() {
		return (vsprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", array($this->_x, $this->_y, $this->_z, $this->_w)));
	}

	function magnitude() {
		return ((float)sqrt(pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2)));
	}
	
	function normalize() {
		$mag = $this->magnitude();
		if ($mag === 1) {
			return clone $this;
		} else if ($mag > 0) {
			$xn = $this->_x / $mag;
			$yn = $this->_y / $mag;
			$zn = $this->_z / $mag;
			$wn = $this->_w / $mag;
			return (new Vector(array('dest' => new Vertex(array('x' => $xn, 'y' => $yn, 'z' => $zn, 'w' => $wn)), 'orig' => new Vertex(array('x' => 0, 'y' => 0, 'z' => 0, 'w' => 0)))));
		}
	}
	
	public static function doc() {
		$read = fopen("Vector.doc.txt", 'r');
		echo "\n";
		while ($read && !feof($read))
			echo fgets($read);
		echo "\n";
	}
	
	function add( Vector $add ) {
		$v1 = new Vertex(array('x' => $this->_x + $add->getX(), 'y' => $this->_y + $add->getY(), 'z' => $this->_z + $add->getZ(), 'w' => 0));
		return (new Vector(array('dest' => $v1)));	
	}
	
	function sub( Vector $sub ) {
		$v1 = new Vertex(array('x' => $this->_x - $sub->getX(), 'y' => $this->_y - $sub->getY(), 'z' => $this->_z - $sub->getZ(), 'w' => 0));
		return (new Vector(array('dest' => $v1)));
	}

	function opposite() {
		$v1 = new Vertex(array('x' => $this->_x * -1, 'y' => $this->_y * -1, 'z' => $this->_z * -1, 'w' => 0));
		return (new Vector(array('dest' => $v1)));
	}
	
	function scalarProduct( $k ) {
		$v1 = new Vertex(array('x' => $this->_x * $k, 'y' => $this->_y * $k, 'z' => $this->_z * $k, 'w' => 0));
		return (new Vector(array('dest' => $v1)));
	}
	
	function dotProduct( Vector $rhs ) {
		return ($this->_x * $rhs->getX() + $this->_y * $rhs->getY() + $this->_z * $rhs->getZ() + 0);
	}
	
	function crossProduct( Vector $rhs ) {
		$cx1 = $this->_y * $rhs->getZ();
		$cx2 = $this->_z * $rhs->getY();
		$cy1 = $this->_z * $rhs->getX();
		$cy2 = $this->_x * $rhs->getZ();
		$cz1 = $this->_x * $rhs->getY();
		$cz2 = $this->_y * $rhs->getX();
		$v1 = new Vertex(array('x' => $cx1 - $cx2, 'y' => $cy1 - $cy2, 'z' => $cz1 - $cz2, 'w' => 0));
		return (new Vector(array('dest' => $v1)));
	}
	
	function cos( Vector $rhs ) {
		return ((($this->_x * $rhs->_x) + ($this->_y * $rhs->_y) + ($this->_z * $rhs->_z)) / sqrt((($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z)) * (($rhs->_x * $rhs->_x) + ($rhs->_y * $rhs->_y) + ($rhs->_z * $rhs->_z))));
	}
	/*

	float cos( Vector $rhs )
			retourne le cosinus de l’angle entre deux vecteurs.
*/

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
}
?>