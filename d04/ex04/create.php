<?php
if (isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['passwd']) && !empty($_POST['passwd']) && isset($_POST['submit']) && !empty($_POST['submit']) && $_POST['submit'] === "OK")
{
	if (!file_exists('../htdocs/private'))
		mkdir("../htdocs/private");
	if (!file_exists('../htdocs/private/passwd'))
		file_put_contents('../htdocs/private/passwd', null);
	$save = unserialize(file_get_contents('../htdocs/private/passwd'));
	$exist = 0;
	if (!empty(save))
	{
		foreach($save as $key => $value)
		{
			if ($value['login'] === $_POST['login'])
			{
				$exist = 1;
			}
		}
	}
	if ($exist)
		echo "ERROR\n";
	else
	{
		$data['login'] = $_POST['login'];
		$data['passwd'] = hash("whirlpool", $_POST['passwd']);
		$data2[] = $data;
		file_put_contents('../htdocs/private/passwd', serialize($data2), FILE_APPEND);
		echo "OK\n";
		header('Location: index.html');
	}
}
else
	echo "ERROR\n";
?>