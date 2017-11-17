<?php
function auth($login, $passwd)
{
	$save = unserialize(file_get_contents('../htdocs/private/passwd'));
	if (!$save || !$login || !$passwd)
		return FALSE;
	else
	{
		foreach($save as $key => $value)
		{
			if ($value['login'] === $login && $value['passwd'] === hash("whirlpool", $passwd))
				return TRUE;
		}
		return FALSE;
	}
}
?>