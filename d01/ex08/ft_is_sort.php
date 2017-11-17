<?php
/*
#!/usr/bin/php
*/
function ft_is_sort($tab)
{
	$letter = 0;
	foreach($tab as $word)
	{
		if ($letter > ord($word))
			return false;
		$letter = ord($word);
	}
	return true;
}
?>