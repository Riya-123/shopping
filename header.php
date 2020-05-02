<header id="header">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
<div class="mr-auto"></div>
<div class="navbar-nav">
<a href="cart.php" class="nav-item nav-link active">
<h5 style=" right:0px">
<i class="fa fa-shopping-cart"></i>Cart
<?php
if(isset($_SESSION['cart']))
{
	$count=count($_SESSION['cart']);
	echo"<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
}
else
{
	echo"<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
}
?>
</h5>
</a>
</div>
</div>
</nav>
</header>