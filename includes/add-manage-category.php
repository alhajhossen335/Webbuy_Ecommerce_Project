<?php
	require('config.php');
    require('functions.php');
    require('admin-header.php');
	$category='';
	$msg='';
    if(isset($_GET['id']) && $_GET['id']!='')
    {
		$id=get_safe_value($con,$_GET['id']);
		$res=mysqli_query($con,"select * from category where id='$id'");
		$check=mysqli_num_rows($res);
        if($check>0)
        {
			$row=mysqli_fetch_assoc($res);
			$category=$row['category'];
        }
        else
        {
			header('location:category.php');
			die();
		}
	}

    if(isset($_POST['submit']))
    {
		$category=get_safe_value($con,$_POST['category']);
		$res=mysqli_query($con,"select * from category where category='$category'");
		$check=mysqli_num_rows($res);
        if($check>0)
        {
            if(isset($_GET['id']) && $_GET['id']!='')
            {
				$getData=mysqli_fetch_assoc($res);
                if($id==$getData['id'])
                {
				
                }
                else
                {
                    $msg="Category already exist";
                }
            }
            else
            {
                $msg="Category already exist";
            }
		}
		
        if($msg=='')
        {
            if(isset($_GET['id']) && $_GET['id']!='')
            {
				mysqli_query($con,"update category set category='$category' where id='$id'");
            }
            else
            {
				mysqli_query($con,"insert into category(category,status) values('$category','1')");
            }
			header('location:category.php');
			die();
		}
	}
?>