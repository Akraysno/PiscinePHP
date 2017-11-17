<?php
class Tyrion extends Stark {
	function sleepWith( $v ) {
		if ($v instanceof Cersei)
			print ( "Not even if I'm drunk !" . PHP_EOL );
		if ($v instanceof Jaime)
			print ( "Not even if I'm drunk !" . PHP_EOL );
		if ($v instanceof Sansa)
			print ( "Let's do this." . PHP_EOL );
	}
}
?>