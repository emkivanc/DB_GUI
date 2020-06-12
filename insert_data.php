<?php
	require_once("connection/conn.php");
	session_start();
	if($_SESSION['uname'] == null or $_SESSION['passwd'] == null or $_SESSION['name'] == null) {
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
				<h4>Insert Data Page</h4>
				<p>
					<?php
						if($_GET['result'] != null and $_GET['result'] == "ok") {
							echo "Data inserted.";
						}
						elseif ($_GET['result'] != null and $_GET['result'] == "denied") {
							echo "Error. Please try again.";
						}
					?>
				</p>
				<form action="path/insert_data_controller.php" method="post">
					<table width="100%">
						<tr>
							<td>Neo Reference ID:</td>
							<td><input type="text" name="Neo_Reference_ID" maxlength="11"/></td>
						</tr>
						<tr>
							<td>Name:</td>
							<td><input type="text" name="Name" maxlength="11"/></td>
						</tr>
						<tr>
							<td>Absolute Magnitude:</td>
							<td><input type="text" name="Absolute_Magnitude" placeholder="Ex: 32.100"/></td>
						</tr>
						<tr>
							<td>Est Dia in KM (min):</td>
							<td><input type="text" name="Est_Dia_in_KMmin" placeholder="Ex: 15.5795524128"/></td>
						</tr>
						<tr>
							<td>Est Dia in KM (max):</td>
							<td><input type="text" name="Est_Dia_in_KMmax" placeholder="Ex: 34.8369382540"/></td>
						</tr>
						<tr>
							<td>Est Dia in M (min):</td>
							<td><input type="text" name="Est_Dia_in_Mmin" placeholder="Ex: 15579.5524127829"/></td>
						</tr>
						<tr>
							<td>Est Dia in M (max):</td>
							<td><input type="text" name="Est_Dia_in_Mmax" placeholder="Ex: 34836.9382540034"/></td>
						</tr>
						<tr>
							<td>Est Dia in Miles (min):</td>
							<td><input type="text" name="Est_Dia_in_Milesmin" placeholder="Ex: 9.6806820623"/></td>
						</tr>
						<tr>
							<td>Est Dia in Miles (max):</td>
							<td><input type="text" name="Est_Dia_in_Milesmax" placeholder="Ex: 21.6466631598"/></td>
						</tr>
						<tr>
							<td>Est Dia in Feet (min):</td>
							<td><input type="text" name="Est_Dia_in_Feetmin" placeholder="Ex: 51114.0187379546"/></td>
						</tr>
						<tr>
							<td>Est Dia in Feet (max):</td>
							<td><input type="text" name="Est_Dia_in_Feetmax" placeholder="Ex: 114294.4205012645"/></td>
						</tr>
						<tr>
							<td>Close Approach Date:</td>
							<td><input type="text" name="Close_Approach_Date" maxlength="30" placeholder="Ex: 8 Temmuz 2016 Cuma"/></td>
						</tr>
						<tr>
							<td>Epoch Date Close Approach:</td>
							<td><input type="text" name="Epoch_Date_Close_Approach" maxlength="11" placeholder="Ex: 2147483647"/></td>
						</tr>
						<tr>
							<td>Relative Velocity Km Per Sec:</td>
							<td><input type="text" name="Relative_Velocity_km_per_sec" placeholder="Ex: 44.6337466253"/></td>
						</tr>
						<tr>
							<td>Relative Velocity Km Per Hour:</td>
							<td><input type="text" name="Relative_Velocity_km_per_hr" placeholder="Ex: 160681.4878511894"/></td>
						</tr>
						<tr>
							<td>Miles Per Hour:</td>
							<td><input type="text" name="Miles_per_hour" placeholder="Ex: 99841.2278262016"/></td>
						</tr>
						<tr>
							<td>Miss Dist Astronomical:</td>
							<td><input type="text" name="Miss_DistAstronomical" placeholder="Ex: 0.4998841025"/></td>
						</tr>
						<tr>
							<td>Miss Dist Lunar:</td>
							<td><input type="text" name="Miss_Distlunar" placeholder="Ex: 194.4549102783"/></td>
						</tr>
						<tr>
							<td>Miss Dist Kilometers:</td>
							<td><input type="text" name="Miss_Distkilometers" placeholder="Ex: 74781600.00000000"/></td>
						</tr>
						<tr>
							<td>Miss Dist Miles:</td>
							<td><input type="text" name="Miss_Distmiles" placeholder="Ex: 46467132.00000000"/></td>
						</tr>
						<tr>
							<td>Orbiting Body:</td>
							<td><input type="text" name="Orbiting_Body" maxlength="20" placeholder="Ex: Earth, Moon, etc."/></td>
						</tr>
						<tr>
							<td>Orbit ID:</td>
							<td><input type="text" name="Orbit_ID" maxlength="11" placeholder="Ex: 611"/></td>
						</tr>
						<tr>
							<td>Orbit Determination Date:</td>
							<td><input type="text" name="Orbit_Determination_Date" maxlength="30" placeholder="Ex: 9.10.2016 07:23"/></td>
						</tr>
						<tr>
							<td>Orbit Uncertainity:</td>
							<td><input type="text" name="Orbit_Uncertainity" maxlength="11" placeholder="Ex: 9"/></td>
						</tr>
						<tr>
							<td>Minimum Orbit Intersection:</td>
							<td><input type="text" name="Minimum_Orbit_Intersection" placeholder="Ex: 0.477891000"/></td>
						</tr>
						<tr>
							<td>Jupiter Tisserand Invariant:</td>
							<td><input type="text" name="Jupiter_Tisserand_Invariant" placeholder="Ex: 9.025"/></td>
						</tr>
						<tr>
							<td>Epoch Osculation:</td>
							<td><input type="text" name="Epoch_Osculation" placeholder="Ex: 2450164.5"/></td>
						</tr>
						<tr>
							<td>Eccentricity:</td>
							<td><input type="text" name="Eccentricity" placeholder="Ex: 0.960260723740459200"/></td>
						</tr>
						<tr>
							<td>Semi Major Axis:</td>
							<td><input type="text" name="Semi_Major_Axis" placeholder="Ex: 5.0720084638292490"/></td>
						</tr>
						<tr>
							<td>Inclination:</td>
							<td><input type="text" name="Inclination" placeholder="Ex: 14.96212156524666000"/></td>
						</tr>
						<tr>
							<td>Asc Node Longitude:</td>
							<td><input type="text" name="Asc_Node_Longitude" placeholder="Ex: 222.406464580568500000"/></td>
						</tr>
						<tr>
							<td>Orbital Period:</td>
							<td><input type="text" name="Orbital_Period" placeholder="Ex: 4172.2313426638250"/></td>
						</tr>
						<tr>
							<td>Perihelion Distance:</td>
							<td><input type="text" name="Perihelion_Distance" placeholder="Ex: 1.16016537555217900"/></td>
						</tr>
						<tr>
							<td>Perihelion Arg:</td>
							<td><input type="text" name="Perihelion_Arg" placeholder="Ex: 174.326407009869300000"/></td>
						</tr>
						<tr>
							<td>Aphelion Dist:</td>
							<td><input type="text" name="Aphelion_Dist" placeholder="Ex: 8.9838515521063190"/></td>
						</tr>
						<tr>
							<td>Perihelion Time:</td>
							<td><input type="text" name="Perihelion_Time" placeholder="Ex: 2455878.493125060113"/></td>
						</tr>
						<tr>
							<td>Mean Anomaly:</td>
							<td><input type="text" name="Mean_Anomaly" placeholder="Ex: 25.282561472700410000"/></td>
						</tr>
						<tr>
							<td>Mean Motion:</td>
							<td><input type="text" name="Mean_Motion" placeholder="Ex: 0.16946690857875440"/></td>
						</tr>
						<tr>
							<td>Equinox:</td>
							<td><input type="text" name="Equinox" maxlength="20" placeholder="Ex: J2000"/></td>
						</tr>
						<tr>
							<td>Hazardous:</td>
							<td>
								<input type="radio" id="tr" name="Hazardous" value="1">
								<label for="tr">True</label><br>
								<input type="radio" id="fl" name="Hazardous" value="0">
								<label for="fl">False</label><br>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" Value="Insert Data"/></td>
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