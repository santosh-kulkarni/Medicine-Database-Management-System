<?php
	session_start();
	$_SESSION["username"] = "";
	echo "
			<script>
				window.location.href = '\Log_In.php';
			</script>
	";
?>