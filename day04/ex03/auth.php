<?php
	function auth($login, $passwd) 
	{
		if (!$login || !$passwd) 
			return false;
		$usr_pwd = unserialize(file_get_contents('../private/passwd'));
		foreach ($usr_pwd as $key => $user) 
		{
			if ($user['login'] === $login && $user['passwd'] === hash('whirlpool', $passwd))
				return true;
		}
		return false;
	}
?>