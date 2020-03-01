<div id="footer" data-animate="fadeInUp">
    <div class="row no-gutters">
        <div class="col-4">
            <a href="index.php"><img id="logo" src="assets/images/logo.png" alt="Creative Jewellers Logo" width="180"
                    height="auto" /></a>
        </div>
        <div class="col-4">
            <address>
                <p>Creative Jewelers</p>
                <p>Battaramulla,</p>
                <p>Colombo, Sri Lanka,</p>
            </address>
            <p>+94 547 475 475 / +94 578 475 475</p>
            <p>info@creativejewelers.lk</p>
        </div>
        <div class="col-4">
            <!-- <img src="assets/images/footertime.png" alt="timelogo"> -->
            <br /><br /><br /><br /><br />
            <p>Open Hours</p>
            <p>9.00 AM - 9.00 PM</p>
        </div>
    </div>

    <hr color="#CCCCCC" />

    <div class="container">
        <div class="row">
            <div class="col" style="text-align:left;">
                <p>Copyright © 2020 Creative Jewelers (pvt) Ltd. All rights reserved.</p>
            </div>
            <div class="col" style="text-align:right;">
                <p>Developed by <a style="color:#00dda8;" href="#">Kaveen Udesh</a></p>
            </div>
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