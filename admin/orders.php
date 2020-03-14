<?php

$server = "localhost";
$user = "root";
$pass ="";
$database = "creative_jewelers_kaveen";

$con = mysqli_connect($server,$user,$pass,$database);
//-------------- Connection--------
$sql="";
$msg1="";
$email="";

?>

<div align="center" class="container" style="padding-top:50px;">
    <div class="alert alert-info" role="alert">
        <h1>Customer Orders</h1>
    </div>
    <br/>

    <?php
    $sql = "SELECT orders.o_id, orders.c_email, orders.date, orders.payment_method, users.f_name, users.l_name FROM orders INNER JOIN users ON orders.c_email = users.email ORDER BY orders.o_id";

    $result = mysqli_query($con,$sql);
    
        if(mysqli_num_rows($result)>0){
            echo "<div class='table-wrapper-scroll-y my-custom-scrollbar'>";
			echo "<table class='table table-bordered table-striped mb-0'>";
            echo "<tr height=40px; style=background-color:#333;color:white;text-align:center;>
                    <th>"."  &nbsp;"."Order ID"."</th>
					<th>"."  &nbsp;"."Full Name"."</th>
                    <th>"."  &nbsp;"."Payment Method"."</th>
                    <th>"."  &nbsp;"."Email"."</th>
                    <th>"."  &nbsp;"."Date"."</th>
                    <th></th>
				</tr>";
			$r=1;
			$crl="";
			while($row = mysqli_fetch_assoc($result)){
                
				if($r%2==0){
					$crl="#d9d9d9";
				}
				else{
					$crl="#efefef";
                }
                echo "<form method=post>";
                echo " <tr height=40px; style=text-align:center;background-color:$crl;>"; ?>
            
                <input type='hidden' name='txtID' value="<?php echo $row['o_id'];?>" />
                <?php


                echo "<td>".$row['o_id']."</td>
                    <td>"."  ".$row['f_name']." ".$row['l_name']."</td>
                    <td>"."  ".$row['payment_method']."</td>
                    <td>"."  ".$row['c_email']."</td>
                    <td>"."  ".$row['date']."</td>";
?>

                    <td style="padding:20px;"><button type="submit" class="btn btn-info" title="View Order" name="btnView"><i class="fas fa-eye"></i></button></td>

                <?php
                "</tr>";
                echo "</form>";
			$r++;
		}
        echo "</table>";
        echo "</div>";
        echo "<br/>";
	}
	else{
        echo "<div style=color:red;><b>Not Found</b></div>";
	}
    ?>
</div>

<?php
if(isset($_POST['btnView'])){
    $id = $_POST['txtID'];
    $sql = "SELECT orders.o_id, orders.c_email, orders.date, orders.total, users.f_name, users.l_name, users.address, users.city, users.country FROM orders INNER JOIN users ON orders.c_email = users.email WHERE orders.o_id=".$id;

    $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0){
            if($row = mysqli_fetch_assoc($result)){

?>
            <div class="container" style="border:solid 1px #CCCCCC; border-radius:20px; margin-bottom:30px;">
                <div style="margin-top:30px;">
                            <h3>Creative Jewellers(Pvt) Ltd.</h3>
                            <hr color="#CCCCCC" />
                            <div>
                                <div class="row">
                                    <div class="col">
                                        <h5>From :</h5>
                                        <address>
                                        <strong>Creative Jewellers(Pvt) Ltd.</strong><br/>
                                        Battaramulla, Colombo,<br/>
                                        Sri Lanka.<br/>
                                        Phone: (+94) 547475475<br/>
                                        Email: creative.jewellers10@gmail.com<br/>
                                        <address>
                                    </div>

                                    <div class="col" align="right">
                                        <b>Order ID: <?php echo $row['o_id']; ?></b><br/>
                                        <b>Order Date: <?php echo $row['date']; ?></b>
                                    </div>
                                </div><br/>
                                
                                <h5>To :</h5>
                                <address>
                                    <strong><?php echo $row['f_name']." ".$row['l_name']; ?></strong><br />
                                    <?php echo $row['address'].", ".$row['city'].", ".$row['country']; ?><br />
                                    Email: <?php echo $row['c_email']; ?>
                                </address><br />
                            </div>
                            <?php
                            $sql1 = "SELECT orders.o_id, products.p_name, products.sale_price, orders_product.p_id, orders_product.qty, orders_product.sub_total FROM orders INNER JOIN orders_product ON orders.o_id = orders_product.o_id INNER JOIN products ON orders_product.p_id=products.p_id WHERE orders.o_id=".$id;

                            $result1 = mysqli_query($con,$sql1);

                            if(mysqli_num_rows($result1)>0){
                            ?>
                            <div>
                                <table class="table table-striped">
                                    <tr align='center'>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                    </tr>
                                    <?php
                                    while($row1 = mysqli_fetch_assoc($result1)){
                                        ?>
                                    <tr align='center'>
                                        <td><?php echo $row1['p_name']; ?></td>
                                        <td><?php echo $row1['sale_price']; ?></td>
                                        <td><?php echo $row1['qty']; ?></td>
                                        <td><?php echo $row1['sub_total']; ?></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>

                                    <tr align='center'>
                                        <td colspan='3' align='right'><b>TOTAL</b></td>
                                        <td style="border-top:solid 1px; border-bottom:double;"><b><?php echo $row['total']; ?></b></td>
                                    </tr>
                                </table><br/>
                            </div>
                            <?php
                            }
                            ?>
    
                        </div>
                        
                    </div>

<?php

        }
    }
                
}
?>