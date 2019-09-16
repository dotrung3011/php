<?php 
	require('./conn.php');
	if (isset($_GET['id']) && !empty($_GET['id'])) {
		$id = $_GET['id'];
		$sqlDelete = "DELETE FROM user WHERE id='$id'";
		$result = $conn->query($sqlDelete);
		if ($result) {
			$_SESSION['deleted'] = true;
			header('Location: index.php');
		} else {
			echo 'Delete False';
		}
	}
?>