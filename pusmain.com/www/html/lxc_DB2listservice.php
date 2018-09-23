<?php
	if(isset($_POST['submit5'])){
		shell_exec("sudo lxc-attach DB2 -- echo /root/listnames.txt");
		#$string = file_get_contents("shell_exec("sudo lxc-attach DB -- echo /root/listnames.txt");")
	}
?>
