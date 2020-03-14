<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title></title>
</head>

<body>

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

if($con){


	
if(isset($_GET['id'])){

        
        $sql = "DELETE FROM users WHERE email='".$email."'";
        if(mysqli_query($con,$sql)){
            $msg1="<div style=color:red;><b>Customer Deleted!</b></div>";
        }
}


}else{
    $msg1="<div style=color:red;><b>Error :".mysqli_connect_error()."</b></div>";
}


?>

    <div style="margin-top:30px;">
        <h3>Creative Jewellers(Pvt) Ltd.</h3>
        <hr color="#CCCCCC" />
        <div>
            <table width="800px">
                <tr>
                    <td>
                        <h5>From :</h5>
                    </td>
                    <td><b>Invoice #007612</b></td>
                </tr>

                <tr>
                    <td><strong>Creative Jewellers(Pvt) Ltd.</strong></td>
                    <td><b>Order ID: </b></td>
                </tr>

                <tr>
                    <td>Battaramulla, Colombo,</td>
                    <td><b>Order Date: </b></td>
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
                    <td>Email: store@creativejewelers.lk</td>
                    <td></td>
                </tr>
            </table><br/>

            <h5>To :</h5>
            <address>
                <strong></strong><br />
                <br />
                Phone: (+94) <br />
                Email:
            </address><br />
        </div>

        <div>
            <table width="800px">
                <tr align="center">
                    <th>Product Name</th>
                    <th>Material</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>

                <tr align="center">
                    <td>Product Name</td>
                    <td>Material</td>
                    <td>Price</td>
                    <td>QTy</td>
                    <td>Subtotal</td>
                </tr>

                <tr align="center">
                    <td colspan="4" align="right"><b>Total</b></td>
                    <td>Subtotal</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>