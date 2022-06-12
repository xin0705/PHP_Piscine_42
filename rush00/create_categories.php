<?php
session_start();
include("./templates/header.php");
if($_SESSION["loggued_on_user"] == "admin")
{
echo '
<main>
<div class="first-section flex-container" id="flex_forms">
	<div class="forms">
		<div class="banner-text flex-container">
			<h3>Sign up</h3>
			<form action="create_categories.php" method="POST" >
			category id: <input type="text" name="category_id" value="">
			<br />
			category name: <input type="text" name="category_name" value="">
			<br />
			<input type="submit" name="submit" value="OK">
		</form>
		</div>
	</div>
</div>
</main>
</body>

</html>
';

	if ($_POST['category_name'] && $_POST['category_id']  && $_POST['submit'] && $_POST['submit'] === "OK")
	{
		$file_path = './db/category.db';
		$folder = './db';

		if(!file_exists($folder))
			mkdir($folder);
		if(!file_exists($file_path))
			file_put_contents($file_path, null);

		$file_content = file_get_contents($file_path);
		$data = unserialize($file_content);
		
			$data[] = array(
			'category_id'=>$_POST['category_id'],
			'category_name'=>$_POST['category_name'],
			);
		//print_r($data);
			$file_content = serialize($data);
		
			file_put_contents($file_path, $file_content);
			echo "product was successfuly added\n";
			echo '<a href="admin.php">back to admin page </a>';
	}
}
else 
	header("Location: ./index.php");
?>