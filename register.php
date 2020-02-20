<?php include('layout/header.php') ?>

<div style="padding-top:76px;" align="center" ;>
    <div class="container" style="padding-top: 50px; padding-bottom: 80px;">
        <div class="row">

            <div class="col">
                <h1 style="color:#00dda8; padding-top: 15px; padding-bottom: 30px;"><b>USER REGISTRATIONS</b></h1>
                <form class="needs-validation" novalidate action="index.html">
                    <div class="form-row col-xl-10">
                        <div class="form-group">
                            <input id="txtFname" type="text" class="form-control" placeholder="First name" required>
                        </div>
                        <div class="form-group" style="margin-left:17px;">
                            <input id="txtLname" type="text" class="form-control" placeholder="Last name" required>
                        </div>
                    </div>
                    <div class="form-group col-xl-10">
                        <input id="txtAddress" type="text" class="form-control" placeholder="Street Address" required>
                    </div>
                    <div class="form-group col-xl-10">
                        <input id="txtCity" type="text" class="form-control" placeholder="City" required>
                    </div>
                    <div class="form-row col-xl-10">
                        <div class="form-group">
                            <input id="txtZipCode" type="number" min="0" class="form-control" placeholder="Zip Code" required>
                        </div>
                        <div class="form-group" style="margin-left:17px;">
                            <input id="txtCountry" type="text" class="form-control" placeholder="Country" required>
                        </div>
                    </div>

                    <div class="form-group col-xl-10" align="left">
                        <label><b>Birthday :</b></label>
                        <input id="Date" type="date" class="form-control" placeholder="Birthday" required>
                    </div>
                    <div class="form-group col-xl-10">
                        <input id="txtEmail" type="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group col-xl-10">
                        <input id="txtPassword" type="password" class="form-control" placeholder="Password" required>
                    </div><br />
                    <button type="submit" id="btn2" class="btn"><i class="fas fa-user-plus"
                            style="padding-right: 10px;"></i>REGISTER</button>

                </form>


            </div>
            <div class="col">
                <img src="assets/images/img5.png" />
            </div>
        </div>
    </div>

</div>

<?php include('layout/footer.php') ?>