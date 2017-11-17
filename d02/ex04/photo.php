#!/usr/bin/php
<?php
function recup_site($url)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$file = curl_exec($ch);
	curl_close($ch);
	return ($file);
}

function found_img($file, $url)
{
	preg_match_all('/<img[^>]+src=([^\s>]+)/i', $file, $matches);
	foreach($matches[1] as $key => $value)
	{
		$matches[1][$key] = trim($value, "\"");
		if (!preg_match("/^http(s?):\/\//", $matches[1][$key]))
		{
			if (preg_match("/^\//", $matches[1][$key]))
			{
				preg_match("/^(http(s?):\/\/)([^\/]+)/", $url, $urlMatches);
				$matches[1][$key] = $urlMatches[1]."".$urlMatches[3]."".$matches[1][$key];
			}
			else
				$matches[1][$key] = $url."".$matches[1][$key];
		}
	}
	return($matches[1]);
}

function create_dest($url)
{
	$url = preg_replace("/.*:\/\//", "", $url);
	if (!file_exists($url) && !is_dir($url))
		mkdir($url);
	return ($url);
}

function recup_img_name($img, $url)
{
	preg_match("/.*?([^\/]+)$/", $img, $matches);
	return ($matches[1]);
}

function recup_img($path, $img, $url)
{
	foreach($img as $image)
	{
		$ch = curl_init($image);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
		$data = curl_exec($ch);
		$name = recup_img_name($image, $url);
		curl_close($ch);
		$fd = fopen($path."/".$name, "w");
		fwrite($fd, $data);
		fclose($fd);
	}
}

if ($argc == 2)
{
	$file = recup_site($argv[1]);
	if (!empty($file))
	{
		$img = found_img($file, $argv[1]);
		$path = create_dest($argv[1]);
		recup_img($path, $img, $argv[1]);
	}
}
?>