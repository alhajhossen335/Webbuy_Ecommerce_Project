<?php
    require('includes/config.php');
    require('includes/functions.php');
    require('includes/admin-header.php');

    
?>

<div class="order">
    <div class="common-block">
        <div class="order-box">
            <div class="card">
                <div class="card-body title">
                    <h4 class="box-title">
                        Orders
                    </h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="box-table">
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th>Order ID</th>
                                    <th>Order Date</th>
                                    <th>Address</th>
                                    <th>Payment Type</th>
                                    <th>Payment Status</th>
                                    <th>Order Status</th>
                                </tr>
                            </thead>
                            
                            <tbody class="text-center">
                            <?php
                            $sql="select `order`.*, order_status.name as order_status_name from `order`,order_status where order_status.id=`order`.order_status";
                            $res=mysqli_query($con,$sql);
                            while($row=mysqli_fetch_assoc($res))
                            {
                            ?>
								<tr>
									<td><a class="btn order-detail-btn" href="admin-order-detail.php?id=<?php echo $row['id']?>"><?php echo $row['id']?></a></td>
									<td><?php echo $row['date']?></td>
									<td>
                                        <?php echo $row['address']?><br/>
                                        <?php echo $row['city']?><br/>
                                        <?php echo $row['postal_code']?>
									</td>
									<td><?php echo $row['payment_type']?></td>
									<td><?php echo $row['payment_status']?></td>
									<td><?php echo $row['order_status_name']?></td>
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