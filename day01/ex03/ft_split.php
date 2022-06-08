<?php
	function ft_split($str)
	{
		$str_withoutspace = trim($str);
		$str_singlespace = preg_replace('/\s+/'," ",$str_withoutspace);
		$res = explode(" ",$str_singlespace);
		$res = array_filter($res);
		sort($res);
		return $res;
	}
?>