<?php
    include('layout/header.php');
    
    $server = "localhost";
    $user   = "root";
    $pass   = "";
    $database = "creative_jewelers_kaveen";

    $con = mysqli_connect($server,$user,$pass,$database);

    $sql="";
    $name="";
    $email="";
    $payment_method="";
    $msg="";

    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    if(empty($_SESSION["email"])){
        echo '<script type="text/javascript">window.location.href = "login.php";</script>';
    }


    if($con){
        if(!empty($_SESSION['cart'])){

            if(isset($_POST['btnOrder'])){
                // echo "<div align='center' style='margin-top: 300px; font-size: 3em'>";
                // echo '<i class="fas fa-circle-notch fa-spin"></i>';
                // echo '<span> Loading ...</span>';
                // echo "</div>";

                $payment_method=$_POST['txtMethod'];
                $total=$_POST['txtTotal'];

                if(!empty($_SESSION["email"])){
                    
                    $email= $_SESSION["email"];
                    $sql="INSERT INTO orders (payment_method, c_email, total) VALUES ('".$payment_method."','".$email."',".$total.")";
            
                    if(mysqli_query($con, $sql)){
                        $insert_id = $con->insert_id;

                        foreach($_SESSION['cart'] as $k=>$value){
                            $subTotal = $value['sale_price']*$value['qty'];
                            $sql="INSERT INTO orders_product (o_id, p_id, qty, sub_total) VALUES (".$insert_id.",".$value['id'].",".$value['qty'].",".$subTotal.")";
                            if(mysqli_query($con,$sql)){
                            }
                        }

                        $sql1="SELECT orders.o_id, orders.c_email, orders.date, users.f_name, users.l_name, users.address, users.city, users.country FROM orders INNER JOIN users ON orders.c_email = users.email WHERE orders.o_id=".$insert_id;


                        $result1 = mysqli_query($con,$sql1);

                        if($row = mysqli_fetch_assoc($result1)){

                        // -------------------- get values --------------------
                        $to         = $_POST['txtTo'];
                        $subject    = $_POST['txtSubject'];
                        $emailBody  = 
                        "<div style='margin-top:30px;'>
                            <h3>Creative Jewellers(Pvt) Ltd.</h3>
                            <hr color='#CCCCCC' />
                            <div>
                                <table width='800px'>
                                    <tr>
                                        <td>
                                            <h5>From :</h5>
                                        </td>
                                        <td></td>
                                    </tr>
                    
                                    <tr>
                                        <td><strong>Creative Jewellers(Pvt) Ltd.</strong></td>
                                        <td><b>Order ID: ".$insert_id."</b></td>
                                    </tr>
                    
                                    <tr>
                                        <td>Battaramulla, Colombo,</td>
                                        <td><b>Order Date: ".$row['date']."</b></td>
                                    </tr>
                    
                                    <tr>
                                        <td>Sri Lanka.</td>
                                        <td></td>
                                    </tr>
                    
                                    <tr>
                                        <td>Phone: (+94) 547475475</td>
                                        <td></td>
                                    </tr>
                    
                                    <tr>
                                        <td>Email: creative.jewellers10@gmail.com</td>
                                        <td></td>
                                    </tr>
                                </table><br/>
                    
                                <h5>To :</h5>
                                <address>
                                    <strong>".$row['f_name'].$row['l_name']."</strong><br />
                                    ".$row['address'].", ".$row['city'].", ".$row['country'].".<br />
                                    Email: ".$row['c_email']."
                                </address><br />
                            </div>
                        
                    
                            <div>
                                <table width='800px'>
                                    <tr align='center'>
                                        <th>Product Name</th>
                                        <th>Material</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                    </tr>";
                        $total=0;
                        foreach($_SESSION['cart'] as $k=>$value) {
                            $subTotal=0;
                            $subTotal=$value['sale_price']*$value['qty'];
                            $emailBody  .= 
                                    "<tr align='center'>
                                        <td>".$value['name']."</td>
                                        <td>".$value['material']."</td>
                                        <td>".$value['sale_price']."</td>
                                        <td>".$value['qty']."</td>
                                        <td>".number_format($subTotal, 2)."</td>
                                    </tr>";
                                    $total += $subTotal;
                        }
                        
                        $emailBody  .= 
                                    "<tr align='center' height='50px'>
                                        <td colspan='4' align='right'><b>Total</b></td>
                                        <td style='border-top:solid 1px;'><b>". number_format($total, 2) ."</b></td>
                                    </tr>
                                </table>
                            </div>
                        </div>";
                    }
                

                        $mail = new PHPMailer(true);

                        try {    
                            //Server settings
                            $mail->SMTPDebug = 0;                      					// Enable verbose debug output
                            $mail->isSMTP();                                            // Send using SMTP
                            $mail->Host       = 'smtp.gmail.com';                    	// Set the SMTP server to send through
                            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                            $mail->Username   = 'creative.jewellers10@gmail.com';  				// SMTP username
                            $mail->Password   = '8O1WFi4AAgW7R4hE';  							// SMTP password
                            $mail->SMTPSecure = 'tls';         							// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                            $mail->Port       = 587;                                    // TCP port to connect to
                            $mail->Mailer     = 'smtp';
                            
                            //Recipients
                            $mail->setFrom('creative.jewellers10@gmail.com', 'Creative Jewelers');
                            $mail->addAddress($to);     								// Add a recipient
                            // $mail->addAddress('ellen@example.com');               	// Name is optional
                            // $mail->addReplyTo('info@example.com', 'Information');
                            // $mail->addCC('cc@example.com');
                            // $mail->addBCC('bcc@example.com');
                            
                            // Content
                            $mail->isHTML(true);                                        // Set email format to HTML
                            $mail->Subject = $subject;
                            $mail->Body    = $emailBody;
                            
                            $mail->send();

                        } catch(Exception $ex) {
                            echo "Error : " .$mail->ErrorInfo;
                        }
                        
                        foreach($_SESSION['cart'] as $k=>$value){
                            unset($_SESSION['cart'][$k]);
                        }

                        echo '<script type="text/javascript">alert("Payment Successfully!")</script>';

                        echo '<script type="text/javascript">window.location.href = "index.php";</script>';
                }
            }
        }
        } else {
            echo '<script type="text/javascript">window.location.href = "jewellery.php?page=ladies_jewellery";</script>';
        }

    } else {
        $msg="<div style=color:red;><b>Error :".mysqli_connect_error()."</b></div>";
    }
?>

    <br /><br />

    <div style="padding-top:76px;" align="center">
        <div class="alert alert-success" role="alert" align="center">
            <h1>CHECKOUT</h1>
        </div>

        <?php
            if(!empty($_SESSION['cart'])) {
                $total=0;
        ?>
            <div class="container">
                <br />
                <table width="900px">
                    <tr style="text-align:center;">
                        <th></th>
                        <th>Name</th>
                        <th>Material</th>
                        <th>Weight</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>

                <?php
                    foreach($_SESSION['cart'] as $k=>$value) {
                        $subTotal=0;
                ?>
                        <tr style="text-align:center;">
                            <td><img src="assets/images/<?php echo $value['image'] ?>" width=auto height=80 /></td>
                            <td><?php echo $value['name'] ?></td>
                            <td><?php echo $value['material'] ?></td>
                            <td><?php echo $value['weight'] ?>g</td>
                            <td>Rs.<?php echo $value['sale_price'] ?></td>
                            <td><?php echo $value['qty'] ?></td>
                            <?php $subTotal=$value['sale_price']*$value['qty']; ?>
                            <td>Rs.<?php echo number_format($subTotal, 2); ?></td>
                        </tr>
                <?php
                        $total += $subTotal;
                    }
                ?>
                    <tr style="text-align:center; border-top:solid 1px; border-bottom:double;">
                        <td colspan="7">
                            <h4><b>Total : Rs.<?php echo number_format($total, 2); ?></b></h4>
                        </td>
                    </tr>
                </table>
            </div>
        <?php
            }
        ?>

    </div>

<div style="background-color:#f2f2f2; margin-top:50px; padding-top:30px; padding-bottom:10px;">
    <div class="container">
        <div class="row">
            <div class="col" style="margin:30px;">
                <h1 style="padding-bottom: 30px;"><b>Payment Details</b></h1>

                <form class="validation" novalidate action="payment.php" method="post">

                    <input type="hidden" class="form-control" name="txtTo" value="<?php echo $_SESSION["email"];?>" />
                    <input type="hidden" class="form-control" name="txtSubject"
                        value="Creative Jewellers - Order Bill" />
                    <input type="hidden" class="form-control" name="txtMsg" value="Rs.<?php echo $total;?>" />

                    <div class="form-group">
                        <label><b>Payment Method</b></label>

                        <select class="form-control" name="txtMethod">
                            <option>Visa Card</option>
                            <option>Master Card</option>
                            <option>AMEX</option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label><b>Card Number</b></label>
                        <input name="txtCardNumber" type="text" pattern="\d*" maxlength="16" minlength="16"
                            class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label><b>Exp Month</b></label>
                        <select class="form-control" name="txtExpmonth">
                            <option>January</option>
                            <option>February</option>
                            <option>March</option>
                            <option>April</option>
                            <option>May</option>
                            <option>June</option>
                            <option>July</option>
                            <option>August</option>
                            <option>September</option>
                            <option>October</option>
                            <option>November</option>
                            <option>December</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label><b>Exp Year</b></label>
                            <input name="txtExpyear" type="number" class="form-control" required>
                        </div>
                        <div class="form-group col">
                            <label><b>CVV</b></label>
                            <input name="txtCvv" type="number" class="form-control" required>
                        </div>
                    </div><br />

                    <div align="center">
                        <input type="hidden" name="txtTotal" value="<?php echo $total;?>" />
                        <button type="submit" id="btn2" class="btn" name="btnOrder"><i class="fas fa-money-check-alt"
                                style="padding-right: 10px;"></i>PLACE AN ORDER</button>
                    </div>
                </form>
            </div>
            <div class="col" style="margin:30px;" align="center">
                <h1><b>Customer Details</b></h1><br />

                <?php
                 
                  if(!empty($_SESSION["email"])){
                    $email= $_SESSION["email"];
                  $sql = "SELECT * FROM users WHERE user_type='Customer' AND email='".$email."'";

                  $result = mysqli_query($con,$sql);
                  if(mysqli_num_rows($result)>0){
                  
                    if($row = mysqli_fetch_assoc($result)){
                                 
                  ?>
                <form method="get">
                    <table width="320px" height="250px">
                        <tr>
                            <td><b>Name</b></td>
                            <td>: <?php echo $row['f_name']." ".$row['l_name'];?><input type="hidden" name="txtName"
                                    value="<?php echo $row['f_name']." ".$row['l_name'];?>" />
                            </td>
                        </tr>
                        <tr>
                            <td><b>Email</b></td>
                            <td>: <?php echo $row['email'];?><input type="hidden" name="txtEmail"
                                    value="<?php echo $row['email'];?>" />
                            </td>
                        </tr>
                        <tr>
                            <td><b>Address</b></td>
                            <td>: <?php echo $row['address'];?><input type="hidden" name="txtAddress"
                                    value="<?php echo $row['address'];?>" />
                            </td>
                        </tr>
                        <tr>
                            <td><b>City</b></td>
                            <td>: <?php echo $row['city'];?><input type="hidden" name="txtCity"
                                    value="<?php echo $row['city'];?>" />
                            </td>
                        </tr>
                        <tr>
                            <td><b>Zip Code</b></td>
                            <td>: <?php echo $row['zip_code'];?><input type="hidden" name="txtZip"
                                    value="<?php echo $row['zip_code'];?>" />
                            </td>
                        </tr>
                        <tr>
                            <td><b>Country</b></td>
                            <td>: <?php echo $row['country'];?><input type="hidden" name="txtCountry"
                                    value="<?php echo $row['country'];?>" />
                            </td>
                        </tr>
                    </table>
                </form>
                <?php
                                                                         
                }
                }
                }
              
               ?>

            </div>
        </div>
    </div>
</div>

<?php echo $msg; ?>

<?php include('layout/footer.php') ?>