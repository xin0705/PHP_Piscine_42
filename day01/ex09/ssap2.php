#!/usr/bin/php
<?php
	$res = array();
	$res_nb = array();
	
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
	
	function filter_nb($value)
	{
		if (is_numeric($value))
				return TRUE;
		else	
				return FALSE;
	}

	$res_nb = array_filter($res, "filter_nb")
print_r($res_nb);
//	sort($res_nb, SORT_STRING);
	foreach ($res as $elem)
		 echo "$elem\n";
?>