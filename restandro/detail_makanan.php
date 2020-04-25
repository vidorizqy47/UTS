<?php
    function curl($url){
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);      
        return $output;
    }
    
    $send = curl("https://hasboo.000webhostapp.com/rest-android/Makanan/get_makanan.php");
    
    // mengubah JSON menjadi array
    $data = json_decode($send, TRUE);
    var_dump($data);
?>

<body>

<?php foreach ($data['result'] as $row) {?>
<div class="detail-makanan">
    <h2>Nama Makanan: <?php echo $row['nama_makanan'];?></h2>
    <p>Asal Makanan: <?php echo $row['asal_makanan'];?></p>
    <p>Harga: Rp <?php echo $row['harga_makanan'];?></p>
</div>
<?php } ?>


</body>