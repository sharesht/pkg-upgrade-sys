<?php
	if(isset($_POST['submit3'])){
		if(!empty($_POST['Pkg_Names'])) {
		
			// Counting number of checked checkboxes.
	
		$checked_count=count($_POST['Pkg_Names']);
	
		echo "<b style='color:red'>Following </b>" .$checked_count. "<b style='color:red'>Package(s) Upgraded :</b><br/>";
	
			// Loop to store and display values of individual checked checkbox.
	
		foreach($_POST['Pkg_Names'] as $selected) {
		
			echo "<p style='color:red'>".$selected."</p>";
			shell_exec("sudo lxc-attach DB -- bash /root/upgradeselectedDB.sh". " " . $selected);
			shell_exec("sudo lxc-attach DB -- bash /root/runningservices.sh");	
			shell_exec("sudo lxc-attach DB -- bash /root/stoppedservices.sh");
			shell_exec("sudo lxc-attach DB -- cat /root/stopedservices.txt | mail -s 'STOPPED SERVICES in Machine DB' root@SHARESHT.in");
			shell_exec("sudo lxc-attach DB -- bash /root/checkupgradeDB.sh");
			}
		}
	else{
		echo "<b><p style='color:red'>Please Select Atleast One Package.</p></b>";
	}
}
?>
