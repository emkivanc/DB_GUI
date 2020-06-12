<?php
	require_once("../connection/conn.php");
	if($_POST['Neo_Reference_ID'] != null) {
		$nri = $_POST['Neo_Reference_ID'];
		$name = $_POST['Name'];
		$inserting = $connection->prepare("INSERT INTO asteroids (Neo_Reference_ID, Name) VALUES (?,?)");
		$inserting->bindParam(1, $nri, PDO::PARAM_STR);
		$inserting->bindParam(2, $name, PDO::PARAM_STR);
		$inserting->execute();
		
		$sorgu = $inserting->rowCount();
		$lastid = $connection->lastInsertId();
		
		if($sorgu == 1) {
			$am = $_POST['Absolute_Magnitude'];
			$edikm = $_POST['Est_Dia_in_KMmin'];
			$edikm2 = $_POST['Est_Dia_in_KMmax'];
			$edim = $_POST['Est_Dia_in_Mmin'];
			$edim2 = $_POST['Est_Dia_in_Mmax'];
			$edimil = $_POST['Est_Dia_in_Milesmin'];
			$edimil2 = $_POST['Est_Dia_in_Milesmax'];
			$edifm = $_POST['Est_Dia_in_Feetmin'];
			$edifm2 = $_POST['Est_Dia_in_Feetmax'];
			$cad = $_POST['Close_Approach_Date'];
			$edca = $_POST['Epoch_Date_Close_Approach'];
			$rvkps = $_POST['Relative_Velocity_km_per_sec'];
			$rvkps2 = $_POST['Relative_Velocity_km_per_hr'];
			$mph = $_POST['Miles_per_hour'];
			$mda = $_POST['Miss_DistAstronomical'];
			$mdl = $_POST['Miss_Distlunar'];
			$mdk = $_POST['Miss_Distkilometers'];
			$mdm = $_POST['Miss_Distmiles'];
			$obody = $_POST['Orbiting_Body'];
			$oid = $_POST['Orbit_ID'];
			$odd = $_POST['Orbit_Determination_Date'];
			$oun = $_POST['Orbit_Uncertainity'];
			$moi = $_POST['Minimum_Orbit_Intersection'];
			$jti = $_POST['Jupiter_Tisserand_Invariant'];
			$eos = $_POST['Epoch_Osculation'];
			$ecc = $_POST['Eccentricity'];
			$sma = $_POST['Semi_Major_Axis'];
			$inclination = $_POST['Inclination'];
			$anl = $_POST['Asc_Node_Longitude'];
			$op = $_POST['Orbital_Period'];
			$pdist = $_POST['Perihelion_Distance'];
			$parg = $_POST['Perihelion_Arg'];
			$aphdist = $_POST['Aphelion_Dist'];
			$ptime = $_POST['Perihelion_Time'];
			$mano = $_POST['Mean_Anomaly'];
			$mmot = $_POST['Mean_Motion'];
			$equinox = $_POST['Equinox'];

			$inserting2 = $connection->prepare("INSERT INTO asteroid_info (table_id, Absolute_Magnitude, Est_Dia_in_KMmin, Est_Dia_in_KMmax, Est_Dia_in_Mmin, Est_Dia_in_Mmax, Est_Dia_in_Milesmin, Est_Dia_in_Milesmax, Est_Dia_in_Feetmin, Est_Dia_in_Feetmax, Close_Approach_Date, Epoch_Date_Close_Approach, Relative_Velocity_km_per_sec, Relative_Velocity_km_per_hr, Miles_per_hour, Miss_DistAstronomical, Miss_Distlunar, Miss_Distkilometers, Miss_Distmiles, Orbiting_Body, Orbit_ID, Orbit_Determination_Date, Orbit_Uncertainity, Minimum_Orbit_Intersection, Jupiter_Tisserand_Invariant, Epoch_Osculation, Eccentricity, Semi_Major_Axis, Inclination, Asc_Node_Longitude, Orbital_Period, Perihelion_Distance, Perihelion_Arg, Aphelion_Dist, Perihelion_Time, Mean_Anomaly, Mean_Motion, Equinox) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$inserting2->bindParam(1, $lastid);
			$inserting2->bindParam(2, $am);
			$inserting2->bindParam(3, $edikm);
			$inserting2->bindParam(4, $edikm2);
			$inserting2->bindParam(5, $edim);
			$inserting2->bindParam(6, $edim2);
			$inserting2->bindParam(7, $edimil);
			$inserting2->bindParam(8, $edimil2);
			$inserting2->bindParam(9, $edifm);
			$inserting2->bindParam(10, $edifm2);
			$inserting2->bindParam(11, $cad);
			$inserting2->bindParam(12, $edca);
			$inserting2->bindParam(13, $rvkps);
			$inserting2->bindParam(14, $rvkps2);
			$inserting2->bindParam(15, $mph);
			$inserting2->bindParam(16, $mda);
			$inserting2->bindParam(17, $mdl);
			$inserting2->bindParam(18, $mdk);
			$inserting2->bindParam(19, $mdm);
			$inserting2->bindParam(20, $obody);
			$inserting2->bindParam(21, $oid);
			$inserting2->bindParam(22, $odd);
			$inserting2->bindParam(23, $oun);
			$inserting2->bindParam(24, $moi);
			$inserting2->bindParam(25, $jti);
			$inserting2->bindParam(26, $eos);
			$inserting2->bindParam(27, $ecc);
			$inserting2->bindParam(28, $sma);
			$inserting2->bindParam(29, $inclination);
			$inserting2->bindParam(30, $anl);
			$inserting2->bindParam(31, $op);
			$inserting2->bindParam(32, $pdist);
			$inserting2->bindParam(33, $parg);
			$inserting2->bindParam(34, $aphdist);
			$inserting2->bindParam(35, $ptime);
			$inserting2->bindParam(36, $mano);
			$inserting2->bindParam(37, $mmot);
			$inserting2->bindParam(38, $equinox);
			$inserting2->execute();
			$sorgu2 = $inserting2->rowCount();

			if($sorgu2 == 1) {
				$hazrad = $_POST['Hazardous'];
				$inserting3 = $connection->prepare("INSERT INTO asteroid_hazard (table_id, Hazardous) VALUES (?,?)");
				$inserting3->bindParam(1, $lastid, PDO::PARAM_INT);
				$inserting3->bindParam(2, $hazrad, PDO::PARAM_INT);
				$inserting3->execute();
				$sorgu3 = $inserting3->rowCount();

				if($sorgu3 != 1) {
				
					$deleting = $connection->prepare("DELETE FROM asteroids WHERE table_id=?");
					$deleting->bindParam(1, $lastid);
					$deleting->execute();
					$deleting2 = $connection->prepare("DELETE FROM asteroid_info WHERE table_id=?");
					$deleting2->bindParam(1, $lastid);
					$deleting2->execute();
					header("Location: ../insert_data.php?result=denied");

				}
				else {
					header("Location: ../insert_data.php?result=ok");
				}

			}
			else {
				$deleting = $connection->prepare("DELETE FROM asteroids WHERE table_id=?");
				$deleting->bindParam(1, $lastid);
				$deleting->execute();
				header("Location: ../insert_data.php?result=denied");
			}

		}
		else {
			header("Location: ../insert_data.php?result=denied");
		}
	}
	else {
		header("Location: ../insert_data.php?result=denied");
	}
?>