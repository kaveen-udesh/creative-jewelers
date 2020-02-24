<?php include('layout/header.php') ?>

<div style="padding-top:90px;" align="center" ;>


<div>

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding-left:100px; padding-right:100px;">
  <a class="navbar-brand"><b>JEWELLERY CATEGORY<i class="fas fa-arrow-right" style="padding-left:20px;"></i></b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent" style="padding-left:50px;">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="jewellery.php?page=ladies_jewellery" style="padding-left:30px;"><b><i class="fas fa-female" style="padding-right:5px;"></i>LADIES</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="jewellery.php?page=gens_jewellery" style="padding-left:30px;"><b><i class="fas fa-male" style="padding-right:5px;"></i>GENS</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="jewellery.php?page=kids_jewellery" style="padding-left:30px;"><b><i class="fas fa-child" style="padding-right:5px;"></i>KIDS</b></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search Jewellery" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

</div>

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