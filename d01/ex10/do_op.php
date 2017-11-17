#!/usr/bin/php
<?php
if ($argc != 4)
	echo "Incorrect Parameters\n";
else
{
	array_shift($argv);
	$tab = array();
	$tab[0] = trim($argv[0], " \t");
	$tab[1] = trim($argv[1], " \t");
	$tab[2] = trim($argv[2], " \t");
	if ($tab[1] == "+")
		echo $tab[0] + $tab[2];
	if ($tab[1] == "-")
		echo $tab[0] - $tab[2];
	if ($tab[1] == "*")
		echo $tab[0] * $tab[2];
	if ($tab[1] == "/")
		echo $tab[0] / $tab[2];
	if ($tab[1] == "%")
		echo $tab[0] % $tab[2];
	echo "\n";
}
?>