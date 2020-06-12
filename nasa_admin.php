<?php
	session_start();
	if($_SESSION['uname'] != null and $_SESSION['passwd']) {
		header("Location: nasa_adminpage.php");
	}
?>
<!DOCTYPE html>
<html lang="tr">
	<head>
		<title>Nasa Asteroids - Website</title>
		<meta charset="UTF-8"/>
		<meta http-equiv="Content-Language" content="tr"/>
		<link rel="stylesheet" type="text/css" href="css/styles.css"/>
		<meta name="robots" content="index, follow"/>
		<meta name="author" content="Mehmet Kıvanç ERBUDAK"/>
		<meta http-equiv="copyright" content="Mehmet Kıvanç ERBUDAK"/>
		<meta name="keywords" content="Nasa, Asteroid"/>
		<meta name="description" content="Nasa Asteroids"/>
		<link rel="shortcut icon" href="img/logo.ico">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body>
		<div style="width: 100%; height: 3px; background-image: linear-gradient(to right, #FFA372,#ED6663,#0F4C81,#1B262C,#0F4C81,#ED6663,#FFA372);"></div>
		<nav>
			<div style="width: 980px; margin: auto;">
				<ol>
					<a href="index.php"><li>Main Page</li></a>
					<a href="all_data.php"><li>All Data</li></a>
					<a href="data_search.php"><li>Data Search</li></a>
					<a href="photo_gallery.php"><li>Photo Gallery</li></a>
					<a href="project_details.php"><li>Project Details</li></a>
					<a href="nasa_admin.php"><li>NasAdmin</li></a>
				</ol>
			</div>
		</nav>
		<header style="color: #EDF2F4">
			Nasa Asteroid Data
		</header>
		<section style="margin-top: 20px;">
			<div id="merge_bord"></div>
			<article>
				<h4>Project Admin Login Page</h4>
				<form action="path/controller.php" method="post">
					<table width="100%">
						<tr>
							<td>Username:</td>
							<td><input type="text" name="uid"/></td>
						</tr>
						<tr>
							<td>Password:</td>
							<td><input type="password" name="passwd"/></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" Value="Log In"/></td>
						</tr>
					</table>
				</form>
			</article>
		</section>
		<footer>
			<div id="merge_bord"></div>
			<div style="height: 60px; line-height: 60px; ">
				Copyright © 2020 Mehmet Kıvanç Erbudak | Ayça Öksüztepe | Remzi Bulutlu
			</div>
		</footer>
	</body>
</html>