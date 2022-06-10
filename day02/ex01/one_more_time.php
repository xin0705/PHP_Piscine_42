#!/usr/bin/php
<?php
	
	date_default_timezone_set('Europe/Paris');
	$days = array(
		1 => "lundi",
		2 => "mardi",
		3 => "mercredi",
		4 => "jeudi",
		5 => "vendredi",
		6 => "samedi",
		7 => "dimanche"
	);

	$months = array(
		1 => "janvier",
		2 => "février",
		3 => "mars",
		4 => "avril",
		5 => "mai",
		6 => "juin",
		7 => "juillet",
		8 => "août",
		9 => "septembre",
		10 => "octobre",
		11 => "novembre",
		12 => "décembre"
	);

	function ft_invaid_input()
	{
		echo "Wrong Format\n";
		exit ();
	}
	if ($argc == 2)
	{
		$input_data = explode(" ", $argv[1]);
		// print_r($input_data);
		$datepattern = "/(^[1-9]$|^1[0-9]$|^2[0-9]$|^3[0-1])$/";
		$timepattern = "/(^[0-1][0-9]|^2[0-3]):([0-5][0-9]):([0-5][0-9])$/";
		$yearpattern = "/^[0-9]{4}$/";
		// if(preg_match($datepattern,$input_data[1]))
		// 	echo "date input data correct\n";
		// else
		// 	echo "date input data wrong\n";

		// if(preg_match($timepattern,$input_data[4]))
		// 	echo "time input data correct\n";
		// else
		// 	echo "time input data wrong\n";

		if (count($input_data) != 5 ||
			preg_match($datepattern, $input_data[1], $input_data[1]) === 0 ||
			preg_match($yearpattern, $input_data[3], $input_data[3]) === 0 ||
			preg_match($timepattern, $input_data[4], $input_data[4]) === 0) 
				ft_invaid_input();
			$input_data[0] = array_search(lcfirst($input_data[0]), $days);
			$input_data[2] = array_search(lcfirst($input_data[2]), $months);
			if (!$input_data[0] || !$input_data[2])
				ft_invaid_input();

			// print_r($input_data[3]);
			// print_r($input_data[2]);

			$result = mktime($input_data[4][1], $input_data[4][2], $input_data[4][3], $input_data[2], $input_data[1][0], $input_data[3][0]);
			if (date("N", $result) == $input_data[0])
				echo $result."\n";
			else
				ft_invaid_input();
	}
?>
