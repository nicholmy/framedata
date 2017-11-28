<?php
	$servername = "mysql.mylesnicholson.com";
	$username = "mnichols";
	$password = "Yumyum92!!!";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=smashdata", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		
		$query = $conn->prepare("SELECT Projectiles.id, Characters.name AS charName, Projectiles.name, Projectiles.startup, Projectiles.recovery, Projectiles.isLimited, Projectiles.isEnergy, Projectiles.canDelay FROM Projectiles JOIN Characters ON Projectiles.charID = Characters.id ORDER BY Characters.name, Projectiles.name");
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_ASSOC);
		
		echo json_encode($results);
		
	} catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}


?>