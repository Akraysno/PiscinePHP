#!/usr/bin/php
<?php
if ($argc >= 2)
{
	$i = 0;
	$first = 0;
	while(isset($argv[1][$i]))
	{
		if (isset($argv[1][$i]) && $argv[1][$i] !== " " && $argv[1][$i] !== "\t")
		{
			if ($first == 1)
				echo ' ';
			while (isset($argv[1][$i]) && $argv[1][$i] !== " " && $argv[1][$i] !== "\t")
			{
				echo $argv[1][$i];
				$i++;
			}
			$first = 1;
		}
		if (isset($argv[1][$i]) && ($argv[1][$i] === " " || $argv[1][$i] === "\t"))
		{
			while (isset($argv[1][$i]) && ($argv[1][$i] === " " || $argv[1][$i] === "\t"))
			{
				$i++;
			}
		}
	}
	echo "\n";
}
?>