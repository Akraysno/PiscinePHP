<?php
class Jaime extends Stark {
	function sleepWith( $v ) {
		if ($v instanceof Cersei) 
			print ( "With pleasure, but only in a tower in Winterfell, then." . PHP_EOL );
		if ($v instanceof Tyrion) 
			print ( "Not even if I'm drunk !" . PHP_EOL );
		if ($v instanceof Sansa) 
			print ( "Let's do this." . PHP_EOL );
	}
}
?>