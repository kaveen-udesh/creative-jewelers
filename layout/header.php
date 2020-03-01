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

    <?php
session_start();

 //add to cart
 if(isset($_POST['btnAdd'])){
    if(isset($_SESSION['cart'])){
        
      $pID = array_column($_SESSION['cart'],'id'); 
       
       if(!in_array($_GET['id'],$pID)){
           
           $count = count($_SESSION['cart']);
           
           $pro_Array =array('id'=>$_GET['id'],'image'=>$_POST['image'], 'name'=>$_POST['txtName'], 'material'=>$_POST['txtMaterial'], 'weight'=>$_POST['txtWeight'], 'price'=>$_POST['txtPrice'], 'qty'=>$_POST['txtQty']);
           
           $_SESSION['cart'][$count]=$pro_Array;
       }	 
    }
    else{
                
        $pro_Array =array('id'=>$_GET['id'],'image'=>$_POST['image'], 'name'=>$_POST['txtName'], 'material'=>$_POST['txtMaterial'], 'weight'=>$_POST['txtWeight'], 'price'=>$_POST['txtPrice'], 'qty'=>$_POST['txtQty']);
           
         $_SESSION['cart'][0]=$pro_Array;
       }	
}


//Remove cart Items
if(isset($_POST['btnRemove'])){
		foreach($_SESSION['cart'] as $k=>$value){
			if($value['id']==$_POST['id']){
				unset($_SESSION['cart'][$k]);
			}
        }
        

    }
    
    

//Clear cart
if(isset($_POST['btnClear'])){
	foreach($_SESSION['cart'] as $k=>$value){
		unset($_SESSION['cart'][$k]);
	}
}

?>

    <div class="container-fluid" data-animate="fadeInUp">
        <div>
            <nav class="navbar fixed-top" id="navbar">
                <diV class="container">
                    <div class="row">
                        <div class="col">
                            <a class="navbar-brand" href="index.php"><img id="logo" src="assets/images/logo1.png"
                                    width="140" height="50"></a>
                        </div>

                        <nav class="navbar navbar-expand-lg navbar-light">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                                <div class="row" style="margin-left: 80px;">
                                    <ul class="nav nav-pills ">
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php"><b>HOME</b></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="about us.php"><b>ABOUT US</b></a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" data-toggle="dropdown"
                                                data-hover="dropdown" href="#" role="button" aria-haspopup="true"
                                                aria-expanded="false"><b>JEWELLERY</b></a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="jewellery.php?page=ladies_jewellery">LADIES JEWELLERY</a>
                                                <a class="dropdown-item" href="jewellery.php?page=gens_jewellery">GENS
                                                    JEWELLERY</a>
                                                <a class="dropdown-item" href="jewellery.php?page=kids_jewellery">KIDS
                                                    JEWELLERY</a>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="contact.php"><b>CONTACT US</b></a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="row" style="margin-left: 100px;">
                                    <ul class="nav nav-pills">
                                        <li style="margin-top:2px;">

                                            <?php 
					                    $cart_count=0;
					
					                    if (isset($_SESSION['cart_items'])){
						
						                    $cart_count=count($_SESSION['cart']);
						
                                            }
                                        ?>



                                            <!-- Button trigger modal -->
                                            <button type="button" id="btnCart" class="btn" data-toggle="modal"
                                                data-target="#staticBackdrop" style="padding-right: 15px;"><i
                                                    class="fas fa-shopping-cart"></i><b style="padding-left: 5px;">
                                                    <a class="Cart">
                                                        <span>MY CART</span>
                                                        <span class="badge"><i><?php echo $cart_count ?></i></span>
                                                    </a>
                                                </b>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="staticBackdrop" data-backdrop="static"
                                                tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header" align="center">
                                                            <h5 class="modal-title" id="staticBackdropLabel"><b>MY
                                                                    CART</b></h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="container modal-body">
                                                            <?php
                                                            if(!empty($_SESSION['cart'])){
                                                                $total=0;
                                                                ?>

                                                            <table width="760px">
                                                                <tr style="text-align:center;">
                                                                    <th></th>
                                                                    <th>Name</th>
                                                                    <th>Material</th>
                                                                    <th>Weight(g)</th>
                                                                    <th>Price(Rs.)</th>
                                                                    <th>Quantity</th>
                                                                    <th>Subtotal</th>
                                                                    <th></th>
                                                                </tr>
                                                                <?php
                                                                    foreach($_SESSION['cart'] as $k=>$value){
                                                                        $subTotal=0;
                                                                        ?>
                                                                <form method="post">
                                                                    <tr style="text-align:center;">
                                                                        <td><img src="assets/images/<?php echo $value['image'] ?>"
                                                                                width=auto height=80 /></td>
                                                                        <td><?php echo $value['name'] ?></td>
                                                                        <td><?php echo $value['material'] ?></td>
                                                                        <td><?php echo $value['weight'] ?></td>
                                                                        <td><?php echo $value['price'] ?></td>
                                                                        <td><?php echo $value['qty'] ?></td>
                                                                        <?php $subTotal=$value['price']*$value['qty']; ?>
                                                                        <td><?php echo $subTotal ?></td>
                                                                        <td><input type="submit"
                                                                                class="btn btn-outline-danger"
                                                                                value="Remove" name="btnRemove" />
                                                                            <input type="hidden"
                                                                                value="<?php echo $value['id'];?>"
                                                                                name="id" />
                                                                        </td>
                                                                    </tr>
                                                                </form>
                                                                <?php
                                                                            $total += $subTotal;
                                                                    }
                                                                    ?>
                                                                <form method="post">
                                                                    <tr style="text-align:center;">
                                                                        <td colspan="6" align="right"><b>Total : Rs.</b>
                                                                        </td>
                                                                        <td><b><?php echo $total; ?></b></td>
                                                                        <td></td>
                                                                    </tr>
                                                            </table>



                                                        </div>
                                                        <div class="modal-footer">

                                                            <a href="#" type="submit"
                                                                class="btn btn-success">Checkout</a>
                                                            <input type="submit" class="btn btn-danger"
                                                                value="Clear Cart" name="btnClear" />
                                                            </form>
                                                            <?php
                                                            }else{
                                                                echo "<div style=color:red;><b>Empty Cart !</b></div>";
                                                            }

                                                            ?>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                        <?php if(isset($_SESSION["email"])){?>
                                        <li style="border-left: 2px solid black;">
                                            <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i><b
                                                    style="padding-left: 10px;">LOGOUT</b></a>      
                                        </li>
                                        <?php } else {?>
                                            <li style="border-left: 2px solid black;">
                                            <a class="nav-link" href="login.php"><i class="fas fa-user"></i><b
                                                    style="padding-left: 10px;">LOGIN</b></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                        </nav>
                    </div>
                </div>
            </nav>
        </div>
    </div>