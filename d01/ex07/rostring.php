#!/usr/bin/php
<?php
if (!empty($argv[1]))
{
	$tab = array_filter(explode(" ", $argv[1]));
	$nb_w = 0;
	if ($tab[0])
	{
		foreach ($tab as $res)
		{
			if ($nb_w != 0)
				echo "$res ";
			$nb_w++;
		}
	}
	echo $tab[0]."\n";
}
else
	exit ;
?>