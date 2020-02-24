<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="assets/css/fontawesome.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
    <!--load all fontawesome styles -->

    <title>Creative Jewelers</title>
</head>

<body>

    <div class="container-fluid" data-animate="fadeInUp">
        <div>
            <nav class="navbar fixed-top">
                <diV class="container">
                    <div class="row">
                        <div class="col">
                            <a class="navbar-brand" href="index.php"><img id="logo" src="assets/images/logo1.png"
                                    width="160" height="50"></a>
                        </div>

                        <nav class="navbar navbar-expand-lg navbar-light">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                                <div class="row" style="margin-left: 50px;">
                                    <ul class="nav nav-pills ">
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php"><b>HOME</b></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><b>ABOUT US</b></a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" data-toggle="dropdown"
                                                data-hover="dropdown" href="#" role="button" aria-haspopup="true"
                                                aria-expanded="false"><b>JEWELLERY</b></a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="jewellery.php">NECKLACES</a>
                                                <a class="dropdown-item" href="#">BRACELETS</a>
                                                <a class="dropdown-item" href="#">RINGS</a>
                                                <a class="dropdown-item" href="#">EARRINGS</a>
                                                <a class="dropdown-item" href="#">CHAINS</a>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><b>CONTACT US</b></a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="row" style="margin-left: 90px;">
                                    <ul class="nav nav-pills">
                                        <li style="margin-top:2px;">
                                            <!-- Button trigger modal -->
                                            <button type="button" id="btnCart" class="btn" data-toggle="modal"
                                                data-target="#staticBackdrop"><i class="fas fa-shopping-cart"></i><b
                                                    style="padding-left: 10px;">MY
                                                    CART</b>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="staticBackdrop" data-backdrop="static"
                                                tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Modal
                                                                title</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ...
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="button"
                                                                class="btn btn-primary">Understood</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                        <li style="border-left: 2px solid black;">
                                            <a class="nav-link" href="login.php"><i class="fas fa-user"></i><b
                                                    style="padding-left: 10px;">LOGIN</b></a>
                                        </li>


                                    </ul>
                                </div>
                        </nav>
                    </div>
                </div>
            </nav>
        </div>
    </div>