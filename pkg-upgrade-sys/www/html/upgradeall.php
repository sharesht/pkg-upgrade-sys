<?php
 	if(isset($_POST['submit4'])){
		shell_exec("sudo lxc-attach DB -- bash /root/upgradeallDB.sh");
	}
?>
