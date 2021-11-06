<?php 
session_start();


//echo "<pre>";
//print_r($_SESSION['keranjang']);
//echo "</pre>";

$koneksi = new mysqli("localhost","root","","toko");


if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) 
{
	echo "<script>alert('Keranjang anda kosong, silakan belanja kembali');</script>";
	echo "<script>location='index.php';</script>";
}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Keranjang belanja</title>
 	 <link rel="stylesheet" href="Admin/assets/css2/bootstrap1.css">
 	 <link rel="stylesheet" href="Admin/assets/fontawesome/css/all.min.css">
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
			   	 		<th>Aksi</th>
		   	 		</tr>
		   	 	</thead>
		   	 	<tbody>
		   	 		<?php $nomor=1; ?>
		   	 		


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
		   	 			<td>
		   	 				<a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-danger btn-xs">Hapus</a>	
		   	 			</td>
		   	 		</tr>
		   	 		<?php $nomor++; ?>
		   	        <?php endforeach ?>
		   	 	</tbody>	
	   	 	</table>
	   	 	<a href="index.php" class="btn btn-default">Lanjutkan Belanja</a>
	   	 	<a href="checkout.php" class="btn btn-primary">Checkout</a>
	   	 </div>
	   </section>



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