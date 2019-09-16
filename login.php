<!DOCTYPE html>
<html>
<head>
	<title>Mất Gốc</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>


<body class="container">
	<form method="post">
	  <div class="form-group">
	    <label for="email">Email</label>
	    <input type="text" class="form-control" name="email" id="email" aria-describedby="email" placeholder="email">
	  </div>
	  <div class="form-group">
	    <label for="password">Password</label>
	    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
	  </div>
	  <button class="btn btn-primary" type="submit" name="submit">Login</button>
	</form>

	<?php 
		require('./conn.php');
		if (isset($_SESSION['email'])) {
			header('Location: index.php');
		}

		if (isset($_POST['email']) && isset($_POST['password'])) {
			$email = $_POST['email'];	
			$pass = md5($_POST['password']);
			$sql = "SELECT * FROM user WHERE email='$email' and password='$pass'";
			$result = $conn->query($sql);
			if ($result) {
	 			while($row = mysqli_fetch_array($result)) {
				    echo 'Hello ' . $row['name'];
				    $_SESSION['email'] = $row['email'];
				    $_SESSION['name'] = $row['name'];
				    header('Location: index.php');
				}
	 		} else {
	 			echo 'Login False';
	 		}
		}
	?>
</body>
</html>