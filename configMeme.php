<?php 

$server = "localhost";
$username = "root";
$password = "";
$db_name = "top_up_game";

//System PDO (PHP Database Object)
$db = new mysqli($server,$username,$password,$db_name);

if(!$db){
    die("Gagal Terhubung");
}

function template_head($title) {
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>$title</title>
            <link href="css/meme.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
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
    EOT;
    }
    function template_footer() {
    echo <<<EOT
        </body>
    </html>
    EOT;
    }
    ?>