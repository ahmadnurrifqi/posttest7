<?php 

require 'config.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $hapus = mysqli_query($db, "DELETE FROM game WHERE id_game='$id'");

    if($hapus){
         echo "<script> alert('Data Game Berhasil Dihapus');</script>";
         header("Location:index.php");
        }else {
                echo "Gagal Membeli, Coba Lagi";
        }
       
    }

?>