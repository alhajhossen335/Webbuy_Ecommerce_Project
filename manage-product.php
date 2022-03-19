<?php
    require('includes/add-manage-product.php');
?>

<div class="edit-product">
    <div class="common-block">
        <div class="product-box">
            <div class="card">
                <div class="card-header">
                    <h4 class="box-title">
                        Enter Product
                    </h4>
                </div>
                
                <form method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="category_id" class="form-control-label">Category</label>
                            <select class="form-control" name="category_id" required>
                                <option>Select Category</option>
                                <?php
                                    $res=mysqli_query($con,"select id,category from category order by category asc");
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        if($row['id']==$category_id)
                                        {
                                            echo "<option selected value=".$row['id'].">".$row['category']."</option>";
                                        }
                                        else
                                        {
                                            echo "<option value=".$row['id'].">".$row['category']."</option>";
                                        }
                                        
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="sub_category_id" class="form-control-label">Subcategory</label>
                            <select class="form-control" name="sub_category_id" required>
                                <option>Select Subcategory</option>
                                <?php
                                $res=mysqli_query($con,"select id,sub_category from sub_category order by sub_category asc");
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    if($row['id']==$sub_category_id)
                                    {
                                        echo "<option selected value=".$row['id'].">".$row['sub_category']."</option>";
                                    }
                                    else
                                    {
                                        echo "<option value=".$row['id'].">".$row['sub_category']."</option>";
                                    }
                                    
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name" class="form-control-label">Product Name</label>
                            <input type="text" name="name" placeholder="Enter product name" class="form-control" required value="<?php echo $name?>">
                        </div>

                        <div class="form-group">
                            <label for="brand" class="form-control-label">Brand</label>
                            <input type="text" name="brand" placeholder="Enter brand name" class="form-control" value="<?php echo $brand?>">
                        </div>
                                                
                        <div class="form-group">
                            <label for="price" class="form-control-label">Price</label>
                            <input type="text" name="price" placeholder="Enter product price" class="form-control" required value="<?php echo $price?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="quantity" class="form-control-label">Quantity</label>
                            <input type="text" name="quantity" placeholder="Enter quantity" class="form-control" required value="<?php echo $quantity?>">
                        </div>

                        <div class="form-group">
                            <label for="color" class="form-control-label">Color</label>
                            <input type="text" name="color" placeholder="Enter color" class="form-control" value="<?php echo $color?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="image" class=" form-control-label">Image</label>
                            <input type="file" name="image" class="form-control" <?php echo  $image_required?>>
                        </div>
                        
                        <div class="form-group">
                            <label for="short_description" class="form-control-label">Short Description</label>
                            <textarea name="short_description" placeholder="Enter product short description" class="form-control"><?php echo $short_description?></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="description" class="form-control-label">Description</label>
                            <textarea name="description" placeholder="Enter product description" class="form-control"><?php echo $description?></textarea>
                        </div>

                        <button type="submit" name="submit" class="admin-btn">Submit</button>
                        <div class="field-error"><?php echo $msg?></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
         
<?php
    require('includes/admin-footer.php');
?>