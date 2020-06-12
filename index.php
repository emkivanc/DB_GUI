<?php
	require_once("connection/conn.php");
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
				<img src="img/nasad.png"/>
				<h4>What is Asteroid ?</h4>
				<p>Asteroids are minor planets, especially of the inner Solar System. Larger asteroids have also been called planetoids. These terms have historically been applied to any astronomical object orbiting the Sun that did not resolve into a disc in a telescope and was not observed to have characteristics of an active comet such as a tail. As minor planets in the outer Solar System were discovered that were found to have volatile-rich surfaces similar to comets, these came to be distinguished from the objects found in the main asteroid belt. In this article, the term "asteroid" refers to the minor planets of the inner Solar System, including those co-orbital with Jupiter.</p>
				<h4>Why we use asteroid data ?</h4>
				<p>The scientific interest in asteroids is due largely to their status as the remnant debris from the inner solar system formation process. Because some of these objects can collide with the Earth, asteroids are also important for having significantly modified the Earth's biosphere in the past. They will continue to do so in the future. In addition, asteroids offer a source of volatiles and an extraordinarily rich supply of minerals that can be exploited for the exploration and colonization of our solar system in the twenty-first century.</p>
				<h4>How Do We Detect Asteroids ?</h4>
				<p>Most asteroids are discovered by a camera on a telescope with a wide field of view. Image differencing software compares a recent photograph with earlier ones of the same part of the sky, detecting objects that have moved, brightened, or appeared.</p>
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