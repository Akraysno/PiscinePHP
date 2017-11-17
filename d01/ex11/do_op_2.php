#!/usr/bin/php
<?php

function check_ope($line)
{
	$i = 0;
	$nb_ope = 0;
	$ope = 0;
	while (isset($line[$i]))
	{
		if ($line[$i] == '+')
		{
			$nb_ope++;
			$ope = 1;
		}
		if ($line[$i] == '-')
		{
			$nb_ope++;
			$ope = 2;
		}
		if ($line[$i] == '/')
		{
			$nb_ope++;
			$ope = 3;
		}
		if ($line[$i] == '*')
		{
			$nb_ope++;
			$ope = 4;
		}
		if ($line[$i] == '%')
		{
			$nb_ope++;
			$ope = 5;
		}
		$i++;
	}
	if ($nb_ope != 1)
		return (0);
	else
		return $ope;
}

function char_ope($ope)
{
	if ($ope == 1)
		return ('+');
	if ($ope == 2)
		return ('-');
	if ($ope == 3)
		return ('/');
	if ($ope == 4)
		return ('*');
	if ($ope == 5)
		return ('%');
}

function verif_nb_words($line)
{
	$nb_words = 0;
	$i = 0;
	while (isset($line[$i]))
	{
		if ($line[$i] == ' ')
		{
			while (isset($line[$i]) && $line[$i] == ' ')
				$i++;
		}
		else
		{
			$nb_words++;
			while (isset($line[$i]) && $line[$i] != ' ')
				$i++;
		}
	}
	return ($nb_words);
}

if ($argc != 2)
	echo "Incorrect Parameters\n";
else
{
	$nb_words = verif_nb_words($argv[1]);
	$ope = check_ope($argv[1]);
	if ($ope == 0 || $nb_words > 3)
		echo "Syntax Error\n";
	else
	{
		$str_ope = str_replace(" ", "", $argv[1]);
		$char_ope = char_ope($ope);
		$part1 = strstr($str_ope, $char_ope, true);
		$tmp = strstr($str_ope, $char_ope);
		$part2 = substr($tmp, 1);
		if (is_numeric($part1) && is_numeric($part2))
		{
			if ($char_ope == '+')
				echo $part1 + $part2."\n";
			if ($char_ope == '-')
				echo $part1 - $part2."\n";
			if ($char_ope == '*')
				echo $part1 * $part2."\n";
			if ($char_ope == '/')
				echo $part1 / $part2."\n";
			if ($char_ope == '%')
				echo $part1 % $part2."\n";
		}
		else
			echo "Syntax Error\n";
	}
}
?>