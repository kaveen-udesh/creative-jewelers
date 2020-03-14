<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="../assets/css/fontawesome.css" rel="stylesheet">
    <link href="../assets/css/adminstyles.css" rel="stylesheet">
    <!--load all fontawesome styles -->

    <title>Creative Jewelers</title>
</head>

<body>




    <div class="container-fluid">
        <div class="row no-gutters" style="background-color:#f2f2f2;">
            <div class="col" style="margin-left:20px;">
                <a class="navbar-brand" href="dashboard.php"><img id="logo" src="../assets/images/adminLogo.png"></a>
            </div>

            <div class="col" align="right">
                <nav class="navbar" style="float: right;">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i><b style="padding-left: 10px;">ACCOUNT</b>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="account.php">MY ACCOUNT</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="index.php">LOGOUT</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>