<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$server = "localhost";
$user = "root";
$pass ="";
$databse = "creative_jewelers_kaveen";

$con = mysqli_connect($server,$user,$pass,$databse);
//-------------- Connection--------
$id="";
$name="";
$price="";
$image="";
$msg="";
$sql="";
$arrType=array("jpg","jpeg","png");
?>

<?php
if($con){
 
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
	 
	 $temp = $_FILES['imageUpload']['tmp_name'];
	 $path ="Documents/";
	 $ext = explode(".",$image);
	 if(in_array($ext[1],$arrType)){
		 
		$sql="INSERT INTO products VALUES (".$id.",'".$name."','".$category."','".$sub_category."','".$material."',".$weight.",".$price.",'".$image."')" ;
			if(mysqli_query($con,$sql)){
				$msg="<div style=color:blue;><b>New Product Inserted!</b></div>";
				move_uploaded_file($temp,$path.$image);
			}else{
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
	
	// -------- CLEAR ------------
	if(isset($_POST['btnClear'])){
		clear();
	}
	//----------------------------
	
	
	
//------------------- Delete ------------------------
	
	if(isset($_POST['btnDelete'])){
		$id = $_POST['txtId'];
			$sql = "DELETE FROM product WHERE P_Id=".$id."";
			
			if(mysqli_query($con,$sql)){
				$msg = "<div style=color:red;><b>Record Deleted!<b></div>";
			}
			else{
				$msg = "<div style=color:red;><b>Error :".mysqli_error($con)."<b></div>";
			}
	}
	


//------------------- Update ------------------------
	
	if(isset($_POST['btnUpdate'])){
		$id = $_POST['txtId'];
		$name = $_POST['txtName'];
		$price = $_POST['txtPrice'];
			$sql = "UPDATE product SET name='".$name."', price=".$price." WHERE P_Id =".$id."";
			
			if(mysqli_query($con,$sql)){
				$msg = "<div style=color:blue;><b>Record Updated!<b></div>";
			}
			else{
				$msg = "<div style=color:red;><b>Error :".mysqli_error($con)."<b></div>";
			}
	}
	
	// Search
 
	if(isset($_POST['btnSearch'])){
		$id= $_POST['txtID'];
	   $sql="SELECT * FROM products WHERE p_id=".$id;
	   $result =mysqli_query($con,$sql);
	   if(mysqli_num_rows($result)){
		   while($row = mysqli_fetch_row($result)){
			   $name =$row[1];
			   $category =$row[2];
			   $sub_category =$row[3];
			   $material =$row[4];
			   $weight =$row[5];
			   $price =$row[6];
			   $image = $row[7];
			   $image = "<img src=$image width=100 height=100/>";
		   }
	   }else{
		$msg="<div style=color:red;><b>Error :".mysqli_error($con)."</b></div>";
	}
	}
}else{
	$msg="<div style=color:red;><b>Error :".mysqli_connect_error()."</b></div>";
}

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

<table width="350" border="0">
  <tr>
    <td><label>Product ID</label></td>
    <td><input name="txtID" type="text" value="<?php echo $id ?>"/></td>
  </tr>
  <tr>
    <td><label>Product Name</label></td>
    <td><input name="txtName" type="text" value="<?php echo $name ?>"/></td>
  </tr>
  <tr>
    <td><label>Product Price</label></td>
    <td><input name="txtPrice" type="text" value="<?php echo $price ?>"/></td>
  </tr>
  <tr>
    <td><label>Image</label></td>
    <td><input name="imageUpload" type="file"/><br />
        <?php echo $image;?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="btnInsert" type="submit" value="Insert"/>
		<input type="submit" name="btnUpdate" value="Update"/>
<input type="submit" name="btnDelete" value="Delete"/>
<input type="submit" name="btnClear" value="Clear" style="color:red;"/>
        <input name="btnSearch" type="submit" value="Search"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div style="width:200px;"><?php echo $msg;?></div></td>
  </tr>
</table>
 
</form>

</body>
</html>