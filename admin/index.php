<?php
session_start();
require('../config.php');
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
    <link rel="stylesheet" href="css/style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <nav>
        <div class="logo">
            <a href="index.php">
                <img src="assets/logoIcon.png" alt="LOGO">
            </a>
            <a href="index.php" >
                G-Store
            </a>
        </div>
        <div class="menu">
            <ul >
                <li><a href="index.php">Home</a></li>
                <li><a href="readC.php">Box Comment</a></li>
                <li><a href="#about">About Us</a></li>
                <?php
                // $akun1 = $_SESSION["user"]["id"];
                // $akun=mysqli_query($db,"SELECT * FROM akun WHERE id = $akun1");
                // if(mysqli_num_rows($akun)>0){
                //     while($row=mysqli_fetch_array($akun)){
                  
                // ?>
                <li><?
                // php echo $row['nama']
                ?></li>
                <?php
                // // if(
                // ?>
                <li id="log1"><a href="../login.php">Login</a></li>
                <?php
                // }}
                ?>
                <!-- <li id="log2" style="display: none;"><a href="profil.php">Profil</a></li> -->
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
    <header>
        <div class="underline-header">
            <div class="header-content">
                <div class="header-content-left">
                    <h1>TOP UP<br>YOUR GAME</h1>
                    <p>G-Store Is A Safe, Cheap Top Up Game Place. G-Store Provides Top Up Games Services such as Diamond Mobile Legends, Free Fire, Valorant, etc. To Simplify Your Payments Here We Also Provide Payment Methods Alfamart, Bank BCA, Bank Mandiri, Bank BNI, Bank Bri, DANA, OVO, Gopay, Shopee Pay, Link Aja, etc. If there are problems, please click contact us at the bottom right on this website.
                    </p>
                    <div class="content-find">
                        
                        <a href="addgame.php">
                            <button class="play-btn">Add Game</button>
                        </a>
                    </div>
                </div>
                <div class="header-content-right">
                    <img src="assets/iconHeader.png" class="img-icon" alt="">
                </div>
            </div>
            <hr border>
        </div>
    </header>
    <!-- section -->
    <section>
        <div class="main-content">
            <ul>
                <?php
                $gambar=mysqli_query($db,"SELECT * FROM game");
                if(mysqli_num_rows($gambar)>0){
                    while($row=mysqli_fetch_array($gambar)){
                    
                ?>
                <li>
                    <a href="detail.php?id=<?php echo $row['id_game'] ?>"><img src="gambar/<?php echo $row['gambar']?>" alt="">
                        <h3><?php echo $row['nama'] ?></h3>
                    </a>
                </li>
                <?php
                    }
                }
                ?>

                // <!-- <li>
                //     <a href="detail.php?id=2" target="_blank"><img src="assets/ml.png" alt="">
                //         <h3>Mobile Legends</h3>
                //     </a>
                // </li>
                // <li>
                //     <a href="#comingsoon" target="_blank"><img src="assets/domino.jpg" alt="">
                //         <h3>Higgs Domino</h3>
                //     </a>
                // </li>
                // <li>
                //     <a href="#comingsoon" target="_blank"><img src="assets/lol.png" alt="">
                //         <h3>League Of Legends</h3>
                //     </a>
                // </li>
                // <li>
                //     <a href="#comingsoon" target="_blank"><img src="assets/apex.png" alt="">
                //         <h3>Apex Legend</h3>
                //     </a>
                // </li>
                // <li>
                //     <a href="#comingsoon" target="_blank"><img src="assets/ff.jpg" alt="">
                //         <h3>Free Fire</h3>
                //     </a>
                // </li>
                // <li>
                //     <a href="#comingsoon" target="_blank"><img src="assets/gt.webp" alt="">
                //         <h3>Growtopia</h3>
                //     </a>
                // </li>
                // <li>
                //     <a href="#comingsoon" target="_blank"><img src="assets/pubg.jpg" alt="">
                //         <h3>PUBG Mobile</h3>
                //     </a>
                // </li>
                // <li>
                //     <a href="#comingsoon" target="_blank"><img src="assets/cod.jpg" alt="">
                //         <h3>Call of Duty</h3>
                //     </a>
                // </li>
                // <li>
                //     <a href="#comingsoon" target="_blank"><img src="assets/sausage.jpg" alt="">
                //         <h3>Sausage Men</h3>
                //     </a>
                // </li> -->
            </ul>
        </div>
    </section>
    <!-- FOOTER -->
    <footer>
        <h2 id="about">ABOUT US</h2>
        <div class="footer-content">
            <div class="footer-logo">
                <ul>
                    <li>
                        <img src="assets/logoIcon.png">
                    </li>
                    <li class="logo-text">
                        <B>G-STORE</B>
                        <B>TOP UP YOUR GAMES</B>
                    </li>
                </ul>
            </div>
            <div class="footer-list">
                <ul>
                    <li>
                        <p>ADDRESS :</p><br>
                        <P>Jl. DI. Panjaitan</P>
                        <p>Gang Piano 11 No.59,</p>
                        <p>Kota Bontang - Kalimantan Timur</P>
                    </li>
                    <br><br>
                    <li>
                        <p>CONTACT US :</p>
                        <div class="row1">
                            <div class="circle ig">
                                <a href="https://www.instagram.com/login" onclick="return confirm('You will be redirected to other website.');"><img src="assets/instagram.png" alt=""></a>
                            </div>
                            <div class="circle fb">
                                <a href="https://www.facebook.com/login" onclick="return confirm('You will be redirected to other website.');"><img src="assets/facebook.png" alt=""></a>
                            </div>
                        </div>
                        <div class="row2">
                            <div class="circle wa">
                                <a href="https://www.whatsapp.com" onclick="return confirm('You will be redirected to other website.');"><img src="assets/whatsapp.png" alt=""></a>
                            </div>
                            <div class="circle tw">
                                <a href="https://www.twitter.com/login" onclick="return confirm('You will be redirected to other website.');"><img src="assets/twitter.png" alt=""></a>
                            </div>
                        </div>
                    </li>
                    <br>
                </ul>
            </div>
        </div>
        <br>
        <div class="footer-copyright">
            <div class="copyright">Copyright © 2022 by 
                <a href="https://instagram.com/anrifqii/">anrifqii</a>
                . All rights reserved.
            </div>
        </div>
    </footer>
</body>
</html>