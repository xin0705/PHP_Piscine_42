#!/usr/bin/php
<?php

	function mysort_plus($elem1, $elem2)
	{
		$myorder = "abcdefghijklmnopqrstuvwxyz0123456789!\"
					#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
		$i = 0;
		while ($elem1[$i] || $elem2[$i])
		{
			$p1 = stripos($myorder, $elem1[$i]);
			$p2 = stripos($myorder, $elem2[$i]);
			if ($p1 < $p2)
				return (-1);
			if ($p1 > $p2)
				return (1);
			$i++;
		}
	}

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

	usort($res, "mysort_plus");
	foreach ($res as $elem)
		echo "$elem\n";
?>