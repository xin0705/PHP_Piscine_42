<style><?php include './css/style.css'; ?></style>
<?php
session_start();
include("./templates/header.php");
echo '
	<main>
	<div class=landing>
		<h2 style="text-align: center; padding-bottom: 1rem;">Welcome to the Hive Coffee Shop!</h2>
	</div>
	<div class="wrapper">
';
include('product_list.php');
// include('category_list.php');
echo '
	</div>
</body>
</html>';