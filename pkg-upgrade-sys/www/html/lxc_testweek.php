<html>
	<head>
		<h1 align='center'>This is MACHINE TEST</h1>
	</head>
	<body>
		<form action='lxc_testweek.php' method='post'>
			<input type='submit' name='submit1' value='List Upgradable Packages'>
				<?php
					include("checkupgradetw5.php");
				?>
		</form>
		<table border="1" align="center">
			<tr>
				<th>SerialNo</th>
				<th>PackageName</th>
				<th>CurrentVersion</th>
				<th>AvailableVersion</th>
				<th>Selections</th>
			</tr>
	<?php
		$servername = "10.0.3.47:3305";
		$username = "tester";
		$password = "Sharesht@2";
		$dbname = "packages";
					// Create connection

		$conn = mysqli_connect($servername, $username, $password, $dbname);
					
					// Check connection
		
		if (!$conn) {
    			die("Connection failed: " . mysqli_connect_error());
			}
		$sql = "SELECT * FROM packages.updates";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {

					// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				
				echo "<form action='lxc_testweek.php' method='post'>";
				echo "<tr><td align='Center'>" . $row["SerialNo"] . "</td><td align='Center'>" . $row["PackageName"] . "</td><td align='Center'>" . $row["CurrentVersion"] . "</td><td align='Center'>" . $row["AvailableVersion"] . "</td><td align='Center'>" . "<input type='checkbox' name='Pkg_Names[]' value=" .$row["PackageName"]. ">" . "</td></tr></br>";
							}
			echo "<tr align='center'><td align='Center'><input type='submit' name='submit2' value='Display Selected'></td>";
			include("checkbox_value.php");
			echo "<td></td><td align='Center'><input type='submit' name='submit3' value='Upgrade Selected'></td>";
                        include("upgradeselectedtw5.php");
			echo "<td></td><td align='Center'><input type='submit' name='submit4' value='Upgrade All'></td></tr></br>";
			include("upgradealltw5.php");
			echo "</form>";
					}
		else {
			echo "No Upgrades Available for any Package";
		}
		mysqli_close($conn);
	?>
		</table>
	</body>
</html>

