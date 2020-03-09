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
?>


<br /><br />
<div style="padding-top:76px;" ;>
    <div class="alert alert-success" role="alert" align="center">
    <h1>MY ACCOUNT</h1>
    </div>
</div>

<div class="container" style="padding-top: 30px; padding-bottom: 30px;">
    <div class="row" style="padding-bottom: 10px;">
        <div class="col">
            <?php
                 
            if(!empty($_SESSION["email"])){
            $email= $_SESSION["email"];
            $sql = "SELECT * FROM users WHERE user_type='Customer' AND email='".$email."'";

            $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result)>0){
            
            if($row = mysqli_fetch_assoc($result)){
                        
            ?>

            <form action="register.php" method="post">

            <div class="form-group">
                <fieldset disabled>
                    <label><b>Email</b></label>
                    <input name="txtEmail" type="email" class="form-control" value="<?php echo $row['email'];?>">
                </fieldset>
            </div>
                <div class="row">
                    <div class="form-group col">
                        <label><b>First name</b></label>
                        <input name="txtFname" type="text" class="form-control" value="<?php echo $row['f_name'];?>">
                    </div>
                    <div class="form-group col">
                        <label><b>Last name</b></label>
                        <input name="txtLname" type="text" class="form-control" value="<?php echo $row['l_name'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label><b>Street Address</b></label>
                    <input name="txtAddress" type="text" class="form-control" value="<?php echo $row['address'];?>">
                </div>
                <div class="form-group">
                    <label><b>City</b></label>
                    <input name="txtCity" type="text" class="form-control" value="<?php echo $row['city'];?>">
                </div>
        </div>

            


        <div class="col" align="justify">
            
            <div class="form-group">
                <label><b>Password</b></label>
                <input name="txtPassword" type="text" class="form-control" value="<?php echo $row['password'];?>">
            </div>
            <div class="row">
                <div class="form-group col">
                    <label><b>Zip Code</b></label>
                    <input name="txtZipCode" type="number" min="0" class="form-control" value="<?php echo $row['zip_code'];?>">
                </div>
                <div class="form-group col">
                    <label><b>Country</b></label>
                    <input name="txtCountry" type="text" class="form-control" value="<?php echo $row['country'];?>">
                </div>
            </div>
            <div class="form-group">
                <label><b>Birthday</b></label>
                <input name="txtBirthday" type="date" class="form-control" value="<?php echo $row['birthday'];?>">
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
                <button type="submit" id="btn2" class="btn" name="btnSave"><i class="fas fa-save" style="padding-right: 10px;"></i>Save Changes</button>
            </div>

            </form>
            <?php
                                                                        
            }
            }
            }
            
            ?>
</div>


<?php include('layout/footer.php') ?>