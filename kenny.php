<?php 
	// Koneksi Database
	$server = "localhost";
	$user = "root";
	$password = "";
	$database = "tugas_kenny";

	$koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));

	if (isset($_POST['bsimpan'])) {

		if ($_GET['hal'] == "edit") {
			
			$edit = mysqli_query($koneksi, "UPDATE users SET nim = '".$_POST['tnim']."', nama = '".$_POST['tnama']."', alamat = '".$_POST['talamat']."', prodi = '".$_POST['tprodi']."' WHERE id_mhs = '".$_GET['id']."' ");

			if ($edit) { // Jika edit sukses
				echo "<script> 
					  alert('Edit Data Sukses');
					  document.location = 'kenny.php';

					 </script>";
			}
			else {

				echo "<script>
					  alert('Edit Data Gagal');
					  document.location = 'kenny.php';

					 </script>";

			}

		}
	}

	if (isset($_GET['hal'])) { 	

		if ($_GET['hal'] == "edit") { 

			$tampil = mysqli_query($koneksi, "SELECT * FROM users WHERE id_mhs = '$_GET[id]'");
			$data = mysqli_fetch_array($tampil);
			if ($data) {
				
				$vnim = $data['nim'];
				$vnama = $data['nama'];
				$valamat = $data['alamat'];
				$vprodi = $data['prodi'];
			}
		}else if ($_GET['hal'] == "hapus") {
			
			$hapus = mysqli_query($koneksi, "DELETE FROM users WHERE id_mhs = '".$_GET['id']."' ");
			if ($hapus) {
				echo "<script>
					  alert('Hapus Data Sukses');
					  document.location = 'kenny.php';

					 </script>";
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tugas Kenny</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="js/">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container">

		<div class="card mt-5">
		  <div class="card-header bg-primary text-white">
		    <b>DAFTAR MAHASISWA</b>
		  </div>
		  <a href="insert.php" class="text-white btn btn-warning btn_tambah_siswa"> Tamba Siswa </a>
		  <div class="card-body">
		    <table class="table table-bordered table-striped text-center">
		    	<tr>
		    		<th>No.</th>
		    		<th>Nim</th>
		    		<th>Nama</th>
		    		<th>Alamat</th>
		    		<th>Program Studi</th>
		    		<th>Aksi</th>
		    	</tr>
		    	<?php 
		    		$no = 1;
		    		$tampil = mysqli_query($koneksi, "SELECT * FROM users order by id_mhs DESC");
		    		while ($data = mysqli_fetch_array($tampil)) :
		    		
		    	 ?>
		    	<tr>
		    		<td><?php echo $no++; ?></td>
		    		<td><?php echo $data['nim'] ?></td>
		    		<td><?php echo $data['nama'] ?></td>
		    		<td><?php echo $data['alamat'] ?></td>
		    		<td><?php echo $data['prodi'] ?></td>
		    		<td>
		    			<a href="update.php?hal=edit&id=<?php echo $data['id_mhs'] ?>" class="btn btn-success"> Edit </a>
		    			<a href="kenny.php?hal=hapus&id=<?php echo $data['id_mhs'] ?>" onclick = "return confirm('Apakah Yakin Ingin Menghapus Data Ini?')" class="btn btn-danger"> Hapus </a>
		    		</td>
		    	</tr>
		    <?php endwhile; ?>
		    </table>
		  </div>
		</div>
	</div>
<script type="text/javascript" src="js/bootstrap.min.css"></script>
</body>
</html>