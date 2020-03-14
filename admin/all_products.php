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

?>

<div align="center" class="container" style="padding-top:50px;">
    <div class="alert alert-warning" role="alert">
        <h1>All Products</h1>
    </div>
    <br/>

    <?php

//------------------- View All Products ------------------------

    $sql = "SELECT * FROM products";
    $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0){

            echo "<div class='table-wrapper-scroll-y my-custom-scrollbar'>";
			echo "<table class='table table-bordered table-striped mb-0'>";
			echo "<tr height=40px; style=background-color:#333;color:white;text-align:center;>
                    <th></th>
                    <th>"."  &nbsp;"."Product ID"."</th>
                    <th>"."  &nbsp;"."Name"."</th>
                    <th>"."  &nbsp;"."Category"."</th>
                    <th>"."  &nbsp;"."Sub Category"."</th>
                    <th>"."  &nbsp;"."Material"."</th>
                    <th>"."  &nbsp;"."Weight"."</th>
                    <th>"."  &nbsp;"."Price"."</th>
                    <th>"."  &nbsp;"."Discount"."</th>
                    <th>"."  &nbsp;"."Discount Price"."</th>
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
                
                echo " <tr height=40px; style=text-align:center;background-color:$crl;>"?>

                    <td style="padding:10px;"><image src="../assets/images/<?php echo $row[7]; ?>" width="70px" height="auto"/></td>

                    <?php
                    echo"<td>"."  ".$row[0]."</td>
                    <td>"."  ".$row[1]."</td>
                    <td>"."  ".$row[2]."</td>
                    <td>"."  ".$row[3]."</td>
                    <td>"."  ".$row[4]."</td>
                    <td>"."  ".$row[5]."g</td>
                    <td>"."  Rs.".$row[6]."</td>
                    <td>"."  ".$row[8]."%</td>
                    <td>"."  Rs.".$row[9]."</td>

                </tr>";
                
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