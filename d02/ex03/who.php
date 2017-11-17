#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Paris');
$file = fopen("/var/run/utmpx", "r");
while ($utmpx = fread($file, 628)){
	$unpack = unpack("a256user/a4id/a32line/ipid/itype/I2time/a256host/i16pad", $utmpx);
	$array[$unpack['line']] = $unpack;
}
ksort($array);
foreach ($array as $v){
	if ($v['type'] == 7) {
		echo str_pad(substr(trim($v['user']), 0, 12), 12, " ")." ";
		echo str_pad(substr(trim($v['line']), 0, 8), 8, " ")." ";
		echo date("M", $v["time1"]);
		echo str_pad(date("j", $v["time1"]), 3, " ", STR_PAD_LEFT)." ".date("H:i", $v["time1"]);
		echo "\n";
	}
}
?>