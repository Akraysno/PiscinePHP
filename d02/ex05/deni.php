#!/usr/bin/php
<?php

function recup_csv($file)
{
	if (file_exists($file) === FALSE || ($fd = fopen($file, "r")) === FALSE)
		exit(1);
	$nb_line = 0;
	$data_array = array();
	while (($data = fgetcsv($fd, 0, ";")) !== FALSE)
	{
		$data_array[$nb_line] = $data;
		$nb_line++;
	}
	if ($nb_line < 2)
		exit ;
	return ($data_array);
}

if ($argc != 3)
	exit(1);
$data = recup_csv($argv[1]);
$num_key = -1;
foreach ($data[0] as $key => $line)
{
	if (strcmp($line, $argv[2]) === 0)
	{
		$num_key = $key;
		break ;
	}
}
if ($num_key == -1)
	exit ;
foreach ($data[0] as $key => $head)
{
	${$head} = array();
	foreach ($data as $key2 => $line)
	{
		${$head}[$line[$num_key]] = $line[$key];
	}
}
while (1)
{
	echo "Entrez votre commande: ";
	$cmd = fgets(STDIN);
	if (feof(STDIN))
	{
		echo "^D\n";
		exit ;
	}
	eval( $cmd );
}
?>