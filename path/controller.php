<?php
	session_start();
	require_once("../connection/conn.php");
	if($_POST['uid'] != null and $_POST['passwd'] != null) {
		$ps = hash('sha512', $_POST['passwd']);
		$id = $_POST['uid'];
		$query = $connection->prepare("SELECT * FROM admin WHERE id=? and pass=?");
		$query->bindParam(1, $id, PDO::PARAM_STR);
		$query->bindParam(2, $ps, PDO::PARAM_STR);
		$query->execute();
		$counter = $query->rowCount();
		if($counter == 1) {
			foreach($query as $q) {
				$name1 = $q['namesurname'];
			}
			$_SESSION['uname'] = $id;
			$_SESSION['passwd'] = $ps;
			$_SESSION['name'] = $name1;
			header("Location: ../nasa_adminpage.php");
		}
		else {
			header("Location: ../nasa_admin.php");
		}
	}
	else {
		header("Location: ../nasa_admin.php");
	}
?>