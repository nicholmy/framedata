<?php
	$servername = "mysql.mylesnicholson.com";
	$username = "mnichols";
	$password = "Yumyum92!!!";

	//TODO: Add an option to change the order the results are pulled from
	//TODO: Also add an option to filter by all/unlimited/limited, all,physical/energy, all/can't delay/delay
	$orderString = "ORDER BY Characters.name, Projectiles.name";
	
	$orderString = "ORDER BY Projectiles.startup";
	$orderString = "ORDER BY Projectiles.recovery";
	$orderString = "ORDER BY total";
	
	
	try {
		$conn = new PDO("mysql:host=$servername;dbname=smashdata", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		//Later, be able to add options for sorting by the different flags?
		$query = $conn->prepare("SELECT Projectiles.id, Characters.name AS charName, Projectiles.name, Projectiles.startup, Projectiles.recovery, (Projectiles.startup + Projectiles.recovery) AS total, Projectiles.isLimited, Projectiles.isEnergy, Projectiles.canDelay FROM Projectiles JOIN Characters ON Projectiles.charID = Characters.id ORDER BY total");
		$query->execute();
		$moveNames = array();
		$startupData = array();
		$recoveryData = array();
		while($row = $query->fetch(PDO::FETCH_ASSOC)) {
			$moveNames[] = $row["charName"] . "'s " . $row["name"];
			//Weird cases where the character recovers sooner than the projectile is active
			if ($row["recovery"] < 0) {
				$startupData[] = $row["startup"] + $row["recovery"];
				$recoveryData[] = -1 * $row["recovery"];
			} else {
				$startupData[] = $row["startup"];
				$recoveryData[] = $row["recovery"];
			}
		}
		
		$data = array("nameData" => $moveNames, "startupData" => $startupData, "recoveryData" => $recoveryData);
		echo json_encode($data);
		
	} catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}


?>