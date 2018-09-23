<?php
	if(isset($_POST['submit1'])){
		shell_exec("sudo lxc-attach DB -- bash /root/checkupgradeDB.sh");
		shell_exec("sudo lxc-attach DB -- bash /root/listservices.sh");
	}
?>
