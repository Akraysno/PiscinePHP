#!/usr/bin/php
<?php
if ($argc == 2)
{
	date_default_timezone_set('Europe/Paris');
	$date = array_filter(explode(" ", $argv[1]));
	$week = array (1 => "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
	$month = array(1 => "Janvier", "Février", "Mars", "Avril", "Mais", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
	$date[0] = array_search(ucfirst($date[0]), $week);
	$date[2] = array_search(ucfirst($date[2]), $month);
	if(count($date) == 5 && $date[0] && $date[2] &&
	   preg_match("/^[1-9]$|^0[1-9]$|^[1-2][0-9]$|^3[0-1]$/", $date[1], $date[1]) === 1 &&
	   preg_match("/^19[7-9][0-9]$|^[2-9][0-9][0-9][0-9]$/", $date[3], $date[3]) === 1 &&
	   preg_match("/^([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/", $date[4], $date[4]) === 1)
	{
		$time = mktime($date[4][1], $date[4][2], $date[4][3], $date[2], $date[1][0], $date[3][0]);
		echo $time."\n";
	}
	else
		echo "Wrong Format\n";
}
?>