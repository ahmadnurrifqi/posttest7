<?php
    require 'config.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $result = mysqli_query($db, "SELECT * FROM game WHERE id_game = '$id'");
        $row = mysqli_fetch_array($result);
    }


    if(isset($_POST['update'])){
        
        $nama = $_POST['nama'];
        $jenis_pilihan = $_POST['jenis_pilihan'];
        $nama_file = $_POST['nama_file'];


      
        $gambar = isset($_FILES['gambar']['name']) ? $_FILES['gambar']['name'] : '';
        $x = explode('.', $gambar);
        $ekstensi = strtolower(end($x));
        $gambar_game = "$nama_file.$ekstensi";
        $tmp =  isset($_FILES['gambar']['tmp_name']) ? $_FILES['gambar']['tmp_name'] : '';


        if(move_uploaded_file($tmp, 'gambar/'.$gambar_game)) {
            $update = mysqli_query($db, "UPDATE game SET nama='$nama', jenis_pilihan='$jenis_game', gambar='$gambar_game' WHERE id_game='$id'");
        
        if($update){
            echo "<script> alert('Data Game Berhasil Ditambahkan');</script>";
            header("Location:index.php");
        }else {
            echo "Gagal Menambahkan Game, Coba Lagi";
            header("Location:addgame.php");

      }

        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Title & Web Icon -->
    <title>G-Store: Top up Games</title>
    <link rel="shortcut icon" href="assets/logoIcon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

    <!-- CSS & script -->
    <link rel="stylesheet" href="css/detail.css">
    <script src="script.js" defer></script>
</head>
<body>
    <nav>
        <div class="logo">

        </div>
        <div class="menu">
            <ul >
                <li><a href="index.php">Home</a></li>
                <li><a href="readC.php">Box Comment</a></li>
                <li id="log1"><a href="profil.php">Profil</a></li>
                <li id="log2" style="display: none;"><a href="profil.php">Profil</a></li>
            </ul>
            <div class="mode">
                <i onclick="myFunction()" class="bi bi-brightness-high-fill" id="toggleDark"></i>
            </div>
        </div>
        <div class="menu-toggle">
            <input id="cek" type="checkbox">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
    <section>
        <div class="caption">

                <h2>ADD GAME</h1>
                <img src="gambar/<?php echo $row['gambar']?>" alt="">
        </div>
        <div class="forms">
            <form method = "post" enctype="multipart/form-data">
                <div class="data">
                    <h3>Lengkapi Data</h3>
                    
                        <label for="Nama">Nama</label>
                        <input type="text" name="nama" placeholder="Masukkan Nama Game (Contoh: Mobile Legend)" id="nama_game"
                            value = <?php echo $row['nama'] ?>>
                </div>
                <div class="nominal">
                    <h3>Jenis Pilihan</h3>
                        <div>
                            <label for="pilihan">Jenis Pilihan</label>
                            <br>
                            <textarea
                            name="jenis_pilihan"
                            id="pil"
                            row="10"
                            cols="50"
                            placeholder="42 Diamonds Rp 34.000, 60 Diamonds Rp 50.000"
                            value=<?php echo $row['jenis_pilihan'] ?>
                            ></textarea>      
                </div>
            <div class ="gambar">
                <h3>Gambar</h3>
                <label for ="" > Upload Gambar : </label>
                <input type = "file" name="gambar"><br><br>
                <label for="">Nama File: </label>
                <input type="text" name="nama_file" value=<?php echo $row['gambar'] ?>>
               <br><br>
            <div>
            <!-- class="fas fa-cart-arrow-down" -->
                <button method="post" class="order" name="update" type="submit" value="update">Create</button>
            </div>
        </form>
        </div> 
    </section>
</body>
</html>


