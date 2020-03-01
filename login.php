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

if(isset($_POST['btnLogin'])){
	$email = $_POST['txtEmail'];
	$pass = $_POST['txtPassword'];
	$sql = "SELECT * FROM users WHERE email='".$email."' && password='".$pass."'";
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0){
        
        $_SESSION["email"] = $email;
		echo '<script type="text/javascript">alert("You are Login Successfully")</script>';
	?>
        <script type="text/javascript">
		window.location.href="index.php";</script>
     <?php
	}else{ 
        $msg = "<div class='alert alert-danger' role=alert>
                    Invalid Email or Password
                </div>";
    }
}



?>	

<div style="padding-top:76px;" align="center" ;>

    <div class="container" style="padding-top: 50px; padding-bottom: 80px;">
        <div class="row">
            <div class="col">
                <img src="assets/images/img2.png" />
            </div>
            <div class="col">
                <h1 style="color:#00dda8; padding-top: 130px; padding-bottom: 30px;"><b>USER LOGIN</b></h1>
                <form class="validation" novalidate action="login.php" method="post">
                    <div class="form-group col-xl-7">
                        <input name="txtEmail" type="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group col-xl-7">
                        <input name="txtPassword" type="password" class="form-control" placeholder="Password" required>
                    </div><br />
                    <button type="submit" id="btn2" class="btn" name="btnLogin"><i class="fas fa-sign-in-alt" style="padding-right: 10px;"></i>LOGIN</button>
                </form><br />
                <p>Don't have an Account... <a style="color:#00dda8;" href="register.php">Register now!</a></p>
                <?php echo $msg; ?>
                
            </div>
        </div>
    </div>

</div>

<?php include('layout/footer.php') ?>