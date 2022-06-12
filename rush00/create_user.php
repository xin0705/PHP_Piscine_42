<?php
	session_start();
	include("./templates/header.php");
	
	echo '
	<main>
	<div class="first-section flex-container" id="flex_forms">
		<div class="forms">
			<div class="banner-text flex-container">
				<h3>Sign up</h3>
				<form action="./create_user.php" method="post">
					<p>Username: <input type="text" name="login" value=""></p>
					<br />
					<p>Password: <input type="password" name="passwd" value=""></p>
					<br />
					<p><input type="submit" name="submit" value="OK"></p>
				</form>
			</div>
		</div>
	</div>
	</main>
	</body>
	
	</html>
	';

	if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] && $_POST['submit'] === "OK")
	{
		$file_path = './private/passwd';
		$folder = './private';

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
		{
			echo "The username has been registered\n";
			echo '<a href="create_user.html">back to input another name </a>';
		}
	}
	else 
	{
		echo "input invalid\n";
		echo '<a href="create_user.html">back to input another name </a>';
	}
?>

