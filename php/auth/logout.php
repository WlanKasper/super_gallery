<?php
	require('session_manager.php');
	
	closeSession();
	header("Location: ../../index.php");
?>