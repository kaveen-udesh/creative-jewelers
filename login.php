<?php include('layout/header.php') ?>

<div style="padding-top:76px;" align="center" ;>

    <div class="container" style="padding-top: 50px; padding-bottom: 80px;">
        <div class="row">
            <div class="col">
                <img src="assets/images/img2.png" />
            </div>
            <div class="col">
                <h1 style="color:#00dda8; padding-top: 130px; padding-bottom: 30px;"><b>USER LOGIN</b></h1>
                <form class="validation" novalidate action="index.php">
                    <div class="form-group col-xl-7">
                        <input id="txtEmail" type="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group col-xl-7">
                        <input id="txtPassword" type="password" class="form-control" placeholder="Password" required>
                    </div><br />
                    <button type="submit" id="btn2" class="btn"><i class="fas fa-sign-in-alt" style="padding-right: 10px;"></i>LOGIN</button>
                </form><br />
                <p>Don't have an Account... <a style="color:#00dda8;" href="register.php">Register now!</a></p>

            </div>
        </div>
    </div>

</div>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
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
}
)();
</script>

<?php include('layout/footer.php') ?>