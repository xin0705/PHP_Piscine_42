#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		$str = trim($argv[1]);
		$str_singlespace = preg_replace('/\s+/'," ",$str);
		$res = explode(" ",$str_singlespace);
		$fisrt_elem = array_shift($res);
		array_push($res,$fisrt_elem);
		echo implode(" ",$res) . "\n";
	}
	else
		exit (0);
?>