<h2>Tambah Produk</h2>

<form method="post" enctype="multipart/form-data">
	<div class="from-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama">
	</div>

	<div class="from-group">
		<label>Harga (Rp)</label>
		<input type="number" class="form-control" name="harga">
	</div>

	<div class="from-group">
		<label>Berat (Gr)</label>
		<input type="number" class="form-control" name="berat">
	</div>

	<div class="from-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10"></textarea>
	</div>

	<div class="from-group">
		<label>Foto</label>
		<input type="file" class="form-control" name="foto">
	</div><br>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php 
if (isset($_POST['save'])) 
{
	$nama =$_FILES['foto']['name'];
	$lokasi =$_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi,"../foto_produk/".$nama);
	$koneksi->query("INSERT INTO Produk(nama_produk,harga_produk,berat_produk,foto_produk,deskripsi_produk)VALUES('$_POST[nama]','$_POST[harga]','$_POST[berat]','$nama','$_POST[deskripsi]')");

	echo "<div class='alert alert-info'>Data Tersimpan</div>";
	echo "<meta http_equiv='refresh' content='1;url=index.php?halaman=produk'>";
}
 ?>
