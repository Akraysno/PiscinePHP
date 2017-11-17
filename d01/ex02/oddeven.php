#!/usr/bin/php
<?php
while (1)
{
	echo "Entrez un nombre: ";
	$in = trim(fgets(STDIN));
	if (feof(STDIN))
	{
		echo "^D\n";
		exit ;
	}
	if (is_numeric($in))
	{
		if ($in % 2 == 0)
			echo "Le chiffre $in est Pair\n";
		else
			echo "Le chiffre $in est Impair\n";
	}
	else
		echo "'$in' n'est pas un chiffre\n";
}
?>