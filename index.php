<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Smash Wii U/3DS Projectile Comparison</title>

		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<canvas id="projectileChart" width="640" height="600"></canvas>
			<p>Startup: The amount of frames until the projectile comes out</p>
			<p>Recovery: The amount of frames after the projectile comes out that your character can move again</p>

			<p>A smaller overall length means that this projectile will eventually dominate others with longer lengths in an uncharged projectile war where both clank. Note that thrown items are the fastest projectiles in the game, but are limited in use.</p>
			<p>The quicker a projectile's startup, the easier it is to stop people approaching with it on reaction.</p>
			<p>The quicker a projectile's recovery, the less time the opponent has to punish bad projectiles on reaction.</p>

			<p>*The player recovers from Villager's Lloyd Rocket and Duck Hunt's Wild Gunman faster than their startups! The graph can't support negative recoveries, so in these cases the startup is counted as the first frame you can move and the recovery as the amount of frames til the projectile is active.</p>
		</div>
		<div class="container">
			<h1>List of all the projectiles in Smash:</h1>
			<div id="projectileTable">
				<table class="table table-striped">
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
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	
	
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/Chart.min.js"></script>
		<script src="js/index.js"></script>
	</body>
</html>