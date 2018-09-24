<?php
 	if(isset($_POST['submit4'])){
		shell_exec("sudo lxc-attach DB -- bash /root/upgradeallDB.sh");
		shell_exec("sudo lxc-attach DB -- bash /root/runningservices.sh");  
                shell_exec("sudo lxc-attach DB -- bash /root/stoppedservices.sh");
		shell_exec("sudo lxc-attach DB -- cat /root/stopedservices.txt | mail -s 'STOPPED SERVICES at Machibe DB1' root@SHARESHT.in");
		shell_exec("sudo lxc-attach DB -- bash /root/checkupgradeDB.sh");
	}
?>
