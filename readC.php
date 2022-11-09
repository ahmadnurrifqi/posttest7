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


<?php 
                include "config.php";
                if (isset($_GET['cari'])){
                    $pencarian= $_GET['cari'];
                    $query = "SELECT * FROM boxcomment WHERE nama LIKE '%".$pencarian."%' OR email LIKE '%".$pencarian."%'";  
                }else{
                    $query= "SELECT * FROM boxcomment";
                }


                $read = mysqli_query($db, $query);
                while($row = mysqli_fetch_assoc($read))
            ?>



<?=template_header('Comment page')?>

<div class="content read">
	<a href="createC.php" class="create-contact">Create Comment</a>
    <form method= "get" action="">
            <input type="text" placeholder= "Cari Game ..." name="cari" value="<?php if(isset($_GET['cari'])){echo $_GET['cari'];} ?>">
            <br>
            <button type="submit">Cari</button>
    </form>  

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
        <?php 
                include "config.php";
                if (isset($_GET['cari'])){
                    $pencarian= $_GET['cari'];
                    $query = "SELECT * FROM boxcomment WHERE nama LIKE '%".$pencarian."%' OR email LIKE '%".$pencarian."%'";  
                }else{
                    $query= "SELECT * FROM boxcomment";
                }


                $read = mysqli_query($db, $query);
                while($row = mysqli_fetch_assoc($read)){
            ?>
            <tr>
            <td><?php echo $row['id_comment'] ?></td>
            <td><?php echo $row['nama'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['tanggal'] ?></td>
            <td><?php echo $row['komentar'] ?></td>
            <td class="actions">
                    <a href="updateC.php?id_comment=<?=$field['id_comment']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="deleteC.php?id_comment=<?=$field['id_comment']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
            </td>
            </tr>
                <?php } ?>
        </tbody>
        <br>
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