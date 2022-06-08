<?php
	function ft_is_sort($tab)
	{
		$tab_sorted = $tab;
		sort($tab_sorted);
		if ($tab_sorted == $tab)
			return true;
		else
			return false;
	}
?>