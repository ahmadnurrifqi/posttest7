<?php
include 'configComment.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check that the comment ID exists
if (isset($_GET['id_comment'])) {
    // Select the record that is going to be deleted
    $stmt = $pdo->prepare('SELECT * FROM boxcomment WHERE id_comment = ?');
    $stmt->execute([$_GET['id_comment']]);
    $comment = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$comment) {
        exit('Comment doesn\'t exist with that ID!');
    }
    // Make sure the user confirms beore deletion
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // User clicked the "Yes" button, delete record
            $stmt = $pdo->prepare('DELETE FROM boxcomment WHERE id_comment = ?');
            $stmt->execute([$_GET['id_comment']]);
            $msg = 'You have deleted the comment!';
        } else {
            // User clicked the "No" button, redirect them back to the read page
            header('Location: readC.php');
            exit;
        }
    }
} else {
    exit('No ID specified!');
}
?>


<?=template_header('Delete Comment')?>

<div class="content delete">
	<h2>Delete Comment #<?=$comment['id_comment']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Are you sure you want to delete comment #<?=$comment['id_comment']?>?</p>
    <div class="yesno">
        <a href="deleteC.php?id_comment=<?=$comment['id_comment']?>&confirm=yes">Yes</a>
        <a href="deleteC.php?id_comment=<?=$comment['id_comment']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>