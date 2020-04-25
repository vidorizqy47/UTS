<?php
    function curl($url){
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);      
        return $output;
    }
    
    $send = curl("https://hasboo.000webhostapp.com/rest-android/User/get_all_user.php");
    
    // mengubah JSON menjadi array
    $data = json_decode($send, TRUE);
?>

<body>
<h2>User</h2>
<input type="button" value="Pesan Makanan" class="btn-nav">

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Lengkap</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($data['result'] as $row) { ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['fullname'];?></td>
            <td>
                <a href="index.php?id=5" class="button-delete">Hapus</a>
                <a href="index.php?id=6" class="button-detail">Detail</a>
                <a href="index.php?id=7" class="button-edit">Ubah</a>
            </td>
        </tr>
    <?php }?>
    </tbody>
</table>

</body>