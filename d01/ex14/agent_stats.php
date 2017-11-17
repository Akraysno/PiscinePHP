#!/usr/bin/php
<?php

function calc_moyenne($data)
{
	$total = 0;
	$nb_note = 0;

	foreach ($data as $line)
	{
		if ($line[2] !== "moulinette" && $line[1] !== '')
		{
			$nb_note++;
			$total += $line[1];
		}
	}
	$moyenne = $total / $nb_note;
	echo $moyenne."\n";
}

function calc_moyenne_user($data)
{
	$moyenne_user = array();
	
	foreach ($data as $line)
	{
		if ($line[2] !== "moulinette" && $line[1] !== '')
		{
			$moyenne_user[$line[0]][0] = $line[0];
			$moyenne_user[$line[0]][1] += $line[1];
			$moyenne_user[$line[0]][2]++;
		}
	}
	return ($moyenne_user);
}

function calc_ecart_moulinette($data)
{
	$moyenne_user = calc_moyenne_user($data);
	$moyenne_ecart = array();
	
	foreach ($data as $line)
	{
		if ($line[2] === "moulinette" && $line[1] !== '')
		{
			$moyenne_ecart[$line[0]][0] = $line[0];
			$moyenne_ecart[$line[0]][1] += $line[1];
			$moyenne_ecart[$line[0]][2]++;
		}
	}
	foreach ($moyenne_user as $line)
	{
		$ecart = ($line[1] / $line[2]) - ($moyenne_ecart[$line[0]][1] / $moyenne_ecart[$line[0]][2]);
		echo $line[0].":".$ecart."\n";
	}
}

if ($argc < 2)
	exit ;
$data = array();
$i = 0;
$nb_line = 0;
while (!feof(STDIN))
{
	$line = trim(fgets(STDIN));
	if (!empty($line))
	{
		if ($nb_line == 0)
		{
			$head = explode(";", $line);
			if (count($head) != 4)
				exit ;
		}
		else
		{
			$data[$i] = explode(";", $line);
			if ((count($data[$i]) != 4))
				exit ;
			$i++;
		}
		$nb_line++;
	}
}
$data = array_filter($data);
array_multisort($data, SORT_ASC, SORT_REGULAR);
if (strcmp($argv[1], "moyenne") === 0)
{
	calc_moyenne($data);
}
else if (strcmp($argv[1], "moyenne_user") === 0)
{
	$moyenne_user = calc_moyenne_user($data);
	foreach ($moyenne_user as $line)
	{
		echo $line[0].":".$line[1]/$line[2]."\n";
	}
}
else if (strcmp($argv[1], "ecart_moulinette") === 0)
{
	calc_ecart_moulinette($data);
}
?>