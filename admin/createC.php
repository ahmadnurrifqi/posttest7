<?php
include 'configComment.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id_comment = isset($_POST['id_comment']) && !empty($_POST['id_comment']) && $_POST['id_comment'] != 'auto' ? $_POST['id_comment'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';
    $komentar = isset($_POST['komentar']) ? $_POST['komentar'] : '';

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO boxcomment VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$id_comment, $nama, $email, $tanggal, $komentar]);
    // Output message
    $msg = 'Created Successfully!';
}
?>


<?=template_header('Create comment')?>

<div class="content update">
    <form action="createC.php" method="post">
        <label for="id_comment">ID</label>
        <input type="text" name="id_comment" value="auto" id="id_comment">
        
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama">

        <label for="email">Email</label>
        <input type="text" name="email" id="email">

        <label for="komentar">Comment</label>
        <input type="text" name="komentar" id="komentar">
        
        <input type="hidden" name="tanggal" value=<?= date("d-m-Y")?>>
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>