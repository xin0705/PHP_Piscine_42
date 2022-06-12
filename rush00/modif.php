<?php

include("./templates/header.php");
echo '
<main>
<div class="first-section flex-container" id="flex_forms">
	<div class="forms">
		<div class="banner-text flex-container">
			<h3>Change password</h3>
			<form action="modif.php" method="post">
				<p>Login: <input type="text" name="login"></p>
				<p>Old password: <input type="password" name="oldpw"></p>
				<p>New password: <input type="password" name="newpw"></p>
				<p><input type="submit" name="submit" value="OK"></p>
			</form>
		</div>
	</div>
</div>
</main>
</body>

</html>
';

	$file_path = './private/passwd';
	$folder = './private';

	if ($_POST['submit'] != 'OK' || $_POST['login'] == "" || $_POST['oldpw'] == "" || $_POST['newpw'] == "" || $_POST['oldpw'] == $_POST['newpw']) 
		return;
	
	
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
			header("Location: ./index.php");
		}

?>