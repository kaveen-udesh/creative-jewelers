<?php

$server = "localhost";
$user = "root";
$pass ="";
$database = "creative_jewelers_kaveen";

$con = mysqli_connect($server,$user,$pass,$database);
//-------------- Connection--------
$sql="";
$msg1="";
$id="";

if($con){

//------------------- Delete ------------------------
	
if(isset($_POST['btn1Delete'])){
    $id = $_POST['txtID'];
        
        $sql = "DELETE FROM users WHERE id=".$id."";
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
    $sql = "SELECT * FROM users";
    $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0){
            
			echo "<table width=1050px;>";
			echo "<tr height=40px; style=background-color:#333;color:white;text-align:center;>
					<th>"."  &nbsp;"."First Name"."</th>
                    <th>"."  &nbsp;"."Last Name"."</th>
                    <th>"."  &nbsp;"."Street Address"."</th>
                    <th>"."  &nbsp;"."City"."</th>
                    <th>"."  &nbsp;"."Zip Code"."</th>
                    <th>"."  &nbsp;"."Country"."</th>
                    <th>"."  &nbsp;"."Birthday"."</th>
                    <th>"."  &nbsp;"."Email"."</th>
                    <th>"."  &nbsp;"."Password"."</th>
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
                    <td>"."  ".$row[5]."</td>
                    <td>"."  ".$row[6]."</td>
                    <td>"."  ".$row[7]."</td>
                    <td>"."  ".$row[8]."</td>
                    <td>"."  ".$row[9]."</td>" ?>
                    <td style="padding:20px;"><button type="submit" class="btn btn-danger" title="Delete Customer" name="btn1Delete"><i class="fas fa-trash-alt"></i></button></td>

                <?php
                "</tr>";
                echo "</form>";
			$r++;
		}
        echo "</table>";
        echo "<br/>";
        echo $msg1;
	}
	else{
		echo "<div style=color:red;><b>Not Found</b></div>";
	}
    ?>
</div>