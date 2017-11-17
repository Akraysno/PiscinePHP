<?php
if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] && $_POST['submit'] === "OK")
{
	if (!file_exists('../htdocs/private'))
		mkdir("../htdocs/private");
	if (!file_exists('../htdocs/private/passwd'))
		file_put_contents('../htdocs/private/passwd', null);
	$save = unserialize(file_get_contents('../htdocs/private/passwd'));
	if (!$save)
		echo "ERROR\n";
	else
	{
		$exist = 0;
		foreach($save as $key => $value)
		{
			if ($value['login'] === $_POST['login'] && $value['passwd'] === hash("whirlpool", $_POST['oldpw']))
				$exist = 1;
		}
		if ($exist)
		{
			$data['login'] = $_POST['login'];
			$data['passwd'] = hash("whirlpool", $_POST['newpw']);
			$data2[] = $data;
			file_put_contents('../htdocs/private/passwd', serialize($data2));
			echo "OK\n";
		}
		else
			echo "ERROR\n";
	}
}
else
	echo "ERROR\n";
?>