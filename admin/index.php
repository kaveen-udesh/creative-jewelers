<?php include('header.php') ?>
<div class="container-fluid">
    <div class="row no-gutters">
        <div class="col-2" style="background-color:#f2f2f2; padding-top:50px;">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                    aria-controls="v-pills-home" aria-selected="true">Home</a>
                <a class="nav-link" id="v-pills-customers-tab" data-toggle="pill" href="#v-pills-customers" role="tab"
                    aria-controls="v-pills-customers" aria-selected="false">Customers</a>
                <a class="nav-link" id="v-pills-products-tab" data-toggle="pill" href="#v-pills-products" role="tab"
                    aria-controls="v-pills-products" aria-selected="false">Products</a>
                <a class="nav-link" id="v-pills-orders-tab" data-toggle="pill" href="#v-pills-orders" role="tab"
                    aria-controls="v-pills-orders" aria-selected="false">Orders</a>
                <a class="nav-link" id="v-pills-inquiries-tab" data-toggle="pill" href="#v-pills-inquiries" role="tab"
                    aria-controls="v-pills-inquiries" aria-selected="false">Inquiries</a>
            </div>
        </div>
        <div class="col-10">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                    aria-labelledby="v-pills-home-tab">
                    <?php include('product.php') ?></div>
                <div class="tab-pane fade" id="v-pills-customers" role="tabpanel"
                    aria-labelledby="v-pills-customers-tab"><?php include('customers.php') ?>
                </div>
                <div class="tab-pane fade" id="v-pills-products" role="tabpanel" aria-labelledby="v-pills-products-tab">
                    <?php include('product.php') ?>
                </div>
                <div class="tab-pane fade" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">d
                </div>
                <div class="tab-pane fade" id="v-pills-inquiries" role="tabpanel"
                    aria-labelledby="v-pills-inquiries-tab">...
                </div>
            </div>
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