<?php

    function get_safe_value($con,$str)
    {
        if($str!='')
        {
            return strip_tags(mysqli_real_escape_string($con,$str));
        }
    }
    
    function get_product($con,$category='',$product_id='',$search='',$order='',$limit='')
    {
        $sql="select product.*,category.category,sub_category.sub_category from product,category,sub_category where product.category_id=category.id and product.sub_category_id=sub_category.id and product.status=1";
        if($category!='')
        {
            $sql.=" and category.category='$category'";
        }
        if($product_id!='')
        {
            $sql.=" and product.id='$product_id'";
        }
        if($search!=''){
            $sql.=" and (product.name like '%$search%')";
        }
        if($order!='')
        {
            $sql.=" order by product.id asc";
        }
        else
        {
            $sql.=" order by product.id desc";
        }
        if($limit!='')
        {
            $sql.=" limit $limit";
        }
        
        $res=mysqli_query($con,$sql);
        $data=array();
        while($row=mysqli_fetch_assoc($res))
        {
            $data[]=$row;
        }
        return $data;
    }
?>
