<?php
if ($_POST['passwd'])
{
	$userDB_filepath = './private/passwd';
	$userDB_folder = './private';
	$DB_folder = './db';

	if(!file_exists($userDB_folder))
	 	mkdir($userDB_folder);
	if(!file_exists($userDB_filepath))
	 	file_put_contents($userDB_filepath, null);
	if(!file_exists($DB_folder))
	 	mkdir($DB_folder);
// initial admin account
	$admin_usr['login'] = 'admin';
	$admin_usr['passwd'] = hash('whirlpool', $_POST['passwd']);
			$data[] = $admin_usr;
			//print_r($data);
			$file_content = serialize($data);
			
			file_put_contents($userDB_filepath, $file_content);
	 if (file_get_contents($userDB_filepath))
	 	echo "the site was succesfully initialized\n";
	else
		echo "the site initial failed\n";	
}
else
	echo '<html>
	<head>
		<meta charset="UTF-8">
		<title>Site Initial</title>
	</head>
	<body>
		<h1>Please setup password for administrator</h1>
		<form action="" method="POST" >
			Username: <input type="text" name="login" value="admin" disabled = true>
			<br />
			Password: <input type="password" name="passwd" value="">
			<br />
			<input type="submit" name="submit" value="OK">
		</form>
	</body>
	</html>'
?>	

