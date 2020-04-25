<?php 
	if($_SERVER['REQUEST_METHOD']=='POST'){

		$id = $_POST['id'];
		$fullname = $_POST['fullname'];
		$tanggal = $_POST['tanggal'];
		$waktu = $_POST['waktu'];
		$keterangan = $_POST['keterangan'];
		
		require_once('../koneksi.php');

		$sql = "UPDATE jadwal SET id = '$id', fullname = '$fullname', tanggal = '$tanggal', waktu = '$waktu', keterangan = '$keterangan' WHERE id = $id;";
		
		if(mysqli_query($con,$sql)) {
				echo "Jadwal Di Update";
				} else {
				echo 'Maaf Update Jadwal Gagal Dilakukan!';
				}
		
		mysqli_close($con);
	}