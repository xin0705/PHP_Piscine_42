
<?php
session_start();
if($_SESSION["loggued_on_user"] == "admin")
{
include("./templates/header.php");
echo '
	<main>
	<div class=landing>
		<h2 style="text-align: center; padding-bottom: 1rem;">Welcome to Admin page</h2>
		<a href="create_user.php">   <   Add Users  >    </a>
		<a href="create_products.php"><  Add Products  >       </a>
	<a href="create_categories.php"> <   Add Categories  >   </a>
	<a href="order.php"> <    View Orders  ></a>
		</div>

	<div class="wrapper">

';
include('product_list.php');
// include('category_list.php');
echo '
	</div>
</body>
</html>';
}
else 
	header("Location: ./index.php");