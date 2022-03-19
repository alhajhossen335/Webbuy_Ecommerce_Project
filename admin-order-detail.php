<?php
    require('includes/config.php');
    require('includes/functions.php');
    require('includes/admin-header.php');

    $order_id=get_safe_value($con,$_GET['id']);

    if(isset($_POST['update_order_status']))
    {
        $update_order_status=$_POST['update_order_status'];
        if($update_order_status=='5')
        {
            mysqli_query($con,"update `order` set order_status='$update_order_status',payment_status='Success' where id='$order_id'");
        }
        else
        {
            mysqli_query($con,"update `order` set order_status='$update_order_status' where id='$order_id'");
        }
        
    }
    
?>

<div class="order">
    <div class="common-block">
        <div class="order-box">
            <div class="card">
                <div class="card-body title">
                    <h4 class="box-title">
                        Order Details
                    </h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="box-table">
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th>Product</th>
                                    <th>Image</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            
                            <tbody class="text-center">
                                <?php
                                $sql="select distinct(order_detail.id), order_detail.*, product.name, product.image, `order`.address, `order`.city, `order`.postal_code from order_detail,product,`order` where order_detail.order_id='$order_id' and  order_detail.product_id=product.id GROUP by order_detail.id";
                                $res=mysqli_query($con,$sql);
                                $total_price=0;
                                
                                $userInfo=mysqli_fetch_assoc(mysqli_query($con,"select * from `order` where id='$order_id'"));
                                
                                $address=$userInfo['address'];
                                $city=$userInfo['city'];
                                $postal_code=$userInfo['postal_code'];
                                
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $total_price=$total_price+($row['quantity']*$row['price']);
                                    ?>
                                    <tr>
                                        <td><?php echo $row['name']?></td>
                                        <td> <img src="<?php echo $row['image']?>"></td>
                                        <td><?php echo $row['quantity']?></td>
                                        <td><?php echo $row['price']?></td>
                                        <td><?php echo $row['quantity']*$row['price']?></td>
                                    </tr>
                                <?php 
                                } ?>
                                <tr>
                                    <td colspan="3"></td>
                                    <td>Total Price</td>
                                    <td><?php echo $total_price?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div id="address_details">
							<strong>Address:</strong>&nbsp;
							<?php echo $address?>, <?php echo $city?>, <?php echo $postal_code?><br/><br/>
							<strong>Order Status:</strong>&nbsp;
                            <?php 
                            $sql="select order_status.name from order_status,`order` where `order`.id='$order_id' and `order`.order_status=order_status.id";
							$order_status_arr=mysqli_fetch_assoc(mysqli_query($con,$sql));
							echo $order_status_arr['name'];
							?>
							
							<div class="my-4">
								<form method="post">
									<select class="form-control mb-3" name="update_order_status" required>
										<option value="">Select Status</option>
										<?php
										$res=mysqli_query($con,"select * from order_status");
                                        while($row=mysqli_fetch_assoc($res))
                                        {
											echo "<option value=".$row['id'].">".$row['name']."</option>";
										}
										?>
									</select>
									<button type="submit" name="submit" class="admin-btn">Submit</button>
								</form>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    require('includes/admin-footer.php');
?>