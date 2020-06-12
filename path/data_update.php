<?php
	require_once("../connection/conn.php");
	$aid = $_GET['asteroid'];
	if($_GET['asteroid'] != null) {
		$nri = $_POST['Neo_Reference_ID'];
		$name = $_POST['Name'];
		$updating = $connection->prepare("UPDATE asteroids SET Neo_Reference_ID=?, Name=? WHERE table_id=?");
		$updating->bindParam(1, $nri, PDO::PARAM_STR);
		$updating->bindParam(2, $name, PDO::PARAM_STR);
		$updating->bindParam(3, $aid, PDO::PARAM_STR);
		$updating->execute();
		if($updating->rowCount() == 1 or $updating->rowCount() == 0 ) {
			
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

			$updating2 = $connection->prepare("UPDATE asteroid_info SET table_id=?, Absolute_Magnitude=?, Est_Dia_in_KMmin=?, Est_Dia_in_KMmax=?, Est_Dia_in_Mmin=?, Est_Dia_in_Mmax=?, Est_Dia_in_Milesmin=?, Est_Dia_in_Milesmax=?, Est_Dia_in_Feetmin=?, Est_Dia_in_Feetmax=?, Close_Approach_Date=?, Epoch_Date_Close_Approach=?, Relative_Velocity_km_per_sec=?, Relative_Velocity_km_per_hr=?, Miles_per_hour=?, Miss_DistAstronomical=?, Miss_Distlunar=?, Miss_Distkilometers=?, Miss_Distmiles=?, Orbiting_Body=?, Orbit_ID=?, Orbit_Determination_Date=?, Orbit_Uncertainity=?, Minimum_Orbit_Intersection=?, Jupiter_Tisserand_Invariant=?, Epoch_Osculation=?, Eccentricity=?, Semi_Major_Axis=?, Inclination=?, Asc_Node_Longitude=?, Orbital_Period=?, Perihelion_Distance=?, Perihelion_Arg=?, Aphelion_Dist=?, Perihelion_Time=?, Mean_Anomaly=?, Mean_Motion=?, Equinox=? WHERE table_id=?");
			$updating2->bindParam(1, $aid);
			$updating2->bindParam(2, $am);
			$updating2->bindParam(3, $edikm);
			$updating2->bindParam(4, $edikm2);
			$updating2->bindParam(5, $edim);
			$updating2->bindParam(6, $edim2);
			$updating2->bindParam(7, $edimil);
			$updating2->bindParam(8, $edimil2);
			$updating2->bindParam(9, $edifm);
			$updating2->bindParam(10, $edifm2);
			$updating2->bindParam(11, $cad);
			$updating2->bindParam(12, $edca);
			$updating2->bindParam(13, $rvkps);
			$updating2->bindParam(14, $rvkps2);
			$updating2->bindParam(15, $mph);
			$updating2->bindParam(16, $mda);
			$updating2->bindParam(17, $mdl);
			$updating2->bindParam(18, $mdk);
			$updating2->bindParam(19, $mdm);
			$updating2->bindParam(20, $obody);
			$updating2->bindParam(21, $oid);
			$updating2->bindParam(22, $odd);
			$updating2->bindParam(23, $oun);
			$updating2->bindParam(24, $moi);
			$updating2->bindParam(25, $jti);
			$updating2->bindParam(26, $eos);
			$updating2->bindParam(27, $ecc);
			$updating2->bindParam(28, $sma);
			$updating2->bindParam(29, $inclination);
			$updating2->bindParam(30, $anl);
			$updating2->bindParam(31, $op);
			$updating2->bindParam(32, $pdist);
			$updating2->bindParam(33, $parg);
			$updating2->bindParam(34, $aphdist);
			$updating2->bindParam(35, $ptime);
			$updating2->bindParam(36, $mano);
			$updating2->bindParam(37, $mmot);
			$updating2->bindParam(38, $equinox);
			$updating2->bindParam(39, $aid);
			$updating2->execute();
			
			if($updating2->rowCount() == 1 or $updating2->rowCount() == 0) {
				$hazrad = $_POST['Hazardous'];
				$updating3 = $connection->prepare("UPDATE asteroid_hazard SET Hazardous=? WHERE table_id=?");
				$updating3->bindParam(1, $hazrad, PDO::PARAM_INT);
				$updating3->bindParam(2, $aid, PDO::PARAM_INT);
				$updating3->execute();
				if($updating3->rowCount() == 1 or $updating3->rowCount() == 0 ) {
					Header("Location: ../data_updating.php?result=ok&asteroid=$aid");
				}
				else {
					Header("Location: ../data_updating.php?result=denied&asteroid=$aid");
				}
			}
			else {
				Header("Location: ../data_updating.php?result=denied&asteroid=$aid");
			}
		}
		else {
			Header("Location: ../data_updating.php?result=denied&asteroid=$aid");
		}
	}
	else {
		Header("Location: ../data_updating.php?result=denied&asteroid=$aid");
	}
?>