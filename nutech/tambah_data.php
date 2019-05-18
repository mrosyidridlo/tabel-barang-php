<?php 

require 'functions.php';

//cek tombol submit sudah di click atau belum 
if ( isset($_POST["submit"]) ) {
	
	//cek data berhasil ditambahkan atau tidak
	if ( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('Data Berhasil Ditambahkan');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Data Gagal Ditambahkan');
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
	<title>Tambah Data</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="box"">
			<h3>Tambah Data Barang</h3>
			<hr>
			<!-- enctype untuk mengolah gambar -->
			<form action="" method="post" enctype="multipart/form-data">
			  <div class="form-group row">
	  			<label for="foto_barang" class="col-sm-2 col-form-label">Foto Barang</label>
	  			<div class="col-sm-10">
	    			<input type="file" name="foto_barang" class="form-control-file" id="foto_barang" placeholder="Foto barang">
	    		</div>
			  </div>

			  <div class="form-group row">
	  			<label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
	  			<div class="col-sm-10">
	    			<input type="text" name="nama_barang" class="form-control" id="nama_barang" placeholder="Nama Barang" required="required">
	    		</div>
			  </div>

			  <div class="form-group row">
	  			<label for="harga_beli" class="col-sm-2 col-form-label">Harga Beli</label>
	  			<div class="col-sm-10">
	    			<input type="number" name="harga_beli" class="form-control" id="harga_beli" 
	    			placeholder="Harga Beli">
	    		</div>
			  </div>

			  <div class="form-group row">
	  			<label for="harga_jual" class="col-sm-2 col-form-label">Harga Jual</label>
	  			<div class="col-sm-10">
	    			<input type="number" name="harga_jual" class="form-control" id="harga_jual" placeholder="Harga Jual" >
	    		</div>
			  </div>

			  <div class="form-group row">
	  			<label for="stok" class="col-sm-2 col-form-label">Stok Barang</label>
	  			<div class="col-sm-10">
	    			<input type="number" name="stok" class="form-control" id="stok"  placeholder="Stok Barang" >
	    		</div>
			  </div>

			  <button type="submit" name="submit" class="btn btn-success">Tambah</button>
			  <a href="index.php" class="btn btn-primary" role="button" aria-pressed="true">Kembali</a>
			</form>
		</div>
	</div>


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
</body>
</html>