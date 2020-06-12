<?php
	require_once("connection/conn.php");
	if($_POST['neoid'] != null) {
		$nvalue = $_POST['neoid'];
		setcookie("neoid1", $_POST['neoid']);
	}
	else {
		$sc = "Please enter the Neo Reference ID to search.";
	}
	if($_GET['order'] == null and $_COOKIE['ordering'] == null) {
		setcookie("ordering", "0");
		$ordering = "0";
	}
	elseif($_GET['order'] == "TRUE" and $_COOKIE['ordering'] == "0") {
		setcookie("ordering", "1");
		$ordering = "1";
	}
	elseif($_GET['order'] == "TRUE" and $_COOKIE['ordering'] == "1") {
		setcookie("ordering", "0");
		$ordering = "0";
	}
	else {
		$ordering = $_COOKIE['ordering'];
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
				<table width="100%">
				<?php
					$fetch_rowcount = $connection->prepare("SELECT * FROM asteroids WHERE Neo_Reference_ID=?");
					if($nvalue != null) {
						$fetch_rowcount->bindParam(1,$nvalue, PDO::PARAM_INT);
						$fetch_rowcount->execute();
					}
					else {
						$fetch_rowcount->bindParam(1, $_COOKIE['neoid1'], PDO::PARAM_INT);
						$fetch_rowcount->execute();
					}
					$rowcount = $fetch_rowcount->rowCount();
					$page_counter = ceil($rowcount/50);
					if($_GET['page'] != null) {
						$page_value = htmlspecialchars($_GET['page']);
						if(preg_match("/[\-]{2,}|[;]|[']|[\\\*]/", $page_value)) {
							$connection = null;
							echo "Undefined query detected.";
						}
						else {
							$page_value = (int)$_GET['page'];
							if($page_value == 1 or $page_value == 0) {
								$beginrow = 0;
							}
							elseif($page_value == 2) {
								$beginrow = 50;
							}
							else {
								$beginrow = 50*($page_value-1);
							}
						}
					}
					else {
						$beginrow = 0;
					}
				?>
				<h4>Search Nasa Asteroid Data</h4>
				<p><i><b><?php echo $rowcount; ?></b></i> results are listed.</p>
				<?php
					if($_COOKIE['neoid1'] == null) {
						echo $sc;
					}
				?>
				<tr>
					<td>Enter the Neo Reference ID:</td>
					<td>
						<form action="data_search.php" method="post">
							<input type="text" name="neoid"/>
							<input type="submit" Value="Search"/>
						</form>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<div style="width: 100%; min-height: 20px; line-height: 20px;">
							<?php
								for($i = 1; $i<=$page_counter; $i++) {
							?>
									<a style="color: #1B262C;" href="data_search.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
							<?php
								}
							?>
						</div>
					</td>
				</tr>
				<tr>
					<td><u><a style="color: #1B262C;" href="data_search.php?order=TRUE">Neo Reference ID</a></u></td>
					<td>&nbsp;</td>
				</tr>
				<?php
					if($ordering == "0") {
						$fetch_data = $connection->prepare("SELECT * FROM asteroids WHERE Neo_Reference_ID=? ORDER BY Neo_Reference_ID ASC LIMIT $beginrow,50");
						if($nvalue != null) {
							$fetch_data->bindParam(1, $nvalue, PDO::PARAM_INT);
							$fetch_data->execute();
						}
						else {
							$fetch_data->bindParam(1, $_COOKIE['neoid1'], PDO::PARAM_INT);
							$fetch_data->execute();
						}
						foreach($fetch_data as $n_data) {
				?>
							<tr>
								<td><?php echo $n_data['Name']; ?></td>
								<td><a style="color: #1B262C; text-decoration: none;" href="all_data_details.php?asteroid=<?php echo $n_data['table_id'] ?>"><b><i>See Details</i></b></a></td>
							</tr>
				<?php
						}
					}
					elseif($ordering == "1") {
						$fetch_data = $connection->prepare("SELECT * FROM asteroids WHERE Neo_Reference_ID=? ORDER BY Neo_Reference_ID DESC LIMIT $beginrow,50");
						if($nvalue != null) {
							$fetch_data->bindParam(1, $nvalue, PDO::PARAM_INT);
							$fetch_data->execute();
						}
						else {
							$fetch_data->bindParam(1, $_COOKIE['neoid1'], PDO::PARAM_INT);
							$fetch_data->execute();
						}
						foreach($fetch_data as $n_data) {
				?>
							<tr>
								<td><?php echo $n_data['Name']; ?></td>
								<td><a style="color: #1B262C; text-decoration: none;" href="all_data_details.php?asteroid=<?php echo $n_data['table_id'] ?>"><b><i>See Details</i></b></a></td>
							</tr>
				<?php
						}
					}
					else {
						echo "Timed out page.<br/>";
						echo "Query was crashed.<br/>";
						echo "Please refresh your page.";
					}
				?>
				</table>
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