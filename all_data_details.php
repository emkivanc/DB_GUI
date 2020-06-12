<?php
	session_start();
	setcookie("ordering", "0", time() - 3600);
	require_once("connection/conn.php");
	if($_GET['asteroid'] != null) {
		$asteroid_inf = htmlspecialchars($_GET['asteroid']);
		if(preg_match("/[\-]{2,}|[;]|[']|[\\\*]/", $asteroid_inf)) {
			$connection = null;
			echo "Undefined query detected.";
		}
		else {
			$asteroid_id = $_GET['asteroid'];
		}
	}
	else {
		header("Location: all_data.php");
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
				<h4>Asteroid Data (Details)</h4>
				<p><a href="all_data.php" style="text-decoration: none;"><b><i style="color: #1B262C;"> << Go To 'All Data' Page </i></b></a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="data_search.php" style="text-decoration: none;"><b><i style="color: #1B262C;"> << Go To 'Data Search' Page </i></b></a>
					<?php
						if($_SESSION['name'] != null) {
					?>
							&nbsp;&nbsp;&nbsp;&nbsp; <a href="nasa_admin.php" style="text-decoration: none;"><b><i style="color: #1B262C;"> << Go To 'NasAdmin' Page </i></b></a>
					<?php
						}
					?>
				</p>
				<?php
					$fetch_data_details = $connection->prepare("SELECT * FROM asteroids INNER JOIN asteroid_info ON asteroids.table_id = asteroid_info.table_id INNER JOIN asteroid_hazard ON asteroids.table_id = asteroid_hazard.table_id WHERE asteroids.table_id=?");
					$fetch_data_details->bindParam(1, $asteroid_id, PDO::PARAM_INT);
					$fetch_data_details->execute();
					foreach($fetch_data_details as $data_d) {
						$nri = $data_d['Neo_Reference_ID'];
						$name = $data_d['Name'];
						$am = $data_d['Absolute_Magnitude'];
						$edikm = $data_d['Est_Dia_in_KMmin'];
						$edikm2 = $data_d['Est_Dia_in_KMmax'];
						$edim = $data_d['Est_Dia_in_Mmin'];
						$edim2 = $data_d['Est_Dia_in_Mmax'];
						$edimil = $data_d['Est_Dia_in_Milesmin'];
						$edimil2 = $data_d['Est_Dia_in_Milesmax'];
						$edifm = $data_d['Est_Dia_in_Feetmin'];
						$edifm2 = $data_d['Est_Dia_in_Feetmax'];
						$cad = $data_d['Close_Approach_Date'];
						$edca = $data_d['Epoch_Date_Close_Approach'];
						$rvkps = $data_d['Relative_Velocity_km_per_sec'];
						$rvkps2 = $data_d['Relative_Velocity_km_per_hr'];
						$mph = $data_d['Miles_per_hour'];
						$mda = $data_d['Miss_DistAstronomical'];
						$mdl = $data_d['Miss_Distlunar'];
						$mdk = $data_d['Miss_Distkilometers'];
						$mdm = $data_d['Miss_Distmiles'];
						$obody = $data_d['Orbiting_Body'];
						$oid = $data_d['Orbit_ID'];
						$odd = $data_d['Orbit_Determination_Date'];
						$oun = $data_d['Orbit_Uncertainity'];
						$moi = $data_d['Minimum_Orbit_Intersection'];
						$jti = $data_d['Jupiter_Tisserand_Invariant'];
						$eos = $data_d['Epoch_Osculation'];
						$ecc = $data_d['Eccentricity'];
						$sma = $data_d['Semi_Major_Axis'];
						$inclination = $data_d['Inclination'];
						$anl = $data_d['Asc_Node_Longitude'];
						$op = $data_d['Orbital_Period'];
						$pdist = $data_d['Perihelion_Distance'];
						$parg = $data_d['Perihelion_Arg'];
						$aphdist = $data_d['Aphelion_Dist'];
						$ptime = $data_d['Perihelion_Time'];
						$mano = $data_d['Mean_Anomaly'];
						$mmot = $data_d['Mean_Motion'];
						$equinox = $data_d['Equinox'];
						$hazrd = $data_d['Hazardous'];
					}
				?>
				<table width="100%">
					<tr>
						<td>Neo Reference ID: </td>
						<td><b><i><?php echo $nri; ?></i></b></td>
					</tr>
					<tr>
						<td>Name:</td>
						<td><b><i><?php echo $name; ?></i></b></td>
					</tr>
					<tr>
						<td>Absolute Magnitude:</td>
						<td><b><i><?php echo $am; ?></i></b></td>
					</tr>
					<tr>
						<td>Est Dia in KM (min):</td>
						<td><b><i><?php echo $edikm; ?></i></b></td>
					</tr>
					<tr>
						<td>Est Dia in KM (max):</td>
						<td><b><i><?php echo $edikm2; ?></i></b></td>
					</tr>
					<tr>
						<td>Est Dia in M (min):</td>
						<td><b><i><?php echo $edim; ?></i></b></td>
					</tr>
					<tr>
						<td>Est Dia in M (max):</td>
						<td><b><i><?php echo $edim2; ?></i></b></td>
					</tr>
					<tr>
						<td>Est Dia in Miles (min):</td>
						<td><b><i><?php echo $edimil; ?></i></b></td>
					</tr>
					<tr>
						<td>Est Dia in Miles (max):</td>
						<td><b><i><?php echo $edimil2; ?></i></b></td>
					</tr>
					<tr>
						<td>Est Dia in Feet (min):</td>
						<td><b><i><?php echo $edifm; ?></i></b></td>
					</tr>
					<tr>
						<td>Est Dia in Feet (max):</td>
						<td><b><i><?php echo $edifm2; ?></i></b></td>
					</tr>
					<tr>
						<td>Close Approach Date:</td>
						<td><b><i><?php echo $cad; ?></i></b></td>
					</tr>
					<tr>
						<td>Epoch Date Close Approach:</td>
						<td><b><i><?php echo $edca; ?></i></b></td>
					</tr>
					<tr>
						<td>Relative Velocity Km Per Sec:</td>
						<td><b><i><?php echo $rvkps; ?></i></b></td>
					</tr>
					<tr>
						<td>Relative Velocity Km Per Hour:</td>
						<td><b><i><?php echo $rvkps2; ?></i></b></td>
					</tr>
					<tr>
						<td>Miles Per Hour:</td>
						<td><b><i><?php echo $mph; ?></i></b></td>
					</tr>
					<tr>
						<td>Miss Dist Astronomical:</td>
						<td><b><i><?php echo $mda; ?></i></b></td>
					</tr>
					<tr>
						<td>Miss Dist Lunar:</td>
						<td><b><i><?php echo $mdl; ?></i></b></td>
					</tr>
					<tr>
						<td>Miss Dist Kilometers:</td>
						<td><b><i><?php echo $mdk; ?></i></b></td>
					</tr>
					<tr>
						<td>Miss Dist Miles:</td>
						<td><b><i><?php echo $mdm; ?></i></b></td>
					</tr>
					<tr>
						<td>Orbiting Body:</td>
						<td><b><i><?php echo $obody; ?></i></b></td>
					</tr>
					<tr>
						<td>Orbit ID:</td>
						<td><b><i><?php echo $oid; ?></i></b></td>
					</tr>
					<tr>
						<td>Orbit Determination Date:</td>
						<td><b><i><?php echo $odd; ?></i></b></td>
					</tr>
					<tr>
						<td>Orbit Uncertainity:</td>
						<td><b><i><?php echo $oun; ?></i></b></td>
					</tr>
					<tr>
						<td>Minimum Orbit Intersection:</td>
						<td><b><i><?php echo $moi; ?></i></b></td>
					</tr>
					<tr>
						<td>Jupiter Tisserand Invariant:</td>
						<td><b><i><?php echo $jti; ?></i></b></td>
					</tr>
					<tr>
						<td>Epoch Osculation:</td>
						<td><b><i><?php echo $eos; ?></i></b></td>
					</tr>
					<tr>
						<td>Eccentricity:</td>
						<td><b><i><?php echo $ecc; ?></i></b></td>
					</tr>
					<tr>
						<td>Semi Major Axis:</td>
						<td><b><i><?php echo $sma; ?></i></b></td>
					</tr>
					<tr>
						<td>Inclination:</td>
						<td><b><i><?php echo $inclination; ?></i></b></td>
					</tr>
					<tr>
						<td>Asc Node Longitude:</td>
						<td><b><i><?php echo $anl; ?></i></b></td>
					</tr>
					<tr>
						<td>Orbital Period:</td>
						<td><b><i><?php echo $op; ?></i></b></td>
					</tr>
					<tr>
						<td>Perihelion Distance:</td>
						<td><b><i><?php echo $pdist; ?></i></b></td>
					</tr>
					<tr>
						<td>Perihelion Arg:</td>
						<td><b><i><?php echo $parg; ?></i></b></td>
					</tr>
					<tr>
						<td>Aphelion Dist:</td>
						<td><b><i><?php echo $aphdist; ?></i></b></td>
					</tr>
					<tr>
						<td>Perihelion Time:</td>
						<td><b><i><?php echo $ptime; ?></i></b></td>
					</tr>
					<tr>
						<td>Mean Anomaly:</td>
						<td><b><i><?php echo $mano; ?></i></b></td>
					</tr>
					<tr>
						<td>Mean Motion:</td>
						<td><b><i><?php echo $mmot; ?></i></b></td>
					</tr>
					<tr>
						<td>Equinox:</td>
						<td><b><i><?php echo $equinox; ?></i></b></td>
					</tr>
					<tr>
						<td>Hazardous:</td>
						<td><b><i><?php if($hazrd == 0) { echo "Not Hazardous"; } else { echo "Hazardous"; } ?></i></b></td>
					</tr>
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