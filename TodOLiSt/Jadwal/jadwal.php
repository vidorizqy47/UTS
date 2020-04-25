<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

		$fullname = $_POST['fullname'];
		$tanggal = $_POST['tanggal'];
		$waktu = $_POST['waktu'];
		$keterangan = $_POST['keterangan'];

				$sql = "INSERT INTO jadwal (fullname,tanggal,waktu,keterangan) VALUES ('$fullname','$tanggal','$waktu','$keterangan')";

				require_once('../koneksi.php');

				if(mysqli_query($con,$sql)) {
				echo 'Jadwal Ditambahkan';
				} else {
				echo 'Gagal Tambah Jadwal';
				}

		mysqli_close($con);
	}