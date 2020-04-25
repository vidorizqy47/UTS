<?php 
	$id = $_GET['id'];
	
	require_once('../koneksi.php');
	
	$sql = "DELETE FROM jadwal WHERE id=$id;";
	
	if(mysqli_query($con,$sql)){
		echo 'Jadwal Dihapus';
	}else{
		echo 'oops! Gagal Hapus Jadwal!';
	}
	
	mysqli_close($con);