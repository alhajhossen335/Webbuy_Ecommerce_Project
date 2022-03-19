<?php
    require('includes/config.php');
    require('includes/functions.php');
    require('includes/admin-header.php');

    if(isset($_GET['type']) && $_GET['type']!='')
    {
        $type=get_safe_value($con,$_GET['type']);
        if($type=='status')
        {
            $operation=get_safe_value($con,$_GET['operation']);
            $id=get_safe_value($con,$_GET['id']);
            if($operation=='active')
            {
                $status='1';
            }
            else
            {
                $status='0';
            }
            $update_status_sql="update product set status='$status' where id='$id'";
            mysqli_query($con,$update_status_sql);
        }
        
        if($type=='delete')
        {
            $id=get_safe_value($con,$_GET['id']);
            $delete_sql="delete from product where id='$id'";
            mysqli_query($con,$delete_sql);
        }
    }
    
    $sql="select product.*,category.category,sub_category.sub_category from product,category,sub_category where product.category_id=category.id and product.sub_category_id=sub_category.id";
    $res=mysqli_query($con,$sql);
?>

<div class="product">
    <div class="common-block">
        <div class="product-box">
            <div class="card">
                <div class="card-body title">
                    <h4 class="box-title">
                        Products
                    </h4>
                    <a class="text-warning" href="add-product.php">Add Products</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="box-table">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>Name</th>
                                    <th>Brand</th>
                                    <th>Image</th>
                                    <th>Color</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            
                            <tbody class="text-center">
                                <?php 
                                while($row=mysqli_fetch_assoc($res)){?>
                                <tr>
                                    <td><?php echo $row['id']?></td>
                                    <td><?php echo $row['category']?></td>
                                    <td><?php echo $row['sub_category']?></td>
                                    <td><?php echo $row['name']?></td>
                                    <td><?php echo $row['brand']?></td>
                                    <td><img src="<?php echo $row['image']?>"/></td>
                                    <td><?php echo $row['color']?></td>
                                    <td><?php echo $row['price']?></td>
                                    <td><?php echo $row['quantity']?></td>
                                    <td>
                                        <?php
                                        if($row['status']==1)
                                        {
                                            echo "<button class='status-btns bg-green'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></button>&nbsp;";
                                        }
                                        else
                                        {
                                            echo "<button class='status-btns bg-brown'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></button>&nbsp;";
                                        }
                                        echo "<button class='status-btns bg-blue'><a href='manage-product.php?id=".$row['id']."'>Edit</a></button>&nbsp;";
                                        
                                        echo "<button class='status-btns bg-red'><a href='?type=delete&id=".$row['id']."'>Delete</a></button>";                                        
                                        ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    require('includes/admin-footer.php');
?>