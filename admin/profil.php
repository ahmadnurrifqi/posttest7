<?php 
    session_start();
    require 'config.php';
    
    
    if(!isset($_SESSION['admin'])){
       echo "<script>location='..login.php'</script>";
    }
    // $id_user = "SELECT * from akun where id=['user']";
   
    // $akun= $_SESSION['user']['id'];
    // $query = "SELECT * FROM akun where id=$akun";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/styleLog.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap">
        <title>LOGIN ACCOUNT</title>
    </head> 
    <body>
        <div class="login-box">
            <h3>Profil</h3>
            <table width="350px">
                <?php 
                $admin= $_SESSION['admin']['id'];
                $query = mysqli_query($db, "SELECT * FROM admin1 where id=$admin");
             
                if(mysqli_num_rows($query) > 0) {
                while($profil = mysqli_fetch_array($query)){
 
                    ?>
                <tr>
                    <td><label>Username</label></td>
                    <td>: <?=$profil['username']?></td>
                </tr>
                <?php }} ?>
            </table>
            <form method="POST">
                <div class="button-form">
                    <button id="submit" name="admin" type="submit">Logout</button>
                    <div id="register">
                        <!-- <p>Don't have an account ?</p> -->
                        <a href="index.php">Back to home!</a>
                    </div>
                </div>
            </form>
            <!-- <a href="index.php">Back to Home</a> -->
        </div>
        <?php
        include('config.php');
            // session_start();

            if(isset($_POST['admin'])) {
                session_start();
                session_unset();
                session_destroy();
                echo '
                <script>
                    alert("Berhasil Logout!");
                    window.location="../login.php"
                </script>';
            }
        ?>
    </body>
</html>