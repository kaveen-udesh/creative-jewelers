<?php include('layout/header.php') ?>

<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "creative_jewelers_kaveen";
$msg="";

// Create Connection

$con = mysqli_connect($server,$user,$pass,$database);

if(isset($_POST['btnSubmit'])){
 
    $name = $_POST['txtName'];
    $email = $_POST['txtEmail'];
    $phone = $_POST['txtPhone'];
    $message = $_POST['txtMessage'];
    $date = date('Y-m-d');
    
        $sql = "INSERT INTO inquiries (name, email, phone, message, date) VALUES ('".$name."','".$email."',".$phone.",'".$message."','".$date."')";
        
        if(mysqli_query($con,$sql)){
            echo '<script type="text/javascript">alert("Message send successfully!")</script>';
        }
        else{
            $msg = "<div style=color:red;><b>Error :".mysqli_error($con)."<b></div>";
        }
}

?>

<br /><br />
<div style="padding-top:76px;">
    <div class="alert alert-success" role="alert" align="center">
        <h1>CONTACT US</h1>
    </div>
</div>

<div class="container" align="center" style="padding-bottom:40px; padding-top:40px;">
    <div class="row">
        <div class="col" id="map">
        </div>
        <div class="col" style="padding-left:60px;">
            <h1>Leave your message</h1>
            <p>Our staff will call back later and answer your questions.</p><br />

            <form class="validation" novalidate action="contact.php" method="post">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <input name="txtName" type="text" class="form-control" placeholder="Name" required>
                        </div>
                        <div class="col">
                            <input name="txtPhone" type="number" min="99999999" max="999999999" class="form-control"
                                placeholder="Phone Number" required>
                        </div>
                    </div><br />
                    <div>
                        <input name="txtEmail" type="email" class="form-control" placeholder="Email" required>
                    </div><br />
                    <div>
                        <textarea name="txtMessage" class="form-control" rows="4" placeholder="Your Message"
                            required></textarea>
                    </div>
                </div><br />
                <button type="submit" id="btn2" class="btn" name="btnSubmit"><i class="fas fa-sign-in-alt"
                        style="padding-right: 10px;"></i>SUBMIT</button>
            </form>
            <?php echo $msg; ?>
        </div>
    </div>
</div>

<div style="background-color:#f2f2f2; padding-bottom:50px; padding-top:50px;">
    <div class="container" align="center">
        <div class="row">
            <div class="col">
                <img class="contact" src="assets/images/location.png" /><br /><br />
                <h5><b>ADDRESS</b></h5>
                <p style="margin: 0px;">Battaramulla, Colombo</p>
                <p>Sri Lanka</p>
            </div>
            <div class="col">
                <img class="contact" src="assets/images/phone.png" /><br /><br />
                <h5><b>PHONE</b></h5>
                <p style="margin: 0px;">+94 547 475 475</p>
                <p>+94 578 475 475</p>
            </div>
            <div class="col">
                <img class="contact" src="assets/images/clock.png" /><br /><br />
                <h5><b>WORK TIME</b></h5>
                <p>09:30 am to 07:00 pm</p>
            </div>
            <div class="col">
                <img class="contact" src="assets/images/email.png" /><br /><br />
                <h5><b>EMAIL</b></h5>
                <p>contact@creativejewelers.lk</p>
            </div>
        </div>
    </div>
</div>

<script>
// Initialize and add the map
function initMap() {
    // The location of shop
    var shop = {
        lat: 6.901066,
        lng: 79.919728
    };
    // The map, centered at shop
    var map = new google.maps.Map(
        document.getElementById('map'), {
            zoom: 13,
            center: shop
        });
    // The marker, positioned at shop
    var marker = new google.maps.Marker({
        position: shop,
        map: map
    });
}
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9Qz9B3NIrtXIoweI1-F9ly4Ilad2kLjI&callback=initMap">
</script>

<?php include('layout/footer.php') ?>