<?php 
    require('includes/header.php');
    if(!isset($_SESSION['USER_LOGIN']))
    {
        echo "<script>window.location.href='home.php';</script>";
    }
?>

<div class="my-order">
  <div class="common-block">
    <div class="row mt-3">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb text-uppercase">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">My Order</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="row my-4 mx-4">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="table-content table-responsive">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th>Order ID</th>
                            <th>Order Date</th>
                            <th>Address</th>
                            <th>Payment Type</th>
                            <th>Payment Status</th>
                            <th>Order Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $user_id=$_SESSION['USER_ID'];
                        $res=mysqli_query($con,"select `order`.*, order_status.name as order_status_name from `order`,order_status where user_id='$user_id' and `order`.order_status=order_status.id");
                        while($row=mysqli_fetch_assoc($res))
                        {
                        ?>
                            <tr class="text-center">
                                <td><a class="btn order-detail-btn" href="my-order-details.php?id=<?php echo $row['id']?>"><?php echo $row['id']?></a></td>
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

        
										
<?php
    require('includes/footer.php');
?>        