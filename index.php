<!DOCTYPE html>
<html>
<head>
	<title>Mất Gốc</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="container">
	<?php
		require('./conn.php');
 		if(isset($_SESSION['email'])) {
 			echo 'Hello '. $_SESSION['name'];
 		};

 		// Show all data
		$sql = "SELECT * FROM user";
		$result = $conn->query($sql);
		if (!$result) {
 				die;
 			}

 		// Show paginate
 		$totalRecord = $conn->query("SELECT count(id) as count_user FROM user");


 ?>

	 <table class="table">
	 	<thead>
	 		<tr>
		 		<th>ID</th>
		 		<th>NAME</th>
		 		<th>Email</th>
		 	</tr>
	 	</thead>
	 	<tbody>
	 		<?php 
	 			foreach ($result as $key => $value) {
			?>
				<tr>
					<td><?php echo $key + 1 ?></td>
					<td><?php echo $value['name'] ?></td>
					<td><?php echo $value['email'] ?></td>
					<td><a href="update.php?id=<?php echo $value['id'] ?>">Edit</a>
					<td><a href="delete.php?id=<?php echo $value['id'] ?>">Delete</a>
				</tr>
	 		<?php } ?>
	 	</tbody>
	 </table>
 		<p>
			<?php 
		 		if (isset($_SESSION['updated'])) {
		 			echo 'updated success';
		 			unset($_SESSION['updated']);
		 		} 
 			?>
 		</p>
 		<?php 
 			if (isset($_SESSION['name'])) {
 		?>
 			<a class="mr-2" href="logout.php">Logout</a>
 		<?php } else { ?>
 			<a href="login.php">Login</a>
 		<?php } ?>

 		<?php 
 			if (isset($_SESSION['email']) && $_SESSION['email'] === 'admin@gmail.com') {
 		?>	
 			<a href="create.php">Create</a>
 		<?php } ?>
</body>
</html>

