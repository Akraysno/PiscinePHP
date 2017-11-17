#!/usr/bin/php
<?php
function ft_strtoupper($matches)
{
	return strtoupper($matches[0]);
}

function ft_replace($matches)
{
	$matches = preg_replace_callback('/(?<=title=")(?:.|\n)*(?=")/iU', 'ft_strtoupper', $matches);
	$matches = preg_replace_callback('/(?<=>)(?!<.*>)(?:.|\n)*(?=<)/iU', 'ft_strtoupper', $matches);
	return $matches[0];
}

if ($argc == 2)
{
	$file = file_get_contents($argv[1]);
	$file = preg_replace_callback('/<a(?:.|\n)+<\/a>/iU', 'ft_replace', $file);
	print($file);
}
?>