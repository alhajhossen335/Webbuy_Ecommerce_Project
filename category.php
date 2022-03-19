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
            $update_status_sql="update category set status='$status' where id='$id'";
            mysqli_query($con,$update_status_sql);
        }
        
        if($type=='delete')
        {
            $id=get_safe_value($con,$_GET['id']);
            $delete_sql="delete from category where id='$id'";
            mysqli_query($con,$delete_sql);
        }
    }

    $sql="select * from category order by category asc";
    $res=mysqli_query($con,$sql);
?>

<div class="admin-category">
    <div class="common-block">
        <div class="category-box">
            <div class="card">
                <div class="card-body title">
                    <h4 class="box-title">
                        Categories
                    </h4>
                    <a class="text-warning" href="add-category.php">Add Categories</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="box-table">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Categories</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            
                            <tbody class="text-center">
                                <?php 
                                while($row = mysqli_fetch_assoc($res)){?>
                                <tr>
                                    <td><?php echo $row['id']?></td>
                                    <td><?php echo $row['category']?></td>
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
                                        echo "<button class='status-btns bg-blue'><a href='manage-category.php?id=".$row['id']."'>Edit</a></button>&nbsp;";
                                        
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