<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
		$fullname = $_POST['fullname'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$alamat = $_POST['alamat'];
		$pekerjaan = $_POST['pekerjaan'];
		$telp = $_POST['telp'];
		
		if($fullname == '' || $email == '' || $username == '' || $password == '' || $alamat == '' || $pekerjaan == '' || $telp == ''){
			echo 'Lengkapi Semua Form Terlebih Dahulu!';
		}else{
			require_once('../koneksi.php');
			$sql = "SELECT * FROM users WHERE username='$username' OR email='$email'";
			
			$check = mysqli_fetch_array(mysqli_query($con,$sql));
			
			if(isset($check)){
				echo 'Username atau email sudah ada';
			}else{				
				$sql = "INSERT INTO users (fullname,email,username,password,alamat,pekerjaan,telp) VALUES('$fullname','$email','$username','$password','$alamat','$pekerjaan','$telp')";
				if(mysqli_query($con,$sql)){
					echo 'Pendaftaran Berhasil';
				}else{
					echo 'oops! Mohon coba lagi!';
				}
			}
			mysqli_close($con);
		}
}else{
echo 'error';
}