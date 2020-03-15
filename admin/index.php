<?php session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="../assets/css/fontawesome.css" rel="stylesheet">
    <link href="../assets/css/adminstyles.css" rel="stylesheet">
    <!--load all fontawesome styles -->

    <title>creative Jewellers Admin Panel</title>
  </head>
  <body style="background-color:rgba(0, 0, 0, 0.9);">

<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "creative_jewelers_kaveen";
$msg="";
$attempts="";
$username="";

// Create Connection

$con = mysqli_connect($server,$user,$pass,$database);

if(isset($_POST['btnLogin'])){
	$username = $_POST['txtUsername'];
	$pass = $_POST['txtPassword'];
	$sql = "SELECT * FROM users WHERE email='".$username."' && password='".$pass."' && user_type='Admin'";
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0){
         $_SESSION['username'] = $username;
	?>
<script type="text/javascript">
window.location.href = "dashboard.php";
</script>
     <?php
	}else{ 
        $msg = "<div class='alert alert-danger' role=alert>
                    Invalid Username or Password
                </div>";
    }
}

?>	

<div style="padding-top:76px;" align="center" ;>
    <div class="container" style="padding-top: 30px; padding-bottom: 30px; width:700px;">
        <div class="row">
            <div class="col-sm">
                <img src="../assets/images/logo.png" width="200" height="auto"/>
                <p style="color:#00dda8; font-size:50px;"><b>ADMIN PANEL</b></p>
                <h1 style="color:#00dda8; padding-top: 30px; padding-bottom: 30px;"><b>USER LOGIN</b></h1>
                <form class="validation" novalidate action="index.php" method="post">
                    <div class="form-group col-xl-7">
                        <input name="txtUsername" type="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group col-xl-7">
                        <input name="txtPassword" type="password" class="form-control" placeholder="Password" required>
                    </div><br />
                    <button type="submit" id="btn2" class="btn" name="btnLogin"><i class="fas fa-sign-in-alt" style="padding-right: 10px;"></i>LOGIN</button>
                </form><br />
                <?php echo $msg; ?>
                
            </div>
        </div>
    </div>
</div>

<script>
// ------------- Validations --------------
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
</script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>