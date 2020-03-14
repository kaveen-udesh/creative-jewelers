<?php include('header.php') ?>

<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "creative_jewelers_kaveen";
$msg="";
$attempts="";

// Create Connection

$con = mysqli_connect($server,$user,$pass,$database);


//------------------- Update Accounts ------------------------
	
if(isset($_POST['btnSave'])){

    if(!empty($_SESSION['username'])){
        $username= $_SESSION['username'];

        $fname=$_POST['txtFname'];
        $lname=$_POST['txtLname'];
        $address=$_POST['txtAddress'];
        $city=$_POST['txtCity'];
        $password=$_POST['txtPassword'];
        $zip=$_POST['txtZipCode'];
        $country=$_POST['txtCountry'];
        $birthday=$_POST['txtBirthday'];

    
        $sql = "UPDATE users SET f_name='".$fname."', l_name='".$lname."', address='".$address."', city='".$city."', zip_code=".$zip.", country='".$country."', birthday='".$birthday."' ,password='".$password."' WHERE email ='".$username."'";
        
        if(mysqli_query($con,$sql)){
            $msg="<div class='alert alert-info' role='alert'><b>Account Updated!</b></div>";
        }
        else{
            $msg="<div style=color:red;><b>Error :".mysqli_error($con)."</b></div>";
        }
    }
}

?>


<br /><br />
<div>
    <div class="alert alert-success" role="alert" align="center">
    <h1>MY ACCOUNT</h1>
    </div>
</div>
<form class="validation" novalidate action="account.php" method="post">
<div class="container" style="padding-top: 30px; padding-bottom: 30px;">
    <div class="row" style="padding-bottom: 10px;">
        <div class="col">
            <?php
                 
            if(!empty($_SESSION['username'])){
            $username= $_SESSION['username'];
            $sql = "SELECT * FROM users WHERE user_type='Admin' AND email='".$username."'";

            $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result)>0){
            
            if($row = mysqli_fetch_assoc($result)){
                        
            ?>

            

            <div class="form-group">
                <fieldset disabled>
                    <label><b>Email</b></label>
                    <input name="txtEmail" type="email" class="form-control" value="<?php echo $row['email'];?>">
                </fieldset>
            </div>
                <div class="row">
                    <div class="form-group col">
                        <label><b>First name</b></label>
                        <input name="txtFname" type="text" class="form-control" value="<?php echo $row['f_name'];?>" required>
                    </div>
                    <div class="form-group col">
                        <label><b>Last name</b></label>
                        <input name="txtLname" type="text" class="form-control" value="<?php echo $row['l_name'];?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label><b>Street Address</b></label>
                    <input name="txtAddress" type="text" class="form-control" value="<?php echo $row['address'];?>" required>
                </div>
                <div class="form-group">
                    <label><b>City</b></label>
                    <input name="txtCity" type="text" class="form-control" value="<?php echo $row['city'];?>" required>
                </div>
        </div>

            


        <div class="col" align="justify">
            
            <div class="form-group">
                <label><b>Password</b></label>
                <input name="txtPassword" type="password" class="form-control" value="<?php echo $row['password'];?>" required>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label><b>Zip Code</b></label>
                    <input name="txtZipCode" type="number" min="0" class="form-control" value="<?php echo $row['zip_code'];?>" required>
                </div>
                <div class="form-group col">
                    <label><b>Country</b></label>
                    <input name="txtCountry" type="text" class="form-control" value="<?php echo $row['country'];?>" required>
                </div>
            </div>
            <div class="form-group">
                <label><b>Birthday</b></label>
                <input name="txtBirthday" type="date" class="form-control" value="<?php echo $row['birthday'];?>" required>
            </div>
            <div class="form-group">
                <fieldset disabled>
                    <label><b>Registered Date</b></label>
                    <input class="form-control" value="<?php echo $row['date'];?>">
                </fieldset>
            </div>

            

        </div>

        
    </div>
    <div align="center">
    <br/>
                <button type="submit" id="btn2" class="btn" name="btnSave"><i class="fas fa-save" style="padding-right: 10px;"></i>Save Changes</button><br/><br/>
                <?php echo $msg;?>
            </div>
            
            <?php
                                                                        
            }
            }
            }
            
            ?>
</div>
</form>

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