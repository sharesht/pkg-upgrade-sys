<html>
	<head>
		<h1 align='center'>This is MACHINE DB Two</h1>
	</head>
	<body>
		<form action='lxc_DB2.php' method='post'>
			<input type='submit' name='submit1' value='List Upgradable Packages'>
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
		$servername = "10.0.3.52:3307";
		$username = "abcd";
		$password = "abcd";
		$dbname = "lxc_DB2";
					// Create connection

		$conn = mysqli_connect($servername, $username, $password, $dbname);
					
					// Check connection
		
		if (!$conn) {
    			die("Connection failed: " . mysqli_connect_error());
			}
		$sql = "SELECT * FROM lxc_DB2.updates";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {

					// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				
				echo "<form action='lxc_DB2.php' method='post'>";
				echo "<tr><td align='Center'>" . $row["SerialNo"] . "</td><td align='Center'>" . $row["PackageName"] . "</td><td align='Center'>" . $row["CurrentVersion"] . "</td><td align='Center'>" . $row["AvailableVersion"] . "</td><td align='Center'>" . "<input type='checkbox' name='Pkg_Names[]' value=" .$row["PackageName"]. ">" . "</td></tr></br>";
							}
			echo "<tr align='center'><td align='Center'><input type='submit' name='submit2' value='Display Selected'></td>";
			include("checkbox_value.php");
			echo "<td></td><td align='Center'><input type='submit' name='submit3' value='Ugrade Selected'></td>";
                        #include("upgradeselected.php");
			echo "<td></td><td align='Center'><input type='submit' name='submit4' value='Upgrade All'></td></tr></br>";
			#include("upgradeall.php");
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

