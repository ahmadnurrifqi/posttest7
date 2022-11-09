<?php 
    require 'configMeme.php';

    date_default_timezone_set("Asia/Makassar");
    
    $query = "SELECT * FROM meme";
    $result = $db->query($query);
?>
<?=template_head('meme')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>$title</title>
</head>
<body>
    <div class="startm">
        <a href="memeC.php" class="tez">UPLOUD MEME</a>
        <div class="tampil">
        <?php 
                $i = 1;
                while($row=mysqli_fetch_array($result)){
            ?>
                <div class="content">
                    <img src="gambar/<?=$row['nama']?>" alt="" width="200px" height="300px">
                    <div class="baris">
                        <p><?=$row['waktu'] ?></p>
                        <a href="memeD.php?id=<?=$row['id']?>" class="hapus"><i class="fas fa-trash fa-xs"></i></a>
                    </div>
                </div>
            <?php 
                $i++;
                }
            ?>
        </div>
    </div>
</body>
</html>