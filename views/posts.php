<?php
require_once '../views/navbar.php';
require_once '../inc/connection.php';

$stmt = $pdo->prepare('SELECT * FROM posts');
$stmt->execute();

$_SESSION['posts'] = $stmt->fetchAll();
 ?>
	
	<div class="container">
		<div class="row">
		<?php
	if(count($_SESSION['posts']) > 0 && $_SESSION['posts'] !== false){
		?>
			<table class="table">
		<tr>
			<th>ID</th>
			<th>User</th>
			<th>Title</th>
			<th>Body</th>
		</tr>
	<?php
	foreach ($_SESSION['posts'] as  $value) {

		?>
			<tr>
				<td><?= $value['id'] ?></td>
				<td><?= $value['username'] ?></td>
				<td><?= $value['title']?></td>
				<td><?= $value['body']?></td>
			</tr>
		<?php
	}
	?>

	
	</table>
	<?php
	}
?>
		</div>
	</div>
