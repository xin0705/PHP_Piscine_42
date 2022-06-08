#!/usr/bin/php
<?php
	if ($argc == 2)
	{
		$str = trim($argv[1]);
		$str_singlespace = preg_replace('/\s+/'," ",$str);
		echo $str_singlespace."\n";
	}
	else
		exit (0);
?>