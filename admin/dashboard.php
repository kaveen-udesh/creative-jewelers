<?php include('header.php') ?>
<div class="container-fluid">
    <div class="row no-gutters">
        <div class="col-2" style="background-color:#f2f2f2; padding-top:50px;">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link" href="dashboard.php?page=home" role="tab">Home</a>

                <li class="nav-item dropdown dropright">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#" role="tab">Products</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="dashboard.php?page=manage_products">Manage Products</a>
                        <a class="dropdown-item" href="dashboard.php?page=all_products">View all Products</a>
                    </div>
                </li>
                <a class="nav-link" href="dashboard.php?page=customers">Customers</a>
                <a class="nav-link" href="dashboard.php?page=orders">Orders</a>
                <a class="nav-link" href="dashboard.php?page=inquiries">Inquiries</a>
            </div>
        </div>

        <div class="col-10">
        <?php
        if(isset($_GET['page'])){
            $pageName = $_GET['page'];
            include($pageName.'.php');
        }
        else{
            include('manage_products.php');
        }
        ?>
        </div>
    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
</body>

</html>