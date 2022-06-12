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
				<form action="create_products.php" method="POST" >
		product name: <input type="text" name="product_name" value="">
		<br />
		product price:<input type="text" name="product_price" value="">
		<br />
		product img URL:<input type="text" name="product_img" value="">
		<br />
		product catalog:<input type="text" name="product_catelog" value="">
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

	if ($_POST['product_name'] && $_POST['product_price'] && $_POST['product_img'] && $_POST['product_catelog'] && $_POST['submit'] && $_POST['submit'] === "OK")
	{
		$file_path = './db/product.db';
		$folder = './db';

		if(!file_exists($folder))
			mkdir($folder);
		if(!file_exists($file_path))
			file_put_contents($file_path, null);

		$file_content = file_get_contents($file_path);
		$data = unserialize($file_content);
		
			$data[] = array(
			'product_name'=>$_POST['product_name'],
			'product_price'=>$_POST['product_price'],
			'product_img'=>$_POST['product_img'],
			'product_catelog'=>$_POST['product_catelog']
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
