<?php 
session_start();

$id_produk=$_GET['id'];
unset($_SESSION["keranjang"][$id_produk]);

echo "<script>alert('Prosuk dihapus dari keranjang anda');</script>";
echo "<script>location='keranjang.php';</script>";
 ?>