<html>
	<head>
		<style>
			#heading { color: #2cff82; }
			a:visited { color: #ffe52c; }
			a.fixed {
				position: fixed;
				right: 40;
				top: 40;
			}
		</style>
		<h1 id='heading' align='center'>This is MACHINE DB TWO</h1>
		<h2><a class='fixed' href = "home.html">HOME</a></h2>
	</head>
	<body style="background-image:url('bg-img/software-wallpaper-11.jpg')">
		 <form action='lxc_DB2.php' method='post'>
                        <input type='submit' name='submit1' value='List Upgradable Packages'>
                                <?php
                                        include("checkupgradeDB2.php");
                                ?>
                        </br></br>
		</form>

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
			echo "<table border='1' align='center'>";
                        echo "<tr>";
			echo "<th style='color:red'>SerialNo</th>";
                        echo "<th style='color:red'>PackageName</th>";
                        echo "<th style='color:red'>CurrentVersion</th>";
                        echo "<th style='color:red'>AvailableVersion</th>";
                        echo "<th style='color:red'>Selections</th>";
			echo "</tr>";

					// output data of each row
			
			while($row = mysqli_fetch_assoc($result)) {
				
				echo "<form action='lxc_DB2.php' method='post'>";
				echo "<tr><td align='Center' style='color:ffe52c'>" . $row["SerialNo"] . "</td><td align='Center' style='color:ffe52c'>" . $row["PackageName"] . "</td><td align='Center' style='color:ffe52c'>" . $row["CurrentVersion"] . "</td><td align='Center' style='color:ffe52c'>" . $row["AvailableVersion"] . "</td><td align='Center' style='color:ffe52c'>" . "<input type='checkbox' name='Pkg_Names[]' value=" .$row["PackageName"]. ">" . "</td></tr></br>";
							}
			echo "<input type='submit' name='submit3' value='Upgrade Selected'/></br>";
                        include("upgradeselectedDB2.php");
			echo "</br>";
			echo "<form action='lxc_DB2.php' method='post'>:";
                        echo "<input type='submit' name='submit4' value='Upgrade All'>";
                        include("upgradeallDB2.php");
			echo "</form>";
			echo "</table>";
					}		
		else {
			echo "</br>";
			echo "<h4 align='center' style='color:ffe52c'>No Upgrades Available for any Package</h4>";
			echo "</br>";
		}
		mysqli_close($conn);
	?>
	</body>
</html>

