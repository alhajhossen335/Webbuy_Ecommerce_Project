<?php
require('includes/config.php');
require('includes/functions.php');
require('add-to-cart.php');

$product_id=get_safe_value($con,$_POST['product_id']);
$quantity=get_safe_value($con,$_POST['quantity']);
$type=get_safe_value($con,$_POST['type']);

$obj=new add_to_cart();

if($type=='add')
{
	if(!isset($_SESSION['USER_LOGIN']))
	{
		echo "<script>alert('You must be signed in first.');</script>";
	}
	else
	{
		$obj->addProduct($product_id,$quantity);
	}
}

if($type=='remove')
{
	$obj->removeProduct($product_id);
}

if($type=='update')
{
	$obj->updateProduct($product_id,$quantity);
}

echo $obj->totalProduct();
?>