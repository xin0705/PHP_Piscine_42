<?php
	if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] && $_POST['submit'] === "OK")
	{
		$file_path = '../private/passwd';
		$folder = '../private';

		if(!file_exists($folder))
			mkdir($folder);
		if(!file_exists($file_path))
			file_put_contents($file_path, null);
		
		$file_content = file_get_contents($file_path);
		$data = unserialize($file_content);

		$user_exist_flag = 0;
		if ($data)
		{
			foreach($data as $key => $value)
			{
				if ($value['login'] === $_POST['login'])
					$user_exist_flag = 1;
			}
		}
		if ($user_exist_flag == 0)
		{
			$new_usr['login'] = $_POST['login'];
			$new_usr['passwd'] = hash('whirlpool', $_POST['passwd']);
			$data[] = $new_usr;
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