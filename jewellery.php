<?php include('layout/header.php')?>

<?php
$server = "localhost";
$user = "root";
$pass ="";
$database = "creative_jewelers_kaveen";

$con = mysqli_connect($server,$user,$pass,$database);
//-------------- Connection--------
$sql="";
$msg1="";
$search="";

if($con){

//------------------- Search ------------------------
	
if(isset($_GET['btnSearch'])){

  $search = $_POST['txtSearch'];
  $sql = "SELECT * FROM products WHERE p_name='$search' && sub_category='$search'";
        if(mysqli_query($con,$sql)){
          //header("location: index.php");
        }
        else{
            $msg1="<div style=color:red;><b>Error :".mysqli_error($con)."</b></div>";
        }
}


}else{
    $msg1="<div style=color:red;><b>Error :".mysqli_connect_error()."</b></div>";
}


?>


<div style="padding-top:76px;" align="center" ;>

        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding-left:100px; padding-right:100px;">
            <a class="navbar-brand"><b>JEWELLERY CATEGORY<i class="fas fa-arrow-right"
                        style="padding-left:20px;"></i></b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="padding-left:50px;">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="jewellery.php?page=ladies_jewellery" style="padding-left:30px;"><b><i
                                    class="fas fa-female" style="padding-right:5px;"></i>LADIES</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="jewellery.php?page=gens_jewellery" style="padding-left:30px;"><b><i
                                    class="fas fa-male" style="padding-right:5px;"></i>GENS</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="jewellery.php?page=kids_jewellery" style="padding-left:30px;"><b><i
                                    class="fas fa-child" style="padding-right:5px;"></i>KIDS</b></a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" method="get">
                    <input class="form-control mr-sm-2" name="txtSearch" type="search" placeholder="Search Jewellery"
                        aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="btnSearch">Search</button>
                </form>
            </div>
        </nav>


    <div style="height:auto;">

        <?php
if(isset($_GET['page'])){
	$pageName = $_GET['page'];
	include($pageName.'.php');
}
else{
	include('ladies_jewellery.php');
}
?>

    </div>




    <?php include('layout/footer.php') ?>