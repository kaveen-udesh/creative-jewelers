<?php

$server = "localhost";
$user = "root";
$pass ="";
$database = "creative_jewelers_kaveen";

$con = mysqli_connect($server,$user,$pass,$database);
//-------------- Connection--------
$sql="";

?>

<div align="center" class="container" style="padding-top:50px;">
    <div class="alert alert-danger" role="alert">
        <h1>Registered Customers Details</h1>
    </div>

    <?php
    $sql = "SELECT * FROM users";
    $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0){
			echo "<table width=1050px;>";
			echo "<tr height=40px; style=background-color:#333;color:white;text-align:center;>
					<th>"."Customer ID"."</th>
					<th>"."  &nbsp;"."First Name"."</th>
                    <th>"."  &nbsp;"."Last Name"."</th>
                    <th>"."  &nbsp;"."Street Address"."</th>
                    <th>"."  &nbsp;"."City"."</th>
                    <th>"."  &nbsp;"."Zip Code"."</th>
                    <th>"."  &nbsp;"."Country"."</th>
                    <th>"."  &nbsp;"."Birthday"."</th>
                    <th>"."  &nbsp;"."Email"."</th>
                    <th>"."  &nbsp;"."Password"."</th>
				</tr>";
			$r=1;
			$crl="";
			while($row = mysqli_fetch_row($result)){
				if($r%2==0){
					$crl="#efefef";
				}
				else{
					$crl="#d9d9d9";
				}
            echo " <tr height=40px; style=text-align:center;background-color:$crl;>
                    <td >".$row[0]."</td>
                    <td>"."  ".$row[1]."</td>
                    <td>"."  ".$row[2]."</td>
                    <td>"."  ".$row[3]."</td>
                    <td>"."  ".$row[4]."</td>
                    <td>"."  ".$row[5]."</td>
                    <td>"."  ".$row[6]."</td>
                    <td>"."  ".$row[7]."</td>
                    <td>"."  ".$row[8]."</td>
                    <td>"."  ".$row[9]."</td>
                </tr>";
			$r++;
		}
		echo "</table>";
	}
	else{
		echo "<div style=color:red;><b>Not Found</b></div>";
	}
    ?>
</div>