<?php
	if(isset($_POST['submit1'])){
		shell_exec("sudo lxc-attach testweek5 -- bash /root/checkupgradetw5.sh");
		shell_exec("sudo lxc-attach testweek5 -- bash /root/listservices.sh");
	}
?>
