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
                <a class="nav-link" id="v-pills-pendants-tab" data-toggle="pill" href="#v-pills-pendants" role="tab"
                    aria-controls="v-pills-pendants" aria-selected="false">PENDANTS</a>
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
                            $sql = "SELECT * FROM products WHERE category='Ladies' AND sub_category='Necklaces'";
                            $result = mysqli_query($con,$sql);
                            if(mysqli_num_rows($result)>0){
                                echo "<div class=container>";
                                echo "<div class=row>";

                                while($row = mysqli_fetch_assoc($result)){

                                    ?>
                                    <div class="col-sm" style="padding:50px;">
                                        <form class="validation" novalidate action="jewellery.php?page=ladies_jewellery&action=add&id=<?php echo $row['p_id'];?>" method="post">
                                            <img class="product" src="assets/images/<?php echo $row['image'] ?>" /><input
                                                type='hidden' name='image' value="<?php echo $row['image'];?>" />
                                            <h5 style="padding-top:20px;"><b><?php echo $row['p_name'];?></b><input type='hidden'
                                                    name='txtName' value="<?php echo $row['p_name'];?>" /></h5>
                                            <div>Material :<?php echo $row['material'];?><input type='hidden' name='txtMaterial'
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
                            $sql = "SELECT * FROM products WHERE category='Ladies' AND sub_category='Bracelets'";
                            $result = mysqli_query($con,$sql);
                            if(mysqli_num_rows($result)>0){
                                echo "<div class=container>";
                                echo "<div class=row>";

                                while($row = mysqli_fetch_assoc($result)){

                                    ?>
                                    <div class="col-sm" style="padding:50px;">
                                        <form class="validation" novalidate action="jewellery.php?page=ladies_jewellery&action=add&id=<?php echo $row['p_id'];?>"
                                         method="post">
                                            <img class="product" src="assets/images/<?php echo $row['image'] ?>" /><input 
                                            type='hidden' name='image'
                                                value="<?php echo $row['image'];?>" />
                                            <h5 style="padding-top:20px;"><b><?php echo $row['p_name'];?></b><input type='hidden'
                                                    name='txtName' value="<?php echo $row['p_name'];?>" /></h5>
                                            <div>Material :<?php echo $row['material'];?><input type='hidden' name='txtMaterial'
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
                            $sql = "SELECT * FROM products WHERE category='Ladies' AND sub_category='Rings'";
                            $result = mysqli_query($con,$sql);
                            if(mysqli_num_rows($result)>0){
                                echo "<div class=container>";
                                echo "<div class=row>";

                                while($row = mysqli_fetch_assoc($result)){

                                    ?>
                                    <div class="col-sm" style="padding:50px;">
                                        <form class="validation" novalidate action="jewellery.php?page=ladies_jewellery&action=add&id=<?php echo $row['p_id'];?>"
                                         method="post">
                                            <img class="product" src="assets/images/<?php echo $row['image'] ?>" width=200
                                                height=200 /><input type='hidden' name='image'
                                                value="<?php echo $row['image'];?>" />
                                            <h5 style="padding-top:20px;"><b><?php echo $row['p_name'];?></b><input type='hidden'
                                                    name='txtName' value="<?php echo $row['p_name'];?>" /></h5>
                                            <div>Material :<?php echo $row['material'];?><input type='hidden' name='txtMaterial'
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
                            $sql = "SELECT * FROM products WHERE category='Ladies' AND sub_category='Earrings'";
                            $result = mysqli_query($con,$sql);
                            if(mysqli_num_rows($result)>0){
                                echo "<div class=container>";
                                echo "<div class=row>";

                                while($row = mysqli_fetch_assoc($result)){

                                    ?>
                                    <div class="col-sm" style="padding:50px;">
                                        <form class="validation" novalidate action="jewellery.php?page=ladies_jewellery&action=add&id=<?php echo $row['p_id'];?>"
                                         method="post">
                                            <img class="product" src="assets/images/<?php echo $row['image'] ?>" width=200
                                                height=200 /><input type='hidden' name='image'
                                                value="<?php echo $row['image'];?>" />
                                            <h5 style="padding-top:20px;"><b><?php echo $row['p_name'];?></b><input type='hidden'
                                                    name='txtName' value="<?php echo $row['p_name'];?>" /></h5>
                                            <div>Material :<?php echo $row['material'];?><input type='hidden' name='txtMaterial'
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
                            $sql = "SELECT * FROM products WHERE category='Ladies' AND sub_category='Chains'";
                            $result = mysqli_query($con,$sql);
                            if(mysqli_num_rows($result)>0){
                                echo "<div class=container>";
                                echo "<div class=row>";

                                while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                    <div class="col-sm" style="padding:50px;">
                                        <form class="validation" novalidate action="jewellery.php?page=ladies_jewellery&action=add&id=<?php echo $row['p_id'];?>"
                                         method="post">
                                            <img class="product" src="assets/images/<?php echo $row['image'] ?>" width=200
                                                height=200 /><input type='hidden' name='image'
                                                value="<?php echo $row['image'];?>" />
                                            <h5 style="padding-top:20px;"><b><?php echo $row['p_name'];?></b><input type='hidden'
                                                    name='txtName' value="<?php echo $row['p_name'];?>" /></h5>
                                            <div>Material :<?php echo $row['material'];?><input type='hidden' name='txtMaterial'
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
                                echo "<div style=color:red;><b>Not Found</b></div>";
                            }
                            ?>
                    </div>
                </div>

                <div class="tab-pane fade" id="v-pills-pendants" role="tabpanel" aria-labelledby="v-pills-pendants-tab">

                    <!-- -------------- Pendants ---------------- -->

                    <div align="center" class="container" style="padding-top:50px;">
                        <div class="alert alert-success" role="alert">
                            <h1>LADIES JEWELLERY</h1>
                            <h3>PENDANTS</h3>
                        </div>

                        <?php
                            $sql = "SELECT * FROM products WHERE category='Ladies' AND sub_category='Pendants'";
                            $result = mysqli_query($con,$sql);
                            if(mysqli_num_rows($result)>0){
                                echo "<div class=container>";
                                echo "<div class=row>";

                                while($row = mysqli_fetch_assoc($result)){

                                    ?>
                                    <div class="col-sm" style="padding:50px;">
                                        <form class="validation" novalidate action="jewellery.php?page=ladies_jewellery&action=add&id=<?php echo $row['p_id'];?>"
                                         method="post">
                                            <img class="product" src="assets/images/<?php echo $row['image'] ?>" width=200
                                                height=200 /><input type='hidden' name='image'
                                                value="<?php echo $row['image'];?>" />
                                            <h5 style="padding-top:20px;"><b><?php echo $row['p_name'];?></b><input type='hidden'
                                                    name='txtName' value="<?php echo $row['p_name'];?>" /></h5>
                                            <div>Material :<?php echo $row['material'];?><input type='hidden' name='txtMaterial'
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
                                echo "<div style=color:red;><b>Not Found</b></div>";
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>