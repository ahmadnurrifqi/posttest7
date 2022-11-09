<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/styleLog.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap">
        <title>REGISTRASI</title>
    </head>
    <body>
        <div class="login-box">
            <h3>Registrasi</h3>
            <form method="POST">
                <div class="user-box">
                    <input type="text" name="nama" id="nama" class="inputan" required="">
                    <label>Nama</label>
                </div>
                <div class="user-box">
                    <input type="text" name="email" id="email" class="inputan" required="">
                    <label>Email</label>
                </div>
                <div class="user-box">
                    <input type="text" name="username" id="username" class="inputan" required="">
                    <label>Username</label>
                </div>
                <div class="user-box">
                    <input type="password" name="password" id="password" class="inputan" required="">
                    <label>Password</label>
                </div>
                <div class="user-box">
                    <input type="password" name="confirm-password" id="confirm-password" class="inputan" required="">
                    <label>Konfirmasi Password</label>
                </div>
                <div class="button-form">
                    <button id="submit" name="register" type="submit">Daftar</button>
                    <div id="register">
                        Don't have an account ?
                        <a href="login.php">
                            Login disini
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <?php
        require('config.php');

        if(isset($_POST['register'])) {
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $cPassword = $_POST['confirm-password'];

            if($password == $cPassword) {
                $password = password_hash($password, PASSWORD_DEFAULT);

                $hasil = mysqli_query($db, "SELECT username FROM akun WHERE username = '$username'");
                if(mysqli_fetch_assoc($hasil)) {
                    echo '<script>
                        alert("Username sudah digunakan!");
                        document.location.href = "regis.php";
                    </script>';
                } else {
                    $push_data = mysqli_query($db, "INSERT INTO akun (nama, email, username, psw) VALUES ('$nama', '$email', '$username', '$password')");

                    if(mysqli_affected_rows($db) > 0) {
                        echo '<script>
                            alert("Registrasi berhasil");
                            document.location.href = "login.php";
                        </script>';
                    } else {
                        echo '<script>
                            alert("Registrasi gagal");
                        </script>';
                        $result = mysqli_query($db, $push_data) or trigger_error("Query Failed! SQL: $push_data - Error: ".mysqli_error($db), E_USER_ERROR);
                        echo $result;
                    }
                }
            } else {
                echo '<script>
                    alert("Konfirmasi password anda beda");
                    document.location.href = "regis.php";
                </script>';
            }
        } 
        ?>
    </body>
</html>