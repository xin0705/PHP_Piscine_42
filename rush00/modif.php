<?php
	$file_path = '../private/passwd';
	$folder = '../private';

	if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] && $_POST['submit'] === "OK" && file_exists($file_path))
	{
	
		$file_content = file_get_contents($file_path);
		$data = unserialize($file_content);

		$user_valid_flag = 0;

		if ($data)
		{
			foreach($data as $key => $value)
			{
				if ($value['login'] == $_POST['login'] && $value['passwd'] == hash('whirlpool', $_POST['oldpw']))
				{
					$user_valid_flag = 1;
					$data[$key]['passwd'] = hash('whirlpool', $_POST['newpw']);
				}
			}
		}
		if ($user_valid_flag == 1)
		{
			$file_content = serialize($data);
			file_put_contents($file_path, $file_content);
			echo "OK\n";
		}
		else
			echo "ERROR\n";
	}
	else 
		echo "ERROR\n";
?>