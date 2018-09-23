<?php
	if(isset($_POST['submit4'])){
		shell_exec("sudo lxc-attach DB2 -- bash /root/upgradeallDB2.sh");
		shell_exec("sudo lxc-attach DB2 -- bash /root/runningservices.sh". " " . $selected);  
                shell_exec("sudo lxc-attach DB2 -- bash /root/stoppedservices.sh". " " . $selected);
		shell_exec("sudo lxc-attach DB2 -- cat /root/stopedservices.txt | mail -s "STOPPED SERVICES" root@SHARESHT.in");
	}
?>
