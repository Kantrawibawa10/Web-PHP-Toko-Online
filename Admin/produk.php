<h2>Data Produk</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>nama</th>
			<th>harga</th>
			<th>berat</th>
			<th>foto</th>
			<th>aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>
		<?php While($pecah = $ambil ->fetch_assoc()){; ?>	
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td>Rp. <?php echo number_format( $pecah['harga_produk']); ?></td>
			<td><?php echo $pecah['berat_produk']; ?></td>
			<td>
				<img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" style="width: 80px; height: 80px; ">
			</td>
			<td>
				<a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-danger">hapus</a>
				<a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk']  ?>" class="btn btn-warning">ubah</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>

<a href="index.php?halaman=tambahproduk" class="btn btn-primary">Tambah Data</a>		
