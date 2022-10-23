<?php
	require('../db/connection.php');
	
	if (count($_POST) > 0) {
		$username 			= strtolower($_POST['_login']);
		$psw_hash   		= $_POST['md5_psw'];
		$psw_hash_conf   	= $_POST['md5_psw_conf'];
		$isSuccess 			= false;
		
		if ($psw_hash == $psw_hash_conf) {
			
			$sql_q = "INSERT INTO `user_credential`(`userName`, `password`, `displayName`, `permission`) VALUES (?,?,?,?);";
			$resp = insertQuery($sql_q, 'ssss', [$username, $psw_hash, $username, 'default']);
		
			// log user credencials and status
			
			require('authentication.php');
		} else {
			// log user credencials and error
			header("Location: ../../pages/registration.php?err=invalid_psw");
		}
		
		
	}
?>