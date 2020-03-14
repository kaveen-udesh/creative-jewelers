<?php include('layout/header.php') ?>

<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "creative_jewelers_kaveen";
$msg="";
$attempts="";

// Create Connection

$con = mysqli_connect($server,$user,$pass,$database);

if(isset($_POST['btnRegister'])){
 
    $fname = $_POST['txtFname'];
    $lname = $_POST['txtLname'];
    $address = $_POST['txtAddress'];
    $city = $_POST['txtCity'];
    $zip = $_POST['txtZipCode'];
    $country = $_POST['txtCountry'];
    $birthday = $_POST['txtBirthday'];
    $email = $_POST['txtEmail'];
    $pass = $_POST['txtPassword'];
        $sql = "INSERT INTO users (f_name, l_name, address, city, zip_code, country, birthday, email, password,user_type) VALUES ('".$fname."','".$lname."','".$address."','".$city."',".$zip.",'".$country."','".$birthday."','".$email."','".$pass."','Customer')";
        
        if(mysqli_query($con,$sql)){
            $_SESSION["email"] = $email;
            echo '<script type="text/javascript">alert("You are now Registered Member!\nWelcome to the Creative Jewelers")</script>';
            ?>
<script type="text/javascript">
window.location.href = "index.php";
</script>
<?php
        }
        else{
            $msg = "<div style=color:red;><b>Error :".mysqli_error($con)."<b></div>";
        }
}

?>

<div style="padding-top:76px;">
    <div class="container" style="padding-top: 30px; padding-bottom: 80px;">
        <div class="row">

            <div class="col" style="margin:30px;" align="left">
                <h1 style="color:#00dda8; padding-bottom: 30px; text-align:center;"><b>USER REGISTRATIONS</b></h1>

                <form class="validation" novalidate action="register.php" method="post">
                    <div class="row">
                        <div class="form-group col">
                            <label><b>First name</b></label>
                            <input name="txtFname" type="text" class="form-control" required>
                        </div>
                        <div class="form-group col">
                            <label><b>Last name</b></label>
                            <input name="txtLname" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label><b>Street Address</b></label>
                        <input name="txtAddress" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label><b>City</b></label>
                        <input name="txtCity" type="text" class="form-control" required>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label><b>Zip Code</b></label>
                            <input name="txtZipCode" type="number" min="0" class="form-control" required>
                        </div>
                        <div class="form-group col">
                            <label><b>Country</b></label>
                            <input name="txtCountry" type="text" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label><b>Birthday</b></label>
                        <input name="txtBirthday" type="date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label><b>Email</b></label>
                        <input name="txtEmail" type="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label><b>Password</b></label>
                        <input name="txtPassword" type="password" class="form-control" required>
                    </div><br />
                    <div align="center">
                        <button type="submit" id="btn2" class="btn" name="btnRegister"><i class="fas fa-user-plus"
                                style="padding-right: 10px;"></i>REGISTER</button>
                    </div>
                </form>
                <?php echo $msg; ?>

            </div>
            <div class="col" style="margin-left:50px; margin-top:40px;">
                <h4>Not our registered customer yet?</h4>
                <p align="justify">With registration with us new Jewelleries & Accessories, fantastic discounts and much more opens to
                    you! The whole process will not take you more than a minute!</p><br/>
                <img src="assets/images/img5.png" />
            </div>
        </div>
    </div>

</div>

<?php include('layout/footer.php') ?>