<?php
	if(isset($_POST['submit4'])){
		shell_exec("sudo lxc-attach testweek5 -- bash /root/upgradealltw5.sh");
		shell_exec("sudo lxc-attach testweek5 -- bash /root/runningservices.sh");  
                shell_exec("sudo lxc-attach testweek5 -- bash /root/stoppedservices.sh");
		shell_exec("sudo lxc-attach testweek5 -- cat /root/stopedservices.txt | mail -s 'STOPPED SERVICES at Machine TEST' root@SHARESHT.in");
		shell_exec("sudo lxc-attach testweek5 -- bash /root/checkupgradetw5.sh");
	}
?>
