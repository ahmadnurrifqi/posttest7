<?php
include 'configComment.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id_comment'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id_comment = isset($_POST['id_comment']) ? $_POST['id_comment'] : NULL;
        $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';
        $komentar = isset($_POST['komentar']) ? $_POST['komentar'] : '';
        
        // Update the record
        $stmt = $pdo->prepare('UPDATE boxcomment SET id_comment = ?, nama = ?, email = ?, tanggal = ?, komentar = ? WHERE id_comment = ?');
        $stmt->execute([$id_comment, $nama, $email, $tanggal, $komentar, $_GET['id_comment']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM boxcomment WHERE id_comment = ?');
    $stmt->execute([$_GET['id_comment']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>



<?=template_header('Update comment')?>

<div class="content update">
    <form action="updateC.php?id_comment=<?=$contact['id_comment']?>" method="post">
        <label for="id_comment">ID</label>
        <input type="text" name="id_comment" value="<?=$contact['id_comment']?>" id="id_comment">

        <label for="nama">Nama</label>
        <input type="text" name="nama" value="<?=$contact['nama']?>" id="nama">

        <label for="email">Email</label>
        <input type="text" name="email" value="<?=$contact['email']?>" id="email">

        <label for="komentar">comment</label>
        <input type="text" name="komentar" value="<?=$contact['komentar']?>" id="kometar">
        
        <input type="hidden" name="tanggal" value=<?= date("d-m-Y")?>>
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>