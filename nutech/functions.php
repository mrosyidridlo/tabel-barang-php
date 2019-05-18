<?php 
//koneksi ke database 
$conn = mysqli_connect("localhost", "root", "", "nutech_integrasi");

//function query
function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}


function tambah($data) {
	//ambil data dari tiap elemen dalam form
	global $conn;
	//upload gambar
	$foto_barang = upload();
	if ( !$foto_barang ) {
		return false;
	}
	$nama_barang = htmlspecialchars($data["nama_barang"]);
	$harga_beli = htmlspecialchars($data["harga_beli"]);
	$harga_jual = htmlspecialchars($data["harga_jual"]);
	$stok = htmlspecialchars($data["stok"]);

	//query insert data
	$query = "INSERT INTO tabel_barang
				VALUES 
				('', '$foto_barang', '$nama_barang',
					'$harga_beli', '$harga_jual', '$stok')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload() {

	$namaFile 	= $_FILES['foto_barang']['name'];
	$ukuranFile = $_FILES['foto_barang']['size'];
	$error 		= $_FILES['foto_barang']['error'];
	$tmpName 	= $_FILES['foto_barang']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4) {
		echo "<script>
				alert('pilih gambar terlebih dahulu');
			</script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	// strtolower untuk memaksa mengubah huruf besar menjadi lebih kecil
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang diupload bukan gambar');
			</script>";
		return false;
	}

	//cek jika ukuran gambar terlalu besar
	if( $ukuranFile > 100000) {
		echo 
			"<script>
				alert('ukuran gambar terlalu besar');
			</script>";
		return false;
	}

	//lolos pengecekan, gambar siap diupload
	//generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= uniqid();
	$namaFileBaru .= $ekstensiGambar;


	move_uploaded_file($tmpName, 'image/' . $namaFileBaru);

	return $namaFileBaru;

}



function hapus($id) {
	global $conn;
	//query hapus data
	mysqli_query($conn, "DELETE FROM tabel_barang WHERE id = $id");
	
	return mysqli_affected_rows($conn);
}

function ubah($data) {
	//ambil data dari tiap elemen dalam form
	global $conn;

	$id = $data["id"];
	$foto_barang_lama = htmlspecialchars($data["foto_barang_lama"]);
	$foto_barang = htmlspecialchars($data["foto_barang"]);
	$nama_barang = htmlspecialchars($data["nama_barang"]);
	$harga_beli = htmlspecialchars($data["harga_beli"]);
	$harga_jual = htmlspecialchars($data["harga_jual"]);
	$stok = htmlspecialchars($data["stok"]);

	//cek apakah user pilih gambar baru atau tidak
	if ($_FILES['foto_barang']['error'] === 4) {
		$foto_barang = $foto_barang_lama;
	}else {
		$foto_barang = upload();
	}

	//query insert data
	$query = "UPDATE tabel_barang SET
				foto_barang = '$foto_barang',
				nama_barang = '$nama_barang',
				harga_beli = '$harga_beli',
				harga_jual	= '$harga_jual',
				stok = '$stok'
				WHERE id = $id
				";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function cari($keyword) {
	$query = "SELECT * FROM tabel_barang WHERE
				nama_barang LIKE '%$keyword%' OR
				harga_beli LIKE '%$keyword%'OR
				harga_jual LIKE '%$keyword%'OR
				stok LIKE '%$keyword%'
				";

	return query($query);
}

	
?>