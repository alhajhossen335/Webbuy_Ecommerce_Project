<?php
    require('includes/config.php');
    require('includes/functions.php');
    require('includes/admin-header.php');

    if(isset($_GET['type']) && $_GET['type']!='')
    {
        $type=get_safe_value($con,$_GET['type']);
        if($type=='delete')
        {
            $id=get_safe_value($con,$_GET['id']);
            $delete_sql="delete from users where id='$id'";
            mysqli_query($con,$delete_sql);
        }
    }

    $sql="select * from users";
    $res=mysqli_query($con,$sql);
?>

<div class="users">
    <div class="common-block">
        <div class="users-box">
            <div class="card">
                <div class="card-body title">
                    <h4 class="box-title">
                        Users
                    </h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="box-table">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact No.</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            
                            <tbody class="text-center">
                                <?php 
                                while($row=mysqli_fetch_assoc($res)){?>
                                <tr>
                                    <td><?php echo $row['id']?></td>
                                    <td><?php echo $row['name']?></td>
                                    <td><?php echo $row['email']?></td>
                                    <td><?php echo $row['contactNo']?></td>
                                    <td><?php echo $row['date']?></td>
                                    <td>
                                        <?php
                                        echo "<button class='status-btns bg-red'><a href='users.php?type=delete&id=".$row['id']."'>Delete</a></button>";
                                        ?>
                                    </td>
                                </tr>
                                <?php 
                                } ?>
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