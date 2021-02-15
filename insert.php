<?php 

	$server = "localhost";
	$user = "root";
	$password = "";
	$database = "tugas_kenny";

	$koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));

if (isset($_POST['bsimpan'])) {

			$simpan = mysqli_query($koneksi, "INSERT INTO users (nim, nama, alamat, prodi) VALUES ('".$_POST['tnim']."', '".$_POST['tnama']."', '".$_POST['talamat']."', '".$_POST['tprodi']."')");

			if ($simpan) {
				echo "<script> 
					  alert('Simpan Data Sukses');
					  document.location = 'kenny.php';

					 </script>";
			}
			else {

				echo "<script>
					  alert('Simpan Data Gagal');
					  document.location = 'crud.php';

					 </script>";

			}
		}


 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Tambah Siswa</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="js/">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<div class="container">
		<div class="card mt-5">
		  <div class="card-header bg-primary text-white">
		    <b>FORM INPUT DATA MAHASISWA</b>
		  </div>
		  <div class="card-body">
		    <form method="POST" action="">
		    	<div class="form-group">
		    		<label>Nim</label>
		    		<input type="text" name="tnim" value="<?php echo @$vnim ?>" class="form-control" placeholder="Masukkan Nim Anda" required="">
		    	</div>
		    	<div class="form-group">
		    		<label>Nama</label>
		    		<input type="text" name="tnama" value="<?php echo @$vnama ?>" class="form-control" placeholder="Masukkan Nama Anda" required="">
		    	</div>
		    	<div class="form-group">
		    		<label>Alamat</label>
		    		<textarea class="form-control" name="talamat" placeholder="Masukkan Alamat Anda"><?php echo @$valamat ?></textarea>
		    	</div>
		    	<div class="form-group">
		    		<label>Jurusan</label>
		    		<input type="text" name="tprodi" value="<?php echo @$vprodi ?>" class="form-control" placeholder="Masukkan Jurusan Anda" required="">
		    	</div>

		    	<button type="submit" class="btn btn-danger" name="bsimpan">Input</button>
		    	<button type="reset" class="btn btn-primary" name="breset">Kosongkan</button> 

		    </form>
		  </div>
		</div>
	</div>

		<script type="text/javascript" src="js/bootstrap.min.css"></script>

</body>
</html>