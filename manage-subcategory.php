<?php
    require('includes/add-manage-subcategory.php');
?>

<div class="edit-subcategory">
    <div class="common-block">
        <div class="subcategory-box">
            <div class="card">
                <div class="card-header">
                    <h4 class="box-title">
                        Edit Subcategory
                    </h4>
                </div>
                <form method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="category" class="form-control-label">Category</label>
                            <select class="form-control" name="category_id" required>
                                <option value="">Select Category</option>
                                <?php
                                    $res=mysqli_query($con,"select * from category where status='1'");
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        echo "<option value=".$row['id'].">".$row['category']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sub_category" class="form-control-label">Enter Subcategory</label>
                            <input type="text" name="sub_category" class="form-control" required value="<?php echo $sub_category ?>">
                        </div>
                        <button type="submit" name="submit" class="admin-btn">Submit</button>
                        <div class="field-error"><?php echo $msg ?></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
         
<?php
    require('includes/admin-footer.php');
?>