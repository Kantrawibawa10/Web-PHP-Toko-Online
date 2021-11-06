<h2>Ubah Produk</h2>

<?php 
$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

?>

<!--
echo "<pre>";
print_r($pecah);
echo "</pre>";
-->

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Produk</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk'];?>">
	</div>
	<div class="form-group">
		<label>Harga Rp</label>
		<input type="number" name="harga" class="form-control" value="<?php echo $pecah['harga_produk']; ?>">
	</div>
	<div class="form-group">
		<label>Berat (Gr)</label>
		<input type="number" name="berat" class="form-control" value=" <?php echo $pecah['berat_barang']; ?> ">
	</div>
	<div>
		<img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" style="width: 80px; height: 80px;">
	</div>
	<div class="form-group">
		<label>Ganti Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea name="deskripsi" class="form-control" rows="10"></textarea>
		<?php echo $pecah['deskripsi_produk']; ?>
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
	

<?php 
if (isset($_POST['ubah'])) 
{

	$namafoto =$_FILES['foto']['name'];
	$lokasifoto =$_FILES['foto']['tmp_name'];
	//jika foto di rubah
	if(!empty($lokasifoto))
	{
	move_uploaded_file($lokasifoto,"../foto_produk/".$namafoto);
	$koneksi->query("UPDATE Produk SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',berat_produk='$_POST[berat]',foto_produk='$namafoto', deskripsi_produk='$_POST[deskripsi]' WHERE id_produk='$_GET[id]'");
	}
	else
	{
	move_uploaded_file($lokasi,"../foto_produk/".$namafoto);
	$koneksi->query("UPDATE Produk SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',berat_produk='$_POST[berat]',deskripsi_produk='$_POST[deskripsi]' WHERE id_produk='$_GET[id]'");	
	}
	echo "<script>alert('Data Produk Telah Diubah');</script>";
	echo "<script>location='index.php?halaman=produk';</script>";
}
 ?>			