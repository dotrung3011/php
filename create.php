<!DOCTYPE html>
<html>
<head>
	<title>Mất Gốc</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<?php 
	require('./conn.php');

	if (
		isset($_SESSION['email']) && 
		$_SESSION['email'] === 'admin@gmail.com' && 
		isset($_POST['email']) &&
		isset($_POST['name']) &&
		isset($_POST['password'])
	) {
		$email = $_POST['email'];
		$name = $_POST['name'];
		$password = md5($_POST['password']);

		//Check dupplicate Email
		$dupplicateEmail = $conn->query("SELECT * FROM user WHERE email='$email'");

		if (mysqli_num_rows($dupplicateEmail) > 0) {
			die ('Email is existed');
		}
		//Add
		$sql = "INSERT INTO user (name, email, password)
				VALUES
					('$name', '$email', '$password')";
		$result = $conn->query($sql);
		if ($result) {
			header('Location: index.php');
		} else {
			die('not ok');
		}
	}
?>
<body class="container">
	<h3>Create</h3>
	<form method="post">
		<div class="from-group">
			<label for="email">Email</label>
			<input class="form-control" type="email" name="email" placeholder="email">
		</div>
		<div class="from-group">
			<label for="name">Name</label>
			<input class="form-control" type="name" name="name" placeholder="name">
		</div>
		<div class="from-group">
			<label for="password">Password</label>
			<input class="form-control" type="password" name="password" placeholder="password">
		</div>

		<button class="btn btn-primary mt-2" type="submit" name="submit">Login</button>
	</form>
</body>
</html>