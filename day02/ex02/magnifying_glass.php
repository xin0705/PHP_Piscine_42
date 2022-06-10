#!/usr/bin/php
<?php
	$pattern_a = "/(?<=)<a.*?<\/a>/ism";
	$pattern_t = "/(?<=>).*?<|(?<=title)=\"(.*?)\"/ism";
	if ($argc == 2)
	{
		$str = implode("", file($argv[1]));
		$str2 = $str;
		preg_match_all($pattern_a, $str, $match);
		$str = implode("", $match[0]);
		preg_match_all($pattern_t, $str, $match);
		foreach($match[0] as $string)
			$str2 = preg_replace("/$string/", strtoupper($string), $str2);
		echo $str2;
	}
?>