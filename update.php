<!DOCTYPE html>
<html>
<head>
	<head>
	<title>Mất Gốc</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
</head>
<?php 
	require('./conn.php');
	// Get current data
	if(	
		isset($_SESSION['email']) &&
		$_SESSION['email'] === 'admin@gmail.com' &&
		isset($_GET['id'])
	) {
		$id = $_GET['id'];
		$sqlGetCurrentData = "SELECT * FROM user WHERE id='$id'";
		$result = $conn->query($sqlGetCurrentData);
		if (count($result) == 1) {
			$currentData = mysqli_fetch_array($result);
		}
	}

	// Update data
	if (isset($_POST['submit'])) {
		$name = $_POST['name'] ? $_POST['name'] : $currentData['name'];
		$email = $_POST['email'] ? $_POST['email'] : $currentData['email'];
		$sqlUpdateData = "UPDATE user SET email='$email', name='$name' WHERE id='$id'";
		$update = $conn->query($sqlUpdateData);
		if ($update === true) {
			$_SESSION['updated'] = true; 
			header('Location: index.php');
			exit();
		} else {
			echo '!!Update False';
		}
	}

?>

<body class="container">
	<h3 class="text-center mt-3">Update</h3>
	<form method="post">
	  	<div class="form-group">
		    <label for="email">Email</label>
		    <input type="text" class="form-control" name="email" id="email" value="<?php echo $currentData['email'] ?>" aria-describedby="email" placeholder="email">
		  	</div>
			<div class="form-group">
		    <label for="name">Name</label>
		    <input type="text" class="form-control" name="name" id="name" value="<?php echo $currentData['name'] ?>" aria-describedby="name" placeholder="Name">
	  	</div>
	  <button class="btn btn-primary" type="submit" name="submit">Update</button>
	</form>
</body>
</html>