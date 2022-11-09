<?php
function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'top_up_game';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}
function template_header($title) {
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>

		<link rel="shortcut icon" href="assets/logoIcon.png">
    	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

		<link rel="preconnect" href="https://fonts.googleapis.com">
    	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    	<link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

		<link href="css/comment.css" rel="stylesheet" type="text/css">
		<script src="script.js" defer></script>
	</head>
	<body>
    <nav>
        <div class="logo">
            <a href="index.php" >
                <b>Box Comment</b>
            </a>
        </div>
        <div class="menu">
            <ul >
                <li><a href="index.php">Back to Home</a></li>
                <li><a href="readC.php">Box Comment</a></li>
                <li><a href="meme.php">Meme</a></li>
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
EOT;
}
function template_footer() {
echo <<<EOT
    </body>
</html>
EOT;
}
?>