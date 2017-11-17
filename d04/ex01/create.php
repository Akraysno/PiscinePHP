<?php
if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] && $_POST['submit'] === "OK")
{
	if (!file_exists('../htdocs'))
		mkdir("../htdocs");
	if (!file_exists('../htdocs/private'))
		mkdir("../htdocs/private");
	if (!file_exists('../htdocs/private/passwd'))
		file_put_contents('../htdocs/private/passwd', null);
	$save = unserialize(file_get_contents('../htdocs/private/passwd'));
	$exist = 0;
	if ($save)
	{
		foreach($save as $key => $value)
		{
			if ($value['login'] === $_POST['login'])
				$exist = 1;
		}
	}
	if ($exist)
		echo "ERROR\n";
	else
	{
		$data['login'] = $_POST['login'];
		$data['passwd'] = hash("whirlpool", $_POST['passwd']);
		$save[] = $data;
		file_put_contents('../htdocs/private/passwd', serialize($save));
		echo "OK\n";
	}
}
else
	echo "ERROR\n";
?>