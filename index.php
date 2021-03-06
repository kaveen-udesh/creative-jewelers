<?php include('layout/header.php') ?>

<!-------------- Carousel Side -------------------->

<div style="padding-top:76px;" align="center" ;>
    <div id="Slideshow" class="carousel slide offset-xl-0 col-xl-12" data-ride="carousel" data-interval="2000">
        <ol class="carousel-indicators">
            <li data-target="#Slideshow" data-slide-to="0" class="active"></li>
            <li data-target="#Slideshow" data-slide-to="1"></li>
            <li data-target="#Slideshow" data-slide-to="2"></li>
            <li data-target="#Slideshow" data-slide-to="3"></li>
        </ol>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/images/1.png" alt="" class="d-block w-100" />
            </div>

            <div class="carousel-item">
                <img src="assets/images/3.png" alt="" class="d-block w-100" />
            </div>

            <div class="carousel-item">
                <img src="assets/images/4.png" alt=" pool" class="d-block w-100" />
            </div>

            <div class="carousel-item">
                <img src="assets/images/3.png" alt="" class="d-block w-100" />
            </div>
        </div>

        <a class="carousel-control-prev" href="#Slideshow" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#Slideshow" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container" style="padding-top: 80px; padding-bottom: 80px;">
        <div class="row">
            <div class="col">
                <img src="assets/images/img1.png" />
            </div>
            <div class="col">
                <h1 style="color:#00dda8; padding-top: 130px; padding-bottom: 30px;"><b>CREATIVE JEWELERS</b></h1>
                <div align="justify">
                    <p><b>The FIRST jeweller in the world to be crowned with the prestigious ISO 9001 : 2015
                            International Certification.</b></p>
                    <p>Creative Jewelers has proven its reliability through 5 decades of serving you. Creative Jewelers
                        has proven its commitment to giving you not only a piece of jewellery but a beautiful experience
                        to cherish throughout your life. Creative Jewelers stands by its lifetime’s guarantee by being
                        with you forever.Best Jeweller in Sri Lanka.</p>
                </div><br />
                <a href="about us.php" type="button" id="btn1" class="btn">Discover
                    More</a>
            </div>
        </div>
    </div>

    <div style="background-color:#f2f2f2;">
        <h1 style="padding-top: 30px; padding-bottom: 30px;"><b>PRODUCTS CATEGORIES</b></h1>

        <div class="row no-gutters">
            <div class="col-sm" style="padding:25px;">
                <a href="jewellery.php?page=ladies_jewellery"><img class="img1"
                        src="assets/images/ladies.jpg" /></a><br /><br />
                <h3>LADIES</h3>
                <p>A selection of jewellery inspired by the latest international lady's fashion, includes necklaces,
                    earrings, rings, pendants, bracelets and chains.</p>
                <a href="jewellery.php?page=ladies_jewellery" type="button" id="btn2" class="btn">View More</a>
            </div>
            <div class="col-sm" style="padding:25px;">
                <a href="jewellery.php?page=gens_jewellery"><img class="img1"
                        src="assets/images/gens.jpg" /></a><br /><br />
                <h3>GENTS</h3>
                <p>A selection of jewellery inspired by the latest international men’s fashion, includes cuff links,
                    rings, tie pins, bracelets and chains.</p>
                <a href="jewellery.php?page=gens_jewellery" type="button" id="btn2" class="btn">View More</a>
            </div>
            <div class="col-sm" style="padding:25px;">
                <a href="jewellery.php?page=kids_jewellery"><img class="img1"
                        src="assets/images/kids.jpg" /></a><br /><br />
                <h3>KIDS</h3>
                <p>A range of precious items for your precious little one. Our kids item range includes kids bangles,
                    chains, crosses, earrings and much more.</p>
                <a href="jewellery.php?page=kids_jewellery" type="button" id="btn2" class="btn">View More</a>
            </div>
        </div><br /><br />
    </div>

    <div style="text-align:center;">
        <div style="padding-top: 30px; padding-bottom: 30px;">
            <h2>CONNECT WITH US</h3>
                <a href="#"><img class="img2" src="assets/images/Social media/facebook.png" alt="Facebook"></a>
                <a href="#"><img class="img2" src="assets/images/Social media/instagram.png" alt="Instagram"></a>
                <a href="#"><img class="img2" src="assets/images/Social media/twitter.png" alt="Twitter"></a>
                <a href="#"><img class="img2" src="assets/images/Social media/linkedIn.png" alt="LinkedIn"></a>
        </div>
    </div>
</div>

<?php include('layout/footer.php') ?>