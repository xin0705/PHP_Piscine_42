<?php
	function ft_is_sort($tab)
	{
		$tab_sorted = $tab;
		sort($tab_sorted, SORT_STRING);
		if ($tab_sorted == $tab)
			return true;
		else
			return false;
	}
?>