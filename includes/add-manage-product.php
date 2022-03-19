<?php
	require('config.php');
	require('functions.php');
	require('admin-header.php');
	$category_id='';
	$sub_category_id='';
	$name='';
	$brand='';
	$price='';
	$quantity='';
	$color='';
	$image='';
	$short_description='';
	$description='';

	$msg='';
	$image_required='required';

	if(isset($_GET['id']) && $_GET['id']!='')
	{
		$image_required='';
		$id=get_safe_value($con,$_GET['id']);
		$res=mysqli_query($con,"select * from product where id='$id'");
		$check=mysqli_num_rows($res);
		if($check > 0)
		{
			$row=mysqli_fetch_assoc($res);
			$category_id=$row['category_id'];
			$sub_category_id=$row['sub_category_id'];
			$name=$row['name'];
			$brand=$row['brand'];
			$price=$row['price'];
			$quantity=$row['quantity'];
			$color=$row['color'];
			$short_description=$row['short_description'];
			$description=$row['description'];
		}
		else
		{
			header('location:product.php');
			die();
		}
	}

	if(isset($_POST['submit']))
	{
		$category_id=get_safe_value($con,$_POST['category_id']);
		$sub_category_id=get_safe_value($con,$_POST['sub_category_id']);
		$name=get_safe_value($con,$_POST['name']);
		$brand=get_safe_value($con,$_POST['brand']);
		$price=get_safe_value($con,$_POST['price']);
		$quantity=get_safe_value($con,$_POST['quantity']);
		$color=get_safe_value($con,$_POST['color']);
		$short_description=get_safe_value($con,$_POST['short_description']);
		$description=$_POST['description'];
		
		$res=mysqli_query($con,"select * from product where name='$name'");
		$check=mysqli_num_rows($res);
		if($check > 0)
		{
			if(isset($_GET['id']) && $_GET['id']!='')
			{
				$getData=mysqli_fetch_assoc($res);
				if($id==$getData['id'])
				{
				
				}
				else
				{
					$msg="Product already exist";
				}
			}
			else
			{
				$msg="Product already exist";
			}
		}
		
		if($_FILES['image']['type']!='')
		{
			if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg')
			{
				$msg="Please select only png,jpg and jpeg image format";
			}
		}
	
		if($msg=='')
		{
			if(isset($_GET['id']) && $_GET['id']!='')
			{
				if($_FILES['image']['name']!='')
				{
					$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'],$image);
					$update_sql="update product set category_id='$category_id',sub_category_id='$sub_category_id',name='$name',brand='$brand',price='$price',quantity='$quantity',color='$color',short_description='$short_description',description='$description',image='$image' where id='$id'";
				}
				else
				{
					$update_sql="update product set category_id='$category_id',sub_category_id='$sub_category_id',name='$name',brand='$brand',price='$price',quantity='$quantity',color='$color',short_description='$short_description',description='$description' where id='$id'";
				}
				mysqli_query($con,$update_sql);
			}
			else
			{
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],$image);
				mysqli_query($con,"insert into product(category_id,sub_category_id,name,brand,price,quantity,color,short_description,description,status,image) values('$category_id','$sub_category_id','$name','$brand','$price','$quantity','$color','$short_description','$description',1,'$image')");
			}
			header('location:product.php');
			die();
		}
	}
?>