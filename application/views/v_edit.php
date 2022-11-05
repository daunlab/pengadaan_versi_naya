<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
    <h1>Ini Halaman Edit</h1>
	<div class="card-body">
 <form method="post" action="index.php">
 <div class="form-floating mb-3">
    <?php foreach ($keluar as $i) { ?>
<form action="<?php echo site_url('Barangmanage/ubah_aksi'); ?>"method="post">
	<table style="margin: 20px auto;">
		<tr>
			<td>ID Keluar</td>
			<td><input type="text" name="id_keluar" value="<?php echo $i->id_keluar ?>"></td>
		</tr>
		<tr>
			<td>ID Barang</td>
			<td><input type="text" name="id_barang" value="<?php echo $i->id_barang ?>"></td>
		</tr>
		<tr>
			<td>Nama Barang</td>
			<td><input type="text" name="nama_barang" value="<?php echo $i->nama_barang ?>"></td>
		</tr>
		<tr>
			<td>Jumlah</td>
			<td><input type="text" name="jumlah" value="<?php echo $i->jumlah ?>"></td>
		<tr>
			<td>Harga</td>
			<td><input type="text" name="harga" value="<?php echo $i->harga ?>"></td>
	    <tr>
			<td>Tanggal</td>
			<td><input type="text" name="jumlah" value="<?php echo $i->tanggal ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Ubah Data"></td>
		</tr>
	</table>
	</form>
	</center>
	</table>
</form>
<?php } ?>
</body>
</html>