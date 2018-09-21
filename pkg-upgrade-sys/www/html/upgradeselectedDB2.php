<?php
	if(isset($_POST['submit3'])){
		if(!empty($_POST['Pkg_Names'])) {
		
			// Counting number of checked checkboxes.
	
		$checked_count=count($_POST['Pkg_Names']);
	
		echo "<b>You have selected following </b>" .$checked_count. "<b> Package(s):</b><br/>";
	
			// Loop to store and display values of individual checked checkbox.
	
		foreach($_POST['Pkg_Names'] as $selected) {
		
			echo "<p>".$selected."</p>";
			shell_exec("sudo lxc-attach DB2 -- bash /root/upgradeselectedDB2.sh". " " . $selected);
			}
		}
	else{
		echo "<b>Please Select Atleast One Package.</b>";
	}
}
?>
