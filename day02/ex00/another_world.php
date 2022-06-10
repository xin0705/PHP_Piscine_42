#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		if ($argv[1])
		{
			$str = trim($argv[1]);
			$res = preg_replace("/\s+/", ' ' ,$str);
			echo $res . "\n";
		}
	}
?>