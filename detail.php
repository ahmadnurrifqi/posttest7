<?php
session_start();
if (!isset($_SESSION['user'])){
    echo "<script>
    document.location.href = 'login.php';
    </script>";
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
                
            <a href="index.php" >
                Valorant
            </a>
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
            <?php 
                require 'config.php';
                $id = $_GET['id'];
                $gambar=mysqli_query($db,"SELECT * FROM game where id_game=$id");
                if(mysqli_num_rows($gambar)>0){
                    while($row=mysqli_fetch_array($gambar)){
                    
                ?>
                <img src="assets/<?php echo $row['gambar']?>" alt="">
                <?php
                    }
                }
                ?>
            
            
            <div>
                <h3>Top up</h3>
                <ol>
                    <li>Masukkan ID</li>
                    <li>Pilih Nominal top-up</li>
                    <li>Pilih Metode pembayaran</li>
                    <li>Klik Order Now & Lakukan Pembayaran</li>
                </ol>
            </div>
        </div>
        <div class="forms">
            <form method="post">  
                <div class="data">
                    <h3>Lengkapi Data</h3>
                    <form action="detail.php" method="post">
                        <label for="id">ID</label>
                        <input type="text" name="id_user" placeholder="Masukkan ID (Contoh: abcde#1234)">
                        <br></br>
                        <label for="server_id">Server ID</label>
                        <input type="text" name="server_id" placeholder="Masukkan Server ID (Contoh: abcde#1234)" id="server_id">
                    </form>
                </div>
                <div class="nominal">
                    <h3>Pilih Nominal</h3>

                    <?php 
                    require 'config.php';
                    $id = $_GET['id'];
                    $gambar=mysqli_query($db,"SELECT * FROM game where id_game=$id");
                    if(mysqli_num_rows($gambar)>0){
                        while($row=mysqli_fetch_array($gambar)){
                        
                        
                    ?>
                    <form action="detail.php" method="post">
                    
                        <div>
                            <label for="pil"><i><?php echo $row['jenis_pilihan']?></i></label>
                            <input type="text" name="jenis" placeholder="Masukkan Jenis Top Up, contoh : 300 Points Rp 34.000">
                        
                        </div>
                    
                        <!-- <div>
                            <input type="radio" id="3400" name="jenis" value="3400">
                            <label for="3400">3400 Points <i>(Rp 335.000)</i></label>
                        </div>
                        <div>
                            <input type="radio" id="7000" name="jenis" value="7000">
                            <label for="7000">7000 Points <i>(Rp 670.000)</i></label>
                        </div> -->
                    </form>
                    <?php
                        }
                        }
                    
                    ?>
                </div>
                <div class="pembayaran">
                    <h3>Pilih Metode Pembayaran</h3>
                    <form action="" method="post">
                        <div>
                            <input type="radio" id="E-Wallet" name="bayar" value="E-Wallet">
                            <label for="E-Wallet">E-Wallet <i>(Dana, Gopay, OVO)</i></label>
                        </div>
                        <div>
                            <input type="radio" id="transfer" name="bayar" value="transfer">
                            <label for="transfer">Bank Transfer <i>(BCA)</i></label>
                        </div>
                        <div>
                            <input type="radio" id="virtual" name="bayar" value="virtual">
                            <label for="virtual">Virtual Account <i>(Mandiri, BNI, BRI)</i></label>
                        </div>
                    </form>
                </div>
                <button method="post"  value="beli" name="beli" type="submit">Order Now !!!</button>
                <!-- <div>
                 class="fas fa-cart-arrow-down" -->
                    <!-- <button method="post" class="order" name="beli" type="submit" value="beli">Order Now !!!</button>
                </div> -->
            </form>
        </div>
    </section>
</body>
</html>


<?php
    require 'config.php';
               
                
                
        if(isset($_POST['beli'])){
        $id_game = $_POST['id_game'];
        $nama = $_POST ['nama'];
        $email = $_POST['email'];
        $nama_game = $_POST ['nama'];
        $user_id = $_POST['id_user'];
        $server_id = $_POST['server_id'];
        $bayar = $_POST['bayar'];


      
        $kirim = mysqli_query($db, "INSERT INTO pembelian (id_game,nama,email,nama_game, id_user, server_id,bayar) VALUES ('$id_game','$nama','$email','$nama_game','$user_id','$server_id', '$bayar')");
      
        if($kirim){
            echo "<script> alert('Data Berhasil Dikirim, Pemesanan Berhasil!!!');</script>";
            header("Location:index.php");
        }else {
            echo "Gagal Membeli, Coba Lagi";
      }
    }
?>



