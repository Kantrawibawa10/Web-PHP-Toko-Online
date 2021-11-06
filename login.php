<?php 
session_start();
$koneksi = new mysqli("localhost","root","","toko");

 ?>

<!doctype html>
<html lang="en">
  <head>
	    <!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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


	    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
	    <link rel="stylesheet" href="css/ionicons.min.css">
	    <link rel="stylesheet" href="css/icomoon.css">
	    <!-- End Bootstrap CSS -->

	    <title> Login </title>
 </head>
 <body>
			
	   <!--navbar-->
	   <nav class="navbar navbar-expand-lg navbar-light bg-dark">
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

		<!--(-- Start Banner Area --)
		<section class="banner-area organic-breadcrumb">
			<div class="container">
				<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
					<div class="col-first">
						<h1>Login/Register</h1>
						<nav class="d-flex align-items-center">
							<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
							<a href="category.html">Login/Register</a>
						</nav>
					</div>
				</div>
			</div>
		</section>
		(-- End Banner Area --)-->

		<!--================Login Box Area =================-->
		<section class="login_box_area section_gap">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="login_box_img">
							<img class="img-fluid" src="img/slider/nike2slider.gif" alt="">
							<div class="hover">
								<h4>New to our website?</h4>
								<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
								<a class="primary-btn" href="registration.html">Create an Account</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="login_form_inner">
							<h3>Log in to enter</h3>
							<form class="row login_form" method="post">
								<div class="col-md-12 form-group">
									<input type="email" class="form-control" name="email" placeholder="Email">
								</div>
								<div class="col-md-12 form-group">
									<input type="password" class="form-control" name="password" placeholder="Password">
								</div>
								<div class="col-md-12 form-group">
									<div class="creat_account">
										<input type="checkbox" id="f-option2" name="selector">
										<label for="f-option2">Keep me logged in</label>
									</div>
								</div>
								<div class="col-md-12 form-group">
									<button class="primary-btn" name="login">Log in</button>
									<a href="#">Forgot Password?</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php 
			// jk ada tombol login (tombol login di tekan)
			if (isset($_POST["login"])) 
			{
				$email = $_POST["email"];
				$password = $_POST['password'];
			 	// lakukan kuery ngecek akun di tabel pelangan di db
			 	$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

			 	// ngitung akun yang terambil
			 	$akunyangcocok = $ambil-> num_rows;


			 	// jika 1 akun yang cocok, maka dilogikakan
			 	if ($akunyangcocok==1) 
			 	{
			 		// anda sukses login
			 		//mendapatkan akun dalam bentuk array
			 		$akun = $ambil->fetch_assoc();
			 		//simpan di session pelanggan
			 		$_SESSION["pelanggan"] = $akun;
			 		echo "<script>alert('Anda sukses login');</script>";
			 		echo "<script>location='checkout.php';</script>";		 		
			 	}
			 	else
			 	{
			 		//anda gagal login
			 		echo "<script>alert('Anda gagal login, periksa kembali akun anda');</script>";
			 		echo "<script>location='login.php';</script>";
			 	}	
			 } 

			 ?>	
		</section>
		<!--================End Login Box Area =================-->



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
	    <script src="js/vendor/jquery-2.2.4.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	    crossorigin="anonymous"></script>
	    <script src="js/vendor/bootstrap.min.js"></script>
	    <script src="js/jquery.ajaxchimp.min.js"></script>
	    <script src="js/jquery.nice-select.min.js"></script>
	    <script src="js/jquery.sticky.js"></script>
	    <script src="js/nouislider.min.js"></script>
	    <script src="js/countdown.js"></script>
	    <script src="js/jquery.magnific-popup.min.js"></script>
	    <script src="js/owl.carousel.min.js"></script>
	    <script type="text/javascript" src="E:\bootstrap\js/jquery-3.4.1.slim.min.js"></script>
	    <script type="text/javascript" src="E:\bootstrap\js/popper.min.js"></script>
	    <script type="text/javascript" src="E:\bootstrap\js/bootstrap.min.js"></script>
	    <script type="text/javaCsript" src="E:\bootstrap\js/script.js"></script>
	    <!--gmaps Js-->
	    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	    <script src="js/gmaps.min.js"></script>
	    <script src="js/main.js"></script>
  </body>
</html>
