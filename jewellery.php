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
                <form class="form-inline my-2 my-lg-0 validation"  novalidate method="get">
                    <input class="form-control mr-sm-2" name="txtSearch" type="search" placeholder="Search Jewellery"
                        aria-label="Search" required>
                    
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>


<?php
//------------------- Search ------------------------
	
    if(isset($_GET['txtSearch'])){
      $search = $_GET['txtSearch'];
      $sql = "SELECT * FROM products WHERE p_name LIKE '%$search%'";
      $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result)>0){
                echo "<div class=container>";
                ?>
                <div class="alert alert-success" role="alert" style="margin-top:20px;">
                <h2>Searched : <?php echo $search; ?></h2>
                </div>
                <?php                    
                echo "<div class=row>";

                while($row = mysqli_fetch_assoc($result)){

                    ?>
                    <div class="col-sm" style="padding:50px;">
                        <form class="validation" novalidate action="jewellery.php?txtSearch=<?php echo $search ?>&action=add&id=<?php echo $row['p_id'];?>" method="post">
                            <img class="product" src="assets/images/<?php echo $row['image'] ?>" width=200
                                height=200 /><input type='hidden' name='image'
                                value="<?php echo $row['image'];?>" />
                            <h5 style="padding-top:20px;"><b><?php echo $row['p_name'];?></b><input type='hidden'
                                    name='txtName' value="<?php echo $row['p_name'];?>" /></h5>
                            <div>Material : <?php echo $row['material'];?><input type='hidden' name='txtMaterial'
                                    value="<?php echo $row['material'];?>" /> </div>
                            <div>Weight : <?php echo $row['weight'];?><input type='hidden' name='txtWeight'
                                    value="<?php echo $row['weight'];?>" />g</div>
                            
                            <?php
                            if($row['discount']>0){

                                ?>
                                <div><strike>Rs.<?php echo $row['price'];?></strike><input type='hidden'
                                    name='txtPrice' value="<?php echo $row['price'];?>" /></div>
                                <div style="padding-bottom:20px; color:red;"><h4>Rs. <?php
                                echo $row['sale_price'];?></h4><input type='hidden'
                                    name='txtSalePrice' value="<?php echo $row['sale_price'];?>" /></div>
                            <?php
                            }else{
                            ?>
                                <div style="padding-bottom:20px; padding-top:24px;"><h4>Rs. <?php
                                echo $row['sale_price'];?></h4><input type='hidden'
                                    name='txtSalePrice' value="<?php echo $row['sale_price'];?>" /></div>
                            <?php
                            }
                            ?>
                            
                            <div class="col-md-5" style=padding-bottom:20px;>
                                <label>Quantity</label>
                                <input class="form-control" type="number" min="1" name="txtQty" required>
                            </div>
                            <input type="submit" class="btn" id="btn2" name="btnAdd" value="Add to Cart" />
                        </form>
                    </div>
                    <?php

                }
                echo "</div>";
                echo "</div>";
            }
            else{
                ?>
                <div class="alert alert-danger" role="alert" style="margin-top:20px;">
                <h2>Searched : <?php echo $search; ?></h2>
                <h2><?php echo "Product Not Found"; ?></h2>
                </div>
                <?php
            }
    }
?>

<div style="height:auto;">

<?php
if(isset($_GET['page'])){
	$pageName = $_GET['page'];
	include($pageName.'.php');
}
else{
	
}
?>

</div>

<?php include('layout/footer.php') ?>