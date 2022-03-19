<?php
	require('config.php');
    require('functions.php');
    require('admin-header.php');

    $category_id='';
	$sub_category='';
	$msg='';
    if(isset($_GET['id']) && $_GET['id']!='')
    {
		$id=get_safe_value($con,$_GET['id']);
		$res=mysqli_query($con,"select * from sub_category where id='$id'");
		$check=mysqli_num_rows($res);
        if($check>0)
        {
			$row=mysqli_fetch_assoc($res);
            $sub_category=$row['sub_category'];
            $category_id=$row['category_id'];
        }
        else
        {
			header('location:subcategory.php');
			die();
		}
	}

    if(isset($_POST['submit']))
    {
        $sub_category=get_safe_value($con,$_POST['sub_category']);
        $category_id=get_safe_value($con,$_POST['category_id']);
		$res=mysqli_query($con,"select * from sub_category where category_id='$category_id' and sub_category='$sub_category'");
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
                    $msg="Subcategory already exist";
                }
            }
            else
            {
                $msg="Subcategory already exist";
            }
		}
		
        if($msg=='')
        {
            if(isset($_GET['id']) && $_GET['id']!='')
            {
				mysqli_query($con,"update sub_category set category_id='$category_id', sub_category='$sub_category' where id='$id'");
            }
            else
            {
				mysqli_query($con,"insert into sub_category(category_id,sub_category,status) values('$category_id','$sub_category','1')");
            }
			header('location:subcategory.php');
			die();
		}
	}
?>