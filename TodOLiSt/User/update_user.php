<?php 
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$id = $_POST['id'];
		$fullname = $_POST['fullname'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$alamat = $_POST['alamat'];
		$pekerjaan = $_POST['pekerjaan'];
		$telp = $_POST['telp'];
		
		require_once('../koneksi.php');
		$sql = "UPDATE users SET fullname = '$fullname', email = '$email', username = '$username', password = '$password', alamat = '$alamat', pekerjaan = '$pekerjaan', telp = '$telp' WHERE id = $id;";
		if(mysqli_query($con,$sql)){
			echo 'Data Pengguna Berhasil Diupdate';
		}else{
			echo 'oops! Mohon coba lagi!';
		}
		
		mysqli_close($con);
	}