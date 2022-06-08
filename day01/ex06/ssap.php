#!/usr/bin/php
<?php
	$res = array();
	if ($argc > 1)
	{
		for ($i = 1; $i < $argc; $i++)
		{
			$str = trim($argv[$i]);
			$str_singlespace = preg_replace('/\s+/'," ",$str);
			$res_elem = explode(" ",$str_singlespace);
			$res = array_merge($res_elem, $res);
			//$res = array_unique(array_merge($res_elem, $res));
		}
	}
	else
		exit (0);
	sort($res);
	//sort($res, SORT_STRING);
	foreach ($res as $elem)
		echo "$elem\n";
?>