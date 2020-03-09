<?php

$server = "localhost";
$user = "root";
$pass ="";
$database = "creative_jewelers_kaveen";

$con = mysqli_connect($server,$user,$pass,$database);
//-------------- Connection--------
$sql="";
$msg2="";
$id="";

//------------------- Delete Inquiry ------------------------
	
if(isset($_POST['btn2Delete'])){
    $id = $_POST['txtID'];
        
        $sql = "DELETE FROM inquiries WHERE id=".$id."";
        if(mysqli_query($con,$sql)){
            $msg2="<div style=color:red;><b>Customer Inquiry Deleted!</b></div>";
        }
        else{
            $msg2="<div style=color:red;><b>Error :".mysqli_error($con)."</b></div>";
        }
}



?>

<div align="center" class="container" style="padding-top:50px;">
    <div class="alert alert-info" role="alert">
        <h1>Customers Inquiries</h1>
    </div>
    <br/>

    <?php

//------------------- View All Inquiries ------------------------

    $sql = "SELECT * FROM inquiries";
    $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0){
            
			echo "<table width=1050px;>";
			echo "<tr height=40px; style=background-color:#333;color:white;text-align:center;>
					<th>"."  &nbsp;"."Name"."</th>
                    <th>"."  &nbsp;"."Email"."</th>
                    <th>"."  &nbsp;"."Phone Number"."</th>
                    <th>"."  &nbsp;"."Message"."</th>
                    <th>"."  &nbsp;"."Date"."</th>
                    <th></th>
				</tr>";
			$r=1;
			$crl="";
			while($row = mysqli_fetch_row($result)){
				if($r%2==0){
					$crl="#d9d9d9";
				}
				else{
					$crl="#efefef";
                }
                echo "<form method=post>";
                echo " <tr height=40px; style=text-align:center;background-color:$crl;>" ?>
            
                    <input type='hidden' name='txtID' value="<?php echo $row[0];?>" />
                    <?php

                    echo"<td>"."  ".$row[1]."</td>
                    <td>"."  ".$row[2]."</td>
                    <td>"."  ".$row[3]."</td>
                    <td>"."  ".$row[4]."</td>
                    <td>"."  ".$row[5]."</td>" ?>
                    <td style="padding:20px;">
                        <button type="submit" class="btn btn-info" title="Reply" name="btnReply"><i class="fas fa-reply"></i></button>
                        <button type="submit" class="btn btn-danger" title="Delete Inquiry" name="btn2Delete"><i class="fas fa-trash-alt"></i></button>
                    </td>

                <?php
                "</tr>";
                echo "</form>";
			$r++;
		}
        echo "</table>";
        echo "<br/>";
        echo $msg2;
	}
	else{
		echo "<div style=color:red;><b>Not Found</b></div>";
	}
    ?>

    
</div>

<?php

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$to="";
$subject="";
$msg="";

if(isset($_POST['btnSend'])){
try{
	$mail = new PHPMailer(true);
	
	//Server settings
    $mail->SMTPDebug = 0;                      					// Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    	// Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'kaveenrulz98@gmail.com';  				// SMTP username
    $mail->Password   = 'askrulz123';  												// SMTP password
    $mail->SMTPSecure = 'tls';         							// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to
	$mail->Mailer = 'smtp';
	
	//-------------------- get values
	
	$to = $_POST['txtTo'];
	$subject = $_POST['txtSubject'];
	$msg = $_POST['txtMsg'];

	
	//Recipients
    $mail->setFrom('kaveenrulz98@gmail.com');
    $mail->addAddress($to);     								// Add a recipient
    /*$mail->addAddress('ellen@example.com');               	// Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');*/
	
	// Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $msg;
	
    $mail->send();
    echo "<div align=center>";
    echo 'Message has been sent';
    echo "</div>";
	
	
}catch(Exception $ex){
	echo "Error : " .$mail->ErrorInfo;
}
}

?>

<?php
if(isset($_POST['btnReply'])){
    $id = $_POST['txtID'];
    $sql = "SELECT * FROM inquiries WHERE id=".$id."";
    $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0){
            if($row = mysqli_fetch_row($result)){

    ?>
    <div  align="center" class="container" style="margin-top:50px;">

    <h2 style="padding-bottom:20px;">Reply Message</h2>

<form action="dashboard.php?page=inquiries" method="post">
<table width="600" height="300">
  <tr>
    <td>To</td>
    <td><input type="text" class="form-control" name="txtTo" value="<?php echo $row[2];?>"/></td>
  </tr>
  <tr>
    <td>Subject</td>
    <td><input type="text" class="form-control" name="txtSubject"/></td>
  </tr>
  <tr>
    <td>Message</td>
    <td><textarea rows="5" class="form-control" name="txtMsg"></textarea></td>
  </tr>
  <tr>
    <td colspan="2" align="right"><input class="btn btn-success" type="submit" name="btnSend" value="Send"/></td>
  </tr>
  
</table>
</form>
</div>


<?php
            }
}
}

?>


