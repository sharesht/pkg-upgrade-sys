<html>
	<head>
		<h1 align='center'>This is MACHINE DB</h1>
	</head>
	<body>
		<form action='lxc_DB.php' method='post'>
			<input type='submit' name='submit1' value='List Upgradable Packages'>
				<?php
					include("checkupgradeDB.php");
				?>
			</br>
		</form>
	<?php
		$servername = "10.0.3.100:3310";
		$username = "abcd";
		$password = "abcd";
		$dbname = "lxc_DB";
					// Create connection

		$conn = mysqli_connect($servername, $username, $password, $dbname);
					
					// Check connection
		
		if (!$conn) {
    			die("Connection failed: " . mysqli_connect_error());
			}
		$sql = "SELECT * FROM lxc_DB.updates";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			echo "<table border='1' align='center'>";
                        echo "<tr>";
                                echo "<th>SerialNo</th>";
                                echo "<th>PackageName</th>";
                                echo "<th>CurrentVersion</th>";
                                echo "<th>AvailableVersion</th>";
                              echo "<th>Selections</th>";
                        echo "</tr>";

					// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				
				echo "<form action='lxc_DB.php' method='post' name='selected' id ='selected'>";
				echo "<tr><td align='Center'>" . $row["SerialNo"] . "</td><td align='Center'>" . $row["PackageName"] . "</td><td align='Center'>" . $row["CurrentVersion"] . "</td><td align='Center'>" . $row["AvailableVersion"] . "</td><td align='Center'>" . "<input type='checkbox' name='Pkg_Names[]' value=" .$row["PackageName"]. ">" . "</td></tr></br>";
							}
			#echo "<input type='submit' name='submit2' value='Display Selected'/></br>";
			#include("checkbox_value.php");
			#echo "</br>";
			#echo "</form>";
			#echo "</br>";
			#echo "<form action='lxc_DB.php' method='post'>";
                        echo "<input type='submit' name='submit3' value='Upgrade Selected'/></br>";
                        include("upgradeselected.php");
                        echo "</br>";
                        echo "</form>";
			
					}		
		else {
			echo "</br>";
			echo "<h4 align='center'>No Upgrades Available for any Package</h4>";
			echo "</br>";
		}
		mysqli_close($conn);
	?>
		</table> 
		<form action='lxc_DB.php' method='post' name='all' id='all'>
                       	<input type='submit' name='submit4' value='Upgrade All'/>
				<?php
					#shell_exec("sudo lxc-attach DB -- bash /root/upgradeallDB.sh");
					include("upgradeall.php");
				?>	
                </form>
	</body>
</html>

