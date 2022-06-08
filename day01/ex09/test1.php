#!/usr/bin/php
<?php
	// $str1="123";
	// $str2="7";

	$arr =array("123","7");
	print_r($arr);
	sort($arr);
	print_r($arr);
	sort($arr, SORT_STRING);
	print_r($arr);
?>