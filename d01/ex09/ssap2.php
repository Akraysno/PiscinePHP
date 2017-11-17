#!/usr/bin/php
<?php
array_shift($argv);
$tab = array();
foreach ($argv as $line)
	$tab = array_merge($tab, array_filter(explode(" ", $line)));
usort($tab, "strcasecmp");
$nb_w = 0;
$i = 0;
while (isset($tab[$i]))
{
	if ((ord($tab[$i]) >= ord("A") && ord($tab[$i]) <= ord("Z")) || (ord($tab[$i]) >= ord("a") && ord($tab[$i]) <= ord("z")))
	{
		if ($nb_w != 0)
			echo "\n";
		$nb_w++;
		echo "$tab[$i]";
		unset($tab[$i]);
	}
	$i++;
}
$tab = array_merge(array_filter($tab));
$i = 0;
while (isset($tab[$i]))
{
	if (ord($tab[$i]) >= ord("0") && ord($tab[$i]) <= ord("9"))
	{
		if ($nb_w != 0)
			echo "\n";
		$nb_w++;
		echo "$tab[$i]";
		unset($tab[$i]);
	}
	$i++;
}
foreach ($tab as $res)
{
	if ($nb_w != 0)
		echo "\n";
	echo "$res";
	$nb_w++;
}
if ($nb_w != 0)
	echo "\n";
?>