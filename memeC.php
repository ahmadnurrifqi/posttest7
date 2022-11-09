<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/meme.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <title>Create meme</title>
</head>
<body>
    <nav class="navtop">
        <div>
            <h1>Box Comment</h1>
            <a href="index.php"><i class="fas fa-home"></i>Back to Homepage</a>
            <a href="readC.php"></i>Comment</a>
            <a href="meme.php"></i>Meme foto</a>
        </div>
    </nav>
    <div class="forms">
        <form action="" method="post" enctype="multipart/form-data" action="formulir">

            <label for="">Nama : </label><br>
            <input type="text" name="nama"><br><br>

            <label for="">File : </label><br>
            <input type="file" name="gambar"><br><br>

            <input type="hidden" name="waktu" value=<?= date("d-m-Y")?>>
            <input type="submit" name="submit" value="Uploud" class="sus">
        </form>
    </div>
</body>
</html>

<?php 

    require 'configMeme.php';

    if(isset($_POST['submit'])){
        $waktu = $_POST['waktu'];
        $nama = $_POST['nama'];
        
        $gambar = $_FILES['gambar']['name'];
        $x = explode('.', $gambar);
        $ekstensi = strtolower(end($x));

        $gambar_baru = "$nama.$ekstensi";
        $tmp = $_FILES['gambar']['tmp_name'];

        if(move_uploaded_file($tmp, 'gambar/'.$gambar_baru)){
            $query = "INSERT INTO meme (waktu, nama) VALUES ('$waktu','$gambar_baru')";
            $result = $db->query($query);

            if($result){
                header("Location:meme.php");
            }else{
                echo "gagal kirim";
            }
        }
        
    }
?>