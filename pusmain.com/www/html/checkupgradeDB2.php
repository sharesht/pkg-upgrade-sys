<?php
	if(isset($_POST['submit1'])){
		shell_exec("sudo lxc-attach DB2 -- bash /root/checkupgradeDB2.sh");
		shell_exec("sudo lxc-attach DB2 -- bash /root/listservices.sh");
	}
?>
