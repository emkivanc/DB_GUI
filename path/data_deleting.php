<?php
	require_once("../connection/conn.php");
	if($_GET['asteroid'] != null) {
		$lastid = $_GET['asteroid'];
		$deleting = $connection->prepare("DELETE FROM asteroids WHERE table_id=?");
		$deleting->bindParam(1, $lastid);
		$deleting->execute();
		$deleting2 = $connection->prepare("DELETE FROM asteroid_info WHERE table_id=?");
		$deleting2->bindParam(1, $lastid);
		$deleting2->execute();
		$deleting2 = $connection->prepare("DELETE FROM asteroid_hazard WHERE table_id=?");
		$deleting2->bindParam(1, $lastid);
		$deleting2->execute();
		header("Location: ../nasa_adminpage.php?info=yes");
	}
	else {
		header("Location: ../nasa_adminpage.php?info=no");
	}
?>