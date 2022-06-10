#!/usr/bin/php
<?php

function download_img($img_url, $img_file)
{
	$file = fopen ($img_file, 'w+');
	$ch = curl_init($img_url);
	curl_setopt($ch, CURLOPT_FILE, $file);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 2000);
	curl_exec($ch);
	curl_close($ch);
	fclose($file);
}

$url = $argv[1];

if (!filter_var($url, FILTER_VALIDATE_URL))
	die("Not a valid URL\n");

$page = file_get_contents($url);

if (preg_match_all('/<img\s+[^>]*src="([^"]*\.\w+)"[^>]*>/is', $page, $matches))
{
	$folder = parse_url($url)["host"];
	mkdir($folder);
	foreach($matches[1] as $i => $match)
		download_img($match, $folder . '/' . basename($match));
}

?>