<?php
 	if(isset($_POST['submit4'])){
		shell_exec("sudo lxc-attach DB -- bash /root/upgradeallDB.sh");
		shell_exec("sudo lxc-attach DB -- bash /root/runningservices.sh". " " . $selected);  
                shell_exec("sudo lxc-attach DB -- bash /root/stoppedservices.sh". " " . $selected);
		shell_exec("sudo lxc-attach DB -- cat /root/stopedservices.txt | mail -s "STOPPED SERVICES" root@SHARESHT.in");
	}
?>
