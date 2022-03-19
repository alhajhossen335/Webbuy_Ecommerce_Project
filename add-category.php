<?php
    require('includes/add-manage-category.php');
?>

<div class="add-category">
    <div class="common-block">
        <div class="category-box">
            <div class="card">
                <div class="card-header">
                    <h4 class="box-title">
                        Enter New Category
                    </h4>
                </div>
                <form method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="category" class="form-control-label">Enter Category</label>
                            <input type="text" name="category" class="form-control">
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