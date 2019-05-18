<?php 


require 'functions.php';

$isitabel = query ("SELECT * FROM tabel_barang");

//konfigurasi
	$jumlahdataPerHalaman = 3;
	$jumlahData = count(query("SELECT * FROM tabel_barang"));
	$jumlahHalaman = ceil($jumlahData / $jumlahdataPerHalaman);
	$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
	$awalData = ( $jumlahdataPerHalaman * $halamanAktif ) - $jumlahdataPerHalaman;


	//pagination
	$isitabel = query("SELECT * FROM tabel_barang LIMIT $awalData, $jumlahdataPerHalaman");


//form cari di click
if ( isset($_POST["cari"]) ) {
	$isitabel = cari($_POST["keyword"]);
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TABEL BARANG</title>

	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
	<div class="container" >
		<h3 class="text-center">TABEL DAFTAR BARANG</h3>
		<form class="form-group row mb-2" action="" method="post">
			<div class="col-sm-11">
			    <input type="text" class="form-control" autofocus autocomplete="off" placeholder="Search" name="keyword"> 
			</div>
			<button class="btn btn-success" name="cari">Cari</button>
		</form>

		<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">NO</th>
		      <th scope="col">Foto</th>
		      <th scope="col">NAMA BARANG</th>
		      <th scope="col">HARGA BELI</th>
		      <th scope="col">HARGA JUAL</th>
		      <th scope="col">STOK</th>
		      <th scope="col">ACTION</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<!-- kondisi pengulangan nomor -->
			<?php $a = 1; ?> 
			<!-- kondisi pengulangan untuk menampilkan data dari database -->
			<?php foreach ($isitabel as $row) : ?>
		    <tr>
		      <td><?= $a; ?></td>
		      <td><img src="image/<?= $row["foto_barang"]; ?>" alt="" style="width: 50px;"></td>
		      <td><?= $row["nama_barang"]; ?></td>
		      <td><?= $row["harga_beli"]; ?></td>
		      <td><?= $row["harga_jual"]; ?></td>
		      <td><?= $row["stok"]; ?></td>
		      <td>
		      	<a href="ubah.php?id=<?= $row["id"]; ?>" class="btn btn-outline-success" role="button">Edit </a>
		      	<!-- untuk menghapus by id -->
		      	<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah data akan dihapus ?');" class="btn btn-outline-danger" role="<button></button>">Delete</a>
		      </td>
		    </tr>

		    <!-- akhir kondisi pengulangan nomor -->
		    <?php $a++; ?>
		<?php endforeach ?>
		  </tbody>
		</table>
		<!-- navigasi -->
		<!-- function mengurangi halaman  -->
		<div class="navigasi" class="text-center">
			<?php if ($halamanAktif > 1) : ?>
				<a href="?halaman=<?= $halamanAktif -1; ?>">&laquo;</a>
			<?php endif; ?>

			<?php for( $i = 1; $i <= $jumlahHalaman; $i++) : ?>
				<?php if( $i == $halamanAktif) : ?>
					<a href="?halaman=<?= $i; ?>" style="font-weight: bold; color:orange;" ><?= $i; ?></a>
				<?php else : ?>
					<a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
				<?php endif; ?>
			<?php endfor; ?>

			<?php if ($halamanAktif < $jumlahHalaman) : ?>
				<a href="?halaman=<?= $halamanAktif +1; ?>">&raquo;</a>
			<?php endif; ?>
			<br>
			<br>
		</div>
		<a href="tambah_data.php" class="btn btn-primary" role="button" aria-pressed="true" style="margin-bottom: 30px;">Tambah Data Barang</a>
		<a href="index.php" class="btn btn-success" role="button" aria-pressed="true" style="margin-bottom: 30px;">Kembali</a>
		
		
	</div>	


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>