#!/usr/bin/php
<?php
$ret = array_filter(explode(" ", $argv[1]));
$nb_w = 0;
foreach($ret as $word)
{
	if ($nb_w != 0)
		echo " ";
	echo "$word";
	$nb_w++;
}
if ($nb_w != 0)
	echo "\n";
?>