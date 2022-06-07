#!/usr/bin/php
<?php
	if ($argc == 2)
	{
		$str = trim($argv[1]);
		$str_singlespace = preg_replace('/\s(?=\s)/',"\\1",$str);
		echo $str_singlespace."\n";
	}
	else
		exit (0);
?>