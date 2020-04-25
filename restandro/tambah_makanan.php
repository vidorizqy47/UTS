<?php 
function curl($url, $data){
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch);      
    return $output;
}

// Data Parameter yang Dikirim oleh cURL
$data = array(
    'nama_makanan'=>"coba",
    'asal_makanan'=>"coba2", 
    'harga_makanan'=>"3000");

$send = curl("https://hasboo.000webhostapp.com/rest-android/Makanan/makanan.php",json_encode($data));

echo json_encode(array('respon'=>$send),JSON_UNESCAPED_SLASHES);

?>


<body>
    
</body>