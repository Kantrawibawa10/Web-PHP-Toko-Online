<?php 
session_start();
// mengambil id_produk dari url
$id_produk = $_GET['id'];


// Jika sudah ada produk di keranjang, maka produk jumlahnya +1
if (isset($_SESSION['keranjang'][$id_produk])) 
{
	$_SESSION['keranjang'][$id_produk]+=1;
}
// Jika belum ada di keranjang, maka produk jumlahnya 1
else 
{
	$_SESSION['keranjang'][$id_produk]=1;
}


//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";

//Pergi ke halaman keranjang belanja
echo "<script>alert('Produk telah tersimpan di keranjang belanja');</script>";
echo "<script>location='keranjang.php';</script>";

 ?>