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
		echo "<table class='table table-striped'>
				<thead>
					<tr>
							<th>Character</th>
							<th>Name</th>
							<th>Startup</th>
							<th>Recovery</th>
							<th>Total</th>
							<th>isLimited</th>
							<th>isEnergy</th>
							<th>canDelay</th>
					</tr>
				</thead>
				<tbody>";
		while($row = $query->fetch(PDO::FETCH_ASSOC)) {
			echo "<tr>";
			echo "<td>" . $row["charName"] . "</td>";
			echo "<td>" . $row["name"] . "</td>";
			echo "<td>" . $row["startup"] . "</td>";
			echo "<td>" . $row["recovery"] . "</td>";
			echo "<td>" . ($row["startup"] + $row["recovery"]) . "</td>";
			echo "<td>" . $row["isLimited"] . "</td>";
			echo "<td>" . $row["isEnergy"] . "</td>";
			echo "<td>" . $row["canDelay"] . "</td>";
			echo "</tr>";
		}
		echo "</tbody>
			</table>";
		
	} catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}


?>