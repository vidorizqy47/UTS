<?php 
	$id = $_GET['id'];
	
	require_once('../koneksi.php');
	
	$sql = "SELECT * FROM jadwal WHERE id=$id";
	
	$r = mysqli_query($con,$sql);
	
	$result = array();

	$row = mysqli_fetch_array($r);
	
	array_push($result,array("id"=>$row['id'], 
							"fullname"=>$row['fullname'], 
							"tanggal"=>$row['tanggal'], 
							"waktu"=>$row['waktu'],
							"keterangan"=>$row['keterangan']));

	echo json_encode(array('result'=>$result));
	
	mysqli_close($con);