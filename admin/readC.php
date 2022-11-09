<?php
include 'configComment.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 5;


// Prepare the SQL statement and get records from our comment table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM boxcomment ORDER BY id_comment LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$comment = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Get the total number of comment, this is so we can determine whether there should be a next and previous button
$num_comment = $pdo->query('SELECT COUNT(*) FROM boxcomment')->fetchColumn();
?>


<?=template_header('Comment page')?>

<div class="content read">
	<a href="createC.php" class="create-contact">Create Comment</a>
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Nama</td>
                <td>Email</td>
                <td>Tanggal</td>
                <td>Comment</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comment as $field): ?>
            <tr>
                <td><?=$field['id_comment']?></td>
                <td><?=$field['nama']?></td>
                <td><?=$field['email']?></td>
                <td><?=$field['tanggal']?></td>
                <td><?=$field['komentar']?></td>
                <td class="actions">
                    <a href="updateC.php?id_comment=<?=$field['id_comment']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="deleteC.php?id_comment=<?=$field['id_comment']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_comment): ?>
		<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>

<?=template_footer()?>