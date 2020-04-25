<?php
    function curl($url){
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch); 
        curl_close($ch);
        return $output;

    }
    
    $send = curl("https://hasboo.000webhostapp.com/rest-android/Makanan/get_all_makanan.php");
    
    // mengubah JSON menjadi array
    $data = json_decode($send, TRUE);
?>

<body>
<h2>Tampilan makanan</h2>
<button type="submit" class="btn-nav">Order Makanan</button>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Makanan</th>
            <th>Asal Makanan</th>
            <th>Harga Makanan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($data['result'] as $row) { ?>
        <tr>
            <td><?php echo $row['no'];?></td>
            <td><?php echo $row['nama_makanan'];?></td>
            <td><?php echo $row['asal_makanan'];?></td>
            <td><?php echo $row['harga'];?></td>
            <td>
                <a href="" class="button-delete">Hapus</a>
                <a href="detail_makanan.php?id=<?= $row['no'];?>" class="button-detail">Detail</a>
                <a href="" class="button-edit">Ubah</a>
            </td>
        </tr>
    <?php }?>
    </tbody>
</table>

</body>