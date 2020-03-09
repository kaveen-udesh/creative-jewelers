<?php

    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "creative_jewelers_kaveen";

    $con = mysqli_connect($server, $user, $pass, $database);

    /** ---------------- Connection ---------------- */

    $id="";
    $name="";
    $category="";
    $sub_category="";
    $material="";
    $weight="";
    $price="";
    $discount="";
    $dis_price=0;
    $sale_price=0;
    $image="";
    $msg="";
    $sql="";
    $arrType=array("jpg","jpeg","png","PNG");

if($con){

//------------------- Insert Product ------------------------
 
 if(isset($_POST['btnInsert'])){
    $image=$_FILES['imageUpload']['name'];
   
   if(!empty($image)){
	 $id= $_POST['txtID'];
     $name=$_POST['txtName'];
     $category=$_POST['txtCategory'];
     $sub_category=$_POST['txtSubCategory'];
     $material=$_POST['txtMaterial'];
     $weight=$_POST['txtWeight'];
     $price=$_POST['txtPrice'];
     $discount=$_POST['txtDiscount'];
     $dis_price=$price*($discount/100);
     $sale_price=$price-$dis_price;
	 
	 $temp = $_FILES['imageUpload']['tmp_name'];
	 $path ="products/";
     $move_path ="../assets/images/".$path;
	 $ext = explode(".",$image);
	 if(in_array($ext[1],$arrType)) {
			$sql="INSERT INTO products VALUES (".$id.",'".$name."','".$category."','".$sub_category."','".$material."',".$weight.",".$price.",'".$path.$image."',".$discount.",".$dis_price.",".$sale_price.")" ;
			if(mysqli_query($con,$sql)){
				$msg="<div style=color:blue;><b>New Product Inserted!</b></div>";
				move_uploaded_file($temp,$move_path.$image);
			} else {
				$msg="<div style=color:red;><b>Error :".mysqli_error($con)."</b></div>";
			}
	 }
	 else{
		 $msg="<div style=color:red;><b>Invalid File Type</b></div>"; 
	 }
   }
   else{
	  $msg="<div style=color:red;><b>Please Select an Image</b></div>"; 
   }
 }
	
//------------------- Delete Product ------------------------
	
	if(isset($_POST['btnDelete'])){
        $id = $_POST['txtID'];
        if(!empty($id)){
            
			$sql = "DELETE FROM products WHERE p_id=".$id."";
			
			if(mysqli_query($con,$sql)){
				$msg="<div style=color:red;><b>Product Deleted!</b></div>";
			}
			else{
				$msg="<div style=color:red;><b>Error :".mysqli_error($con)."</b></div>";
			}
        }else{
            $msg="<div style=color:red;><b>Please Enter Product ID</b></div>"; 
        }
		
	}
	


//------------------- Update Product ------------------------
	
	if(isset($_POST['btnUpdate'])){
        $id= $_POST['txtID'];
        $image=$_FILES['imageUpload']['name'];

        if(!empty($image)){
            
        $name=$_POST['txtName'];
        $category=$_POST['txtCategory'];
        $sub_category=$_POST['txtSubCategory'];
        $material=$_POST['txtMaterial'];
        $weight=$_POST['txtWeight'];
        $price=$_POST['txtPrice'];
        $discount=$_POST['txtDiscount'];
        $dis_price=$price*($discount/100);
        $sale_price=$price-$dis_price;
        
        $temp = $_FILES['imageUpload']['tmp_name'];
        $path ="products/";
        $move_path ="../assets/images/".$path;
        $ext = explode(".",$image);
        
			$sql = "UPDATE products SET p_name='".$name."', category='".$category."', sub_category='".$sub_category."', material='".$material."', weight=".$weight.", price=".$price." ,image='".$path.$image."', discount=".$discount.", dis_price=".$dis_price.", sale_price=".$sale_price." WHERE p_id =".$id."";
			
			if(mysqli_query($con,$sql)){
                $msg="<div style=color:blue;><b>Product Updated!</b></div>";
                move_uploaded_file($temp, $move_path.$image);
			}
			else{
				$msg="<div style=color:red;><b>Error :".mysqli_error($con)."</b></div>";
			}
        }else{
            $msg="<div style=color:red;><b>Please Select Product Image</b></div>"; 
        }
    }
		
    
    
//---------------- Search Product --------------------------
 
if(isset($_POST['btnSearch'])){
    $id= $_POST['txtID'];
    if(!empty($id)){
    
        $sql="SELECT * FROM products WHERE p_id=".$id;
        $result = mysqli_query($con,$sql);
		if(mysqli_num_rows($result)>0){

            while($row = mysqli_fetch_row($result)){
                $name =$row[1];
                $category =$row[2];
                $sub_category =$row[3];
                $material =$row[4];
                $weight =$row[5];
                $price =$row[6];
                $image = $row[7];
                $discount = $row[8];
                $image = "<img src='../assets/images/".$image."' width=150 height=150/>";
            }
        }
        else{
            $msg="<div style=color:red;><b>Error : Not Found".mysqli_error($con)."</b></div>";
        }

    }else{
        $msg="<div style=color:red;><b>Please Enter Product ID</b></div>"; 
    }
}




}else{
   $msg="<div style=color:red;><b>Error :".mysqli_connect_error()."</b></div>";
}


?>



<div align="center" class="container" style="padding-top:50px;">


    <div class="alert alert-success" role="alert">
        <h1>Manage Products</h1>
    </div>
    <br />
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

        <table width="520" height="600">
            <tr>
                <td><label><b>Product ID :</b></label></td>
                <td><input name="txtID" type="text" class="form-control" value="<?php echo $id ?>" /></td>
            </tr>

            <tr>
                <td><label><b>Product Name :</b></label></td>
                <td><input name="txtName" type="text" class="form-control" value="<?php echo $name ?>" /></td>
            </tr>

            <tr>
                <td><label><b>Product Category :</b></label></td>
                <td>
                    <select class="form-control" name="txtCategory" value="<?php echo $category ?>">
                        <option <?php if ($category == 'Ladies') {echo 'selected';}?>>Ladies</option>
                        <option <?php if ($category == 'Gens') {echo 'selected';}?>>Gens</option>
                        <option <?php if ($category == 'Kids') {echo 'selected';}?>>Kids</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label><b>Product Sub Category :</b></label></td>
                <td><select class="form-control" name="txtSubCategory">
                        <option <?php if ($sub_category == 'Necklaces') {echo 'selected';}?>>Necklaces</option>
                        <option <?php if ($sub_category == 'Bracelets') {echo 'selected';}?>>Bracelets</option>
                        <option <?php if ($sub_category == 'Rings') {echo 'selected';}?>>Rings</option>
                        <option <?php if ($sub_category == 'Earrings') {echo 'selected';}?>>Earrings</option>
                        <option <?php if ($sub_category == 'Chains') {echo 'selected';}?>>Chains</option>
                        <option <?php if ($sub_category == 'Pendants') {echo 'selected';}?>>Pendants</option>
                    </select></td>
            </tr>

            <tr>
                <td><label><b>Material :</b></label></td>
                <td><input name="txtMaterial" type="text" class="form-control" value="<?php echo $material ?>" />
                </td>
            </tr>

            <tr>
                <td><label><b>Weight (g) :</b></label></td>
                <td><input name="txtWeight" type="text" class="form-control" value="<?php echo $weight ?>" />
                </td>
            </tr>

            <tr>
                <td><label><b>Price (Rs.) :</b></label></td>
                <td><input name="txtPrice" type="text" class="form-control" value="<?php echo $price ?>" /></td>
            </tr>

            <tr>
                <td><label><b>Discount (%) :</b></label></td>
                <td>
                    <select class="form-control" name="txtDiscount" value="<?php echo $discount ?>">
                        <option <?php if ($discount == '0') {echo 'selected';}?>>0</option>
                        <option <?php if ($discount == '5') {echo 'selected';}?>>5</option>
                        <option <?php if ($discount == '10') {echo 'selected';}?>>10</option>
                        <option <?php if ($discount == '15') {echo 'selected';}?>>15</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label><b>Image :</b></label></td>
                <td><input name="imageUpload" type="file"></td><br /></td>
            </tr>

            <tr>
                <td></td>
                <td><?php echo $image;?></td>
            </tr>


        </table><br />

        <button type="submit" class="btn btn-primary" name="btnInsert"><i class="fas fa-plus-circle"
                style="padding-right: 10px;"></i>Insert</button>
        <button type="submit" class="btn btn-success" name="btnUpdate"><i class="fas fa-pen"
                style="padding-right: 10px;"></i>Update</button>
        <button type="submit" class="btn btn-danger" name="btnDelete"><i class="fas fa-trash-alt"
                style="padding-right: 10px;"></i>Delete</button>
        <button type="submit" class="btn btn-info" name="btnSearch"><i class="fas fa-search"
                style="padding-right: 10px;"></i>Search</button>
        <button type="submit" class="btn btn-outline-danger" name="btnClear"><i class="fas fa-broom"
                style="padding-right: 10px;"></i>Clear</button>
        <br /><br />
        <?php echo $msg;?>
    </form><br />
</div>