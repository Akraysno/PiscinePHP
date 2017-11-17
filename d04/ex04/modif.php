<?php
if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] && $_POST['submit'] === "OK")
{
	if (!file_exists('../htdocs/private'))
		mkdir("../htdocs/private");
	if (!file_exists('../htdocs/private/passwd'))
		file_put_contents('../htdocs/private/passwd', null);
	$save = unserialize(file_get_contents('../htdocs/private/passwd'));
	if (empty($save))
		echo "ERROR\n";
	else
	{
		$exist = 0;
		foreach($save as $key => $value)
		{
			echo "login: ".$value['login']."    passwd: ".$value['passwd']."newpasswd".hash("whirlpool", $_POST['oldpw'])."\n";
			echo $save."\n";
			if ($value['login'] === $_POST['login'] && $value['passwd'] === hash("whirlpool", $_POST['oldpw']))
			{
				$exist = 1;
				$save[$key]['passwd'] = hash("whirlpool", $_POST['newpw']);
			}
		}
		if ($exist)
		{
			file_put_contents('../htdocs/private/passwd', serialize($save));
			echo "OK\n";
			header('Location: index.html');
		}
		else
			echo "ERROR\n";
	}
}
else
	echo "ERROR\n";
?>