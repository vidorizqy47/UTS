<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="container">
            <ul class="nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php?id=1">Makanan</a></li>
                <li><a href="index.php?id=2">Minuman</a></li>
                <li><a href="index.php?id=3">Testimoni</a></li>
                <li><a href="index.php?id=4">User</a></li>
                <li><a href="logout">Logout</a></li>
            </ul>
        </div>
    </header>
    
    <main class="content">
        <?php
            if(isset($_GET['id'])){
                if($_GET['id'] == 1) {
                    include 'makanan.php';
                } elseif ($_GET['id'] == 2) {
                    include 'minuman.php';
                } elseif ($_GET['id'] == 3) {
                    include 'testimoni.php';
                } elseif ($_GET['id'] == 4) {
                    include 'user.php';
                }

            } else {
                include 'home.php';
            }
        ?>
    </main>


</body>
</html>