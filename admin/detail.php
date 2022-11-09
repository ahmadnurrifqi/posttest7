<?php
session_start();
if (!isset($_SESSION['admin'])){
    echo "<script>
    document.location.href = '../login.php';
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
                <img src="gambar/<?php echo $row['gambar']?>" alt="">

                <h2></h1>
        </div>
        <div class="forms">
            <div class="data">
                <h3>Data Game</h3>
                
                    <label for="nama"><?php echo $row['nama']?></label>
                    <br></br>
            </div>
            <div class="nominal">
                <h3>Nominal</h3>
               
                    <div>
                        <label for="jenis"><?php echo $row['jenis_pilihan']?></label>
                    </div>
                    
                    <br>
                    <td>
                    <a href="editgame.php?id=<?=$row['id_game'];?>"class="bi bi-pencil-fill" viewBox="0 0 20 20"></a>
                    <a href="deletegame.php?id=<?=$row['id_game'];?>"class="bi bi-trash-fill" viewBox="0 0 20 20"></a>
                    </td>
            </div>
        </div>

                <?php
                    }
                }
                ?>
            
            
    </section>
</body>
</html>