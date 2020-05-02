<?php
session_start();
require_once('createdb.php');
//require_once('cartdb.php');
require_once('compo.php');
$database=new createdb("productdb","producttb");
//$dbase=new cartdb("catdb","cattb");
if(isset($_POST['Add']))
{
	//print_r($_POST['product_id']);
	if(isset($_SESSION['cart'])){
		$item_array_id=array_column($_SESSION['cart'],"product_id");
		//print_r($item_array_id);
		if(in_array($_POST['product_id'],$item_array_id))
		{
			echo"<script>alert('Product is already added!')</script>";
			echo"<script>window.location='fruits2.php'</script>";
			
		}
		else
		{
			$count=count($_SESSION['cart']);
			$item_array=array('product_id'=>$_POST['product_id']);
			$_SESSION['cart'][$count]=$item_array;
			//print_r($_SESSION['cart']);
			//$sql="INSERT INTO cattb(product_name,product_price,
		//product_img,product_quant)VALUES('product_name','product_price','product_img','1')";
		}
		
	}
	//print_r($_SESSION['cart']);
	else{
		$item_array=array('product_id'=>$_POST['product_id']);
		$_SESSION['cart'][0]=$item_array;
		//print_r($_SESSION['cart']);
	}
	
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require_once('header.php');
?>

<div class="cotainer">
<div class="row text-center py-5">
<?php
$result=$database->getdata();
while($row=mysqli_fetch_assoc($result))
{
	component($row['product_name'],$row['product_price'],$row['product_img'],$row['id']);
}?>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>