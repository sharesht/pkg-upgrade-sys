<?php
	if(isset($_POST['submit4'])){
		shell_exec("sudo lxc-attach testweek5 -- bash /root/upgradealltw5.sh");
		shell_exec("sudo lxc-attach testweek5 -- bash /root/runningservices.sh". " " . $selected);  
                shell_exec("sudo lxc-attach testweek5 -- bash /root/stoppedservices.sh". " " . $selected);
		shell_exec("sudo lxc-attach testweek5 -- cat /root/stopedservices.txt | mail -s "STOPPED SERVICES" root@SHARESHT.in");
	}
?>
