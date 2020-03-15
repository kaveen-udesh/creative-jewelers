<?php

$server = "localhost";
$user = "root";
$pass ="";
$database = "creative_jewelers_kaveen";

// Create Connection

$con = mysqli_connect($server,$user,$pass,$database);

$sql="";
$msg1="";
$email="";

if($con){

//------------------- Delete Customer ------------------------
	
if(isset($_POST['btn1Delete'])){
    $email = $_POST['txtEmail'];
        
        $sql = "DELETE FROM users WHERE email='".$email."'";
        if(mysqli_query($con,$sql)){
            $msg1="<div style=color:red;><b>Customer Deleted!</b></div>";
        }
        else{
            $msg1="<div style=color:red;><b>Error :".mysqli_error($con)."</b></div>";
        }
}


}else{
    $msg1="<div style=color:red;><b>Error :".mysqli_connect_error()."</b></div>";
}

?>

<div align="center" class="container" style="padding-top:50px;">
    <div class="alert alert-danger" role="alert">
        <h1>Registered Customers Details</h1>
    </div>
    <br/>

    <?php
    $sql = "SELECT * FROM users WHERE user_type='Customer' ORDER BY date";
    $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0){
            echo "<div class='table-wrapper-scroll-y my-custom-scrollbar'>";
			echo "<table class='table table-bordered table-striped mb-0'>";
            echo "<tr height=40px; style=background-color:#333;color:white;text-align:center;>
                    <th>"."  &nbsp;"."Email"."</th>
					<th>"."  &nbsp;"."Name"."</th>
                    <th>"."  &nbsp;"."Street Address"."</th>
                    <th>"."  &nbsp;"."City"."</th>
                    <th>"."  &nbsp;"."Country"."</th>
                    <th>"."  &nbsp;"."Birthday"."</th>
                    <th>"."  &nbsp;"."Reg Date"."</th>
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
            
                    <input type='hidden' name='txtEmail' value="<?php echo $row[7];?>" />
                    <?php

                    echo"<td>"."  ".$row[7]."</td>
                    <td>"."  ".$row[0]." ".$row[1]."</td>
                    <td>"."  ".$row[2]."</td>
                    <td>"."  ".$row[3]."</td>

                    <td>"."  ".$row[5]."</td>
                    <td>"."  ".$row[6]."</td>
                    <td>"."  ".$row[10]."</td>" ?>
                    <td style="padding:20px;"><button type="submit" class="btn btn-danger" title="Delete Customer" name="btn1Delete"><i class="fas fa-trash-alt"></i></button></td>

                <?php
                "</tr>";
                echo "</form>";
			$r++;
		}
        echo "</table>";
        echo "</div>";
        echo "<br/>";
        echo $msg1;
	}
	else{
		echo "<div style=color:red;><b>Not Found</b></div>";
	}
    ?>
</div>