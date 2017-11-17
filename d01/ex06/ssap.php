#!/usr/bin/php
<?php
array_shift($argv);
$tab = array();
foreach ($argv as $line)
{
	$ret = array_filter(explode(" ", $line));
	$tab = array_merge($tab, $ret);
}
sort($tab);
if (count($tab) == 0)
	exit ;
foreach ($tab as $res)
{
	echo "$res\n";
}
?>