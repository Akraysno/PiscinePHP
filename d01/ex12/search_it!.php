#!/usr/bin/php
<?php
array_shift($argv);
$nb_arg = 0;
foreach($argv as $line)
{
	if ($nb_arg == 0)
		$search = $line;
	else
	{
		$tmp = strstr($line, ':', true);
		if (strcmp($tmp, $search) == 0)
		{
			$tmp = strstr($line, ':');
			$tmp2 = substr($tmp, 1);
		}
	}
	$nb_arg++;
}
if (isset($tmp2) && strlen($tmp2) >= 1)
	echo $tmp2."\n";
?>