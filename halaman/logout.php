<?php
	session_start();
	session_destroy();
	header("location:/perpus/index.php");
?>