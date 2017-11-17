<?php

/*
** #!/usr/bin/php
*/

function ft_split($line)
{
	$ret = array_filter(explode(" ", $line));
	sort($ret);
	return ($ret);
}
?>