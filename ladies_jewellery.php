<?php

$server = "localhost";
$user = "root";
$pass ="";
$database = "creative_jewelers_kaveen";

$con = mysqli_connect($server,$user,$pass,$database);
//-------------- Connection--------
$sql="";

?>

<div class="container-fluid">
    <div class="row no-gutters">
        <div class="col-2" style="background-color:#f2f2f2; padding-top:50px;">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-necklaces-tab" data-toggle="pill" href="#v-pills-necklaces"
                    role="tab" aria-controls="v-pills-necklaces" aria-selected="true">NECKLACES</a>
                <a class="nav-link" id="v-pills-bracelets-tab" data-toggle="pill" href="#v-pills-bracelets" role="tab"
                    aria-controls="v-pills-bracelets" aria-selected="false">BRACELETS</a>
                <a class="nav-link" id="v-pills-rings-tab" data-toggle="pill" href="#v-pills-rings" role="tab"
                    aria-controls="v-pills-rings" aria-selected="false">RINGS</a>
                <a class="nav-link" id="v-pills-earrings-tab" data-toggle="pill" href="#v-pills-earrings" role="tab"
                    aria-controls="v-pills-earrings" aria-selected="false">EARRINGS</a>
                <a class="nav-link" id="v-pills-chains-tab" data-toggle="pill" href="#v-pills-chains" role="tab"
                    aria-controls="v-pills-chains" aria-selected="false">CHAINS</a>
            </div>
        </div>
        <div class="col-10">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-necklaces" role="tabpanel"
                    aria-labelledby="v-pills-necklaces-tab">

                    <!-- -------------- Necklaces ---------------- -->

                    <div align="center" class="container" style="padding-top:50px;">
                        <div class="alert alert-success" role="alert">
                            <h1>LADIES JEWELLERY</h1>
                            <h3>NECKLACES</h3>
                        </div>

                        <?php
                            $sql = "SELECT * FROM products WHERE category='Ladies' && sub_category='Necklaces'";
                            $result = mysqli_query($con,$sql);
                            if(mysqli_num_rows($result)>0){
                                echo "<div class=container>";
                                echo "<div class=row>";
                                $r=1;
                                $crl="";
                                while($row = mysqli_fetch_row($result)){
                                    if($r%2==0){
                                        $crl="#efefef";
                                    }
                                    else{
                                        $crl="#d9d9d9";
                                    }
                                    echo " 
                                        <div class=col-sm style=padding:50px;>
                                        <p><img src='assets/images/".$row[7]."' width=200 height=200/></p>
                                        <p><b>"."  ".$row[1]."</b></p>
                                        <p>"." Material : ".$row[4]."</p>
                                        <p>"." Weight : ".$row[5]."g</p>
                                        <p>"."  Rs.".$row[6]."</p>
                                        <p><button class=btn id=btn2>Add to Cart</button></p>
                                        </div>";
                                        $r++;
                                }
                                echo "</div>";
                                echo "</div>";
                            }
                            else{
                                echo "<div style=color:red;><b>Not Found</b></div>";
                            }
                            ?>
                    </div>

                </div>
                <div class="tab-pane fade" id="v-pills-bracelets" role="tabpanel"
                    aria-labelledby="v-pills-bracelets-tab">

                    <!-- -------------- Bracelets ---------------- -->

                    <div align="center" class="container" style="padding-top:50px;">
                        <div class="alert alert-success" role="alert">
                            <h1>LADIES JEWELLERY</h1>
                            <h3>BRACELETS</h3>
                        </div>

                        <?php
                            $sql = "SELECT * FROM products WHERE category='Ladies' && sub_category='Bracelets'";
                            $result = mysqli_query($con,$sql);
                            if(mysqli_num_rows($result)>0){
                                echo "<div class=container>";
                                echo "<div class=row>";
                                $r=1;
                                $crl="";
                                while($row = mysqli_fetch_row($result)){
                                    if($r%2==0){
                                        $crl="#efefef";
                                    }
                                    else{
                                        $crl="#d9d9d9";
                                    }
                                    echo " 
                                        <div class=col-sm style=padding:50px;>
                                        <p><img src='assets/images/".$row[7]."' width=200 height=200/></p>
                                        <p><b>"."  ".$row[1]."</b></p>
                                        <p>"." Material : ".$row[4]."</p>
                                        <p>"." Weight : ".$row[5]."g</p>
                                        <p>"."  Rs.".$row[6]."</p>
                                        <p><button class=btn id=btn2>Add to Cart</button></p>
                                        </div>";
                                        $r++;
                                }
                                echo "</div>";
                                echo "</div>";
                            }
                            else{
                                echo "<div style=color:red;><b>Not Found</b></div>";
                            }
                            ?>
                    </div>

                </div>
                <div class="tab-pane fade" id="v-pills-rings" role="tabpanel" aria-labelledby="v-pills-rings-tab">
                    
                    <!-- -------------- Rings ---------------- -->

                    <div align="center" class="container" style="padding-top:50px;">
                        <div class="alert alert-success" role="alert">
                            <h1>LADIES JEWELLERY</h1>
                            <h3>RINGS</h3>
                        </div>

                        <?php
                            $sql = "SELECT * FROM products WHERE category='Ladies' && sub_category='Rings'";
                            $result = mysqli_query($con,$sql);
                            if(mysqli_num_rows($result)>0){
                                echo "<div class=container>";
                                echo "<div class=row>";
                                $r=1;
                                $crl="";
                                while($row = mysqli_fetch_row($result)){
                                    if($r%2==0){
                                        $crl="#efefef";
                                    }
                                    else{
                                        $crl="#d9d9d9";
                                    }
                                    echo " 
                                        <div class=col-sm style=padding:50px;>
                                        <p><img src='assets/images/".$row[7]."' width=200 height=200/></p>
                                        <p><b>"."  ".$row[1]."</b></p>
                                        <p>"." Material : ".$row[4]."</p>
                                        <p>"." Weight : ".$row[5]."g</p>
                                        <p>"."  Rs.".$row[6]."</p>
                                        <p><button class=btn id=btn2>Add to Cart</button></p>
                                        </div>";
                                        $r++;
                                }
                                echo "</div>";
                                echo "</div>";
                            }
                            else{
                                echo "<div style=color:red;><b>Not Found</b></div>";
                            }
                            ?>
                    </div>
                    
                </div>
                <div class="tab-pane fade" id="v-pills-earrings" role="tabpanel" aria-labelledby="v-pills-earrings-tab">
                    
                    <!-- -------------- Earrings ---------------- -->

                    <div align="center" class="container" style="padding-top:50px;">
                        <div class="alert alert-success" role="alert">
                            <h1>LADIES JEWELLERY</h1>
                            <h3>EARRINGS</h3>
                        </div>

                        <?php
                            $sql = "SELECT * FROM products WHERE category='Ladies' && sub_category='Earrings'";
                            $result = mysqli_query($con,$sql);
                            if(mysqli_num_rows($result)>0){
                                echo "<div class=container>";
                                echo "<div class=row>";
                                $r=1;
                                $crl="";
                                while($row = mysqli_fetch_row($result)){
                                    if($r%2==0){
                                        $crl="#efefef";
                                    }
                                    else{
                                        $crl="#d9d9d9";
                                    }
                                    echo " 
                                        <div class=col-sm style=padding:50px;>
                                        <p><img src='assets/images/".$row[7]."' width=200 height=200/></p>
                                        <p><b>"."  ".$row[1]."</b></p>
                                        <p>"." Material : ".$row[4]."</p>
                                        <p>"." Weight : ".$row[5]."g</p>
                                        <p>"."  Rs.".$row[6]."</p>
                                        <p><button class=btn id=btn2>Add to Cart</button></p>
                                        </div>";
                                        $r++;
                                }
                                echo "</div>";
                                echo "</div>";
                            }
                            else{
                                echo "<div style=color:red;><b>Not Found</b></div>";
                            }
                            ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-chains" role="tabpanel" aria-labelledby="v-pills-chains-tab">
                    
                    <!-- -------------- Chains ---------------- -->

                    <div align="center" class="container" style="padding-top:50px;">
                        <div class="alert alert-success" role="alert">
                            <h1>LADIES JEWELLERY</h1>
                            <h3>CHAINS</h3>
                        </div>

                        <?php
                            $sql = "SELECT * FROM products WHERE category='Ladies' && sub_category='Chains'";
                            $result = mysqli_query($con,$sql);
                            if(mysqli_num_rows($result)>0){
                                echo "<div class=container>";
                                echo "<div class=row>";
                                $r=1;
                                $crl="";
                                while($row = mysqli_fetch_row($result)){
                                    if($r%2==0){
                                        $crl="#efefef";
                                    }
                                    else{
                                        $crl="#d9d9d9";
                                    }
                                    echo " 
                                        <div class=col-sm style=padding:50px;>
                                        <p><img src='assets/images/".$row[7]."' width=200 height=200/></p>
                                        <p><b>"."  ".$row[1]."</b></p>
                                        <p>"." Material : ".$row[4]."</p>
                                        <p>"." Weight : ".$row[5]."g</p>
                                        <p>"."  Rs.".$row[6]."</p>
                                        <p><button class=btn id=btn2>Add to Cart</button></p>
                                        </div>";
                                        $r++;
                                }
                                echo "</div>";
                                echo "</div>";
                            }
                            else{
                                echo "<div style=color:red;><b>Not Found</b></div>";
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>