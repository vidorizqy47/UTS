<h2>Minuman</h2>

<?php
    function curl($url){
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);      
        return $output;
    }
    
    $send = curl("https://hasboo.000webhostapp.com/rest-android/Minuman/get_all_minuman.php");
    
    // mengubah JSON menjadi array
    $data = json_decode($send, TRUE);
?>

<body>
<input type="button" value="Pesan Minuman" class="btn-nav">

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Minuman</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($data['result'] as $row) { ?>
        <tr>
            <td><?php echo $row['no'];?></td>
            <td><?php echo $row['nama_minuman'];?></td>
            <td>
                <a href="" class="button-delete">Hapus</a>
                <a href="" class="button-detail">Detail</a>
                <a href="" class="button-edit">Ubah</a>
            </td>
        </tr>
    <?php }?>
    </tbody>
</table>

</body>