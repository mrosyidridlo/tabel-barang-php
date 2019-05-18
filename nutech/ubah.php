<?php 

require 'functions.php';

//ambil data di url 
$id = $_GET["id"];

//query data tabel_barang berdasarkan id
$tbl = query("SELECT * FROM tabel_barang WHERE id = $id")[0];

//cek tombol submit sudah di click atau belum 
if ( isset($_POST["submit"]) ) {
	
	//cek data berhasil ditambahkan atau tidak
	if ( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('Data Berhasil Diubah');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Data Gagal Diubah');
				document.location.href = 'index.php';
			</script>
		";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ubah Data</title>

		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="box">
			<h3>Ubah Data Barang</h3>
			<hr>
			<form action="" method="post" enctype="multipart/form-data">
				<!-- parameter id untuk function ubah data -->
			  <input type="hidden" name="id" value="<?= $tbl["id"]; ?>">
			  <input type="hidden" name="foto_barang_lama" value="<?= $tbl["foto_barang"]; ?>">

			  <div class="form-group row">
	  			<label for="foto_barang" class="col-sm-2 col-form-label">Foto Barang</label> <br>
	  			
	  			<div class="col-sm-10">
	  				<img src="image/<?= $tbl['foto_barang']; ?>" style="height:50px;"> <br>
	    			<input type="file" name="foto_barang" class="form-control-file" id="foto_barang" placeholder="Foto barang">
	    		</div>
			  </div>

			  <div class="form-group row">
	  			<label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
	  			<div class="col-sm-10">
	    			<input type="text" name="nama_barang" class="form-control" id="nama_barang" placeholder="Nama Barang" required value="<?=$tbl ["nama_barang"];  ?>">
	    		</div>
			  </div>

			  <div class="form-group row">
	  			<label for="harga_beli" class="col-sm-2 col-form-label">Harga Beli</label>
	  			<div class="col-sm-10">
	    			<input type="number" name="harga_beli" class="form-control" id="harga_beli" 
	    			placeholder="Harga Beli" required value="<?=$tbl ["harga_beli"];  ?>">
	    		</div>
			  </div>

			  <div class="form-group row">
	  			<label for="harga_jual" class="col-sm-2 col-form-label">Harga Jual</label>
	  			<div class="col-sm-10">
	    			<input type="number" name="harga_jual" class="form-control" id="harga_jual" placeholder="Harga Jual" required value="<?=$tbl ["harga_jual"];  ?>">
	    		</div>
			  </div>

			  <div class="form-group row">
	  			<label for="stok" class="col-sm-2 col-form-label">Stok Barang</label>
	  			<div class="col-sm-10">
	    			<input type="number" name="stok" class="form-control" id="stok"  placeholder="Stok Barang" required value="<?=$tbl ["harga_beli"];  ?>">
	    		</div>
			  </div>

			  <button type="submit" name="submit" class="btn btn-success" onclick="return confirm('Apakah yakin data akan diubah ?');">Ubah</button>
			  <a href="index.php" class="btn btn-primary" role="button" aria-pressed="true">Kembali</a>
			</form>
		</div>
	</div>


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
</body>
</html>