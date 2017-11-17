<?php
if ($_GET["action"] && $_GET["name"])
{
	if ($_GET["action"] === "set" && $_GET["value"] && $_GET["name"])
		setcookie($_GET["name"], $_GET["value"], time()+60*60*24);
	if ($_GET["action"] === "get" && $_GET["name"] && $_COOKIE[$_GET["name"]])
		echo $_COOKIE[$_GET["name"]]."\n";
	if ($_GET["action"] === "del" && $_GET["name"])
		setcookie($_GET["name"], "", time()-1);
}
?>
