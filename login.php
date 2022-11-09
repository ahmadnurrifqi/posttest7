<?php
            session_start();
include('config.php');
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
            <h3>Login</h3>
            <form method="POST">
                <div class="user-box">
                    <input type="text" name="username" id="username" class="inputan" required="">
                    <label>Username</label>
                </div>
                <div class="user-box">
                    <input type="password" name="password" id="password" class="inputan" required="">
                    <label>Password</label>
                </div>
                <div class="button-form">
                    <button id="submit" name="admin" type="submit">Login</button>
                    <div id="register">
                        <p>Don't have an account ?</p>
                        <a href="regis.php">Register Now!</a>
                    </div>
                </div>
            </form>
            <a href="index.php">Back to Home</a>
        </div>

        <?php
            

            if(isset($_POST['admin'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                $hasil = mysqli_query($db, "SELECT * FROM akun WHERE username = '$username'");
                $admin = mysqli_query($db, "SELECT * FROM admin1 WHERE username = '$username' or psw = '$password'");


                if(mysqli_num_rows($hasil) === 1) {
                    
                    $row = $hasil->fetch_assoc();
                    
                    if(password_verify($password, $row['psw'])) {
                        $_SESSION["user"] = $row;
                        // echo $_SESSION['user']['nama'];
                        // header('location: index.php');
                        ?>
                            <script>
                                alert('Login berhasil !')
                                document.location.href = 'profil.php';
                                const sub = document.getElementById('submit');
                                sub.addEventListener("click", function showInfo(){
                                    const x = document.getElementById('#log2');
                                    const y = document.getElementById('#log1');
                                    if (x.style.display == 'none'){
                                        x.style.display = 'block';
                                        y.style.display = 'none';
                                    }else{
                                        x.style.display = 'none';
                                        y.style.display = 'block';
                                    }
                                }
                                )
                                ;
                            </script>
                        <?php
                        // exit;
                    } else {
                        ?>
                            <script>
                                alert('Password anda salah!');
                            </script>
                        <?php
                    }
                }
                if(mysqli_num_rows($admin) === 1){
                      
                    $row = $admin->fetch_assoc();
                    $_SESSION["admin"] = $row;
                    
                     // header('location: index.php');
                     ?>
                     <script>
                         alert('Login berhasil !')
                         document.location.href = 'admin/index.php';
                         
                     </script>
                 <?php
                    

                }
                 else {
                    ?>
                        <script>
                            alert('Akun tidak ditemukan!');
                        </script>
                    <?php
                }
            } 
        ?>
    </body>
</html>