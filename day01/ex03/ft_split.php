<?php
	function ft_split($str)
	{
		$str_withoutspace = trim($str);
		$str_singlespace = preg_replace('/\s(?=\s)/',"\\1",$str_withoutspace);
		$res = explode(" ",$str_singlespace);
		sort($res);
		return $res;
	}
?>