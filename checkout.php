<?php 
session_start();

$koneksi = new mysqli("localhost","root","","toko");



//jika belum ada session pelanggan(belum login,). Maka akan pergi kehalaman login

if (!isset($_SESSION["pelanggan"])) 
{
	echo "<script>alert('Silakan login terlebih dahulu');</script>";
	echo "<script>location='login.php';</script>";
}

 ?>

<!DOCTYPE html>
<html>
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

		<title>Checkout</title>
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

	   <br><br><br><br>

	   	<section class="konten">
	   	 <div class="container">
	   	 	<h1>Keranjang Belanja</h1>
	   	 	<hr>
	   	 	<table class="table table-bordered">
	   	 		<thead>
	   	 			<tr>
			   	 		<th>No</th>
			   	 		<th>Produk</th>
			   	 		<th>Harga</th>
			   	 		<th>Jumlah</th>
			   	 		<th>Subharga</th>
		   	 		</tr>
		   	 	</thead>
		   	 	<tbody>
		   	 		<?php $nomor=1; ?>
		   	 		<?php $totalbelanja = 0; ?>


		   	 		<?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
		   	 		<!--Menampilkan produk yang sedang di perulangkan berdasarkan id_produk-->
		   	 		<?php 
		   	 		$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk=$id_produk");
		   	 		$pecah = $ambil->fetch_assoc();
		   	 		$subharga = $pecah['harga_produk'] * $jumlah;

		   	 		//echo "<pre>";
					//print_r($pecah);
					//echo "</pre>";
		   	 		 ?>	
		   	 	
		   	 		<tr>
		   	 			<td><?php echo $nomor; ?></td>
		   	 			<td><?php echo $pecah['nama_produk']; ?></td>
		   	 			<td>Rp. <?php echo number_format( $pecah['harga_produk']); ?></td>
		   	 			<td><?php echo $jumlah; ?></td>
		   	 			<td>Rp. <?php echo number_format($subharga); ?> </td>
		   	 		<?php $nomor++; ?>
		   	 		<?php $totalbelanja+=$subharga; ?>
		   	        <?php endforeach ?>
		   	 	</tbody>

		   	 	<tfoot>
		   	 		<tr>
		   	 			<th colspan="4">Total Belanja</th>
		   	 			<th>Rp.<?php echo number_format($totalbelanja); ?> </th>
		   	 		</tr>
		   	 	</tfoot>

	   	 	</table>
	   	 	
	   	 	<form method="post">
	   	 		
	   	 		<div class="row">
	   	 			<div class="col-md-4">
	   	 				<div class="from-group">
	   	 					<input type="text" class="from-control" style="width: 100%;" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan'] ?>">  
	   	 				</div>
	   	 			</div>
	   	 			<div class="col-md-4">
	   	 				<div class="from-group">
			   	 			<input type="text" class="from-control" style="width: 100%;" readonly value="<?php echo $_SESSION["pelanggan"]['telepon_pelanggan'] ?>">  
			   	 		</div>
	   	 			</div>
	   	 			<div class="col-md-4">
	   	 				<select class="from-control" style="width: 100%; height: 30px;" name="id_ongkir">
	   	 					<option value="">Pilih Ongkos Kirim</option>
	   	 					<?php 
	   	 					$ambil = $koneksi->query("SELECT * FROM ongkir ");
	   	 					while($perongkir = $ambil->fetch_assoc()){
	   	 					 ?>
	   	 					<option value="<?php echo $perongkir["id_ongkir"] ?>"> 
	   	 						<?php echo $perongkir['nama_kota'] ?> -
	   	 						Rp. <?php echo number_format($perongkir['tarif']) ?> 
	   	 					</option>

	   	 					<?php }?>
	   	 				</select>
	   	 			</div>
	   	 		</div>
			    
				<div class="mt-3"></div>

				<div class="row">
					<div class="col-md-4">
	   	 				<select class="from-control" style="width: 100%; height: 30px;" name="id_ongkir">
	   	 					<option value="">Pilih Cara Pembayaran</option>
	   	 					<option>Mandiri</option>
	   	 					<option>BCA</option>
	   	 					<option>COD</option>
	   	 				</select>
	   	 			</div>
				</div>			
	   	 		<br>
	   	 		<button class="btn btn-primary" name="checkout">Checkout</button>
	   	 	</form>

	   	 	<?php 
	   	 	if (isset($_POST["checkout"])) 
	   	 	{
	   	 		$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
	   	 		$id_ongkir = $_POST["id_ongkir"];
	   	 		$tanggal_pembelian = date("y-m-d");

	   	 		$ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='&id_ongkir'");
	   	 		$arrayongkir = $ambil->fetch_assoc();
	   	 		$tarif = $arrayongkir['tarif'];

	   	 		$total_pembelian = $totalbelanja + $tarif;

	   	 		//1. Menyimpan data ke tabel pembelian
	   	 		$koneksi->query("INSERT INTO pembelian (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian) VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian')");

	   	 		//mendapat id pembelian yg baru terjadi
	   	 		$id_pembelian_barusan = $koneksi->insert_id;

	   	 		foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) 
	   	 		{
	   	 			//mendapatkan data produk berdasarkan id_produk
	   	 			$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='id_produk'");
	   	 			$perproduk = $ambil->fetch_assoc();

	   	 			$nama = $perproduk['nama_produk'];
	   	 			$harga = $perproduk['harga_produk'];
	   	 			$berat = $perproduk['berat_produk'];

	   	 			$subberat = $perproduk['berat_produk']*$jumlah;
	   	 			$subharga = $perproduk['harga_produk']*$jumlah;
	   	 			$koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,nama,harga,berat,subberat,subharga,jumlah) VALUES 
	   	 			('$id_pembelian_barusan','$id_produk','$nama','$harga','$berat','$subberat','$subharga','$jumlah')");
	   	 		}

	   	 		//mengkosongkan keranjang belanja
	   	 		unset($_SESSION["keranjang"]);

	   	 		//Tampilan di alihkan ke halaman nota, nota pembelian yg baru terjadi
	   	 		echo "<script>alert('Pembelian sukses');</script>";
	   	 		echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";


	   	 	}?>

	   	 </div>
	   </section>



	   <br><br><br>




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