<?php
session_start();
//koneksi ke data base
$koneksi = new mysqli("localhost","root","","toko");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Sneaker.id</title>
    <!--css-->
     <link rel="stylesheet" href="Admin/assets/css2/bootstrap1.css">
     <link rel="stylesheet" href="Admin/assets/css2/themify-icons.css">
     <link rel="stylesheet" href="Admin/assets/css2/owl.carousel.css">
     <link rel="stylesheet" href="Admin/assets/css2/nice-select.css">
     <link rel="stylesheet" href="Admin/assets/css2/nouislider.min.css">
     <link rel="stylesheet" href="Admin/assets/css2/ion.rangeSlider.css">
     <link rel="stylesheet" href="Admin/assets/css2/ion.rangeSlider.skinFlat.css">
     <link rel="stylesheet" href="Admin/assets/css2/magnific-popup.css">
     <link rel="stylesheet" href="Admin/assets/css2/main.css">
     <link rel="stylesheet" href="Admin/assets/fontawesome/css/all.min.css">
    <!--end-->
  </head>

  <body>

     <!--navbar-->
     <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-dark">
        <div class="container">

          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" style="color:white;" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color:white;" href="keranjang.php">Keranjang Belanja</a>
            </li>
            <!--jika sudah login(ada session pelanggan) -->
            <?php if (isset($_SESSION["pelanggan"])): ?>
              <li class="nav-item">
                <a class="nav-link" style="color:white;" href="logout.php">Logout</a>
              </li>
            <!--selain itu(belum login||belum ada session pelanggan) -->
            <?php else: ?>
              <li class="nav-item">
                <a class="nav-link" style="color:white;" href="login.php">Login</a>
              </li>
            <?php endif ?>

            <li class="nav-item">
              <a class="nav-link" style="color:white;" href="checkout.php">Checkout</a>
            </li>

          </ul>
        </div>
        <div class="icon mt-2">
          <h5>
            <a href="keranjang.php"><i class="fas fa-cart-plus text-black ml-3 mr-3 text-warning" data-toggle="tooltip" title="Keranjang Belanja"></i></a>
            <i class="fas fa-envelope text-black mr-3 text-warning" data-toggle="tooltip" title="Kotak Masuk"></i>
            <i class="fas fa-bell text-black mr-3 text-warning" data-toggle="tooltip" title="Notification"></i>
          </h5>
       </div>
     </nav>

   <br>


    <!-- Start slider-->
    <div class="col-md-10 mt-5 pt-3" style="display: block; margin-left: auto; margin-right: auto;">
      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/slider/nike2slider.gif" style="margin:center; width: 650px; height: 600px;" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/slider/nike1slide.gif" style="margin:center; width: 650px; height: 600px;" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/slider/nike3slider.gif" style="margin:center; width: 650px; height: 600px;" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>  
    <!--End slider-->


    <!-- start features Area -->
    <div class="col-md-10" style="display: block; margin-left: auto; margin-right: auto;"> 
      <section class="features-area section_gap">
        <div class="container" style="background-color:#708090;">
          <div class="row features-inner">
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="single-features">
                <div class="f-icon mt-3" style="margin-left: auto; margin-right: auto; display: block;">
                  <img src="img/features/f-icon1.png" style="margin-left: auto; margin-right: auto; display: block;" alt="">
                </div><br>
                  <center><h6 style="color: white;">Free Delivery</h6></center>
                  <center><p style="color: white;">Free Shipping on all order</p></center>
              </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="single-features">
                <div class="f-icon mt-3" style="margin-left: auto; margin-right: auto; display: block;">
                   <img src="img/features/f-icon2.png" style="margin-left: auto; margin-right: auto; display: block;"  alt="">
                </div><br>
                <center><h6 style="color: white;">Free Delivery</h6></center>
                <center><p style="color: white;">Free Shipping on all order</p></center>
              </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="single-features">
                <div class="f-icon mt-3" style="margin-left: auto; margin-right: auto; display: block;">
                  <img src="img/features/f-icon3.png" style="margin-left: auto; margin-right: auto; display: block;" alt="">
                </div><br>
                <center><h6 style="color: white;">Free Delivery</h6></center>
                <center><p style="color: white;">Free Shipping on all order</p></center>
              </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="single-features">
                <div class="f-icon mt-3" style="margin-left: auto; margin-right: auto; display: block;">
                  <img src="img/features/f-icon4.png" style="margin-left: auto; margin-right: auto; display: block;" alt="">
                </div><br>
                <center><h6 style="color: white;">Free Delivery</h6></center>
                <center><p style="color: white;">Free Shipping on all order</p></center>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- end features Area -->

    <br>

   <!--konten-->
   <section class="konten">
     <div class="container">
        <h1>Produk Terbaru</h1>

        <hr size="100px" style="border-color: black;">

        <div class="row mx-auto">

          <?php $ambil = $koneksi->query("SELECT * FROM produk "); ?>
          <?php while ($perproduk = $ambil->fetch_assoc()) { ?>

          <div class="col-lg-3 col-md-6">
            <div class="card-body mt-4" style="border: 1px solid gray;">
              <div class="thumbnail">
                <img class="card-img-top" src="foto_produk/<?php echo $perproduk['foto_produk'];?>" alt="">
                <hr width="100%" style="border-color: black;">
                <div class="caption mt-2">
                  <h4><?php echo $perproduk['nama_produk'];?></h4>
                  <h6>RP. <?php echo number_format($perproduk['harga_produk']);?></h6>
                </div>
                <a href="beli.php?id=<?php echo $perproduk['id_produk'];  ?>" class="btn btn-primary mt-2"> Beli </a>             
              </div>
            </div>  
          </div>
          <?php } ?>
        </div>
     </div>  
   </section>

   <div class="mt-5"></div>

         <!-- start footer Area -->
        <footer class="footer-area section_gap">
            <div class="container">
              <div class="row">
                <div class="col-lg-3  col-md-6 col-sm-6">
                  <div class="single-footer-widget">
                    <h6>About Us</h6>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore
                      magna aliqua.
                    </p>
                  </div>
                </div>
                <div class="col-lg-4  col-md-6 col-sm-6">
                  <div class="single-footer-widget">
                    <h6>Newsletter</h6>
                    <p>Stay update with our latest</p>
                    <div class="" id="mc_embed_signup">

                      <form target="_blank" novalidate action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                       method="get" class="form-inline">

                        <div class="d-flex flex-row">

                          <input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"
                           required="" type="email">


                          <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                          <div style="position: absolute; left: -5000px;">
                            <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                          </div>

                          <!-- <div class="col-lg-4 col-md-4">
                                <button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
                              </div>  -->
                        </div>
                        <div class="info"></div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3  col-md-6 col-sm-6">
                  <div class="single-footer-widget mail-chimp">
                    <h6 class="mb-20">Instragram Feed</h6>
                    <ul class="instafeed d-flex flex-wrap">
                      <li><img src="img/i1.jpg" alt=""></li>
                      <li><img src="img/i2.jpg" alt=""></li>
                      <li><img src="img/i3.jpg" alt=""></li>
                      <li><img src="img/i4.jpg" alt=""></li>
                      <li><img src="img/i5.jpg" alt=""></li>
                      <li><img src="img/i6.jpg" alt=""></li>
                      <li><img src="img/i7.jpg" alt=""></li>
                      <li><img src="img/i8.jpg" alt=""></li>
                    </ul>
                  </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                  <div class="single-footer-widget">
                    <h6>Follow Us</h6>
                    <p>Let us be social</p>
                    <div class="footer-social d-flex align-items-center">
                      <a href="#"><i class="fa fa-facebook"></i></a>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                      <a href="#"><i class="fa fa-dribbble"></i></a>
                      <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
                <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This Website created by <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Cofiding</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
          </div>
        </div>
    </footer>
    <!-- End footer Area -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="Admin/assets/js2/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
    crossorigin="anonymous"></script>
    <script src="Admin/assets/js2/vendor/bootstrap.min.js"></script>
    <script src="Admin/assets/js2/jquery.ajaxchimp.min.js"></script>
    <script src="Admin/assets/js2/jquery.nice-select.min.js"></script>
    <script src="Admin/assets/js2/jquery.sticky.js"></script>
    <script src="Admin/assets/js2/nouislider.min.js"></script>
    <script src="Admin/assets/js2/countdown.js"></script>
    <script src="Admin/assets/js2/jquery.magnific-popup.min.js"></script>
    <script src="Admin/assets/js2/owl.carousel.min.js"></script>
    <script type="text/javascript" src="Admin/assets/js2/jquery-3.4.1.slim.min.js"></script>
    <script type="text/javascript" src="Admin/assets/js2/popper.min.js"></script>
    <script type="text/javascript" src="Admin/assets/js2/bootstrap.min.js"></script>
    <script type="text/javascript" src="Admin/assets/js2/script.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="Admin/assets/js2/gmaps.min.js"></script>
    <script src="Asdmin/assets/js2/main.js"></script>
  </body>

</html>